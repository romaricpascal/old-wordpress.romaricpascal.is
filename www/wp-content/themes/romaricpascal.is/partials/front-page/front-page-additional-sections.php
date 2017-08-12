

<?php
	$menuLocations = get_nav_menu_locations();
	$menu = $menuLocations[MENU_HOME_CONTENT];	
	$menu_items = wp_get_nav_menu_items($menu);
?>

<?php foreach($menu_items as $menu_item):  ?>
	<?php if ($menu_item->type === 'taxonomy' && $menu_item->object === 'craft'): ?>
	<section>
		<?php rp_home_project_with_craft_section($menu_item->object_id); ?>
	</section>
	<?php else: ?>
	<details>
		<summary>Non craft section - <?php echo $menu_item->type; ?></summary>
		<pre><?php var_dump($menu_item); ?>
		</pre>
	</details>

	<?php endif; ?>
<?php endforeach; ?>