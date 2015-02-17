<?php namespace Demo\Controllers; in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

use Clips\Controller;
use Clips\Resource;

/**
 * @Clips\Widget({"Form", "Demo"})
 */
class TestController extends Controller {

	/**
	 * @Clips\Scss({"test"})
	 */
	public function index() {
		$data = array("world" => "Jack");
		$engine = null;
		if($this->get('mus'))
			$engine = 'mustache';
		if($this->get('mustache')) {
			return $this->render("welcome_mustache", $data, 'mustache');
		}
		return $this->render("welcome", $data, $engine);
	}

	/**
	 * @Clips\HttpSession(key = "hello", value = "world")
	 */
	public function session() {
		echo $this->request->session()->hello;
	}

	/**
	 * @Clips\Widget({"Bootstrap"})
	 * @Clips\Form({"test"})
	 * @Clips\Context(key = 'jquery_init', value = 'console.info("Hello");');
	 */
	public function form() {
		return $this->render("form_sample");
	}

	public function redi() {
		return $this->redirect(\site_url('test'));
	}

	public function json() {
		return $this->render("", array('hello' => 'world'), 'json');
	}

	public function url() {
		$router = $this->tool->context('router');
		echo \Clips\base_url('test');
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
