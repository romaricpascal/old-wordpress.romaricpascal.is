<?php
/*
Plugin Name: Craft taxonomy
Description: Adds craft taxonomy
Version: 1.0
Author: Romaric Pascal
Author URI: http://romaricpascal.is
*/

define('CRAFT_TAX_NAME', 'craft');
define('CRAFT_TERM_WEB', 'web');
define('CRAFT_TERM_LETTERING', 'lettering');

function create_craft_taxonomy() {
  //set the name of the taxonomy
  $taxonomy = CRAFT_TAX_NAME;
  //set the post types for the taxonomy
  $object_type = array('post', 'page');

  //populate our array of names for our taxonomy
  $labels = array(
      'name'               => 'Crafts',
      'singular_name'      => 'Craft',
      'search_items'       => 'Search Crafts',
      'all_items'          => 'All Crafts',
      'parent_item'        => 'Parent Craft',
      'parent_item_colon'  => 'Parent Craft:',
      'update_item'        => 'Update Craft',
      'edit_item'          => 'Edit Craft',
      'add_new_item'       => 'Add New Craft',
      'new_item_name'      => 'New Craft Name',
      'menu_name'          => 'Crafts',
  );

  //define arguments to be used
  $args = array(
      'labels'            => $labels,
      'hierarchical'      => true,
      'show_ui'           => true,
      'show_in_nav_menus'  => true,
      'public'            => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array('slug' => 'craft')
  );

  //call the register_taxonomy function
  register_taxonomy($taxonomy, $object_type, $args);
}

function create_craft_taxonomy_terms() {
  $terms = get_terms('craft', ['hide_empty' => false]);

  if (empty($terms)) {
    $terms = [
      ['name' => 'Web', 'slug' => CRAFT_TERM_WEB],
      ['name' => 'Lettering', 'slug' => CRAFT_TERM_LETTERING],
    ];

    foreach($terms as $term) {
      wp_insert_term($term['name'],'craft', ['slug' => $term['slug']]);
    }
  }
}

function add_craft_taxonomy(){

    create_craft_taxonomy();
    create_craft_taxonomy_terms();
}
add_action('init','add_craft_taxonomy');

function rp_get_craft_object($idOrSlug) {
  if (is_integer($idOrSlug)) {
    return get_term( $idOrSlug, CRAFT_TAX_NAME);
  } elseif (is_string($idOrSlug)) {
    return get_term_by('slug', $idOrSlug, CRAFT_TAX_NAME);
  }
}

function rp_get_craft_term_id($slug) {
  $craft = get_term_by('slug',$slug, CRAFT_TAX_NAME);
  return $craft->term_id;
}

function get_craft($post) {
  $crafts = wp_get_post_terms($post->ID, 'craft');
  if (empty($crafts)) {
    return null;
  }

  return $crafts[0];
}

function rp_get_crafts($post) {
  $crafts = wp_get_post_terms($post->ID,CRAFT_TAX_NAME);
  return array_reverse($crafts);
}
