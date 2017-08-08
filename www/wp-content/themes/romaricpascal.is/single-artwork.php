<?php the_post(); ?>
<?php get_header(); ?>
    <article class="rp-ArtworkSingle">
      <main class="rp-ArtworkSingle__main">
        <img class="rp-ArtworkSingleImage" src="<?php the_post_thumbnail_url(); ?>" title="<?php  the_title();?>" alt="<?php the_title();?>"
             srcset="<?php rp_the_thumbnail_srcset(['artwork-full','artwork-full-2x','artwork-full-3x']); ?>" >
      </main>
      <aside class="rp-ArtworkSingle__aside">
        <section class="rp-ArtworkSingleSection rp-ArtworkSingleContent">
          <?php the_content(); ?>
          <time class="rp-ArtworkTime" datetime="<?php the_time('c'); ?>"><?php the_time('d M Y'); ?></time>
        </section>
        <?php get_template_part('partials/artwork-links'); ?>
        <section class="rp-ArtworkSingleSection rp-ArtworkSingleRelated">
          <?php get_template_part('partials/artwork-related'); ?>
        </section>
        <?php the_share_buttons(); ?>
      </aside>
      <?php get_template_part('partials/prev-next'); ?>
    </article>
    
<?php
  get_footer();
?>
