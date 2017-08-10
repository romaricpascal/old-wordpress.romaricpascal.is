<?php the_post(); ?>
<?php get_header(); ?>

<article class="rp-Content">
  <header class="rp-HeaderWithSubhead">
    <h1 class="rp-HeaderWithSubhead__heading">
        <?php the_title(); ?>
    </h1>
    <?php the_post_thumbnail('full'); ?>
  </header>
  <main>
    <?php the_content(); ?>
  </main>
  <aside>
    <?php 
      get_template_part('single-project','live-url');
    ?>
  </aside>
  <?php get_template_part('partials/prev-next'); ?>
</article>

<?php
  get_footer();
?>
