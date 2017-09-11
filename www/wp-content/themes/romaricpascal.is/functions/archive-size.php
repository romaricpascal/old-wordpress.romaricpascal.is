<?php
	define('DEFAULT_ARCHIVE_SIZE', 10);
	define('ARCHIVE_SIZES', [
		'project' => 3,
		'testimonial' => 3, 
		'artwork' => 12
	]);

	function rp_get_archive_size($postType) {
		return empty(ARCHIVE_SIZES[$postType]) ? DEFAULT_ARCHIVE_SIZE : ARCHIVE_SIZES[$postType];
	}