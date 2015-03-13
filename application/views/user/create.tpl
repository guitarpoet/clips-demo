{extends file="../bootstrap-layout.tpl"}
	{block name="toolbar"}
		{a class="btn btn-primary" form-for="user_create"}
			{lang}create{/lang}
		{/a}
	{/block}
	{block name="workbench"}
		{form name="user_create"}
			{field field="username"}{/field}
			{field field="group_id"}
				{select options=$groups label-field="name" value-field="id"}
				{/select}
			{/field}
		{/form}
	{/block}