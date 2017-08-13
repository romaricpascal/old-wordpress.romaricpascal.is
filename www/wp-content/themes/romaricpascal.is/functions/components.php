<?php

	define('COMPONENTS_ROOT', 'components');

	function rp_locate_component($component, $modifiers) {
		if (empty($modifiers)) {
			$path = COMPONENTS_ROOT."/{$component}.php";
			return locate_template($path);
		}

		$path = COMPONENTS_ROOT.'/'.$component."-".join('-',$modifiers).'.php';
		$template = locate_template( $path );
		if (!empty($template)) {
			return $template;
		}
		array_pop($modifiers);
		return rp_locate_component($component, $modifiers);
	}

	function rp_render($component, $data, $modifiers = []) {
		$template = rp_locate_component($component, $modifiers);
		if (!empty($template)) {
			extract($data);
			require($template);
		}
	}
