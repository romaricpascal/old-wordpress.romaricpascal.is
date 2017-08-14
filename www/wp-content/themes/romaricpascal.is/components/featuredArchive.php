<?php 
	$postType = get_post_type_object( $postTypeName );
	if ($craftSlug) {
		$craftId = rp_get_craft_term_id($craftSlug);
	}
  	$query = rp_query_featured_posts($postTypeName, rp_get_archive_size($postTypeName), $craftId);
	$postListFormat = rp_get_postListFormat($postTypeName); ?>

<?php if ($query->have_posts()): ?>
<section class="l-sideBySide rp-HomeSection">
	<div class="l-sideBySide">
	<header class="l-sideBySide__header">
		<h2><?php echo $postType->label; ?></h2>
	</header>
	<?php rp_render('postList', [
	  'query' => $query, 
	  'classes' => "l-sideBySide__main rp-ArchiveList-${postTypeName}", 
	  'format' => $postListFormat]); ?>
	 </div>
</section>
<?php endif; ?>