{extends file="base-layout.tpl"}
	{block name="main"}
		{jdatagrid class="jqwall" items=$items}
			{literal}
				<div class="brick">
					{resimg data-image="photo/1.jpg" width="100%"}
					<div class="info">
						<h3>Freewall</h3>
						<h5>Pinterest layout</h5>
					</div>
				</div>			
			{/literal}
		{/jdatagrid}
	{/block}	