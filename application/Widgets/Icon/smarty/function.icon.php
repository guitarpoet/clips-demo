<?php in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

function smarty_function_icon($params, $template) {
	$type = get_default($params, 'type');

	$tag = get_default($params, 'tag', 'i');

	if(isset($params['tag'])) {
		unset($params['tag']);
	}

	$params['aria-hidden'] = 'true';
	return Clips\create_tag($tag, $params, array(
		'class'=> ['glyphicon', 'glyphicon-'.$type]
	), '');
}