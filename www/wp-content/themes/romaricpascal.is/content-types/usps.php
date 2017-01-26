<?php
/*
Plugin Name: USPs
Description: Adds USP content type
Version: 1.0
Author: Romaric Pascal
Author URI: http://romaricpascal.is
*/

// 1. Register new post type
add_action('init', 'usps_register_post_type');
function usps_register_post_type() {

  $labels = [
    'name' => __('USPs'),
    'singular_name' => __('USP'),
    'add_new' => __('Add new', 'usps'),
    'add_new_item' => __('Add new USP'),
    'edit_item' => __('Edit USP'),
    'new_item' => __('New USP'),
    'view_item' => __('View USP'),
    'search_item' => __('Search USPs'),
    'not_found' => __('No USP found'),
    'not_found_in_trash' => __('No USP found in trash'),
    'parent_item_colon' => ''
  ];

  register_post_type('usp', [
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'has_archive' => false,
    'hierarchical' => true,
    'supports' => ['title','editor','thumbnail', 'page-attributes']
  ]);

  register_taxonomy_for_object_type('craft', 'usp');
}
