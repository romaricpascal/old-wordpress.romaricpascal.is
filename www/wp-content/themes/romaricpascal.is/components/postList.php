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
?>

<ul class="rp-PostList u-list-flat <?php echo "{$classes} {$layoutClass}"; ?>">
<?php while(rp_has_more_posts($query)): ?>
	<?php $post = rp_next_post($query); ?>
	<li class="rp-PostListItem <?php echo $itemLayoutClass; ?>">
		<?php rp_render('post', ['post' => $post, 'craft'=> $craft, 'headingLevel' => $headingLevel], [$format, $post->post_type]); ?>
	</li>
<?php endwhile; wp_reset_postdata(); ?>
</ul>