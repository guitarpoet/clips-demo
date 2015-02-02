<?php namespace Demo\Controllers; in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

use Clips\Controller;

class TestController extends Controller {
	public function index_form() {
	}
	public function index_ajax_form() {
	}
	public function index_ajax() {
	}
	public function index($arg = null) {
		echo "Hello";
	}
}
