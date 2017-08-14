

<?php
	$menuLocations = get_nav_menu_locations();
	$menu = $menuLocations[MENU_HOME_CONTENT];	
	$menu_items = wp_get_nav_menu_items($menu);
?>

<?php foreach($menu_items as $menu_item):  ?>
	<?php if ($menu_item->type === 'taxonomy' && $menu_item->object === 'craft'): ?>
		<?php 
			$craft = rp_get_craft_object($menu_item->object_id);
			rp_render('projectArchive', ['craft' => $craft], [$craft->slug]); 
		?>
	<?php elseif ($menu_item->type === 'post_type_archive'): ?>
		<?php rp_render('featuredArchive', ['postTypeName' => $menu_item->object]); ?>
	<?php elseif ($menu_item->type === 'post_type') : ?>
		<?php $post = get_post($menu_item->object_id); ?>
		<?php if (rp_is_posts_archive_page($post->ID)): ?>
			<?php rp_render('featuredArchive', ['postTypeName' => 'post', 'craftSlug' => CRAFT_TERM_LETTERING]); ?>
		<?php elseif ($post->post_type === 'page'): ?>
			<?php $template = $post->page_template;
				if ($template) {
					$component = pathinfo($template, PATHINFO_FILENAME);?>
					<section class="rp-HomeSection">
					 <?php rp_render($component, ['post' => $post]); ?>
					 </section>
			<?php } ?>
		<?php endif; ?>
	<?php elseif ($menu_item->type === 'custom'): ?>
	<?php endif; ?>
<?php endforeach; ?>
