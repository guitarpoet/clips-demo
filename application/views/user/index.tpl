{extends file="../base-layout.tpl"}
	{block name="main"}
		{container}
			{button caption="删除"}
				{literal}
					var selectedItems = window.DatatableManager.getSelectedItems($('.datatable[name=user]'));
					var id =
					console.dir(selectedItems);
				{/literal}
			{/button}
			{datatable name="user"}
		{/container}
	{/block}