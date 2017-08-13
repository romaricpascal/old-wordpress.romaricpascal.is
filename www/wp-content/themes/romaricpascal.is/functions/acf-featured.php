<?php
add_action('init', function () {
if(function_exists("register_field_group"))
	{
		register_field_group(array (
			'id' => 'acf_home-page-featuring',
			'title' => 'Home page featuring',
			'fields' => array (
				array (
					'key' => 'field_59901fe0dbad6',
					'label' => 'Featured on home',
					'name' => 'featured_on_home',
					'type' => 'true_false',
					'message' => '',
					'default_value' => 0,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'user_type',
						'operator' => '==',
						'value' => 'administrator',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'side',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
	}
});

function rp_query_featured_posts($postTypeName, $number) {
	$query = [
		'post_type' => $postTypeName,
		'posts_per_page' => $number,
		'featured_clause' => [
			'relation' => 'OR',
			['key' => 'featured_on_home',
			'compare' => 'EXISTS'],
			['key' => 'featured_on_home']
		],
		'order_by' => [
			'featured_on_home' => 'DESC',
			'post_date' => 'DESC'
		]
	];

	return new WP_Query($query);
}
