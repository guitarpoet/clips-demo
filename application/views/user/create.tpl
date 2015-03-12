{extends file="../bootstrap-layout.tpl"}
	{block name="toolbar"}
	{/block}
	{block name="workbench"}
		{form name="user_create"}
			{field field="username"}{/field}
			{field field="group_id"}
				{select options=$groups label-field="name" value-field="id"}
				{/select}
			{/field}
			{submit value="add"}
		{/form}
	{/block}