<?php
    $projectsQuery = rp_query_projects_with_craft($craft,rp_get_archive_size(PROJECT_TYPE));
    $postsQuery = rp_query_featured_posts('post', 2, $craft->term_id);
    $testimonialQuery = rp_query_featured_posts(TESTIMONIAL_TYPE, 1, $craft->term_id);
?>


<?php if($projectsQuery->have_posts() || $postsQuery->have_posts()): ?>
<article class="<?php echo "{$classes}"; ?>"
	<?php if ($id) {echo "id='{$id}'";} ?>
	data-inview>
	<div class="l-sideBySide">
	<header class="l-sideBySide__header">
		<?php rp_render('archiveHeading/archiveHeading', ['postType' => $postType, 'craft' => $craft, 'headingLevel' => $headingLevel], [$postTypeName, rp_get($craft, 'slug')]); ?>
		<?php rp_render('archiveDescription/archiveDescription', ['postType' => $postType, 'craft' => $craft], [$postTypeName, rp_get($craft, 'slug')]); ?>
		<section class="u-show-xl">
			<h3 >And I write about it too</h3>
			<?php rp_render('postList', ['postType'=> 'post', 'query' => $postsQuery, 'format' => 'link', 'headingLevel' => $headingLevel + 1]); ?>
		</section>
	</header>
	<div class="l-sideBySide__main">
		<?php rp_render('postList', ['postType' => PROJECT_TYPE,'query' => $projectsQuery, 'format' => 'thumbnail', 'headingLevel' => $headingLevel + 1 ]); ?>
		<h3>Clients sound happy</h3>
		<?php rp_render('postList', ['query' => $testimonialQuery, 'format' => 'full', 'headingLevel' => $headingLevel + 1]) ?>
		<section class="u-hide-xl">
			<h3 >And I write about it too</h3>
			<?php rp_render('postList', ['postType'=> 'post', 'query' => $postsQuery, 'format' => 'link', 'headingLevel' => $headingLevel + 1]); ?>
		</section>
	</div>
	</div>
</article>

<?php endif; ?>