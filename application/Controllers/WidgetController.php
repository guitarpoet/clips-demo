<?php namespace Demo\Controllers; in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

use Clips\Controller;
use Clips\Resource;

/**
 * @Clips\Widget({"html"})
 */
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
	 * @Clips\Widget({"Html", "Alert"})
	 */
	public function alert() {
		// var_dump(clips_context('scss'));
		return $this->render("tests/alert", array());
	}

	/**
	 * @Clips\Widget({"Html", "Banner"})
	 */
	public function banner() {
		return $this->render("tests/banner", array());
	}

	/**
	 * @Clips\Widget({"Html", "Breadcrumb"})
	 */
	public function breadcrumb() {
		return $this->render("tests/breadcrumb", array());
	}

	/**
	 * @Clips\Widget({"Html", "Videojs"})
	 */
	public function videoad() {
		return $this->render("tests/videoad", array());
	}

	/**
	 * @Clips\Widget({"Html", "Jplayer"})
	 */
	public function jplayer() {
		return $this->render("tests/jplayer", array());
	}

	/**
	 * @Clips\Widget({"Html", "Responsive"})
	 */
	public function responsive() {
		return $this->render("tests/responsive", array());
	}

	/**
	 * @Clips\Widget({"Html", "Icon"})
	 */
	public function icon() {
		return $this->render("tests/icon", array());
	}

	/**
	 * @Clips\Widget({"Html", "Nav"})
	 */
	public function nav() {
		return $this->render("tests/nav", array());
	}

	/**
	 * @Clips\Widget({"Html", "Tag"})
	 */
	public function tag() {
		return $this->render("tests/tag", array());
	}

	/**
	 * @Clips\Widget({"Html", "Button"})
	 */
	public function button() {
		return $this->render("tests/button", array());
	}

	/**
	 * @Clips\Widget({"Html", "Link"})
	 */
	public function link() {
		return $this->render("tests/link", array());
	}

	/**
	 * @Clips\Widget({"Html", "BootstrapGrid"})
	 */
	public function grid() {
		return $this->render("tests/grid", array());
	}

    /**
     * @Clips\Widget({"Tablelayout"})
     */
    public function table() {
        return $this->render("tests/table", array());
    }

    /**
     * @Clips\Widget({"grid", "Bootstrap", "Datepicker"})
     * @Clips\Form("test")
     */
    public function date() {
        return $this->render("tests/date", array());
    }

	public function ajax() {
		$request = $this->post();

		$data = $request;

		return $this->json($data);
	}

}
