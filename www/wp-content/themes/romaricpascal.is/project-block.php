<?php global $post; ?>
<a href="<?php the_permalink(); ?>">
  <h3><?php the_title(); ?></h3>
  <?php the_post_thumbnail([800,800]); ?>
</a>
