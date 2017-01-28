<?php
/*
Template Name: Landing page
*/

global $post;
the_post();

$craft = get_craft($post);

get_header(); ?>
<section class="rp-LandingSection">
  <div class="rp-Hero l-Container">
    <h1 class="rp-SectionTitle rp-Underlined rp-Underlined-hero">Hi! I'm Romaric.</h1>
    <div class="rp-SectionTitle">I draw letters.</div>
  </div>
</section>

<section class="rp-LandingSection t-light-on-dark">
  <div class="l-Container">
    <h2 class="rp-SectionTitle rp-Underlined">About</h2>
    <?php the_usps($craft) ?>
  </div>
</section>

<section class="rp-LandingSection">
  <div class="l-Container">
    <h2 class="rp-SectionTitle rp-Underlined">Past work</h2>
    <div><?php the_featured_projects($craft) ?></div>
    <div><?php a_testimonial($craft) ?></div>
  </div>
</section>

<section class="rp-LandingSection t-light-on-dark">
  <div class="l-Container">
    <h2 class="rp-SectionTitle rp-Underlined">Contact</h2>

    <a href="mailto:hello@romaricpascal.is">hello@romaricpascal.is</a>
  </div>
</section>
