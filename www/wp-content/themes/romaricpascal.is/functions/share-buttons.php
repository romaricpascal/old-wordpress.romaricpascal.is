<?php
define('SOCIAL_SHARE_PATTERNS', [
	"Facebook" => "https://www.facebook.com/sharer.php?u={url}",
	"Twitter" => "https://twitter.com/intent/tweet?url={url}",
	"Pinterest" => "https://pinterest.com/pin/create/bookmarklet/?media={img}&url={url}&is_video=false&description={title}"
]);

function preparePostInfo($post) {
	return  [
	  'title' => get_the_title($post),
	  'url' => get_permalink($post),
	  'img' => wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full')[0]
	];
}

function replacePlaceholder($placeholder, $value, $pattern) {
	return str_replace('{'.$placeholder.'}',urlencode($value), $pattern);
}

function generateShareURL($pattern, $postInfo) {
	$url = $pattern;
	foreach ($postInfo as $placeholder => $value) {
		$url = replacePlaceholder($placeholder, $value, $url);
	}
	return $url;
}

function the_share_buttons() {
	global $post;
	$postInfo = preparePostInfo($post);

	$links = [];
	foreach(SOCIAL_SHARE_PATTERNS as $site => $pattern) {
		$links[$site] = generateShareURL($pattern, $postInfo);
	}

	require(locate_template('partials/share-buttons.php'));
}