
<section class="rp-HomeSection">
	<header>
		<h2><?php echo $postType->label; ?></h2>
	</header>
	<?php while($query->have_posts()): $query->the_post(); ?>
		<?php $testimonial = rp_get_the_post(); ?>
		<figure class="rp-ArchiveListItem">
	  		<p><?php echo $testimonial->post_content; ?></p>
	  		<figcaption class="t-typo-display u-tac"><?php the_testimonial_author($testimonial) ?><?php the_testimonial_link($testimonial, ', ') ?></figcaption>
		</figure>
	<?php endwhile; ?>
	
</section>