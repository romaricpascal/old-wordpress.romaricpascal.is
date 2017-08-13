<ul class="rp-ArchiveList <?php echo $classes; ?>">
<?php while(rp_has_more_posts($query)): ?>
	<?php $post = rp_next_post($query); ?>
	<li class="rp-ArchiveListItem rp-ArchiveListItem-<?php echo $format; ?> rp-ArchiveListItem-<?php echo $post->post_type;?>">
		<?php rp_render('post', ['post' => $post], [$format, $post->post_type]); ?>
	</li>
<?php endwhile; wp_reset_postdata(); ?>
</ul>