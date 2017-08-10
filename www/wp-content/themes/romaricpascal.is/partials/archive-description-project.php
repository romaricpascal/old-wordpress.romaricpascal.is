<p>I'm proud to have helped these projects, whether drawing some nice letters for them or developping their website/app.</p>
<?php
	$terms = get_terms([
		'taxonomy' => CRAFT_TAX_NAME,
		'hide_empty' => false
	]); ?>
<ul class="rp-CraftList">
	<?php foreach($terms as $term): ?>
		<?php $hasParentClass = $term->parent ? 'rp-CraftListItem-hasParent' : ''; ?>
		<li class="rp-CraftListItem <?php echo $hasParentClass; ?>">
			<a href="<?php echo project_craft_archive_url($term);?>">
				<?php echo $term->name; ?>	
			</a>
		</li>
	<?php endforeach; ?>
</ul>