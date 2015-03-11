{extends file="../base-layout.tpl"}
	{block name="main"}
		{container}
			{row}
				{column}
					{form name="user_edit" state="readonly"}
						{field field="id"}{/field}
						{field field="username"}{/field}
						{field field="group_id"}
							{select options=$groups label-field="name" value-field="id"}
							{/select}
						{/field}
						{a class="btn btn-default" href=$edit_url}edit{/a}
					{/form}
				{/column}
			{/row}
		{/container}
	{/block}