<?php
/*
Plugin Name: Testimonials
Description: Adds testimonials content type
Version: 1.0
Author: Romaric Pascal
Author URI: http://romaricpascal.is
*/

define('TESTIMONIAL_TYPE', 'testimonial');
define('TESTIMONIAL_PROJECT_FIELD', 'project');
define('TESTIMONIAL_AUTHOR_FIELD', 'author');
define('TESTIMONIAL_COMPANY_FIELD', 'company');
define('TESTIMONIAL_COMPANY_URL_FIELD', 'companyUrl');

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

add_action('init', function () {
  require_once('testimonials-acf.php');
});

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

function the_testimonial_author($testimonial) {
  $author = get_field(TESTIMONIAL_AUTHOR_FIELD, $testimonial->ID);
  if (!empty($author)) {
    echo $author;
  }
}

function the_testimonial_link($testimonial, $prefix = '') {
  $company = get_field(TESTIMONIAL_COMPANY_FIELD, $testimonial->ID);
  $companyUrl = get_field(TESTIMONIAL_COMPANY_URL_FIELD, $testimonial->ID);
  if (!empty($company)) {
    if (!empty($companyUrl)) {
      echo $prefix.'<a href="'.$companyUrl.'">'.$company.'</a>';
    } else {
      echo $prefix.$company;
    }
  }
}

// Queries
function rp_get_testimonial_for_project($project) {

  $posts = get_posts([
    'post_type' => TESTIMONIAL_TYPE,
    'meta_query' => [[
      'key' => TESTIMONIAL_PROJECT_FIELD,
      'value' => '"'.$project->ID.'"',
      'compare' => 'LIKE'
    ]]
  ]);
  return empty($posts) ? null : $posts[0];
}

