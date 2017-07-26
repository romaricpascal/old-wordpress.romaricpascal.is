<?php

define('ARTWORK_TYPE', 'artwork');

// 1. Register new post type
function artworks_register_post_type() {

  $labels = [
    'name' => __('Artworks'),
    'singular_name' => __('Artwork'),
    'add_new' => __('Add new', 'Artworks'),
    'add_new_item' => __('Add new Artwork'),
    'edit_item' => __('Edit Artwork'),
    'new_item' => __('New Artwork'),
    'view_item' => __('View Artwork'),
    'search_item' => __('Search Artworks'),
    'not_found' => __('No Artwork found'),
    'not_found_in_trash' => __('No Artwork found in trash'),
    'parent_item_colon' => ''
  ];

  register_post_type(ARTWORK_TYPE, [
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'drawing-letters'],
    'hierarchical' => true,
    'supports' => ['title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes']
  ]);
}
add_action('init', 'artworks_register_post_type');

function is_artwork() {
  global $post;
  return $post->post_type === ARTWORK_TYPE;
}

function query_latest_artworks($number) {

  return query_posts([
    'post_type' => ARTWORK_TYPE,
    'posts_per_page' => $number,
    'paged' =>  1]);
}

function query_featured_artworks($number) {
  return query_posts([
    'post_type' => ARTWORK_TYPE,
    'meta_key' => 'featured_artwork',
    'meta_value' => 'true',
    'posts_per_page' => $number,
    'paged' =>  1]);
}
