<?php global $post; ?>
<a class="rp-ProjectCard rp-FeaturedProjects__card" href="<?php the_permalink(); ?>">
  <h3 class="rp-ProjectCardHeading"><?php the_title(); ?></h3>
  <div class="rp-ProjectCardThumbnail"><?php the_post_thumbnail([800,800]); ?></div>
</a>
