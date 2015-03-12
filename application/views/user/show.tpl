{extends file="../bootstrap-layout.tpl"}
	{block name="toolbar"}
		{a class="btn btn-default" role="form-action" for="user" uri="/user/edit"}
			{lang}edit{/lang}
		{/a}
	{/block}
	{block name="workbench"}
		{form name="user_edit" state="readonly"}
			{field field="id"}{/field}
			{field field="username"}{/field}
			{field field="group_id"}
				{select options=$groups label-field="name" value-field="id"}
				{/select}
			{/field}
		{/form}
	{/block}