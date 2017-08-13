<?php
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

add_action('after_setup_theme', function () {
  foreach(IMAGE_SIZES as $image_size_name => $image_size) {
    add_image_size($image_size_name, $image_size['width'], $image_size['height'], $image_size['crop']);
  }
});

function get_thumbnail_url($post, $size = 'full') {
  $thumbnailId = get_post_thumbnail_id($post->ID);
  return wp_get_attachment_image_src($thumbnailId, $size);
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