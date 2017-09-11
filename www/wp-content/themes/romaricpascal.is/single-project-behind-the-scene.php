<?php
	$behind_the_scene = get_field('behind_the_scene');
	$processArticle = get_field('process_article');
	if (!empty($processArticle)) {
		$processArticle = $processArticle[0];
	}
?>
<?php if ($behind_the_scene || $processArticle): ?>
	<h2>Behind the scene</h2>
	<?php if ($processArticle): ?>
	<a class="rp-Announcement" href="<?= get_permalink($processArticle->ID); ?>">
		<p>The following is only an overview of the work that happened on this project. If you'd like more details have a read at this article on the blog!</p>
		<span class="u-c-orange t-typo-display">"<?= $processArticle->post_title; ?>"</span>
	</a>
	<?php endif; ?>
	<?= $behind_the_scene; ?>
<?php endif; ?>