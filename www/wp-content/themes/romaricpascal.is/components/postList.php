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

	$ACCESS_KEYS = [1,2,3,4,5,6,7,8,9,0,'-','='];
	$postIndex = 0;
?>

<ul class="rp-PostList u-list-flat <?php echo "{$classes} {$layoutClass}"; ?>">
<?php while(rp_has_more_posts($query)): ?>
	<?php 
		$post = rp_next_post($query); 
		if ($withAccessKeys && count($ACCESS_KEYS) > $postIndex) {
			$accesskey = $ACCESS_KEYS[$postIndex];
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