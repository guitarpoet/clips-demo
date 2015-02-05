<?php in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

function smarty_function_elapsed_time($params, $template) {
	global $BM;
	return $BM->elapsed_time('total_execution_time_start', 'total_execution_time_end');
}