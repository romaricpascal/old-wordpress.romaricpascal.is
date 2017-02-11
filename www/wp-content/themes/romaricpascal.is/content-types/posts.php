<?php

function query_latest_posts($number) {
  return query_posts([
    'post_type' => 'post',
    'posts_per_page' => $number,
    'paged' =>  1]);
}
