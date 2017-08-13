<section class="rp-HomeSection">
	<header>
		<h2><?php echo $craft->name; ?></h2>
		<p><?php echo $craft->description; ?></p>
	</header>
	<ul class="rp-ArchiveList rp-ArchiveList-project">
	  <?php while($query->have_posts()): $query->the_post(); ?>
	    <li class="rp-ArchiveListItem rp-ArchiveListItem-project rp-ArchiveListItem-thumbnail">
	    	<?php get_template_part('partials/post-thumbnailLink', 'project'); ?>
	    </li>
	  <?php endwhile; ?>
	 </ul>
</section>