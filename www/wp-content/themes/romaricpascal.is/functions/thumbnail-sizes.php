<?php
$sizes = [200, 400, 800, 1200, 1600];
$configs = [];
foreach ($sizes as $size) {
  $configs["{$size}"] = [
    'width' => $size,
    'height' => $size,
    'crop' => true
  ];
  $configs["{$size}w"] = [
    'width' => $size,
    height => 0,
    'crop' => false
  ];
}
define('IMAGE_SIZES', $configs);

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

function rp_get_the_thumbnail_srcset($post, $sizes) {
  if (empty($post)) {
    $post = rp_get_the_post();
  }
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