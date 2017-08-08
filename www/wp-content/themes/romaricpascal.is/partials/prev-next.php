<?php
$previous_post = get_previous_post();
$next_post = get_next_post();
if(!empty($previous_post) || !empty($next_post)):
?>
<nav class="rp-PrevNextNav">
	<?php if(!empty($previous_post)): ?>
	<a class="rp-PrevNextLink rp-PrevNextLink-previous rp-PrevNextNav__prev" href="<?= get_permalink($previous_post->ID) ?>" title="<?=$previous_post->post_title; ?>"><?php echo $previous_post->post_title; ?></a>
	<?php endif; ?>
	<?php if(!empty($next_post)): ?>
	<a class="rp-PrevNextLink rp-PrevNextLink-next rp-PrevNextNav__next" href="<?= get_permalink($next_post->ID) ?>" title="<?=$next_post->post_title; ?>"><?php echo $next_post->post_title; ?></a>
	<?php endif; ?>	
</nav>
<?php endif; ?>