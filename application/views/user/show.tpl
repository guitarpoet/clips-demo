{extends file="../base-layout.tpl"}
	{block name="main"}
		{container}
			{row}
				{form name="user" state="readonly"}
					{field field="id"}{/field}
					{field field="username"}{/field}
					{field field="group_id"}
						{select options=$groups label-field="name" value-field="id"}
						{/select}
					{/field}
					{a href=$edit_url}修改{/a}
				{/form}
			{/row}
		{/container}
	{/block}