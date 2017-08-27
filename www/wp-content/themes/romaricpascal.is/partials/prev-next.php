<?php
$terms = rp_get_url_terms();
if ($post->post_type === PROJECT_TYPE && $terms) {
	$post = rp_get_the_post();
	$postTermIds = array_pluck(wp_get_post_terms($post->ID, CRAFT_TAX_NAME), 'term_id');
	$termIds = array_pluck($terms, 'term_id');
	$excludedIds = array_diff($postTermIds,$termIds);
	$previous_post = get_previous_post(true, $excludedIds, CRAFT_TAX_NAME);
	$next_post = get_next_post(true, $excludedIds, CRAFT_TAX_NAME);
} else {
	$previous_post = get_previous_post();
	$next_post = get_next_post();
}

if(!empty($previous_post) || !empty($next_post)):
?>
<nav class="rp-PrevNextNav">
	<?php if(!empty($previous_post)): ?>
	<a class="rp-PrevNextLink rp-PrevNextLink-previous rp-PrevNextNav__previous" 
	   href="<?= rp_get_permalink($previous_post, $terms) ?>"
	   rel="prev"
	   accesskey="j"
	   data-key="left"
	   title="<?=$previous_post->post_title; ?>">
	   	<?php echo $previous_post->post_title; ?>
	</a>
	<?php else: ?>
	<span class="rp-PrevNextLink rp-PrevNextLink-disabled rp-PrevNextLink-previous rp-PrevNextNav__previous">No previous post</span>
	<?php endif; ?>
	<?php if(!empty($next_post)): ?>
	<a class="rp-PrevNextLink rp-PrevNextLink-next rp-PrevNextNav__next" 
	   href="<?= rp_get_permalink($next_post, $terms) ?>"
	   rel="next"
	   accesskey="k"
	   data-key="right"
	   title="<?=$next_post->post_title; ?>">
	    <?php echo $next_post->post_title; ?>
	</a>
	<?php else: ?>
	<span class="rp-PrevNextLink rp-PrevNextLink-disabled rp-PrevNextLink-next rp-PrevNextNav__next">No next post</span>
	<?php endif; ?>	
</nav>
<?php endif; ?>