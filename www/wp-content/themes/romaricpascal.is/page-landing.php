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
    <h1 class="rp-HeroHeading rp-Underlined rp-Underlined-hero">
      <?php echo get_post_meta($post->ID, 'page-greeting', true); ?>
    </h1>
    <div class="rp-HeroHeading">
      <?php echo get_post_meta($post->ID, 'page-message', true); ?>
    </div>
  </div>
</section>

<section class="rp-LandingSection t-light-on-dark">
  <div class="l-Container">
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

<?php get_footer(); ?>
