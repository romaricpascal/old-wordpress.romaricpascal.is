<article class="rp-Content">
	<div>
		<h1><?php echo $post->post_title; ?></h1>
	</div>
	<div>
		<?php echo rp_get_content($post); ?>
	</div>
	<div>
		<?php rp_render('socialLinks'); ?>
	</div>
</article>