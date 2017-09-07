<?php 
	$props['size'] = function ($index) {
		if ($index % 3 === 0) {
			return '800';
		} else {
			return '400';
		}
	};
	$props['sizes'] = function ($index) {
		if ($index % 3 === 0) {
			return '(min-width:27em) 800px ,400px';
		} else {
			return '(min-width:27em) 400px ,200px';
		}
	};
	rp_render('postList', $props);
?>