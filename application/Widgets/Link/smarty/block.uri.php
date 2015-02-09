<?php in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

function smarty_block_uri($params, $content = '', $template, &$repeat) {
	if($repeat)
		return;
	return site_url($content);
}