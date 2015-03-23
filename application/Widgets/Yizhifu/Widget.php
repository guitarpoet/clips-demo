<?php namespace Demo\Widgets\Yizhifu; in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

class Widget extends \Clips\Widget {
	protected function doInit() {
		$js = 
<<<TEXT

	//====================================
	// Initializing YiZhiFu
	//====================================
	$('.listview.clips-listview').on('list.loaded', function(e, list, opt){
		if($.isFunction($.fn.picture)) {
			$('figure,picture').picture();
		}
	});
	$('.listview.clips-listview').on('list.resize', function(){
		if($.isFunction($.fn.picture)) {
			$('figure,picture').picture();
		}
	});		
//	$('.listview.clips-listview').on('list.init', function(){
//		var listviewApi = $(this).data('api');
//		listviewApi.clear();
//	});
	function checkTargetInElement(e) {
		var self = $(e.target);
		var isInside = false;
		var element = $(e.data.ele);
		element.each(function(i, ele){
			if($.contains(element[0], e.target)) {
				isInside = true;
				return false;
			}
		});
		if(!isInside) {
			element.trigger('check.out');
		}else {
			element.trigger('check.in');
		}
	}
	$(document).on('click', {ele: '.listview.clips-listview'} ,checkTargetInElement);
	$('.listview.clips-listview').on('check.out', function(e){});
	$('.listview.clips-listview').on('check.in', function(e){
		var self = $(this);
		self.on('click', '.ui-selectee.listview_item', function(e){
			$(this).addClass('ui-selected').siblings().removeClass('ui-selected');
		});
	});
TEXT;
		\Clips\context('jquery_init', $js, true);

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
	}
}
