{extends file="base-layout.tpl"}
	{block name="main"}
		{container}
			{row}
				{column class="navbar" id="navigationbar"}
					{column class="navbar-header"}
						{h3 id="brand"}Brand{/h3}
					{/column}
					{column class="navbar-section"}
						{navigation id="menu" actions=$actions}{/navigation}
					{/column}
				{/column}
				{column id="content"}
					{row}
						{column id="quickbar"}
							{row}
								{column}
									{row class="navbar"}
										{column class="navbar-header"}
											{h3}page-heading{/h3}
										{/column}
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