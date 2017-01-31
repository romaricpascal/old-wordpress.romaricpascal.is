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
    <h1 class="rp-HeroHeading rp-Underlined rp-Underlined-hero">Hi! I'm Romaric.</h1>
    <div class="rp-HeroSubHead">I draw letters.</div>
  </div>
</section>

<section class="rp-LandingSection t-light-on-dark">
  <div class="l-Container">
    <h2 class="rp-SectionTitle rp-Underlined">About</h2>
    <div class="rp-USPList">
      <?php the_usps($craft) ?>
    </div>
  </div>
</section>

<section class="rp-LandingSection">
  <div class="l-Container">
    <h2 class="rp-SectionTitle rp-Underlined">Past work</h2>
    <div class="rp-FeaturedProjects"><?php the_featured_projects($craft) ?></div>
    <div><?php a_testimonial($craft) ?></div>
  </div>
</section>

<section class="rp-LandingSection t-light-on-dark">
  <div class="l-Container">
    <h2 class="rp-SectionTitle rp-Underlined">Contact</h2>
    <p class="rp-ContactPrompt">
      You have a project you want to collaborate on?<br/>
      Or perhaps a question about my workflow?<br/>
      Maybe you just want to say hi?
    </p>
    <a class="rp-ContactLink" href="mailto:<?php bloginfo('admin_email')?>"><?php bloginfo('admin_email')?></a>
  </div>
</section>

<?php get_footer(); ?>
