<?php in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

require_widget_smarty_plugin('image', 'picture');

function smarty_function_action($params, $template) {
	echo 2;
}
