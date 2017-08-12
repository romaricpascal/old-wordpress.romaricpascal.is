<section>
	<header>
		<h2><?php echo $craft->title; ?></h2>
		<p><?php echo $craft->description; ?></p>
	</header>
	<div>
		<ul class="rp-ArchiveList rp-ArchiveList-project">
			<?php foreach($projects as $project): ?>
				<li class="rp-ArchiveListItem rp-ArchiveListItem-project">
					<?php get_template_part('partials/post-thumbnailLink', 'project'); ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>