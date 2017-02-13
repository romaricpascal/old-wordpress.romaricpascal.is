<?php
  global $post;
  the_post(); ?>

<?php get_header(); ?>
<section class="rp-LandingSection">
  <div class="l-Container">
    <div class="rp-ArtworkFull">
      <div class="rp-ArtworkFull__main rp-ArtworkMedia">
        <?php the_post_thumbnail(); ?>
      </div>
      <div class="rp-ArtworkFull__aside rp-ArtworkCaption">
        <?php the_content(); ?>
        <time class="rp-ArtworkTime" datetime="<?php the_time('c'); ?>"><?php the_time('d M Y'); ?></time>
      </div>
    </div>
    <div class="rp-PreviousNextLinks">
      <span class="rp-PreviousNextLinks__previous"><?php previous_post_link('%link', 'Older artwork'); ?></span>
      <span class="rp-PreviousNextLinks__next"><?php next_post_link('%link', 'More recent artwork'); ?></span>
    </div>
  </div>
</section>

<?php
  get_template_part('partials/c-stayupdated');
  get_footer();
?>
