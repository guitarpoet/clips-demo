<?php in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

function smarty_function_site_url($params, $template) {
	return site_url($params['url']);
}