<?php
	if(function_exists("register_field_group")) {
    register_field_group(array (
      'id' => 'acf_artworks-field',
      'title' => 'Artworks field',
      'fields' => array (
        array (
          'key' => 'field_598872b440424',
          'label' => 'Shop URL',
          'name' => ARTWORK_SHOP_URL_FIELD,
          'type' => 'text',
          'instructions' => 'URL of the design in the shop, if it exists',
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'formatting' => 'none',
          'maxlength' => '',
        ),
        array (
          'key' => 'field_5988730b40425',
          'label' => 'Related project',
          'name' => ARTWORK_RELATED_PROJECT_FIELD,
          'type' => 'relationship',
          'return_format' => 'object',
          'post_type' => array (
            0 => 'project',
          ),
          'taxonomy' => array (
            0 => 'craft:3',
          ),
          'filters' => array (
            0 => 'search',
          ),
          'result_elements' => array (
            0 => 'post_title',
          ),
          'max' => '',
        ),
      ),
      'location' => array (
        array (
          array (
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'artwork',
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