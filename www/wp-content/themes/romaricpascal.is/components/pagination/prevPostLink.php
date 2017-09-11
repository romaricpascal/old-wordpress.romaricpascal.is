<?php
	$terms = rp_get_url_terms();
	$previous_post = rp_get_previous_post($post, $terms);
	rp_render('pagination/prevNextLink', [
		'classes' => $classes,
		'rel' => 'prev',
		'href' => rp_get_permalink($previous_post, $terms),
		'title' => rp_get($previous_post, 'post_title'),
		'empty' => 'No previous post'
	]);