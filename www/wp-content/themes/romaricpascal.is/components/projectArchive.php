<?php
    $query = rp_query_projects_with_craft($craft,rp_get_archive_size(PROJECT_TYPE));?>
    
<?php if ($query->have_posts()): ?>

<section class="rp-HomeSection">
	<div class="l-sideBySide">
	<header class="l-sideBySide__header">
		<h2><?php echo $craft->name; ?></h2>
		<p><?php echo $craft->description; ?></p>
	</header>
	<?php rp_render('postList', ['query' => $query, 'format' => 'thumbnail', 'classes'=>'l-sideBySide__main rp-ArchiveList-project']); ?>
	</div>
</section>

<?php endif; ?>