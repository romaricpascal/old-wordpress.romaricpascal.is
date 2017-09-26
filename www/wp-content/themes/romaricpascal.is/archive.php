<?php
  $postType = get_post_type();
  $craft = rp_get_craft_object($craft);
?>

<?php if (rp_is_ajax()): ?>
	<title><?= rp_title(); ?></title>
<?php endif; ?>

<?php if(!rp_is_ajax()): ?>
<?php get_header(); ?>
<div class="u-mw-30em-xl-down">
	<article class="l-sideBySide" data-inview>
		<header class="l-sideBySide__header l-vertCentered u-vgap-firstBig">
		<?php rp_render('archiveHeading/archiveHeading', 
		                ['postType' => $postType, 
		                 'craft' => $craft, 
		                 'headingLevel' => 1], 
		                [$postType, rp_get($craft, 'slug')]); ?>
		<?php rp_render('archiveDescription/archiveDescription', 
		                ['postType' => $postType, 
		                 'craft' => $craft, 
		                 'classes' => 'u-show-xl'], 
		                [$postType, rp_get($craft, 'slug')]); ?>
		</header>
<?php endif;?>	
		<div class="l-sideBySide__main">
			<?php rp_render('postList', 
			                ['postType' => $postType,
			                 'classes' => 'u-mb-1', 
			                 'craft' => $craft,
			                 'withAccessKeys' => true,
			                 'format' => rp_get_postListFormat($postType),
			                 'size' => '800',
			                 'headingLevel' => 2], 
			                 [$postType, rp_get($craft, 'slug')]); ?>
			<?php get_template_part('partials/prev-next-archive'); ?>
			<?php rp_render('archiveDescription/archiveDescription', 
	 	                ['postType' => $postType, 'craft' => $craft, classes => 'u-hide-xl'], 
	 	                [$postType, rp_get($craft, 'slug')]); ?>
		</div>
<?php if(!rp_is_ajax()): ?>
	 	
	</article>
</div>

<?php get_footer();?>

<?php endif; ?>