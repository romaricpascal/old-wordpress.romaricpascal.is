<?php
  global $post;
  $posts = rp_get_related_projects($post,2);
  $urlTerms = rp_get_url_terms();
  if (!empty($urlTerms)) {
  	$craft = $urlTerms[0];
  }
  // TODO: Check results, display them, update algorithm for matching related projects
?>
<section class="rp-AsideSection">
<h2 id="#similar-projects" class="rp-AsideHeading">Similar projects</h2>
<ul class="u-list-flat l-grid">
	<?php foreach($posts as $post): ?>
	<li class="l-grid__col l-col-1-2">
		<?php rp_render('post', ['post' => $post, 'craft' => $craft], ['thumbnail'] ); ?>
	</li>
	<?php endforeach; wp_reset_postdata(); ?>
</ul>
</section>