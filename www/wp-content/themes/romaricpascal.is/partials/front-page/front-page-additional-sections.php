

<?php
	$menuLocations = get_nav_menu_locations();
	$menu = $menuLocations[MENU_HOME_CONTENT];	
	$menu_items = wp_get_nav_menu_items($menu);
	$menu_ids = [['greeting-you', 'Greetings']];
	foreach($menu_items as $menu_item) {
		$menu_id = sanitize_title($menu_item->title);
		array_push($menu_ids, [$menu_id, $menu_item->title]);
  		if ($menu_item->type === 'taxonomy' && $menu_item->object === 'craft') {
			$craft = get_term($menu_item->object_id, CRAFT_TAX_NAME);
			rp_render('archive', [
				'postTypeName'=> 'project', 
				'craft' => $craft, 
				'classes' => 'rp-HomeSection u-mw-30em-xl-down js-archiveFragmentURL',
				'id' => $menu_id,
				'headingLevel' => 2
				], ['project', rp_get($craft, 'slug')]); 
  		} elseif ($menu_item->type === 'post_type_archive') {
			if ($menu_item->object !== ARTWORK_TYPE) {
				$craft = get_term_by('slug', CRAFT_TERM_LETTERING, CRAFT_TAX_NAME);
			} else { 
				$craft = null;
			}
			rp_render('archive', [
				'postTypeName' => $menu_item->object, 
				'craft' => $craft, 
				'classes' => 'rp-HomeSection u-mw-30em-xl-down js-archiveFragmentURL',
				'id' => $menu_id,
				'headingLevel' => 2
			], [$menu_item->object, rp_get($craft, 'slug')]);
		} elseif ($menu_item->type === 'post_type') {
			$post = get_post($menu_item->object_id);
			if (rp_is_posts_archive_page($post->ID)) {
				$craft = get_term_by('slug', CRAFT_TERM_LETTERING, CRAFT_TAX_NAME);
				rp_render('archive', [
					'postTypeName' => 'post', 
					'craft' => $craft, 
					'classes' => 'rp-HomeSection u-mw-30em-xl-down js-archiveFragmentURL', 
					'id' => $menu_id,
					'headingLevel' => 2
				],['post', rp_get($craft, 'slug')]);
			}  elseif ($post->post_type === 'page') { ?>
				<section id="<?php echo $menu_id; ?>" 
						 class="rp-HomeSection u-mw-30em-xl-down js-archiveFragmentURL" data-inview>
				 <?php rp_render('page', [
				   'post' => $post, 
				   'headingLevel' => 2
				 ], [$post->post_name]); ?>
				 </section>
			<?php 
			}
		}
	}?>
</div>
<?php rp_render('homeMenu', ['items' => $menu_ids]); ?>

