<?php

define('ARTWORK_TYPE', 'artwork');
define('ARTWORK_SHOP_URL_FIELD', 'shop_url');
define('ARTWORK_RELATED_PROJECT_FIELD', 'related_project');

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

// 2. Add ACF options to facilitate edition of custom fields
add_action('init', function () {
    if(function_exists("register_field_group")) {
    register_field_group(array (
      'id' => 'acf_artworks-field',
      'title' => 'Artworks field',
      'fields' => array (
        array (
          'key' => 'field_598872b440424',
          'label' => 'Shop URL',
          'name' => ARTWORK_SHOP_URL_FIELD,
          'type' => 'text',
          'instructions' => 'URL of the design in the shop, if it exists',
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'formatting' => 'none',
          'maxlength' => '',
        ),
        array (
          'key' => 'field_5988730b40425',
          'label' => 'Related project',
          'name' => ARTWORK_RELATED_PROJECT_FIELD,
          'type' => 'relationship',
          'return_format' => 'object',
          'post_type' => array (
            0 => 'project',
          ),
          'taxonomy' => array (
            0 => 'craft:3',
          ),
          'filters' => array (
            0 => 'search',
          ),
          'result_elements' => array (
            0 => 'post_title',
          ),
          'max' => '',
        ),
      ),
      'location' => array (
        array (
          array (
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'artwork',
            'order_no' => 0,
            'group_no' => 0,
          ),
        ),
      ),
      'options' => array (
        'position' => 'normal',
        'layout' => 'no_box',
        'hide_on_screen' => array (
        ),
      ),
      'menu_order' => 0,
    ));
  }
});

// 3. Control how many artworks will be displayed on the archive
if (!is_admin()) {
  add_filter('pre_get_posts', function ($query) {
    if (!is_admin() && is_main_query() && is_post_type_archive('artwork')) {
      $query->query_vars['posts_per_page'] = 12;
    }
    return $query;
  });
}

function is_artwork() {
  global $post;
  return $post->post_type === ARTWORK_TYPE;
}

function query_related_artworks($artwork, $number) {
  return new WP_Query([
    'post_not_in' => [$artwork->ID],
    'post_type' => ARTWORK_TYPE,
    'posts_per_page' => $number,
    'orderby' => 'rand',
    'paged' =>  1]);
}