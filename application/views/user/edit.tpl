{extends file="../bootstrap-layout.tpl"}
	{block name="toolbar"}
	{/block}
	{block name="workbench"}
		{form name="user_edit"}
			{field field="id" state="hidden"}{/field}
			{field field="username"}{/field}
			{field field="group_id"}
				{select options=$groups label-field="name" value-field="id"}
				{/select}
			{/field}
			{submit value="update"}
		{/form}
	{/block}