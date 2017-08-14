<div class="l-sideBySide">
	<div class="l-sideBySide__header">
		<h1><?php echo $post->post_title; ?></h1>
		<div class="u-show-xl">
			<?php rp_render('socialLinks'); ?>
		</div>
	</div>
	<div class="l-sideBySide__main">
		<?php echo rp_get_content($post); ?>
	</div>
	<div class="u-hide-xl">
		<?php rp_render('socialLinks'); ?>
	</div>
</div>