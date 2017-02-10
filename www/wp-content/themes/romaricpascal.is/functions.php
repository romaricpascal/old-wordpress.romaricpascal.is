<?php

// 1. Load necessary taxonomies & content types
require_once('taxonomies/craft-taxonomy.php');
require_once('content-types/usps.php');
require_once('content-types/testimonials.php');
require_once('content-types/projects.php');
require_once('content-types/artworks.php');

define('MENU_PRIMARY', 'primary');

// 2. Setup theme
function rp_setup() {
  register_nav_menu(MENU_PRIMARY, __('Primary Menu'));
  add_theme_support('post-thumbnails');
  // add_theme_support('post-formats', ['image', 'gallery', 'video']);
}
add_action('after_setup_theme', 'rp_setup');

// 3. Support for /sharing/XYZ archive pages
function rp_pre_get_posts($query) {

  if (is_post_type_archive('artwork')) {
    $query->set('posts_per_page', 20);
  }

  if (is_home()) {

  }
}
add_action('pre_get_posts', 'rp_pre_get_posts');

// Helper functions
function template_file_uri($path){
  echo get_template_directory_uri().'/'.$path;
}

function rp_the_menu($menuId) {
  global $menu_items;

  $locations = get_nav_menu_locations();
  $menu = wp_get_nav_menu_object($locations[$menuId]);
   $menu_items = wp_get_nav_menu_items($menu->term_id);

  get_template_part('menu', $menuId);
}
