<?php namespace Demo\Filters; in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

use Clips\AbstractFilter;

class TestFilter extends AbstractFilter {
	public function filter_before($chain, $controller, $method, $args, $request) {
		echo "Before";
	}
	public function filter_after($chain, $controller, $method, $args, $request) {
		echo "After";
	}
}
