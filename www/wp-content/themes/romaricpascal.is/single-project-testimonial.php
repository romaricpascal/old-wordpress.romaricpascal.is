<?php 
	global $post;
	$testimonial = rp_get_testimonial_for_project($post);
?>
<?php if($testimonial): ?>
	<h2>Their words</h2>
	<figure>
  		<div><?php echo $testimonial->post_content; ?></div>
  		<figcaption class="t-typo-display u-tac"><?php the_testimonial_author($testimonial) ?><?php the_testimonial_link($testimonial, ', ') ?></figcaption>
	</figure>
<?php endif; ?>