{extends file="../base-layout.tpl"}
	{block name="main"}
		{container}
			{row}
				{form name="user_edit"}
					{field field="id" state="hidden"}{/field}
					{field field="username"}{/field}
					{field field="group_id"}
						{select options=$groups label-field="name" value-field="id"}
					{/select}
					{/field}
					{submit value="update"}
				{/form}
			{/row}
		{/container}
	{/block}