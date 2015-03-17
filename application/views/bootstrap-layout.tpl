{extends file="base-layout.tpl"}
	{block name="main"}
		{container}
			{row}
				{column id="navigation"}
					{h3 id="brand"}Brand{/h3}
					{navigation id="menu" data-role="menu"}{/navigation}
				{/column}
				{column id="content"}
					{row}
						{column id="quickbar"}
							{row}
								{column}
									{row class="navbar"}
										{h3 class="navbar-header"}
											page-heading
										{/h3}
									{/row}
								{/column}
							{/row}
						{/column}
						{column id="workbench"}
							{row}
								{column}
									{row id="toolbar"}
										{block name="toolbar"}{/block}
									{/row}
									{row id="editarea"}
										{block name="workbench"}{/block}
									{/row}
								{/column}
							{/row}
						{/column}
					{/row}
				{/column}
			{/row}
		{/container}
	{/block}