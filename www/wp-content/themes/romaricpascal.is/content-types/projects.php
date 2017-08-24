<?php

define('PROJECT_TYPE', 'project');
define('PROJECT_SLUG', 'proud-of');

// 1. Register new post type
function projects_register_post_type() {

  $labels = [
    'name' => __('Projects'),
    'singular_name' => __('Project'),
    'add_new' => __('Add new', 'Projects'),
    'add_new_item' => __('Add new Project'),
    'edit_item' => __('Edit Project'),
    'new_item' => __('New Project'),
    'view_item' => __('View Project'),
    'search_item' => __('Search Projects'),
    'not_found' => __('No Project found'),
    'not_found_in_trash' => __('No Project found in trash'),
    'parent_item_colon' => ''
  ];

  register_post_type(PROJECT_TYPE, [
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => PROJECT_SLUG],
    'hierarchical' => true,
    'supports' => ['title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes']
  ]);

  register_taxonomy_for_object_type(CRAFT_TAX_NAME, PROJECT_TYPE);
}
add_action('init', 'projects_register_post_type');

// 2. Add custom fields
add_action('init', function () {
  require_once('projects-acf.php');
});

// 3. Custom pagination
if (!is_admin()) {
  add_filter('pre_get_posts', function ($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive(PROJECT_TYPE)) {
      $query->query_vars['posts_per_page'] = rp_get_archive_size(PROJECT_TYPE);
    }
    return $query;
  });
}

// 4. Routing
// Try to resolve /proud-of/(.*) as a craft if resolving it as a project didn't work

function rp_resolve($request) {
  $query = new WP_Query($request);
  $query->query($request);
  if ($query->have_posts()) {
    return $request;
  }

  return false;
}

function rp_resolve_terms($termSlugs) {
  $terms = get_terms([
    'taxonomy' => CRAFT_TAX_NAME,
    'slug' => $termSlugs
  ]);
  if (count($terms) === count($termSlugs)) {
    return $terms;
  }
  return false;
}

function rp_resolve_name_as_single($request) {
  global $rp_url_terms;
  $pathParts = explode('/', $request['name']);
  $name = array_pop($pathParts);

  // Before anything, let's check if the terms are actually OK
  if (!empty($pathParts)) {
    $terms = rp_resolve_terms($pathParts);
    if (!$terms) {
      return;
    }
  }

  // Looks all good, now all we need to check is that the post exists
  $singleRequest = [
    'post_type' => $request['post_type'],
    "{$request['post_type']}" => $name,
    'name' => $name,
  ];

  // IMPROVE: Check if it's actually within those terms and if it is not, redirect to appropriate term

  $result = rp_resolve($singleRequest);
  if ($result) {
    $rp_url_terms = $terms;
    return $singleRequest;
  }
}

function rp_get_url_terms() {
  global $rp_url_terms;
  return $rp_url_terms;
}

function rp_resolve_name_as_archive($request) {
  $pathParts = explode('/', $request['name']);
  $craft = array_pop($pathParts);
  $archiveRequest = [
    'post_type' => $request['post_type'],
    'craft' => $craft
  ];

  return rp_resolve($archiveRequest);
}

function rp_inject_term_into_permalink($permalink, $term) {
  $slug = $term->slug;
  $path = parse_url($permalink, PHP_URL_PATH);
  $pathParts = explode('/',$path);
  array_splice($pathParts,2,0,$slug);
  $newPath = implode('/',$pathParts);
  return str_replace($path, $newPath, $permalink);
}

function rp_is_object_in_craft($post, $term) {
  return is_object_in_term($post->ID, CRAFT_TAX_NAME, $term->term_id);
}

function rp_get_permalink($post, $through = null) {

  if (!empty($through) && is_array($through)) {
    $through = $through[0];
  }
  $permalink = get_permalink($post);

  if ($post->post_type === PROJECT_TYPE && !empty($through)) {
    if (rp_is_object_in_craft($post, $through)) {
      return rp_inject_term_into_permalink($permalink, $through);
    }

    // IMPROVE: Find a common term with current object if possible
    // (eg. If projects are both lettering projects, but not in same sub-craft, prefix with 'lettering')
  }

  return $permalink;
}

// Ensures post don't get excluded from prev/next navigation because they share an unrelated craft
add_filter('get_previous_post_excluded_terms', function () { return [];});
add_filter('get_next_post_excluded_terms', function() {return [];});

add_filter('request', function ($request) {

  if (!($request['post_type'] === PROJECT_TYPE && !empty($request['name']))) {
    return $request;
  }

  $single = rp_resolve_name_as_single($request);
  if ($single) {
    return $single;
  }

  $archive = rp_resolve_name_as_archive($request);
  if ($archive) {
    return $archive;
  }

  return $request;
});

function project_craft_archive_url($craft) {
  return '/'.PROJECT_SLUG.'/'.$craft->slug;
}

// 5. Queries
function rp_query_projects_with_craft($craft, $number, $excludedProject = null)   {
  $query = [
    'post_type' => PROJECT_TYPE,
    'tax_query' => [
      [
        'taxonomy' => CRAFT_TAX_NAME,
        'field' => 'term_id',
        'terms' => $craft->term_id
      ]
    ],
    'posts_per_page' => $number
  ];

  if ($excludedProject) {
    $query['post__not_in'] = [$excludedProject->ID];
  }

  return new WP_Query($query);
}

function rp_get_projects_with_craft($craft, $number, $excludedProject) {

  $query = rp_query_projects_with_craft($craft, $number, $excludedProject);
  return $query->get_posts();
}

function rp_get_related_projects($project, $number) {
  // Get project crafts, ordered by depth (deepest first)
  $crafts = rp_get_crafts($project);

  // Query deepest
  $projects = rp_get_projects_with_craft($crafts[0], $number, $project);
  // If not enough, query first level  
  $foundProjects = count($projects);
  $numberOfCrafts = count($crafts);
  if ($numberOfCrafts > 1 && $foundProjects < $number) {
    $additionalProjects = rp_get_projects_with_craft($crafts[1], $number - $foundProjects, $project);
    $projects = array_merge($projects, $additionalProjects);
  }

  // Return result
  return $projects;
}