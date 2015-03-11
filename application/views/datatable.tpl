{html}
	{head title='DataTable Sample'}
		{context key='css'}
	{/head}
	{body}
		{container}
			{row}
				{h1}DataTable Sample{/h1}
			{/row}
			{row}
				{button role="datatable-delete" for="demo" uri="/widget/ajax"}删除{/button}
			{/row}
			{row}
				{datatable name='demo'}
			{/row}
		{/container}
		{js}
        <script>
            window.DataTableManager = { };

			window.DataTableManager.getPrimaryKeyColumn = function(datatable, settings) {
				var primaryKey = [];
				var columns = settings.aoColumns;

				$.each(columns, function(index, col){
					if(col.hasOwnProperty('primary') && col.primary) {
						primaryKey.push(col);
					}
				});

				if(primaryKey.length == 0) {
					return columns[0];
				}

				return primaryKey[0];
			};

			window.DataTableManager.getPrimaryKeyColumnKey = function(datatable, settings) {
				var column = window.DataTableManager.getPrimaryKeyColumn(datatable, settings);
				return column.data;
			};

			window.DataTableManager.getPrimaryKeyColumnIndex = function(datatable, settings) {
				var column = window.DataTableManager.getPrimaryKeyColumn(datatable, settings);
				return column.idx;
			};

			window.DataTableManager.getSelectedItemsPrimaryKeys = function(datatable, settings) {
				var pk = window.DataTableManager.getPrimaryKeyColumnIndex(datatable, settings);
				var selectedItems = datatable.find('tr.ui-selected');
				var ctr = datatable.find('tr');
				var keys = [];
//				var data = datatable.DataTable().column(pk).data();

				if (selectedItems.length > 0) {
					selectedItems.each(function (i) {
						var self = $(this);
						var ctd = datatable.find('tr.ui-selected').eq(i).find('td').eq(pk);
						var dtd = datatable.DataTable().cell(ctd).data();

						if (dtd) {
							keys.push(dtd);
						}
					});
				}

				if (keys.length > 0) {
					return keys;
				}

				return false;
			};

			$('[role=datatable-delete]').on('click', function(){
				var forname = $(this).attr('for');
				var datatable = $('.datatable[name='+forname+']');
				var settings = datatable.DataTable.settings[0];
				var ajaxurl = Clips.siteUrl($(this).attr('uri'));
				var pks = window.DataTableManager.getSelectedItemsPrimaryKeys(datatable, settings);
				$.ajax({
					type: "POST",
					url: ajaxurl,
					data: {
						primaryKey: pks
					},
					dataType: "json"
				}).success(function(data){
					datatable.DataTable().draw();
				});
			});
        </script>
	{/body}
{/html}
