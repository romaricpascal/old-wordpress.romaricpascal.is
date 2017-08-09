<?php
$post_type = get_post_type();
$label = get_post_type_object( $post_type )->name;
if (rp_has_pages()) {
	$previous_post = get_next_posts_page_link();
	if (is_archive() && is_paged()) {
		$next_post = get_previous_posts_page_link();
	}
}
if(!empty($previous_post) || !empty($next_post)):
?>
<nav class="rp-PrevNextNav rp-PrevNextNav-<?php echo $post_type; ?>">
	<?php if(!empty($previous_post)): ?>
	<a class="rp-PrevNextLink rp-PrevNextLink-previous rp-PrevNextNav__previous" 
	   href="<?= $previous_post ?>" title="Older <?php echo $label; ?>">Older <?php echo $label; ?></a>
	<?php else: ?>
	<span class="rp-PrevNextLink rp-PrevNextLink-disabled rp-PrevNextLink-previous rp-PrevNextNav__previous"><?php echo $previous_post->post_title; ?></span>
	<?php endif; ?>
	<?php if(!empty($next_post)): ?>
	<a class="rp-PrevNextLink rp-PrevNextLink-next rp-PrevNextNav__next" href="<?= get_permalink($next_post->ID) ?>" title="<?=$next_post->post_title; ?>"
	><?php echo $next_post->post_title; ?></a>
	<?php else: ?>
	<span class="rp-PrevNextLink rp-PrevNextLink-disabled rp-PrevNextLink-next rp-PrevNextNav__next"><?php echo $next_post->post_title; ?></span>
	<?php endif; ?>	
</nav>
<?php endif; ?>