<?php

// 0. Clean up unnecessary Wordpress code in headers;
require_once 'functions/cleanup.php';


// 1. Load necessary taxonomies & content types
require_once('taxonomies/craft-taxonomy.php');
require_once('content-types/posts.php');
require_once('content-types/testimonials.php');
require_once('content-types/projects.php');
require_once('content-types/artworks.php');

define('MENU_MAIN_1', 'menu_main_1');
define('MENU_HOME_CONTENT', 'menu_home');
define('MENU_NOT_FOUND', 'menu_not_found');
define('WIDGETS_ANNOUNCEMENT', 'rp_announcements');

// 2. Setup theme
function rp_setup() {
  register_nav_menu(MENU_MAIN_1, __('Main menu (Part 1)'));
  register_nav_menu(MENU_HOME_CONTENT, __('Home content'));
  register_nav_menu(MENU_NOT_FOUND, __('404 menu'));

  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'rp_setup');

// 4. Drop the 'Category:' prefix in archive title
add_filter( 'get_the_archive_title', function ( $title ) {

    return preg_replace('/^\w+: /', '', $title);
});

// 5. URL routing
add_action('init', function() {
  add_rewrite_rule('^also-making-websites/?$', 'index.php?craft=web', 'top');
});



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

function array_pluck($subject, $key) {
  return array_map(function ($item) use ($key) {
    return $item->{$key};
  }, $subject);
}

function rp_get($objectOrArray, $key) {

  if (!$objectOrArray) return;

  if (is_object($objectOrArray)) {
    return $objectOrArray->{$key};
  } elseif (is_array($objectOrArray)) {
    return $objectOrArray[$key];
  }
}

function rp_has_pages() {
  global $wp_query;
  return $wp_query->max_num_pages > 1;
}

function rp_has_more_pages() {
  global $wp_query;
  return $wp_query->max_num_pages > get_query_var('paged');
}

function rp_get_the_post() {
  global $post;
  return $post;
}

function rp_get_content($post) {
  return apply_filters('the_content', $post->post_content );
}

function rp_has_more_posts($query) {
  if(!empty($query)) {
    return $query->have_posts();
  }

  return have_posts();
}

function rp_next_post($query) {
  if(!empty($query)) {
    $query->the_post();
  } else {
    the_post();
  }
  return rp_get_the_post();
}

function rp_get_postListFormat($postType) {
  switch ($postType) {
    case TESTIMONIAL_TYPE:
      return 'full';
    case ARTWORK_TYPE:
    case PROJECT_TYPE:
      return 'thumbnail';
    default:
      return 'link';
  }
}

function rp_is_ajax() {
  $headers = getallheaders();
  return !empty($headers['x-requested-with']);
}

function rp_title() {
  $title = wp_title(' ', false);
  if ($title) { $title.= '|'; }
  $title.= get_bloginfo('name');
  return $title;
}

define('ACCESS_KEYS',[1,2,3,4,5,6,7,8,9,0,'-','=']);
function rp_has_accessKey($index) {
  return count(ACCESS_KEYS) > $index;
}

function rp_get_accessKey($index) {
  if (rp_has_accessKey($index)) {
    return ACCESS_KEYS[$index];
  } else {
    return null;
  }
}


// require_once('functions/content-length.php');
require_once('functions/archive-size.php');
require_once('functions/components.php');
require_once('functions/acf-featured.php');
require_once('functions/thumbnail-sizes.php');
require_once('functions/share-buttons.php');
require_once('functions/breadcrumb-nav.php');