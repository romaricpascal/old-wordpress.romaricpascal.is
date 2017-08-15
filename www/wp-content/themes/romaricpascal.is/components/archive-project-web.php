<?php
    $projectsQuery = rp_query_projects_with_craft($craft,rp_get_archive_size(PROJECT_TYPE));
    $postsQuery = rp_query_featured_posts('post', 2, $craft->term_id);
    $testimonialQuery = rp_query_featured_posts(TESTIMONIAL_TYPE, 1, $craft->term_id);
?>


<?php if($projectsQuery->have_posts() || $postsQuery->have_posts()): ?>
<section class="rp-HomeSection">
	<div class="l-sideBySide">
	<header class="l-sideBySide__header">
		<?php rp_render('archiveHeading/archiveHeading', ['postType' => $postType, 'craft' => $craft, 'headingLevel' => $headingLevel], [$postTypeName, rp_get($craft, 'slug')]); ?>
			<?php rp_render('archiveDescription/archiveDescription', ['postType' => $postType, 'craft' => $craft], [$postTypeName, rp_get($craft, 'slug')]); ?>
	</header>
	<div class="l-sideBySide__main">
		<h3>I'm proud of these</h3>
		<?php rp_render('postList', ['query' => $projectsQuery, 'format' => 'thumbnail', 'classes'=>'rp-ArchiveList-project', 'headingLevel' => $headingLevel + 1 ]); ?>
		<h3>Clients sound happy</h3>
		<?php rp_render('postList', ['query' => $testimonialQuery, 'format' => 'full', 'classes' => 'rp-ArchiveList-testimonial', 'headingLevel' => $headingLevel + 1]) ?>
		<h3>And I write about it too</h3>
		<?php rp_render('postList', ['query' => $postsQuery, 'format' => 'link', 'classes' => 'rp-ArchiveList-post', 'headingLevel' => $headingLevel + 1]); ?>
	</div>
	</div>
</section>

<?php endif; ?>