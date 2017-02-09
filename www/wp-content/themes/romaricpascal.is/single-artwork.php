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
    <footer class="rp-ArtworkFullFooter">
      <span class="rp-ArtworkFullFooter__previous"><?php previous_post_link('&laquo; %link', 'Previous artwork'); ?></span>
      <span class="rp-ArtworkFullFooter__next"><?php next_post_link('%link &raquo;', 'Next artwork'); ?></span>
    </footer>
  </div>
</section>

<?php get_footer(); ?>
