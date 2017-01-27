<?php

define('PROJECT_TYPE', 'project');

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
    'has_archive' => false,
    'hierarchical' => true,
    'supports' => ['title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes']
  ]);

  register_taxonomy_for_object_type(CRAFT_TAX_NAME, PROJECT_TYPE);
}
add_action('init', 'projects_register_post_type');

function query_featured_projects($craft) {
  return query_posts([
    'post_type' => PROJECT_TYPE,
    'orderby' => 'menu_order',
    'order' => 'DESC',
    'posts_per_page' => 3,
    'tax_query' => [[
      'taxonomy' => CRAFT_TAX_NAME,
      'field' => 'slug',
      'terms' => $craft->slug
    ]]
  ]);
  return $usps;
}

function the_featured_projects($craft) {
  $usps = query_featured_projects($craft);
  while(have_posts()) {
    the_post();
    get_template_part('project','block');
  }
}
