<?php
  function rp_home_project_with_craft_section($craftId) {
    $craft = rp_get_craft_object($craftId);
    $query = rp_query_projects_with_craft($craft,rp_get_archive_size(PROJECT_TYPE));
    if ($query->have_posts()) {
      include locate_template('partials/front-page/front-page-project-section.php');
    }
  }

  function rp_home_featured_archive_section($postTypeName) {
  	$postType = get_post_type_object( $postTypeName );
  	$query = rp_query_featured_posts($postTypeName, rp_get_archive_size($postTypeName));
  	if ($query->have_posts()) {
  		include locate_template('partials/front-page/front-page-featured-archive.php');
  	}
  }