<?php

define('OLD_POST_TYPE', 'old_post');
define('OLD_POST_WARNING_ID', 'old_post_warning');

// 1. Register new post type
function old_posts_register_post_type() {

  $labels = [
    'name' => __('Old posts'),
    'singular_name' => __('Old post'),
    'add_new' => __('Add new', 'Old posts'),
    'add_new_item' => __('Add new Old post'),
    'edit_item' => __('Edit Old post'),
    'new_item' => __('New Old post'),
    'view_item' => __('View Old post'),
    'search_item' => __('Search Old posts'),
    'not_found' => __('No Old post found'),
    'not_found_in_trash' => __('No Old post found in trash'),
    'parent_item_colon' => ''
  ];

  register_post_type(OLD_POST_TYPE, [
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'keeping-old-stuff'],
    'hierarchical' => true,
    'supports' => ['title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes']
  ]);
}
add_action('init', 'old_posts_register_post_type');

add_action( 'widgets_init', function () {
  register_sidebar([
		'name' => 'Old post warning',
		'id' => OLD_POST_WARNING_ID,
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	]);
});
