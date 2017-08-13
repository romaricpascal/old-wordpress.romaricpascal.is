<?php 
	$postTypeName = $postType->name;
	$postListFormat = rp_get_postListFormat($postTypeName); ?>
<section class="rp-HomeSection">
	<header>
		<h2><?php echo $postType->label; ?></h2>
	</header>
	<?php rp_render('postList', ['query' => $query, 'classes' => "rp-ArchiveList-${postTypeName}", 'format' => $postListFormat]); ?>
</section>