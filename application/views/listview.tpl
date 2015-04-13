{html}
	{head title='ListView Sample'}
		{context key='css'}
	{/head}
	{body}
		{div class="container"}
			{h1}ListView Sample{/h1}
			{ul id="l1" data-level="1" class="layer"}
			{template}
			{li data-id="_(path)"}{a href="javascript:void(0)"}_(name){/a}{/li}
			{/template}
			{/ul}
			{ul id="l2" data-level="2" class="layer"}
			{template}
			{li data-id="_(path)"}{a href="javascript:void(0)"}_(name){/a}{/li}
			{/template}
			{/ul}
			{ul id="l3" data-level="3" class="layer"}
			{template}
			{li data-id="_(path)"}{a href="javascript:void(0)"}_(name){/a}{/li}
			{/template}
			{/ul}
			{ul id="l4" data-level="4" class="layer"}
			{template}
			{li data-id="_(path)"}{a href="javascript:void(0)"}_(name){/a}{/li}
			{/template}
			{/ul}
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
				{p class="listview-no-result"}
					没有数据
				{/p}
			{/listview}
		{/div}
		{js}
	{/body}
{/html}
