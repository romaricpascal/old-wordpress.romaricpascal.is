<?php

add_action('init', function () {
	ob_start();
});


add_action('shutdown', function () {
	$length = ob_get_length();
	var_dump($length);
	header("Content-Length: {$length}");
	ob_end_flush();
// Wordpress will clean all buffers automatically at shutdown
// So we need to run before that
}, 0);