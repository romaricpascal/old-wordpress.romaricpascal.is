<section class="rp-HomeSection">
	<header>
		<h2><?php echo $craft->name; ?></h2>
		<p><?php echo $craft->description; ?></p>
	</header>
	<?php rp_render('postList', ['query' => $query, 'format' => 'thumbnail', 'classes'=>'rp-ArchiveList-project']); ?>
</section>