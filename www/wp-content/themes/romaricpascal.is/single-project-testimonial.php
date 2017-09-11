<?php 
	global $post;
	$testimonial = rp_get_testimonial_for_project($post);
?>
<?php if($testimonial): ?>
	<h2>Their words</h2>
	<?php rp_render('post', ['post' => $testimonial], ['full', 'testimonial']); ?>
<?php endif; ?>