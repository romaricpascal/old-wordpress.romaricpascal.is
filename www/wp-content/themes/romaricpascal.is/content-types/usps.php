<?php
/*
Plugin Name: USPs
Description: Adds USP content type
Version: 1.0
Author: Romaric Pascal
Author URI: http://romaricpascal.is
*/

define('USP_TYPE', 'usp');

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

  register_post_type(USP_TYPE, [
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'has_archive' => false,
    'hierarchical' => true,
    'supports' => ['title','editor','thumbnail', 'page-attributes']
  ]);

  register_taxonomy_for_object_type(CRAFT_TAX_NAME, USP_TYPE);
}

function get_usps_for_craft($craft) {
  return query_posts([
    'post_type' => USP_TYPE,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'tax_query' => [[
      'taxonomy' => CRAFT_TAX_NAME,
      'field' => 'slug',
      'terms' => $craft->slug
    ]]
  ]);
  return $usps;
}

function the_usps($craft) {
  $usps = get_usps_for_craft($craft);
  while(have_posts()) {
    the_post();
    get_template_part('usp','block');
  }
}
