<?php
  $postType = get_post_type();
  $craft = rp_get_craft_object($craft);
?>

<?php if (rp_is_ajax()): ?>
	<title><?php echo rp_title(); ?></title>
<?php endif; ?>

<?php if(!rp_is_ajax()): ?>
<?php get_header(); ?>
<div class="u-mw-30em">
	<article class="l-sideBySide" data-inview>
		<header class="l-sideBySide__header u-flas-start l-vertCentered u-mh-100vh-xl">
		<?php rp_render('archiveHeading/archiveHeading', 
		                ['postType' => $postType, 'craft' => $craft, 'headingLevel' => 1], 
		                [$postType, rp_get($craft, 'slug')]); ?>
		<?php rp_render('archiveDescription/archiveDescription', 
		                ['postType' => $postType, 
		                 'craft' => $craft, 
		                 'classes' => 'u-show-xl fadeIn a-entrance a-timing-description u-anim-inView'], 
		                [$postType, rp_get($craft, 'slug')]); ?>
		</header>
<?php endif;?>	
		<div class="l-sideBySide__main fadeIn a-entrance a-timing-main u-anim-inView">
			<?php rp_render('postList', 
			                ['postType' => $postType, 
			                 'craft' => $craft, 
			                 'format' => rp_get_postListFormat($postType), 
			                 'headingLevel' => 2]); ?>
			<?php get_template_part('partials/prev-next-archive'); ?>
		</div>
<?php if(!rp_is_ajax()): ?>
	 	<?php rp_render('archiveDescription/archiveDescription', 
	 	                ['postType' => $postType, 'craft' => $craft, classes => 'u-hide-xl'], 
	 	                [$postType, rp_get($craft, 'slug')]); ?>
	</article>
</div>

<?php get_footer();?>

<?php endif; ?>