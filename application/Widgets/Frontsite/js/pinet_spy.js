;(function ( $, window, document, undefined ) {

	var pluginName = 'spy',
		defaults = {
			scrollClass: "active",
			containerSel: "#fullpage",
			menuSel: "#menu"
		};
	
	var $window = $(window);
	var sectionsel = [];
	var scrollHandler = null;
	
	function Plugin( element, options ) {
		var _this = this;
		
		this.element = element;

		this.options = $.extend( {}, defaults, options) ;

		this._defaults = defaults;
		this._name = pluginName;

		var $fullpage = $(_this.options.containerSel);
		var $menubar = $(_this.element);
		var $menu = $menubar.find(_this.options.menuSel);
		
		var section = this.options.sections;

		if($.isArray(section) && section.length > 0) {

			$.each(section, function(i){
				var $section = $("#"+section[i]);
				sectionsel.push($section);
			});

			scrollHandler = function() {
				var options = {};
				var menubarheight = 0;

				if ( arguments[0] instanceof  jQuery.Event ) {
					options = arguments[0].data.options;
				}
				else {
					options = arguments[0];
				}

				menubarheight = $menu.outerHeight();

				var windowScrollTop = $window.scrollTop() + menubarheight;

				if($window.scrollTop() > ( $fullpage.offset().top - menubarheight ) ) {
					if ( options.menubarfixed ) {
						$menubar.addClass('fixed');
					}

					if ($menubar.css('position') == 'fixed') {
						$fullpage.css({
							"top": menubarheight
						});
					}

					for ( var i = sectionsel.length - 1; i > -1; i-- ) {
						if(windowScrollTop > sectionsel[i].offset().top - Math.max(10, sectionsel[i].outerHeight() / 140)  ) {
							$menu.find("li").removeClass(options.scrollClass);
							$menu.find("li").filter("[scroll-for="+section[i]+"]").addClass(options.scrollClass);
							return false;
						}
					}
				}
				else {
					$menubar.removeClass('fixed');
					$fullpage.css({
						"top": 0
					});
				}
			};

			this.init();			
			
		}
	}
	
	Plugin.prototype.init = function () {
		var _this = this;
		_this.enable();
	};
	
	Plugin.prototype.enable = function() {
		var _this = this;
		scrollHandler(_this.options);
		$window.on('scroll', { options: _this.options }, scrollHandler);		
	};
	
	Plugin.prototype.disable = function() {
		$window.scroll(function(){
			$menubar.removeClass("fixed");
		});
		$window.off('scroll', scrollHandler);
	};
	
	Plugin.prototype.menubarStatic = function() {
		$window.scroll(function(){
			$menubar.removeClass("fixed");
		});		
		$menubar.removeClass('fixed');
		$fullpage.css({
			"top": 0
		});		
	};
	
	Plugin.prototype.switchmode = function(mode) {
		var _this = this;
		if (mode == 'pc') {
			_this.options.menubarfixed = true;
		} else {
			_this.options.menubarfixed = false;
		}
	};

	$.fn[pluginName] = function ( options ) {
		return this.each(function () {
			if (!$.data(this, 'plugin_' + pluginName)) {
				$.data(this, 'plugin_' + pluginName,
					new Plugin( this, options ));
			}
		});
	}

})( jQuery, window, document );