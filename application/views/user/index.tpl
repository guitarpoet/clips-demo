{extends file="../base-layout.tpl"}
	{block name="main"}
		{container}
			{button role="datatable-delete" for="user" uri="/user/delete"}
				{lang}delete{/lang}
			{/button}
			{a uri="/user/create"}
				{lang}add{/lang}
			{/a}
			{datatable name="user"}
		{/container}
	{/block}
