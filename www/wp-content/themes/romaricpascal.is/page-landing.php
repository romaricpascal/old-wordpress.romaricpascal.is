<?php
/*
Template Name: Landing page
*/

global $post;
the_post();

$craft = get_craft($post);

get_header(); ?>
<section>
  <?php the_content(); ?>
</section>
<section>
  <h2>About</h2>
  <?php the_usps($craft) ?>
</section>

<section>
  <h2>Past work</h2>
  <div><?php the_featured_projects($craft) ?></div>
  <div><?php a_testimonial($craft) ?></div>
</section>

<section>
  <h2>Contact</h2>

  <a href="mailto:hello@romaricpascal.is">hello@romaricpascal.is</a>
</section>
