<?php the_post(); ?>
<?php get_header(); ?>

<article class="rp-Single rp-Content">
  <header class="rp-Single__header rp-HeaderWithSubhead u-mb-1">
    <h1 class="rp-HeaderWithSubhead__heading">
        <?php the_title(); ?>
    </h1>
    <?php rp_render('postThumbnailImg', [
      'post' => rp_get_the_post(),
      'size' => '400',
      'srcset' => ['200','400','800','1200','1600'],
      'sizes' => '(min-width: 58em) 20em, (min-width: 43em) 41em , 100vw'
    ]);?>
    
  </header>
  <div class="rp-Single__main">
    <?php 
      the_content(); 
      get_template_part('single-project', 'testimonial');
      get_template_part('single-project', 'behind-the-scene');
    ?>
  </div>
  <aside class="rp-Single__aside">
    <div class="rp-HeaderDuplicate rp-HeaderWithSubhead u-mb-1" role="presentation">
      <h1 class="rp-HeaderWithSubhead__heading">
        <?php the_title(); ?>
      </h1>
      <?php rp_render('postThumbnailImg', [
        'post' => rp_get_the_post(),
        'size' => '400',
        'srcset' => ['200','400','800','1200','1600'],
        'sizes' => '(min-width: 58em) 20em, (min-width: 43em) 41em , 100vw'
      ]);?>
    </div>
    <?php 
      get_template_part('single-project','live-url');
      get_template_part('single-project', 'links');
      get_template_part('single-project', 'related-projects');
    ?>
    <section class="rp-AsideSection">
      <?php the_share_buttons(); ?>
    </section>
  </aside>
  <?php get_template_part('partials/prev-next'); ?>
</article>

<?php
  get_footer();
?>
