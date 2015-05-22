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
	
	function prependCaption(sel) {
		var str = '';
		var template = '<option control="optionhead">{{name}}</option>';	
		str = template.replace('{{name}}', '~');

		$(sel).prepend(str);
	}

	function appendCaption(sel) {
		var str = '';
		var template = '<option control="optionhead">{{name}}</option>';	
		str = template.replace('{{name}}', '~');

		$(sel).append(str);		
	}

	function selectCaption(sel) {
		$(sel).find('[control=optionhead]').prop('selected', true);
	}

	function removeCaption(sel) {
		$(sel).find('[control=optionhead]').remove();
	}

	function selectOption(sel) {
		$(sel).find('option:not([control=optionhead]):eq(0)').prop('selected', true);
		$(sel).trigger('change');
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
		
		if(self.find('option').length == 0) {
			renderCaption(self);
			renderCaption(watching);
		}

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
					if($.isFunction(op.onChange)) {
						op.onChange(data);
					}				
				}, 'json');
			}
			else {
				if($.isFunction(op.onSelectCaption)) {
					op.onSelectCaption(self);	
				}
			}
		});
	};

	function initliazeSelect(sel) {
		var self = $(sel);
		if(self.find('option[selected]').length < 1) {
			prependCaption(self);
			selectCaption(self);
		}
	}

	initliazeSelect('#field_province');
	
	$('#field_province').casecadeSelect('#field_city', {
		onChange: function(data){
			if(data.length < 1) {
				renderCaption('#field_district');
			}
			else {
				// selectOption('#field_city');
				redraw('#field_city');
			}
			redraw('#field_district');
			renderCaption('#field_district');
			redraw('#field_district');			
		},
		onSelectCaption: function(self) {
			renderCaption('#field_city');
			redraw('#field_city');
			renderCaption('#field_district');
			redraw('#field_district');
		}
	});
	$('#field_city').casecadeSelect('#field_district', {
		onChange: function(data){
			if(data.length < 1) {
				// renderCaption('#field_district');
			}
			else {
				// removeCaption('#field_district');
				redraw('#field_district');
			}
		},		
		onSelectCaption: function(self) {
			renderCaption('#field_district');
			redraw('#field_district');
		}
	});
});