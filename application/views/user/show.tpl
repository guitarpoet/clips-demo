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
						{a class="btn btn-default" uri='user/edit/'}edit{/a}
						{action class="btn btn-default"}{/action}
					{/form}
				{/column}
			{/row}
		{/container}
	{/block}