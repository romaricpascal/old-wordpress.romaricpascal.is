<?php
  global $post;
  $posts = rp_get_related_projects($post,2);
  // TODO: Check results, display them, update algorithm for matching related projects
?>
<section class="rp-AsideSection">
<h2 id="#similar-projects" class="rp-AsideHeading">Similar projects</h2>
<ul class="rp-List-reset l-grid">
	<?php foreach($posts as $post): ?>
	<li class="l-grid__col l-col-1-2">
		<a href="<?php the_permalink(); ?>">
			<img class="u-d-b" src="<?php the_post_thumbnail_url('artwork-grid-xl'); ?>" title="<?php  the_title();?>"
		  		alt="<?php the_title();?>"
		  		srcset="<?php rp_the_thumbnail_srcset(['artwork-grid-s','artwork-grid-m','artwork-grid-l', 'artwork-grid-xl', 'artwork-grid-l-3x']); ?>"
		  		sizes=""
		  	>
	  	</a>
	</li>
	<?php endforeach; ?>
</ul>
</section>