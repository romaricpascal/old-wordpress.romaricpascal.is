<a href="<?php the_permalink(); ?>" class=" rp-ArtworkListItem rp-ArtworkList__item o-ratio">
  <div class="o-ratio__content rp-ArtworkImage">
  	<img src="<?php the_post_thumbnail_url('artwork-grid-xl'); ?>" title="<?php  the_title();?>"
  		sizes="(min-width: 700) 384px,
  		       (min-width: 560) 167px,
  		       280"
  		srcset="<?php rp_the_thumbnail_srcset(['artwork-grid-s','artwork-grid-m','artwork-grid-l', 'artwork-grid-xl', 'artwork-grid-l-3x']); ?>"
  	>
  </div>
</a>
