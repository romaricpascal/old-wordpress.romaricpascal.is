<?php
	if (!empty($craft)) {
		$title = $craft->name;
	} elseif (!empty($postType) && is_object($postType)) {
		$title = $postType->label;
	} else {
		$title = get_the_archive_title();
	}
?>
<h2><?php echo $title; ?></h2>