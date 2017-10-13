<?php 
	$props['size'] = function ($index) {
		if ($index % 12 === 0 || $index % 12 - 7 === 0) {
			return '400';
		} else {
			return '400';
		}
	};
	$props['sizes'] = function ($index) {
		if ($index % 12 === 0 || $index % 12 - 7 === 0) {
			return '(screen and (-ms-high-contrast: active), (-ms-high-contrast: none)) 400px,  (min-width:20em) 400px, 200px';
		} else {
			return '(screen and (-ms-high-contrast: active), (-ms-high-contrast: none)) 400px, 200px';
		}
	};
	rp_render('postList', $props);
?>