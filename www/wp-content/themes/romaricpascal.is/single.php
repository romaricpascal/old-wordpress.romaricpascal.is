<?php the_post(); ?>
<?php get_header(); ?>

<article class="rp-Content">
  <header class="rp-HeaderWithSubhead">
    <h1 class="rp-HeaderWithSubhead__heading">
        <?php the_title(); ?>
    </h1>
    <p><time datetime="<?php the_time('c'); ?>"><?php the_time('d M Y'); ?></time> — An article about: <?php the_terms(get_the_ID(), CRAFT_TAX_NAME);?> - <?php the_category(' - '); ?></p>
  </header>
  <main>
    <?php the_content(); ?>
  </main>
  <aside>

  </aside>
  <?php get_template_part('partials/prev-next'); ?>
</article>

<?php
  get_footer();
?>
