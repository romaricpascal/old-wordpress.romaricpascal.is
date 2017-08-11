<?php the_post(); ?>
<?php get_header(); ?>

<article class="rp-Content">
  <header class="rp-HeaderWithSubhead">
    <h1 class="rp-HeaderWithSubhead__heading">
        <?php the_title(); ?>
    </h1>
    <?php the_post_thumbnail('full'); ?>
  </header>
  <div>
    <?php 
      the_content(); 
      get_template_part('single-project', 'testimonial');
      get_template_part('single-project', 'behind-the-scene');
    ?>
  </div>
  <aside>
    <?php 
      get_template_part('single-project','live-url');
      get_template_part('single-project', 'links');
      get_template_part('single-project', 'related-projects');
    ?>
  </aside>
  <?php get_template_part('partials/prev-next'); ?>
</article>

<?php
  get_footer();
?>
