<?php global $post; ?>
<figure>
  <div><?php the_content(); ?></div>
  <figcaption><?php the_testimonial_author() ?><?php the_testimonial_link(', ') ?></figcaption>
</figure>
