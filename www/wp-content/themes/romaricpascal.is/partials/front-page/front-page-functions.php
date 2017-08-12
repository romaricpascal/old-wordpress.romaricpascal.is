<?php
  function rp_home_project_with_craft_section($craft) {
    $craft = rp_get_craft_object($craft);
    $query = rp_query_projects_with_craft($craft, 3);
    if ($query->have_posts()) {
      include locate_template('partials/front-page/front-page-project-section.php');
    }
  }