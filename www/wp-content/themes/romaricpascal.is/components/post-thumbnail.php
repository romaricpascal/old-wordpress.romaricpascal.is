<a class="o-ratio <?php echo $classes; ?>" href="<?php echo rp_get_permalink($post, $craft); ?>">
	<?php rp_render('postThumbnailImg', ['post' => $post, 'classes' => 'o-ratio__content u-d-b']); ?>
</a>
