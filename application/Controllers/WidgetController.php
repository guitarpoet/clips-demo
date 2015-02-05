<?php namespace Demo\Controllers; in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

use Clips\Controller;
use Clips\Resource;

class WidgetController extends Controller {

	/**
	 * @Clips\Js({"https://code.jquery.com/jquery-2.1.3.js"})
	 * @Clips\Widget({"Demo"})
	 * @Clips\Scss({"test"})
	 */
	public function index() {
		$data = array("world" => "Jack");
		return $this->render("tests/index", $data);
	}

	/**
	 * @Clips\Widget({"html", "Bootstrap"})
	 */
	public function bootstrap() {
		return $this->render("tests/bootstrap", array());
	}

	/**
	 * @Clips\Widget({"html", "Image"})
	 */
	public function bootstrapcommon() {
		return $this->render("tests/bootstrapcommon", array());
	}

	/**
	 * @Clips\Widget({"Html", "Action"})
	 */
	public function action() {
		return $this->render("tests/action", array());
	}

	/**
	 * @Clips\Widget({"Html", "BootstrapAlert"})
	 */
	public function alert() {
		// var_dump(clips_context('scss'));
		return $this->render("tests/alert", array());
	}
}