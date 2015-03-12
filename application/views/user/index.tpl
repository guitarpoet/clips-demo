{extends file="../bootstrap-layout.tpl"}
	{block name="toolbar"}
		{button class="btn btn-default" type="ajax" for="user" uri="/user/delete"}
			{lang}ajax delete with uri{/lang}
		{/button}
		{button class="btn btn-primary" type="ajax" for="user" href="/~andy/clips-demo/index.php/user/delete"}
			{lang}ajax delete with href{/lang}
		{/button}
		{action class="btn btn-default" for="user" href="/~andy/clips-demo/index.php/user/delete"}action delete{/action}
		{a class="btn btn-default" role="datatable-action" for="user" uri="/user/delete"}
			{lang}link delete{/lang}
		{/a}
		{a class="btn btn-info" role="datatable-action" for="user" uri="/user/show"}
			{lang}show{/lang}
		{/a}
		{a class="btn btn-warning" role="datatable-action" for="user" uri="/user/edit"}
			{lang}edit{/lang}
		{/a}
		{a class="btn btn-primary" uri="/user/create"}
			{lang}add{/lang}
		{/a}
	{/block}
	{block name="workbench"}
		{datatable name="user"}
	{/block}
