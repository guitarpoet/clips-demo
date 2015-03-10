{html}
	{head title='ListView Sample'}
		{context key='css'}
	{/head}
	{body}
		{div class="container"}
			{h1}ListView Sample{/h1}
			{listview name='demo'}
				{li style="width:200px;padding:15px;" class="item listview_item_template"}
					{b}_(users_username){/b}
					{ul}
						{li}
							ID: _(users_id)
						{/li}
						{li}
							Group: _(groups_name)
						{/li}
					{/ul}
				{/li}
			{/listview}
		{/div}
		{js}
	{/body}
{/html}
