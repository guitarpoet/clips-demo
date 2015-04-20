<?php in_array(__FILE__, get_included_files()) or exit("No direct script access allowed");

\Clips\require_widget_smarty_plugin('html', 'div');

function smarty_block_slider($params, $content = '', $template, &$repeat) {
	if($repeat) {
		\Clips\clips_context('indent_level', 1, true);
		return;
	}
	
	$default = array(
		'class' => 'slider'
	);

	$true = true;
	$content = "\t".Clips\process_list_items($params, $content, $template);

	if(isset($params['items']))
		unset($params['items']);
	
	// Add message div

	// Open message div
	smarty_block_div(array('u' => 'slides'), $content, $template, $true);
	
	// Close controls
	$controls = smarty_block_div(array('u' => 'slides'), $content, $template, $repeat);	

	\Clips\context_pop('indent_level');
	return \Clips\create_tag('div', $params, $default, $controls);
}