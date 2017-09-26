<?php
$terms = rp_get_url_terms();
$previous_post = rp_get_previous_post($post, $terms);
$next_post = rp_get_next_post($post, $terms);

if(!empty($previous_post) || !empty($next_post)):
?>
<nav class="rp-PrevNextNav">
	<?php rp_render('pagination/prevNextLink', [
		'classes' => 'rp-PrevNextNav__previous',
		'rel' => 'prev',
		'href' => rp_get_permalink($previous_post, $terms),
		'title' => rp_get($previous_post, 'post_title'),
		'empty' => 'No previous post'
	]); ?>
	<?php rp_render('pagination/prevNextLink', [
		'classes' => 'rp-PrevNextNav__next',
		'rel' => 'next',
		'href' => rp_get_permalink($next_post, $terms),
		'title' => rp_get($next_post, 'post_title'),
		'empty' => 'No next post'
	]); ?>
</nav>
<?php endif; ?>