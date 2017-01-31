<?php
  global $post;
  the_post();
  $craft = get_craft($post); ?>
<?php get_header(); ?>
<main class="rp-ProjectFull rp-LandingSection">
  <div class="l-Container">
    <header>
      <div class="rp-ProjectFullThumbnail"><?php the_post_thumbnail(); ?></div>
      <h1 class="rp-ProjectFullHeading rp-SectionTitle rp-Underlined"><?php the_title(); ?></h1>
    </header>
    <?php the_content(); ?>
    <footer class="rp-ProjectFullFooter">
      <span class="rp-ProjectFullFooter__previous"><?php previous_post_link(); ?></span>
      <span class="rp-ProjectFullFooter__next"><?php next_post_link(); ?></span>
    </footer>
  </div>
</main>
<?php get_footer(); ?>
