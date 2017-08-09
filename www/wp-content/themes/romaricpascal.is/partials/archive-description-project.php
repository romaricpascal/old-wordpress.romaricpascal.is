<p>These are a few projects I'm proud of having worked on.</p>
<?php
	$terms = get_terms([
		'taxonomy' => CRAFT_TAX_NAME,
		'hide_empty' => false
	]); ?>
<ul class="rp-CraftList">
	<?php foreach($terms as $term): ?>
		<li class="rp-CraftTerm"><a href="<?php echo project_craft_archive_url($term);?>"><?php echo $term->name; ?></a></li>
	<?php endforeach; ?>
</ul>