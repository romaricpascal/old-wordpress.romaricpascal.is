<?php the_post(); ?>
<?php get_header(); ?>

<section class="rp-LandingSection">
  <div class="rp-Hero l-Container">
    <h1 class="rp-HeroHeading rp-Underlined rp-Underlined-hero">
      <?php the_title(); ?>
    </h1>
    <div>
      <time datetime="<?php the_time('c'); ?>"><?php the_time('d M Y'); ?></time> —
      <span>About: </span>
    </div>
  </div>
</section>

<section class="rp-LandingSection t-light-on-dark">
  <div class="l-Container">
    <?php the_content(); ?>
    <footer class="rp-ArtworkFullFooter rp-PreviousNextLinks">
      <span class="rp-PreviousNextLinks__previous"><?php previous_post_link('%link', 'Older note'); ?></span>
      <span class="rp-PreviousNextLinks__next"><?php next_post_link('%link', 'More recent note'); ?></span>
    </footer>
  </div>
</section>

<?php get_footer(); ?>
