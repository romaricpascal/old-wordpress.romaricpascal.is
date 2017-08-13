<?php $postListFormat = rp_get_postListFormat($postType->name); ?>
<section class="rp-HomeSection">
	<header>
		<h2><?php echo $postType->label; ?></h2>
	</header>
	<?php rp_render('postList', ['query' => $query, 'format' => $postListFormat]); ?>
</section>