<?php global $post; ?>
<div class="rp-USP" data-waypoint data-waypoint-handler="animateUSPEnter">
  <div class="rp-USPThumbnail">
    <img src="<?php the_post_thumbnail_url(); ?>" height="800" width="800" />
  </div>
  <div class="rp-USPContent">
    <h3 class="rp-USPTitle"><?php the_title();?></h3>
    <?php the_content();?>
  </div>
</div>
