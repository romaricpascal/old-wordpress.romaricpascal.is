<?php

// 0. Clean up unnecessary Wordpress code in headers;
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links');
remove_action('wp_head', 'feed_links_extra');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head');


// 1. Load necessary taxonomies & content types
require_once('taxonomies/craft-taxonomy.php');
require_once('content-types/posts.php');
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

  if (!is_admin() && is_main_query() && is_post_type_archive('artwork')) {

    $query->set('posts_per_page', 20);
  }
}
add_action('pre_get_posts', 'rp_pre_get_posts');

// 4. Drop the 'Category:' prefix in archive title
add_filter( 'get_the_archive_title', function ( $title ) {

    return preg_replace('/^\w+: /', '', $title);
});

// 5. Set up RSS feed templates
add_filter('request', function ($qv) {
  if (isset($qv['feed']) && !isset($qv['post_type'])) {
    $qv['post_type'] = ['post', ARTWORK_TYPE];
  }
  return $qv;
});

add_filter('the_content', function ($content) {
  if (is_feed() && is_artwork()) {
    $content =  get_the_post_thumbnail() . $content;
  }

  return $content;
});

// Use custom theme for the RSS feed
remove_all_actions( 'do_feed_rss2' );
add_action( 'do_feed_rss2', function($for_comments) {
  get_template_part('feed','rss2');
}, 10, 1 );

// Helper functions
function template_file_uri($path){
  echo get_template_directory_uri().'/'.$path;
}

function the_social_card_image() {
  if (has_post_thumbnail()) {
    echo the_post_thumbnail_url();
  } else {
    echo get_theme_file_uri('assets/images/r-p-monogram-social-media.png');
  }
}

function rp_the_menu($menuId) {
  global $menu_items;

  $locations = get_nav_menu_locations();
  $menu = wp_get_nav_menu_object($locations[$menuId]);
   $menu_items = wp_get_nav_menu_items($menu->term_id);

  get_template_part('menu', $menuId);
}
