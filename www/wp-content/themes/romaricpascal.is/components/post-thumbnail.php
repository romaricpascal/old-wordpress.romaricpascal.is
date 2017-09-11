<a class="rp-PostLink o-ratio <?= $classes; ?>"
   <?php if ($accesskey !== null) { echo "accesskey='{$accesskey}'";} ?>
   href="<?= rp_get_permalink($post, $craft); ?>">
	<?php rp_render('postThumbnailImg', [
		'post' => $post, 
		'classes' => 'o-ratio__content u-d-b', 
		'srcset' => ['200','400','800','1200','1600'],
		'size' => $size,
		'sizes' => $sizes
	]); ?>
	<?php if($accesskey !== null): ?>
		<kbd class="rp-AccessKeyHint"><?= $accesskey; ?></kbd>
	<?php endif;?>
</a>
