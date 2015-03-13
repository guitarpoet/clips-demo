{extends file="../bootstrap-layout.tpl"}
	{block name="toolbar"}
		{button class="btn btn-default" datatable-for="user" action="ajax" datatable-for="user" uri="/user/delete"}
			{lang}ajax delete with uri{/lang}
		{/button}
		{button class="btn btn-primary" datatable-for="user" action="ajax" datatable-for="user" href="/~andy/clips-demo/index.php/user/delete"}
			{lang}ajax delete with href{/lang}
		{/button}
		{action class="btn btn-default" datatable-for="user" href="/~andy/clips-demo/index.php/user/delete"}action delete{/action}
		{a class="btn btn-default" datatable-for="user" uri="/user/delete"}
			{lang}link delete{/lang}
		{/a}
		{a class="btn btn-info" datatable-for="user" uri="/user/show"}
			{lang}show{/lang}
		{/a}
		{a class="btn btn-warning" datatable-for="user" uri="/user/edit"}
			{lang}edit{/lang}
		{/a}
		{a class="btn btn-primary" uri="/user/create"}
			{lang}add{/lang}
		{/a}
		{form name="index_edit"}
			{field field="group_id"}
				{select options=$groups datatable-for="user" action="order" label-field="name" value-field="id"}
				{/select}
			{/field}
			{field datatable-for="user" action="search" field="username"}{/field}
		{/form}
	{/block}
	{block name="workbench"}
		{datatable name="user"}
	{/block}
