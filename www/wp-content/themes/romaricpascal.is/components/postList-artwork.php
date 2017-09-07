<?php 
	$props['size'] = function ($index) {
		if ($index % 12 === 0 || $index % 12 - 7 === 0) {
			return '400';
		} else {
			return '200';
		}
	};
	$props['sizes'] = function ($index) {
		if ($index % 12 === 0 || $index % 12 - 7 === 0) {
			return '(min-width:20em) 400px ,200px';
		} else {
			return '200px';
		}
	};
	rp_render('postList', $props);
?>