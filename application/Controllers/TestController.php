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
	 * @Clips\Widget({"grid", "image", "lang", "yizhifu"})
	 */
	public function listview() {

		\Clips\context('current_bundle', 'zh-CN');
		
		$js = <<<TEXT
	var layer = $('ul.layer');
	var ds = new Clips.AjaxDataSource();

	layer.each(function(){
		new Clips.Layer(ds, this);
	});

	layer.on('click', 'li.active',  function(){
		var api = $('#user').data('api');
		api.columnSearch(1, "Jack");
	});

	layer.on('list.tags.always-active', function(){
		console.log('always-active');
	});		
TEXT;
		
		\Clips\clips_context('jquery_init', $js, true);
		
		return $this->render('listview');
	}

	public function listview_ajax() {
		$json = <<<TEXT
[
		{
			"id": 1,
			"name": "A",
			"layer": 1,
			"path": "/[1]"
		},
		{
			"id": 2,
			"name": "B",
			"layer": 1,
			"path": "/[2]"
		},
		{
			"id": 3,
			"name": "A1",
			"layer": 2,
			"path": "/[1]/[3]"
		},
		{
			"id": 4,
			"name": "A2",
			"layer": 2,
			"path": "/[1]/[4]"
		},
		{
			"id": 5,
			"name": "A11",
			"layer": 3,
			"path": "/[1]/[3]/[5]"
		},
		{
			"id": 6,
			"name": "A12",
			"layer": 3,
			"path": "/[1]/[3]/[6]"
		},
		{
			"id": 7,
			"name": "A21",
			"layer": 3,
			"path": "/[1]/[4]/[7]"
		},
		{
			"id": 8,
			"name": "A22",
			"layer": 3,
			"path": "/[1]/[4]/[8]"
		},
		{
			"id": 9,
			"name": "A111",
			"layer": 4,
			"path": "/[1]/[3]/[5]/[9]"
		},
		{
			"id": 10,
			"name": "A112",
			"layer": 4,
			"path": "/[1]/[3]/[5]/[10]"
		}
	]
TEXT;
		$path = $this->request->param('path');
		$level = $this->request->param('level', null);
		$json = \Clips\parse_json($json);

		$ret = array();

		if($level !== null) {
			foreach($json as $item) {
				if($item->layer == $level) {
					if($path) {
						if(strpos($item->path, $path) !== 0)
							continue;
					}
					$ret []= $item;
				}
			}
		}
		else {
			$ret = $json;
		}
		return $this->json($ret);		
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
	    \Clips\context('resolutions', array('320', '480', '640', '720' => 'pad', '1280', '1440' => 'pc', '1920', '2880'));

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
	 * @Clips\Widget({"navigation", "navigationbar", "bootstrapCommon"})
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
	 * @Clips\Widget({"greensock", "morphingmodal"})
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

	/**
	 * @Clips\Widget({"bootstrap", "BootstrapCollapse"})
	 */
	public function bts() {
		return $this->render('bts');
	}

	/**
	 * @Clips\Widget({"html", "grid", "frontsite"})
	 */
	public function fullpage() {
		\Clips\context('resolutions', array('320', '480', '640', '720' => 'pad', '1280' => 'pc', '1440', '1920', '2880'));
		
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
		
		return $this->render('fullpage');
	}

	/**
	 * @Clips\Widget({"html", "Image", "jdatagrid"})
	 * @Clips\Scss({"jqwall"})
	 */
	public function jqwall() {
		return $this->render("jqwall", array(
			'items' => range(1, 10)
		));	
	}
	
	
	public function ld() {
		$data = [
			[
				"id"=>1,
				"name"=>"A",
				"layer"=>1,
				"path"=>"/[1]"
			],
			[
				"id"=>2,
				"name"=>"B",
				"layer"=>1,
				"path"=>"/[2]"
			],
			[
				"id"=>3,
				"name"=>"A1",
				"layer"=>2,
				"path"=>"/[1]/[3]"
			],
			[
				"id"=>4,
				"name"=>"A2",
				"layer"=>2,
				"path"=>"/[1]/[4]"
			],
			[
				"id"=>5,
				"name"=>"A11",
				"layer"=>3,
				"path"=>"/[1]/[3]/[5]"
			],
			[
				"id"=>6,
				"name"=>"A12",
				"layer"=>3,
				"path"=>"/[1]/[3]/[6]"
			],
			[
				"id"=>7,
				"name"=>"A21",
				"layer"=>3,
				"path"=>"/[1]/[4]/[7]"
			],
			[
				"id"=>8,
				"name"=>"A22",
				"layer"=>3,
				"path"=>"/[1]/[4]/[8]"
			],
			[
				"id"=>9,
				"name"=>"A111",
				"layer"=>4,
				"path"=>"/[1]/[3]/[5]/[9]"
			],
			[
				"id"=>10,
				"name"=>"A112",
				"layer"=>4,
				"path"=>"/[1]/[3]/[5]/[10]"
			]			
		];
		
		echo json_encode($data);
	}
}
