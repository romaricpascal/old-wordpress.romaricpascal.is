<?php 
	$postType = get_post_type_object( $postTypeName );
	if ($craft) {
		$craftId = $craft->term_id;
	}
  	$query = rp_query_featured_posts($postTypeName, rp_get_archive_size($postTypeName), $craftId);
	$postListFormat = rp_get_postListFormat($postTypeName); ?>

<?php if ($query->have_posts()): ?>
<article class="<?php echo "{$classes}"; ?>" data-inview>
	<div class="l-sideBySide">
		<header class="l-sideBySide__header u-flas-start l-vertCentered u-mh-100vh-xl">
			<?php rp_render('archiveHeading/archiveHeading', 
			                ['postType' => $postType, 'craft' => $craft, 'headingLevel' => $headingLevel], 
			                [$postTypeName, rp_get($craft, 'slug')]); ?>
			<?php rp_render('archiveDescription/archiveDescription', 
			                ['postType' => $postType, 
			                 'craft' => $craft, 
			                 'classes' => 'fadeIn a-entrance a-timing-description u-anim-inView u-show-xl'], 
			                [$postTypeName, rp_get($craft, 'slug')]); ?>
		</header>
		<?php rp_render('postList', [
		  'query' => $query, 
		  'classes' => "l-sideBySide__main fadeIn a-entrance a-timing-main u-anim-inView",
		  'postType' => $postTypeName,
		  'craft' => $craft,
		  'format' => $postListFormat,
		  'headingLevel' => $headingLevel + 1 ]); ?>
	 </div>
	 <?php rp_render('archiveDescription/archiveDescription', 
			                ['postType' => $postType, 'craft' => $craft, classes => 'u-hide-xl'], 
			                [$postTypeName, rp_get($craft, 'slug')]); ?>
</article>
<?php endif; ?>