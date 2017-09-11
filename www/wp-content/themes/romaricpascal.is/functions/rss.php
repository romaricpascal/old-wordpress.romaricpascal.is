<?php
// Limit general feed to posts and artworks
add_filter('request', function ($qv) {
  if (isset($qv['feed']) && !isset($qv['post_type'])) {
    $qv['post_type'] = ['post', ARTWORK_TYPE];
  }
  return $qv;
});

// Prepend the thumbnail to artworks content so they appear in the feed
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