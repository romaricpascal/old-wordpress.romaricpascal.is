<figure class="<?= $classes; ?>">
	<p><?= rp_get_content($post); ?></p>
	<figcaption class="t-typo-display u-ta-c"><?php the_testimonial_author($post) ?><?php the_testimonial_link($post, ', ') ?></figcaption>
</figure>