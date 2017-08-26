<?php
$post_type = get_post_type();
$label = get_post_type_object( $post_type )->name;
if (rp_has_pages()) {

	// For some reason, get_next_posts_page_link() still generates a page even if on the last page
	// So needs an additional check
	if (rp_has_more_pages()) {
		// Older posts are actually in the next page 
		// so previous and next are inverted relative to Wordpress meaning
		$previous_post = get_next_posts_page_link();
	}
	// get_previous_posts_page_link() generates the archive URL if on the first page
	// So need to avoid that
	if (is_paged()) {
		$next_post = get_previous_posts_page_link();
	}
}
if(!empty($previous_post) || !empty($next_post)):
?>
<nav class="rp-PrevNextNav rp-PrevNextNav-<?php echo $post_type; ?>">
	<?php if(!empty($previous_post)): ?>
	<a
	  class="rp-PrevNextLink rp-PrevNextLink-previous rp-PrevNextNav__previous" 
	  data-ajax=".rp-PostList, .rp-PrevNextLink-next:href, .rp-PrevNextLink-previous:href"
	  href="<?= $previous_post ?>"
	  rel="prev"
	  accesskey="j"
	  title="Older <?php echo $label; ?>">
	    Older <?php echo $label; ?>
    </a>
	<?php else: ?>
	<span 
	  class="rp-PrevNextLink rp-PrevNextLink-disabled rp-PrevNextLink-previous rp-PrevNextNav__previous" 
	  title="No older <?php echo $label; ?>">
		No older <?php echo $label; ?>		
	</span>
	<?php endif; ?>
	<?php if(!empty($next_post)): ?>
	<a 
	  class="rp-PrevNextLink rp-PrevNextLink-next rp-PrevNextNav__next"
	  data-ajax=".rp-PostList, .rp-PrevNextLink-next:href, .rp-PrevNextLink-previous:href"
	  href="<?= $next_post ?>"
	  rel="next"
	  accesskey="k"
	  title="Newer <?php echo $label; ?>">
	    <?php echo $label; ?>
    </a>
	<?php else: ?>
	<span 
	  class="rp-PrevNextLink rp-PrevNextLink-disabled rp-PrevNextLink-next rp-PrevNextNav__next" 
	  title="No newer <?php echo $label; ?>">
	    No newer <?php echo $label; ?>
	</span>
	<?php endif; ?>	
</nav>
<?php endif; ?>