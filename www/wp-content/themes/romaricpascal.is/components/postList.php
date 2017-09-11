<?php
	if ($postType) {
		if ($postType === ARTWORK_TYPE) {
			$layoutClass = 'l-snakeGrid';
			$itemLayoutClass = 'l-snakeGrid__item';
		} elseif ($postType === PROJECT_TYPE) {
			$layoutClass = 'l-oneAndTwo';
			$itemLayoutClass = 'l-oneAndTwo__item';
		} else {
			$layoutClass = 'u-vgap-2em';
		}
	}

	$postIndex = 0;
?>

<ul class="rp-PostList u-list-flat <?= "{$classes} {$layoutClass}"; ?>">
<?php while(rp_has_more_posts($query)): ?>
	<?php 
		$post = rp_next_post($query); 
		if ($withAccessKeys) {
			$accesskey = rp_get_accessKey($postIndex);
		}
		if (is_callable($size)) {
			$postSize = call_user_func($size, $postIndex);
		} else {
			$postSize = $size;
		}

		if (is_callable($sizes)) {
			$postSizes = call_user_func($sizes, $postIndex);
		} else {
			$postSizez = $sizes;
		}
	?>
	<li class="rp-PostListItem <?= $itemLayoutClass; ?>">
		<?php rp_render('post', [
			'post' => $post, 
			'craft'=> $craft, 'headingLevel' => $headingLevel,
			'accesskey' => $accesskey,
			'size' => $postSize,
			'sizes' => $postSizes
			], [$format, $post->post_type]); ?>
	</li>
<?php $postIndex++; endwhile; wp_reset_postdata(); ?>
</ul>