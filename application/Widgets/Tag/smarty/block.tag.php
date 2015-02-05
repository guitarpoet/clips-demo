<?php in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

function smarty_block_tag($params, $content = '', $template, &$repeat) {
	if($repeat) {
		return;
	}

	$tag = get_default($params, 'tag', 'span');

	if(isset($params['tag'])) {
		unset($params['tag']);
	}

	$show = get_default($params, 'show', 'default');

	if(!isset($params['title'])) {
		$params['title'] = trim(strip_tags($content));
	}

	return Clips\create_tag($tag, $params, array(
		'class'=>['label', 'label-'.$show]
	), $content);
}