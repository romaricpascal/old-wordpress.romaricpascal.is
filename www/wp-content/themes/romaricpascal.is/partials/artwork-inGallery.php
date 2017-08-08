<a href="<?php the_permalink(); ?>" class="rp-ArtworkListItem">
	<img class="rp-ArtworkImage" src="<?php the_post_thumbnail_url('artwork-grid-xl'); ?>" title="<?php  the_title();?>"
		alt="<?php the_title();?>"
		srcset="<?php rp_the_thumbnail_srcset(['artwork-grid-s','artwork-grid-m','artwork-grid-l', 'artwork-grid-xl', 'artwork-grid-l-3x']); ?>">
</a>
