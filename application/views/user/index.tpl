{extends file="../bootstrap-layout.tpl"}
	{block name="toolbar"}
		{button role="datatable-delete" for="user" uri="/user/delete"}
			{lang}delete{/lang}
		{/button}
		{a uri="/user/create"}
			{lang}add{/lang}
		{/a}
	{/block}
	{block name="workbench"}
		{datatable name="user"}
	{/block}
