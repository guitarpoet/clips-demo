{extends file="../base-layout.tpl"}
	{block name="main"}
		{container}
			{row}
				{form name="user_create"}
					{field field="username"}{/field}
					{field field="group_id"}
						{select options=$groups label-field="name" value-field="id"}
						{/select}
					{/field}
					{submit value="add"}
				{/form}
			{/row}
		{/container}
	{/block}