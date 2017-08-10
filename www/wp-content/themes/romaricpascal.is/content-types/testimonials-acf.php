<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_testimonial-author',
		'title' => 'Testimonial author',
		'fields' => array (
			array (
				'key' => 'field_598c86f637f5c',
				'label' => 'Author',
				'name' => 'author',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598c86fc37f5d',
				'label' => 'Company',
				'name' => 'company',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598c870537f5e',
				'label' => 'Company URL',
				'name' => 'companyUrl',
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
					'value' => 'testimonial',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'custom_fields',
			),
		),
		'menu_order' => 0,
	));

	if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_testimonial-project',
		'title' => 'Testimonial project',
		'fields' => array (
			array (
				'key' => 'field_598c889ec1498',
				'label' => 'Project',
				'name' => 'project',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'project',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'testimonial',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'custom_fields',
			),
		),
		'menu_order' => 0,
	));
}

}

