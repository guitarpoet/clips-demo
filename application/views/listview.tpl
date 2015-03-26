{html}
	{head title='ListView Sample'}
		{context key='css'}
	{/head}
	{body}
		{div class="container"}
			{h1}ListView Sample{/h1}
			{listview id="list" name='demo'}
				{li style="width: calc(25% - 53px) ; padding:15px;margin-right:20px;margin-bottom:20px;" class="item listview_item_template"}
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
