<?php global $post; ?>
<div class="rp-USP" data-waypoint data-waypoint-handler="animateUSPEnter">
  <div class="rp-USPThumbnail">
    <?php the_post_thumbnail() ?>
  </div>
  <div class="rp-USPContent">
    <h3 class="rp-USPTitle"><?php the_title();?></h3>
    <?php the_content();?>
  </div>
</div>
