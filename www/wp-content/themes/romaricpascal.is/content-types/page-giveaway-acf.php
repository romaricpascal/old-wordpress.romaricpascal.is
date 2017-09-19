<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_giveaway',
		'title' => 'Giveaway',
		'fields' => array (
			array (
				'key' => 'field_59bfdaec9a8b4',
				'label' => 'End date',
				'name' => 'end_date',
				'type' => 'date_picker',
				'date_format' => 'yy-mm-dd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_59bff2e83ce04',
				'label' => 'Tweet text',
				'name' => 'tweet_text',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
