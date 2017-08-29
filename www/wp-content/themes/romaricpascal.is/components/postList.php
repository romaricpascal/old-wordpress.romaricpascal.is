<?php
	if ($postType) {
		if ($postType === ARTWORK_TYPE) {
			$layoutClass = 'l-snakeGrid';
			$itemLayoutClass = 'l-snakeGrid__item';
		} elseif ($postType === PROJECT_TYPE) {
			$layoutClass = 'l-oneAndTwo';
			$itemLayoutClass = 'l-oneAndTwo__item';
		} else {
			$itemLayoutClass = 'u-mb-2';
		}
	}

	$postIndex = 0;
?>

<ul class="rp-PostList u-list-flat <?php echo "{$classes} {$layoutClass}"; ?>">
<?php while(rp_has_more_posts($query)): ?>
	<?php 
		$post = rp_next_post($query); 
		if ($withAccessKeys) {
			$accesskey = rp_get_accessKey($postIndex);
		}
	?>
	<li class="rp-PostListItem <?php echo $itemLayoutClass; ?> u-loadable">
		<?php rp_render('post', [
			'post' => $post, 
			'classes' => 'u-loadable__content', 
			'craft'=> $craft, 'headingLevel' => $headingLevel,
			'accesskey' => $accesskey
			], [$format, $post->post_type]); ?>
	</li>
<?php $postIndex++; endwhile; wp_reset_postdata(); ?>
</ul>