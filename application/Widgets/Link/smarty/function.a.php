<?php in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

function smarty_function_a($params, $template) {
	$uri = get_default($params, 'uri', '');
	$title = lang(get_default($params, 'title', ''));
	unset($params['uri']);
	// return anchor($uri, $title, $params);
}