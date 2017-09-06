<?php
  global $post;
  $query = query_related_artworks($post, 4);
?>
<h2 class="rp-AsideHeading">More artworks</h2>
<ul class="u-list-flat l-grid">
<?php while ($query->have_posts()): $query->the_post(); ?>
	<li class="l-grid__col l-col-1-2">
		<?php rp_render('post', [
		'post' => rp_get_the_post(), 
		'craft' => $craft,
		'size' => '400'
	  ], ['thumbnail'] ); ?>
	</li>
<?php endwhile; wp_reset_postdata();?>
</ul>
