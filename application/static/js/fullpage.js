//sorry for the mess
var current_index = 0,
	index,
	menu,
	menu_items_count,
	mouse_down,
	mouse_start_y,
	pull_step,
	total_pull = 80,
	release = 40,
	pull_release = total_pull + release;

$(document).on('selectstart', false);

$(document).ready(function(){
	var $header = $("#header");
	var $menu = $("#menu");	
	var $menuItems =  $menu.find("li");

	var $header_height = $header.height();
	
	var getItemX = function(index){
		var $item = $menuItems.eq(index);
		var item_offset = $item.offset().left;
		var item_width = $item.outerWidth();
		var menu_offset = $menu.offset().left;
		var screen_width = $(window).width();
		return (menu_offset-item_offset)+(screen_width-item_width)/2;
	};	
	
	$menuItems.each(function(i,e){
		$(this).attr("data-index",i)
	});

	//
	menu = $("#menu").html();
	menu_items_count = $menuItems.length;
	pull_step = total_pull/(menu_items_count-1);
	//

	$menu.attr('showIndex', 0);
	$menu.css("transform","translate3d("+getItemX(0)+"px,0,0)");
	$menuItems.removeClass("show");
	$menuItems.eq(0).addClass("show");
	
	$header.mousedown(function(e){
		var index = 0;
		
		//
		mouse_down = true;
		mouse_start_y = e.pageY;
		//
		
		index = $menu.attr('showIndex');
		
		if(index == menu_items_count-1) {
			index = 0;
		} else {
			var $item = $menuItems.eq(index);
			//$menu.html($("#menu").html());
			//$menuItems.eq($item.attr("data-index")).remove();
			//$item.prependTo($menu);
			//$menuItems.eq(0).addClass("show");
			//$menu.addClass("notrans");
			//$menu.css("transform","translate3d("+getItemX(index)+"px,0,0)");
		}
	});

	$(document).mouseup(function(e){
		if(mouse_down) {

			$menu.attr('showIndex', $menu.find('li.active').attr('data-index'));
			
			//
			mouse_down = false;
			$header.animate({height: $header_height},300);
			$menu.removeClass("show");
			$(".pullmenu-icon").removeClass("hide");
			//
			
			if(index > -1) {

				if(index==menu_items_count-1) { 

					//setTimeout(function(){
					//	$menuItems.removeClass("show");
					//	$menu.css("transform","translate3d("+getItemX(0)+"px,0,0)");
					//
					//	setTimeout(function(){
					//
					//		$menuItems.eq(0).addClass("show");
					//	},500);
					//},1000);

				} else {
					
				}
			}
		}
	});

	$(document).mousemove(function(e){
		var index = 0;
		
		$menu.removeClass("notrans");

		if(mouse_down) {

			if($menu.attr('showIndex') < 0) {
				//index = $menu.attr('showIndex');
				//$menu.attr('showIndex', -1);
				//$menu.css("transform","translate3d("+getItemX(index)+"px,0,0)");
				//$menuItems.removeClass("active");
				//$menuItems.eq(index).addClass("active");
			}
			else {
				var diff = Math.max(0, e.pageY - mouse_start_y);
				if(diff>pull_release) {
					diff = pull_release + (diff-pull_release)/(diff*0.01);
				}

				$header.height($header_height+diff);
				
				index = Math.max(0,Math.min(menu_items_count-1, Math.floor((diff-release)/pull_step)));

				if(diff>pull_release+pull_step*2) {
					index = menu_items_count-1;
				}

				if(diff>release) {
					$menu.addClass("show");
					$("#pullmenu-icon").addClass("hide");
				} else {
					$menu.removeClass("show");
					$("#pullmenu-icon").removeClass("hide");
				}

				//$menu.css("transform","translate3d("+getItemX(index)+"px,0,0)");
				//$menuItems.removeClass("active");
				//$menuItems.eq(index).addClass("active");				
				
			}
			
		}
	});
	
});

