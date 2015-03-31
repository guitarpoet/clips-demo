{html}
	{head title='ListView Sample'}
		{context key='css'}
	{/head}
	{body}
		{div class="container"}
			{h1}ListView Sample{/h1}
			{listview id="list" name='demo'}
				{li style="width: calc(25% - 10px); padding:0px; margin-right: 10px; margin-bottom: 10px;" class="item listview_item_template"}
					{b}_(users_username){/b}
					{ul}
						{li}
							{resimg data-image='deli/home/cheese-1_larges.jpg' data-default-image='yizhifu.png'}
						{/li}
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
