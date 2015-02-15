<?php namespace Demo\Controllers; in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

use Clips\Controller;
use Clips\Resource;

/**
 * @Clips\Widget({"Bootstrap", "Form"})
 * @Clips\Meta(key = "hello", value = "world")
 */
class TestController extends Controller {

	/**
	 * @Clips\Widget({"Demo"})
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

	/**
	 * @Clips\Form({"test"})
	 */
	public function form_form() {
		var_dump($this->request->param());
	}

	/**
	 * @Clips\Widget({"Form", "Jquery"})
	 * @Clips\Form({"test"})
	 * @Clips\Js("application/static/js/test")
	 * @Clips\Context(key = "jquery_init", value = "console.info('hello');")
	 */
	public function form() {
		return $this->render("form_sample");
	}

	/**
	 * @Clips\Form(get = true, value = "test")
	 */
	public function valid() {
		echo "Fine";
	}

	public function redi() {
		return $this->redirect(\Clips\site_url('test'));
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
