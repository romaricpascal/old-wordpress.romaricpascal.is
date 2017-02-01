<?php
  global $post;
  the_post();
  $craft = get_craft($post); ?>
<?php get_header(); ?>
<main class="rp-ProjectFull">
  <div class="l-Container">
    <div class="rp-ProjectFullThumbnail"><?php the_post_thumbnail(); ?></div>
    <header class="rp-ProjectFullHeader">
        <h1 class="rp-ProjectFullHeading rp-SectionTitle rp-Underlined"><?php the_title(); ?></h1>
    </header>
    <div class="rp-ProjectFullBody">
      <?php the_content(); ?>
    </div>
    <footer class="rp-ProjectFullFooter">
      <span class="rp-ProjectFullFooter__previous"><?php previous_post_link(); ?></span>
      <span class="rp-ProjectFullFooter__next"><?php next_post_link(); ?></span>
    </footer>
  </div>
</main>
<?php get_footer(); ?>
