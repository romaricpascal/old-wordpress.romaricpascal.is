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
    if (!is_admin() && is_main_query() && is_post_type_archive(PROJECT_TYPE)) {
      $query->query_vars['posts_per_page'] = rp_get_archive_size(PROJECT_TYPE);
    }
    return $query;
  });
}

// 4. Routing
// Try to resolve /proud-of/(.*) as a craft if resolving it as a project didn't work
add_filter('request', function ($request) {
  $query = new WP_Query();
  $query->parse_query($request);
  if (!($query->is_single() && $query->get('post_type') === PROJECT_TYPE)) {
    return $request;
  }
  // Doubles the query :( For lack of a better solution for now :/
  $posts = $query->get_posts($request);
  if (!empty($posts)) {
    return $request;
  }
  
  return [
    'post_type' => $request['post_type'],
    'craft' => $request['name']
  ];
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