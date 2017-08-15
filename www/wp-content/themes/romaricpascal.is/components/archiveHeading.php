<?php
	if (!empty($craft)) {
		$title = $craft->name;
	} elseif (!empty($postType)) {
		$title = $postType->label;
	} else {
		$title = '';
	}
?>
<h2><?php echo $title; ?></h2>