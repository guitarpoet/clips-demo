<?php in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

function smarty_function_spinner__input($params, $template) {
	$default = array(
		'type'=>'text',
		'data-rule'=>'quantity'
	);

	\Clips\context_pop('indent_level');
	return \Clips\create_tag('input', $params, $default, '');
}