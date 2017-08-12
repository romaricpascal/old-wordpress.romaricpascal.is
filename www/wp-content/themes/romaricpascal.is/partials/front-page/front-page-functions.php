<?php
  function rp_home_project_with_craft_section($craftId) {
    $craft = rp_get_craft_object($craftId);
    $query = rp_query_projects_with_craft($craft, 3);
    if ($query->have_posts()) {
      include locate_template('partials/front-page/front-page-project-section.php');
    }
  }