
<section class="rp-HomeSection">
	<header>
		<h2><?php echo $postType->label; ?></h2>
	</header>
	<?php while($query->have_posts()): $query->the_post(); ?>
		<?php rp_render('post', ['post' => rp_get_the_post()], ['full', 'testimonial']); ?>
	<?php endwhile; ?>
	
</section>