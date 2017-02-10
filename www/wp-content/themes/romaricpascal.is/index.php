<?php get_header(); ?>

<div class="l-Container">

  <?php while(have_posts()): the_post(); ?>
  <div>
    <time><?php the_date(); ?></time>
    <h1><?php the_title();?></h1>
    <?php the_content(); ?>
  </div>
  <?php endwhile; ?>
</div>

<?php get_footer();?>
