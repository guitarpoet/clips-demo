+function($) {
	Clips.Layer = function(datasource, node) {
		this.ds = datasource;
		this.node = node;
		this.template = $('script[type="text/x-handlebars-template"]', this.node);
		$(this.node).data('layer', this);
		this.init();
	};

	Clips.Layer.prototype = {
		level: function() {
			return $(this.node).data('level');
		},
		init: function() {
			if(this.ds) {
				var self = this;
				this.ds.loadLayer(this.level(), function(items){
					self.showItems(items);
				});
			}
		},
		clearItems: function() {
			$("li", this.node).remove();
		},
		showItems: function(items) {
			var template = $('script[type="text/x-handlebars-template"]', this.node);
			var self = this;
			if(template.length > 0) {
				template = template.html().trim();

				var path = '/';
				if(self.path)
					path = self.path;

				$(self.node).append(self.createItem(template, {name: 'All', path: path}));

				$(items).each(function(i, data) {
					$(self.node).append(self.createItem(template, data));
				})
			}
		},
		getNextLayer: function() {
			var level = $(this.node).data('level');
			var layer = $('ul[data-level="' + ++level + '"]');
			if(layer.length) {
				return layer.data('layer');
			}
			return null;
		},
		createItem: function(template, data) {
			var item = $(S(template).template(data, '_(', ')').toString());
			var self = this;
			item.click(function() {
				$(this).addClass('active').siblings().removeClass('active');
				var next = self;
				while(true) {
					next = next.getNextLayer();
					if(next) {
						next.path = $(this).data('id');
						next.clearItems();
						self.ds.loadChildren($(this).data('id'), next.level(), function(items){
							next.showItems(items);
						});
					}
					else {
						break;
					}
				}
			});
			return item;
		}
	}	
}(jQuery);