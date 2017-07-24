<?php
  global $post;
  the_post(); ?>

<?php get_header(); ?>
<section class="rp-LandingSection">
  <div class="l-Container">
    <div class="rp-ArtworkFull">
      <div class="rp-ArtworkFull__main rp-ArtworkMedia">
        <img src="<?php the_post_thumbnail_url(); ?>" title="<?php  the_title();?>"
             srcset="<?php rp_the_thumbnail_srcset(['artwork-full','artwork-full-2x','artwork-full-3x']); ?>" >
      </div>
      <div class="rp-ArtworkFull__aside rp-ArtworkCaption">
        <?php the_content(); ?>
        <time class="rp-ArtworkTime" datetime="<?php the_time('c'); ?>"><?php the_time('d M Y'); ?></time>
      </div>
    </div>
    <div class="rp-PreviousNextLinks">
      <?php get_template_part('partials/prev-next-with-thumbnails'); ?>
    </div>
  </div>
</section>

<?php
  get_template_part('partials/c-stayupdated');
  get_footer();
?>
