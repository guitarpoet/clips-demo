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
     * @Clips\Widget({"grid", "SelectBoxIt"})
	 */
	public function datatable() {
		return $this->render('datatable');
	}

	/**
	 * @Clips\Widgets\ListView("demo")
	 * @Clips\Widget("grid", "lang")
	 */
	public function listview() {

		\Clips\context('current_bundle', 'zh-CN');
		
		$js = <<<TEXT
			$('.listview.clips-listview').on('list.beforeDraw', function(e, list, data){
				$.each(data.data, function(i, item){
//					handle data
				});
			});		
		
//			$('.listview.clips-listview').on('list.loaded', function(e, list, data){
//				// get all listview item
//				var items = list.children('.listview_item').not('.listview_item_template');
//				console.log(items);
//			});
TEXT;
		
		\Clips\clips_context('jquery_init', $js, true);
		
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
        \Clips\context('resolutions', array('mobile'=>320));
        return $this->render('grid');
    }

	/**
	 * @Clips\Widget({"navigation"})
	 * @Clips\Context(key="test_data", value="actions")
	 * @Clips\Object("testData")
	 */
	public function navigation() {
		$actions = array(
			$this->testdata->action1,
			$this->testdata->action2,
			$this->testdata->action3
		);
		return $this->render('navigation', array('actions' => $actions));
	}

	/**
	 * @Clips\Widget({"navigation", "navigationbar"})
     * @Clips\Context(key="test_data", value="actions")
     * @Clips\Object("testData")
	 */
	public function bar() {
        $actions = array(
            $this->testdata->action1,
            $this->testdata->action2,
            $this->testdata->action3
        );
        return $this->render('bar', array('actions' => $actions));
	}

	/**
	 * @Clips\Widget({"html", "grid", "navigation", "markup", "scaffold"})
	 * @Clips\Scss({"doc"})
	 */
	public function doc() {
		return $this->render('doc');
	}

	/**
	 * @Clips\Widget({"html"})
	 * @Clips\Scss({"error"})
	 */
	public function showerror() {
		return $this->render('error/notification');
	}

	/**
	 * @Clips\Form("test")
	 * @Clips\Widget({"html"})
	 */
	public function phone() {
		return $this->render('phone');
	}

	/**
	 * @Clips\Widget({"html"})
	 * @Clips\Scss({"404"});
	 */
	public function show404() {
		return $this->render('404');
	}

	/**
	 * @Clips\Widget({"html", "image"})
	 */	
	public function pic() {
		return $this->render('pic');
	}

	/**
	 * @Clips\Widget({"html", "alert", "owlcarousel"})
	 */
	public function notice() {
		return $this->render('notice');
	}

	/**
	 * @Clips\Widget({"html", "Image"})
	 * @Clips\Scss({"show"})
	 * @Clips\Widget({"greensock"})
	 * @Clips\Js({ "application/static/js/canvasbg"})
	 */
	public function show() {
		return $this->render('show');
	}

	/**
	 * @Clips\Widget({"html", "Image"})
	 * @Clips\Scss({"page"})
	 * @Clips\Widget({"greensock"})
	 */
	public function page() {
		return $this->render('page');
	}	

	/**
	 * @Clips\Widget({"html", "grid"})
	 * @Clips\Scss({"flex"});
	 */
	public function flex() {
		$metas = array(
			'http-equiv="X-UA-Compatible" content="IE=edge"',
			'name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"',
			'name="renderer" content="webkit"',
			'http-equiv="Cache-Control" content="no-siteapp"',
			'name="mobile-web-app-capable" content="yes"',
			'name="apple-mobile-web-app-capable" content="yes"',
			'name="apple-mobile-web-app-status-bar-style" content="black"',
			'name="apple-mobile-web-app-title" content="Yizhifu"'
		);
		foreach ($metas as $meta) {
			\Clips\context('html_meta', array($meta), true);
		}		
		
		return $this->render('flex');
	}	
	
}
