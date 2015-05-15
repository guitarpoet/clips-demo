$(function(){
	var url = window.location.hostname + window.location.pathname;

	function renderSelect(sel, data) {
		var str = '';
		var template = '<option>{{name}}</option>';

		for (var i = 0; i < data.length; i++) {
			if($.isPlainObject(data[i])) {
				
			}
			str += template.replace('{{name}}', data[i]);
		}

		$(sel).append(str);

		redraw(sel);
	}

	function renderCaption(sel) {
		var str = '';
		var template = '<option control="optionhead">{{name}}</option>';	
		str = template.replace('{{name}}', '~');

		$(sel).find('option').remove();

		$(sel).append(str);
	}
	
	function redraw(sel) {
		var selectbox = $(sel).data('selectBox-selectBoxIt');
		selectbox.refresh();		
	}
	
	$.fn.casecadeSelect = function(watching, options) {
		var self = $(this);
		
		var defaults = {
			form: 'select',
			template: '<option>{{name}}</option>',
			onChange: function(){}
		};
		
		var op = $.extend({}, defaults, options);
		
		self.on('change', function(){
			var value = self.val();
			var field = $(watching).parent().parent().attr('field');
			var form = op.form;
			if(self.find('option:selected').attr('control') != 'optionhead') {
				renderCaption(watching);
				$.post(url, {
					form: form,
					field: field,
					cascade_value: value
				}, function(data){
					renderSelect(watching, data);
				}, 'json');
				if($.isFunction(op.onChange)) {
					op.onChange();
				}				
			}
			else {
				if($.isFunction(op.onSelectCaption)) {
					op.onSelectCaption();	
				}
			}
		});
	};
	
	$('#field_province').casecadeSelect('#field_city', {
		onChange: function(){
			renderCaption('#field_district');
			redraw('#field_district');
		}
	});
	$('#field_city').casecadeSelect('#field_district', {
		onSelectCaption: function() {
			renderCaption('#field_district');
			redraw('#field_district');
		}
	});
});