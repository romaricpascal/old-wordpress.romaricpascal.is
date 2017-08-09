<?php
  global $post;
  $query = query_related_artworks($post, 4);
?>
<h2 class="rp-AsideHeading">More artworks</h2>
<ul class="rp-RelatedArtworkList">
<?php while ($query->have_posts()): $query->the_post(); ?>
	<li class="rp-RelatedArtwork">
		<a href="<?php the_permalink(); ?>">
			<img src="<?php the_post_thumbnail_url('artwork-grid-xl'); ?>" title="<?php  the_title();?>"
		  		alt="<?php the_title();?>"
		  		srcset="<?php rp_the_thumbnail_srcset(['artwork-grid-s','artwork-grid-m','artwork-grid-l', 'artwork-grid-xl', 'artwork-grid-l-3x']); ?>"
		  		sizes=""
		  	>
	  	</a>
	</li>
<?php endwhile; wp_reset_postdata();?>
</ul>