<?php the_post(); ?>
<?php get_header(); ?>
    <article class="rp-ArtworkSingle">
      <main>
        <a href="<?php the_post_thumbnail_url(); ?>">
        <img class="rp-ArtworkSingleImage" src="<?php the_post_thumbnail_url(); ?>" title="<?php  the_title();?>" alt="<?php the_title();?>"
             srcset="<?php rp_the_thumbnail_srcset(['artwork-full','artwork-full-2x','artwork-full-3x']); ?>" >
        </a>
      </main>
      <aside class="rp-ArtworkSingle__aside">
        <section class="rp-AsideSection">
          <?php the_content(); ?>
          <time class="rp-ArtworkTime" datetime="<?php the_time('c'); ?>"><?php the_time('d M Y'); ?></time>
        </section>
        <?php get_template_part('partials/artwork-links'); ?>
        <section class="rp-AsideSection">
          <?php get_template_part('partials/artwork-related'); ?>
        </section>
        <?php the_share_buttons(); ?>
      </aside>
      <?php get_template_part('partials/prev-next'); ?>
    </article>
<?php
  get_footer();
?>
