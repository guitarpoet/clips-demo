{html}
	{head title='Form Validatiion Failed'}
	{/head}
{body}
	{ol items=$error}
		{literal}
			{li}{$item[0]}{/li}
		{/literal}
	{/ol}
{/body}
{/html}
