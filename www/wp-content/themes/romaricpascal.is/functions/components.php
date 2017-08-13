<?php

	define('COMPONENTS_ROOT', 'components');

	function rp_locate_component($template, $modifiers) {
		if (empty($modifiers)) {
			return locate_template("{COMPONENTS_ROOT}/{$template}.php");
		}

		$filename = COMPONENTS_ROOT.'/'.$template."-".join('-',$modifiers).'.php';
		$template = locate_template( $filename );
		if (template) {
			return $template;
		}

		return rp_locate_component($template, array_pop($modifiers));
	}

	function rp_render($component, $data, $modifiers) {
		$template = rp_locate_component($component, $modifiers);
		if ($template) {
			extract($data);
			require($template);
		}
	}
