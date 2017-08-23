<?php
  $postType = get_post_type();
  $craft = rp_get_craft_object($craft);
?>

<?php get_header(); ?>
<div class="u-mw-30em">
	<article class="l-sideBySide">
		<header class="l-sideBySide__header u-flas-start l-vertCentered u-mh-100vh-xl">
		<?php rp_render('archiveHeading/archiveHeading', 
		                ['postType' => $postType, 'craft' => $craft, 'headingLevel' => 1], 
		                [$postType, rp_get($craft, 'slug')]); ?>
		<?php rp_render('archiveDescription/archiveDescription', 
		                ['postType' => $postType, 'craft' => $craft], 
		                [$postType, rp_get($craft, 'slug')]); ?>
		</header>

		<div class="l-sideBySide__main">
			<?php rp_render('postList', 
			                ['classes' => "rp-ArchiveList-{$postType}", 'format' => rp_get_postListFormat($postType), 'headingLevel' => 2]); ?>
			<?php get_template_part('partials/prev-next-archive'); ?>
		</div>
	</article>
</div>

<?php get_footer();?>