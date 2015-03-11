{extends file="../base-layout.tpl"}
	{block name="main"}
		{container}
			{row}
				{form name="user"}
					{field field="id"}{/field}
					{field field="username"}{/field}
					{field field="group_id"}
						{select options=$groups label-field="name" value-field="id"}
					{/select}
					{/field}
					{submit value="修改"}
				{/form}
			{/row}
		{/container}
	{/block}