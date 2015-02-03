<?php namespace Demo\Controllers; in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

use Clips\Controller;
use Clips\Resource;

class TestController extends Controller {
	public function index() {
		$data = array("world" => "Jack");
		$engine = null;
		if(isset($_GET['mus']))
			$engine = 'mustache';
		if(isset($_GET['mustache'])) {
			return $this->render("welcome_mustache", $data, 'mustache');
		}
		return $this->render("welcome", $data, $engine);
	}

	/** @Clips\Rules("sample") */
	public function rule() {
		$this->clips->assertFacts(array("hello", "world"));
	}
}
