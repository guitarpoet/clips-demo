<?php namespace Demo\Controllers; in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

use Clips\Controller;
use Clips\Resource;

/**
 * @Clips\Widget({"demo", "html", "lang"})
 * @Clips\Meta(key = "hello", value = "world")
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

	public function exc() {
		throw new \Exception('We got an problem!');
	}

	/**
	 * @Clips\HttpSession(key = "hello", value = "world")
	 */
	public function session() {
		echo $this->request->session()->hello;
	}

	/**
	 * @Clips\Form("test")
	 */
	public function form_form() {
		var_dump($this->request->param());
	}

	/**
	 * @Clips\Form("test")
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

	/**
	 * @Clips\Widgets\DataTable("demo")
	 */
	public function datatable() {
		return $this->render('datatable');
	}

	/**
	 * @Clips\Widgets\ListView("demo")
	 * @Clips\Widget("grid")
	 */
	public function listview() {
		return $this->render('listview');
	}

	public function redi() {
		return $this->redirect(\Clips\site_url('test'));
	}

	public function json_test() {
		return $this->json(array('hello' => 'world'));
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

	/**
	 * @Clips\Object("Engine")
	 */
	public function engine() {
		var_dump($this->engine);
	}

	/** @Clips\Rules("sample") */
	public function rule() {
		$this->clips->assertFacts(array("hello", "world"));
	}

    /**
     * @Clips\Widget({"Grid"})
     */
    public function grid() {
        return $this->render('grid');
    }
}
