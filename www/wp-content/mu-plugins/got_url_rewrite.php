<?php
/*
Plugin Name: got_url_rewrite
Description: Forces got_url_rewrite to return true, so things work OK on PHP dev server
Version: 1.0
Author: Romaric Pascal
Author URI: http://romaricpascal.is
*/

function enfonce_got_url_rewrite() {
  return true;
}

add_filter('got_url_rewrite', 'enfonce_got_url_rewrite');
