<ul class="rp-ArchiveList <?php echo $classes; ?>">
<?php while($query->have_posts()): $query->the_post(); ?>
	<?php $post = rp_get_the_post(); ?>
	<li class="rp-ArchiveListItem rp-ArchiveListItem-<?php echo $format; ?> rp-ArchiveListItem-<?php echo $post->post_type;?>">
		<?php rp_render('post', ['post' => $post], [$format, $post->post_type]); ?>
	</li>
<?php endwhile; wp_reset_postdata(); ?>
</ul>