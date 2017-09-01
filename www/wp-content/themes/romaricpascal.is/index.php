<?php the_post(); ?>
<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
<article class="rp-Content">
  <header class="rp-HeaderWithSubhead">
    <h1 class="rp-HeaderWithSubhead__heading">
        <?php the_title(); ?>
    </h1>
    <p><time datetime="<?php the_time('c'); ?>"><?php the_time('d M Y'); ?></time> — An article about: <?php the_terms(get_the_ID(), CRAFT_TAX_NAME);?> - <?php the_category(' - '); ?></p>
  </header>
  <div>
    <?php the_content(); ?>
  </div>
</article>
<?php endwhile; ?>
<?php
  get_footer();
?>
