<?php 
	locate_template('partials/front-page/front-page-functions.php', true);
	the_post();
?>
<?php get_header(); ?>
<div class="rp-Content">
<section class="rp-HomeSection">
<?php the_content(); ?>
</section>
<?php get_template_part('partials/front-page/front-page','additional-sections'); ?>
<?php get_footer(); ?>