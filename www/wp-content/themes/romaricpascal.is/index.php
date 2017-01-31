<?php
  global $post;
  the_post(); ?>

<?php get_header(); ?>
<div class="l-Container">
  <h1><?php the_title();?></h1>
  <?php the_content(); ?>
</div>

<?php get_footer();?>
