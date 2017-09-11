<?php
  function rp_get_breadcrumbs() {
    $postType = get_post_type();
    $labels = get_post_type_object($postType)->label;
    $link = get_post_type_archive_link($postType);
    $result = [[
      'href' => $link,
      'title' => $labels
    ]];

    if ($postType === PROJECT_TYPE) {

        $terms = rp_get_url_terms();
        foreach ($terms as $term) {
          $link .= "{$term->slug}/";
          array_push($result, [
            'href' => $link,
            'title' => $term->name
          ]);          
        }
    }

  return $result;
}

