<?php

function query_latest_posts($number) {
  return query_posts([
    'post_type' => 'post',
    'posts_per_page' => $number,
    'paged' =>  1]);
}

function rp_is_posts_archive_page($pageId) {
	$postsArchiveId = get_option('page_for_posts');
	return $pageId == $postsArchiveId;
}
