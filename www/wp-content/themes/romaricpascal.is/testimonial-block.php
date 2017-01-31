<?php global $post; ?>
<figure class="rp-Testimonial">
  <div class="rp-TestimonialContent"><?php the_content(); ?></div>
  <figcaption class="rp-TestimonialSource"><?php the_testimonial_author() ?><?php the_testimonial_link(', ') ?></figcaption>
</figure>
