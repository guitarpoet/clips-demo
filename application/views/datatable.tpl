{html}
	{head title='DataTable Sample'}
		{context key='css'}
	{/head}
	{body}
		{container}
			{row}
				{h1}DataTable Sample{/h1}
			{/row}
			{row}
				{datatable name='demo'}
			{/row}
		{/container}
		{js}
        <script>
            $(function() {
                $('.datatable').each(function () {
                    $(this).on('init.dt', function(){
                        alert(1);
                    });
                })
            });
        </script>
	{/body}
{/html}
