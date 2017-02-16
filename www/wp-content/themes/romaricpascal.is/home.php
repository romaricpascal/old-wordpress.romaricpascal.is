<?php get_header(); ?>
<section class="rp-LandingSection">
  <div class="rp-Hero l-Container">
    <h1 class="rp-HeroHeading rp-Underlined rp-Underlined-hero">
      Notes
    </h1>
  </div>
</section>
<section class="rp-LandingSection t-light-on-dark">
  <div class="l-Container">
    <div>
    <?php while(have_posts()): the_post(); ?>
      <?php get_template_part('partials/post-link'); ?>
    <?php endwhile; ?>
    </div>
    <footer class="rp-ProjectFullFooter rp-PreviousNextLinks">
      <span class="rp-PreviousNextLinks__previous"><?php previous_posts_link('More recent notes'); ?></span>
      <span class="rp-PreviousNextLinks__next"><?php next_posts_link('Older notes'); ?></span>
    </footer>
  </div>
</section>

<?php get_footer();?>
