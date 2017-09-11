<?php
	$craft = rp_get_query_craft();
?>

<?php get_header(); ?>
<?php rp_render('craftArchive', ['craft' => $craft]); ?>
<?php get_footer(); ?> 