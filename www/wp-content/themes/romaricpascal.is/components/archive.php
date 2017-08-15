<?php 
	$postType = get_post_type_object( $postTypeName );
	if ($craft) {
		$craftId = $craft->term_id;
	}
  	$query = rp_query_featured_posts($postTypeName, rp_get_archive_size($postTypeName), $craftId);
	$postListFormat = rp_get_postListFormat($postTypeName); ?>

<?php if ($query->have_posts()): ?>
<section class="<?php echo $classes; ?>">
	<div class="l-sideBySide">
	<header class="l-sideBySide__header">
		<?php rp_render('archiveHeading', ['postType' => $postType, 'craft' => $craft], [$postTypeName, rp_get($craft, 'slug')]); ?>
		<?php rp_render('archiveDescription', ['postType' => $postType, 'craft' => $craft], [$postTypeName, rp_get($craft, 'slug')]); ?>
	</header>
	<?php rp_render('postList', [
	  'query' => $query, 
	  'classes' => "l-sideBySide__main rp-ArchiveList-${postTypeName}", 
	  'format' => $postListFormat]); ?>
	 </div>
</section>
<?php endif; ?>