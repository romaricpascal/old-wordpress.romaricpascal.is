<?php
/*
Plugin Name: Testimonials
Description: Adds testimonials content type
Version: 1.0
Author: Romaric Pascal
Author URI: http://romaricpascal.is
*/

define('TESTIMONIAL_TYPE', 'testimonial');

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

  register_post_type(TESTIMONIAL_TYPE, [
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'has_archive' => false,
    'hierarchical' => true,
    'supports' => ['title', 'editor', 'custom-fields']
  ]);

  register_taxonomy_for_object_type(CRAFT_TAX_NAME, TESTIMONIAL_TYPE);
}
add_action('init', 'testimonials_register_post_type');

function get_testimonial_for_craft($craft) {
  return query_posts([
    'post_type' => TESTIMONIAL_TYPE,
    'orderby' => 'rand',
    'order' => 'ASC',
    'tax_query' => [[
      'taxonomy' => CRAFT_TAX_NAME,
      'field' => 'slug',
      'terms' => $craft->slug
    ]]
  ]);
}

function a_testimonial($craft) {
  $testimonial = get_testimonial_for_craft($craft);

  if (have_posts()) {
    the_post();
    global $post;
    $post->meta = get_post_meta(get_the_ID());
    get_template_part('testimonial', 'block');
  }
}

function the_testimonial_author() {
  global $post;
  if (!empty($post->meta['author'])) {
    echo $post->meta['author'][0];
  }
}

function the_testimonial_link($prefix = '') {
  global $post;
  if (!empty($post->meta['company'])) {
    $company = $post->meta['company'][0];
    if (!empty($post->meta['companyUrl'])) {
      $url = $post->meta['companyUrl'][0];
      echo $prefix.'<a href="'.$url.'">'.$company.'</a>';
    } else {
      echo $prefix.$company;
    }
  }
}
