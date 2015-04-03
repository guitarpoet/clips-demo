{html}
    {head}
		{context key='css'}
		<!-- End Of CSS -->
		{block name="header"}{/block}
		<!-- End of Header -->
    {/head}
	{body}
		{block name="head"}{/block}
		<!-- End Of Head -->
		{block name="main"}{/block}
		<!-- End Of Main -->
		{block name="foot"}{/block}
		<!-- End Of Foot -->
		{js}
		<!-- End Of JS -->
		<script>
			function updateItemPosition(owlcarousel) {
				owlcarousel.find('.owlcarousel-item').each(function(i) {
					var self = $(this);
					self.find('.alert').attr('targetposition', i);
				} );
			}			
			
			$('.owl-carousel').each(function(){

				var owl = $(this);

				owl.owlCarousel({
					items: 1,
					afterInit: function(owlcarousel) {
						updateItemPosition(owlcarousel);
					}
				});

				var owlApi = owl.data('owlCarousel');

				owl.on('alert.close', function(e, item){
					var targetPosition = item.attr('targetposition');
					owlApi.removeItem(targetPosition);
					owlApi.jumpTo(targetPosition);
				});				
				
			});
			
			$container = $('.container');
			
			function checkoutContainer(options) {
				var defaults = {
					onMobile: function(){
					},
					onPad: function(){
					},
					onPc: function(){
					}
				};
				
				options = $.extend({ }, defaults, options); 
				
				if($(window).width() < 768) {
					$container.removeClass('pc pad').addClass('mobile');
					$container.trigger('screen.mobile');
					options.onMobile();
				}
				else if ( $(window).width() > 767 && $(window).width() < 1281 ) {
//					$container.removeClass('pc mobile').addClass('pad');
					$container.removeClass('pc pad').addClass('mobile');
					$container.trigger('screen.pad');
					options.onPad();
				}
				else {
					$container.removeClass('pad mobile').addClass('pc');
					$container.trigger('screen.pc');
					options.onPc();
				}				
			}

			var options = {
				scrollClass: "active"
			};
			
			var section = [
				"feature",
				"info",
				"member",
				"contact"						
			];

			var $fullpage = $("#fullpage");
			
			var $menubar = $("#menubar");
			var $menu = $menubar.find("#menu");
			var menuOuterHeight = $menubar.outerHeight();
			
			var sectionsel = [];
			
			var sectiontop = [];
			
			$.each(section, function(i){
				sectionsel.push($("#"+section[i]));
				sectiontop.push($("#"+section[i]).offset().top);
				console.log(sectiontop);
			});
			
//			$(window).off('scroll', 'scrollHandler');
			
			function nextShowSel(onTop) {
//				for (var i = 0; i < sectionsel.length; i++) {
//
//					if (i - 1 < 0) {
//						prev = 0;
//					}
//					else {
//						prev = i - 1;
//					}
//
//					if (onTop > sectionsel[prev].outerHeight()) {
//						$menu.find("li").removeClass(options.scrollClass);
//						$menu.find("li").filter("[scroll-for=" + section[prev + 1] + "]").addClass(options.scrollClass);
//						return i;
//					}
//				}

				for ( var i = sectionsel.length - 1; i > -1; i-- ) {
					var self = sectionsel[i];
					if(i - 1 < 0) {
						prev = 0;
					}
					else {
						prev = i - 1;
					}
					if( $(window).scrollTop() > self.offset().top - menuOuterHeight - sectionsel[prev].outerHeight() / 10) {
						$menu.find("li").removeClass(options.scrollClass);
						$menu.find("li").filter("[scroll-for="+section[i]+"]").addClass(options.scrollClass);
						lastScrollTop = $(window).scrollTop();
						return false;
					}
				}				
				
				return false;
			}
			
			var lastScrollTop = 0;
			
			function scrollHandler() {
//				console.log($(window).scrollTop());
//				console.log($fullpage.offset().top);
//				console.log($menubar.outerHeight());
//				console.log($(window).scrollTop());
//				console.log($fullpage.offset().top - menuOuterHeight);
				
//				function calc() {
//					if($(window).scrollTop() - 390  < 0) {
//						return 0;
//					}
//					console.log($(window).scrollTop());
//					console.log($fullpage.offset().top);
//					return ( $(window).scrollTop() - 390 ) / ( $fullpage.outerHeight() - menuOuterHeight * 2 - 30 );					
//				}
				
				if($(window).scrollTop() > lastScrollTop) {
//
					
					var windowScrollTop = $(window).scrollTop() + menuOuterHeight;
					
//					console.log($(window).scrollTop() + menuOuterHeight);
					
////					console.log($(window).scrollTop() - $fullpage.offset().top + menuOuterHeight);
//					
					if($(window).scrollTop() > ( $fullpage.offset().top - menuOuterHeight ) ) {
//						$menu.find('li.scrolling').css({
//							left: calc() * $menubar.width() * 0.8
//						});
						
						$menubar.addClass('fixed');
						$fullpage.css({
							"top": menuOuterHeight
						});

						for ( var i = sectiontop.length - 1; i > -1; i-- ) {
							if(windowScrollTop > sectiontop[i] - Math.max(10, sectionsel[i].outerHeight() / 140)  ) {
								console.log(i);
								$menu.find("li").removeClass(options.scrollClass);
								$menu.find("li").filter("[scroll-for="+section[i]+"]").addClass(options.scrollClass);
								return false;
							}
						}
						
						
//						sectionsel[0].css({
//							"top": menuOuterHeight
//						});
//						for ( var i = sectionsel.length - 1; i > -1; i-- ) {
//							var self = sectionsel[i];
//							if(i - 1 < 0) {
//								prev = 0;
//							}
//							else {
//								prev = i - 1;
//							}
//							if( $(window).scrollTop() > self.offset().top - menuOuterHeight - sectionsel[prev].outerHeight() / 10) {
//								$menu.find("li").removeClass(options.scrollClass);
//								$menu.find("li").filter("[scroll-for="+section[i]+"]").addClass(options.scrollClass);
//								lastScrollTop = $(window).scrollTop();
//								return false;
//							}
//						}
					}
					else {
//						$menu.find('li.scrolling').css({
//							left: 0
//						});						
						
//						$menu.find("li").removeClass(options.scrollClass);
						$menubar.removeClass('fixed');
						$fullpage.css({
							"top": 0
						});
//						sectionsel[0].css({
//							"top": 0
//						});
					}					
//					
				}
//				else {
//					
//					if($(window).scrollTop() > ( $fullpage.offset().top) ) {
//						$menubar.addClass('fixed');
//						sectionsel[0].css({
//							"top": menuOuterHeight
//						});
//						console.log($(window).scrollTop());
//						
////						console.log(sectionsel[1].offset().top + menuOuterHeight);
//						
//						if( $(window).scrollTop() < sectionsel[1].offset().top - menuOuterHeight - sectionsel[prev].outerHeight() / 10 * 7 ) {
//							$menu.find("li").removeClass(options.scrollClass);
//							$menu.find("li").filter("[scroll-for="+section[0]+"]").addClass(options.scrollClass);
//							lastScrollTop = $(window).scrollTop();
//							return false;							
//						}
//						
//						for ( var i = sectionsel.length - 1; i > -1; i-- ) {
//							var self = sectionsel[i];
//							if(i - 1 < 0) {
//								prev = 0;
//								return false;
//							}
//							else {
//								prev = i - 1;
//							}
//							
//							if( $(window).scrollTop() > self.offset().top - menuOuterHeight - sectionsel[prev].outerHeight() / 10 * 9  ) {
//								$menu.find("li").removeClass(options.scrollClass);
//								$menu.find("li").filter("[scroll-for="+section[i]+"]").addClass(options.scrollClass);
//								lastScrollTop = $(window).scrollTop();
//								return false;
//							}
//						}
//					}
//					else {
//						$menu.find("li").removeClass(options.scrollClass);
//						$menubar.removeClass('fixed');
//						sectionsel[0].css({
//							"top": 0
//						});
//					}					
//					
//				}
//				lastScrollTop = $(window).scrollTop();
			}
			
			checkoutContainer({
				onPad: function(){
					$(window).scroll(function(){
						$menubar.removeClass("fixed");
					});
					$(window).off('scroll', scrollHandler);
				},
				onPc: function(){
					scrollHandler();
					$(window).scroll(scrollHandler);
				}
			});
			
			$(window).resize(function(){
				checkoutContainer();
			});
			
			$container.on('screen.pad', function(){
				$menubar.removeClass('fixed');
				$(window).scroll(function(){
					$menubar.removeClass("fixed");
				});
				$(window).off('scroll', scrollHandler);
			});
			
			$container.on('screen.pc', function(){
				scrollHandler();
				$(window).scroll(scrollHandler);				
			});
			
//			$fullpage.fullpage({
////				menu: true,
//				scrollBar: true,
////				navigation: true,
////				navigationPosition: 'right',
////				showActiveTooltips: true,
//
//				fitToSection: false,
//				beforeElement: '#header',
////
//				onLeave: function(index, nextIndex, direction) {
//					var curSection = $fullpage.find('.section').eq(index);
////					$fullpage.find('.section').height(window.innerHeight);
////					curSection.text(index);
//				},
////
//				afterLoad: function(anchorLink, index){
////					$fullpage.find('.section').height(window.innerHeight);
////					$.fn.fullpage.reBuild();
////					console.log(anchorLink);
////					console.log(index);
//				}
////
//			});
		</script>		
	{/body}
{/html}