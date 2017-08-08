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
require_once('content-types/old_posts.php');

define('MENU_MAIN_1', 'menu_main_1');
define('MENU_MAIN_2', 'menu_main_2');
define('WIDGETS_ANNOUNCEMENT', 'rp_announcements');
define('IMAGE_SIZES', [
  'artwork-grid-s' => [
    'width' => 167,
    'height' => 167,
    'crop' =>  true
  ],
  'artwork-grid-m' => [
    'width' => 280,
    'height' => 280,
    'crop' =>  true
  ],
  'artwork-grid-l' => [
    'width' => 384,
    'height' => 384,
    'crop' =>  true
  ],
  'artwork-grid-xl' => [
    'width' => 840,
    'height' => 840,
    'crop' =>  true
  ],
  'artwork-grid-l-3x' => [
    'width' => 1152,
    'height' => 1152,
    'crop' =>  true
  ],
  'artwork-full' => [
    'width' => 560,
    'height' => 0,
    'crop' =>  false
  ],
  'artwork-full-2x' => [
    'width' => 1120,
    'height' => 0,
    'crop' =>  false
  ],
  'artwork-full-3x' => [
    'width' => 1680,
    'height' => 0,
    'crop' =>  false
  ]
]);
// 2. Setup theme
function rp_setup() {
  register_nav_menu(MENU_MAIN_1, __('Main menu (Part 1)'));
  register_nav_menu(MENU_MAIN_2, __('Main menu (Part 2)'));
  add_theme_support('post-thumbnails');
  
  foreach(IMAGE_SIZES as $image_size_name => $image_size) {
    add_image_size($image_size_name, $image_size['width'], $image_size['height'], $image_size['crop']);
  }
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

// Fix pagination in titles and limits risks of duplicate content
add_filter('wp_title', function($title) {
  if (is_paged()) {
    $page = get_query_var('paged');
    return $title." (Page $page)"; 
  }

  if (is_single() && empty($title)) {
    // <<--- RESTART HERE: Generate something like "POST TYPE from DATE"
    global $post;
    $type = get_post_type_object($post->post_type);
    return $type->labels->singular_name.' - '.date('d M Y, H:i', strtotime($post->post_date));
  }
  return $title;
}, 10, 2);

// Fix highlighting of current menu items for custom post archives
add_filter('nav_menu_css_class', function($classes, $item) {
  $post_type = get_query_var('post_type');

  if ($item->type === 'post_type_archive' && $item->object == $post_type) {
    array_push($classes, 'current-menu-item-parent');
  }
  return $classes;
}, 10, 2);

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


// 6. Register widget areas

add_action( 'widgets_init', function () {

  register_sidebar([
		'name'          => 'Announcements',
		'id'            => WIDGETS_ANNOUNCEMENT,
		'before_widget' => '<div class="rp-Announcement l-Container">',
		'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rp-AnnouncementTitle">',
    'after_title'   => '</h2>',
    'before_content' => '<div class="rp-AnnouncementContent">',
    'after_content' => '</div>'
	]);
});


function rp_the_menu($menuId) {
  global $menu_items;

  $locations = get_nav_menu_locations();
  $menu = wp_get_nav_menu_object($locations[$menuId]);
   $menu_items = wp_get_nav_menu_items($menu->term_id);

  get_template_part('menu', $menuId);
}

function rp_append_srcset_entry($srcset, $attachment_id, $size, $with_comma = true) {
    $src = wp_get_attachment_image_src($attachment_id, $size);
    if ($src) {
      $entry = "$src[0] $src[1]w".($with_comma ? ',' : '');
      return $srcset.$entry."\n";
    }
}

function rp_get_attachment_srcset($sizes, $attachment_id) {
  $srcset = "";
  foreach($sizes as $size) {
    $srcset = rp_append_srcset_entry($srcset, $attachment_id, $size);
  }
  return rp_append_srcset_entry($srcset, $attachment_id, 'full', false);
}

function rp_get_the_thumbnail_srcset($sizes) {
  global $post;
  $post_thumbnail_id = get_post_thumbnail_id($post);
  if ( ! $post_thumbnail_id ) {
    return false;
  }

  return rp_get_attachment_srcset($sizes, $post_thumbnail_id);
}

function rp_the_thumbnail_srcset($sizes) {
  $srcset = rp_get_the_thumbnail_srcset($sizes);
  if ($srcset) {
    echo $srcset;
  }
}


require_once('functions/share-buttons.php');
require_once('functions/breadcrumb-nav.php');