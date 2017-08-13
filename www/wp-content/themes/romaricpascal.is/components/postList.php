<?php while($query->have_posts()): $query->the_post(); ?>
	<?php $post = rp_get_the_post(); ?>
	<?php rp_render('post', ['post' => $post], [$format, $post->post_type]); ?>
<?php endwhile; ?>