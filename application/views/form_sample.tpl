{html}
	{head title='Form Sample'}
		{context key='css'}
	{/head}
	{body}
		{div class="container"}
			{h1}Form Sample{/h1}
			{ul items=[1,2,3]}{/ul}
			{form name='test' class=[test, demo]}
				{field field='status'}{/field}
				{div class='action'}
					{submit value='Post It'}
				{/div}
			{/form}
		{/div}
		{context key='js'}
	{/body}
{/html}
