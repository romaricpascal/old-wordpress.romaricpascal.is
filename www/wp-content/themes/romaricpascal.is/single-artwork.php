<?php the_post(); ?>
<?php get_header(); ?>
    <article class="rp-Artwork">
      <div class="rp-ArtworkContent">
        <main class="rp-ArtworkImage">
          <a class="u-d-b" href="<?php the_post_thumbnail_url(); ?>">
          <?php rp_render('postThumbnailImg', [
            'post' => rp_get_the_post(),
            'classes' => 'u-d-b',
            'size' => '800',
            'srcset' => ['200','400','800','1200','1600']
          ]);?>
        </main>
        <div class="u-hide-l">
        <?php rp_render('pagination/prevPostLink', ['classes' => 'rp-ArtworkNav-prev']); ?>
        <?php rp_render('pagination/nextPostLink', ['classes' => 'rp-ArtworkNav-next']); ?>
        </div>
        <aside class="rp-ArtworkInfo u-vgap-1em">
          <section>
            <?php the_content(); ?>
            <time class="rp-ArtworkTime" datetime="<?php the_time('c'); ?>"><?php the_time('d M Y'); ?></time>
          </section>
          <?php get_template_part('partials/artwork-links'); ?>
          <section class="rp-AsideSection">
            <?php get_template_part('partials/artwork-related'); ?>
          </section>
          <section class="rp-AsideSection">
            <?php the_share_buttons(); ?>
          </section>
        </aside>
      </div>
      <?php rp_render('pagination/prevPostLink', ['classes' => 'rp-ArtworkNav-prev u-show-l']); ?>
      <?php rp_render('pagination/nextPostLink', ['classes' => 'rp-ArtworkNav-next u-show-l']); ?>
    </article>
<?php
  get_footer();
?>
