<?php
  function rp_the_breadcrumb_nav() {

  	if (is_single()) {
  		$postType = get_post_type();
  		$labels = get_post_type_object($postType)->label;
  		$link = get_post_type_archive_link( $postType );
  		echo "<a class='rp-BreadcrumbLink' href='$link'>$labels</a>";
  	}
  }

