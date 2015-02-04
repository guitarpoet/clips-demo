<?php namespace Demo\Controllers; in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

use Clips\Controller;
use Clips\Resource;

class TestController extends Controller {

	/**
	 * @Clips\Js({"https://code.jquery.com/jquery-2.1.3.js"})
	 * @Clips\Widget({"Html", "Demo"})
	 * @Clips\Scss({"test"})
	 */
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

	public function redi() {
		return $this->redirect(\site_url('test'));
	}

	public function json() {
		return $this->render("", array('hello' => 'world'), 'json');
	}

	public function url() {
		$router = $this->tool->context('router');
		echo \base_url('test');
	}

	/**
	 * @Clips\Widget({"Html"})
	 */
	public function widget() {
		return $this->render("welcome");
	}

	/** @Clips\Rules("sample") */
	public function rule() {
		$this->clips->assertFacts(array("hello", "world"));
	}
}
