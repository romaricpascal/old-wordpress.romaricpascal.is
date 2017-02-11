<?php get_header(); ?>
<section class="rp-LandingSection">
  <div class="rp-Hero l-Container">
    <h1 class="rp-HeroHeading rp-Underlined">
      Notes
    </h1>
  </div>
</section>
<section class="rp-LandingSection t-light-on-dark">
  <div class="l-Container">

    <?php while(have_posts()): the_post(); ?>
      <?php get_template_part('partials/post-link'); ?>
    <?php endwhile; ?>
  </div>
</section>

<?php get_footer();?>
