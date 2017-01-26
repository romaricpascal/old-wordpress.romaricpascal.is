<?php
/*
Plugin Name: Testimonials
Description: Adds testimonials content type
Version: 1.0
Author: Romaric Pascal
Author URI: http://romaricpascal.is
*/

// 1. Register new post type
function testimonials_register_post_type() {

  $labels = [
    'name' => __('Testimonials'),
    'singular_name' => __('Testimonial'),
    'add_new' => __('Add new', 'Testimonials'),
    'add_new_item' => __('Add new Testimonial'),
    'edit_item' => __('Edit Testimonial'),
    'new_item' => __('New Testimonial'),
    'view_item' => __('View Testimonial'),
    'search_item' => __('Search Testimonials'),
    'not_found' => __('No Testimonial found'),
    'not_found_in_trash' => __('No Testimonial found in trash'),
    'parent_item_colon' => ''
  ];

  register_post_type('testimonial', [
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'has_archive' => false,
    'hierarchical' => true,
    'supports' => ['title', 'editor', 'custom-fields']
  ]);

  register_taxonomy_for_object_type('craft', 'testimonial');
}
add_action('init', 'testimonials_register_post_type');
