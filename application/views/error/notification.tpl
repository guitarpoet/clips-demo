{html}
	{head title='Error'}
		{context key='css'}
	{/head}
	{body}
		{p class="omg"}:({/p}
		{p}
			Your PC ran into a problem and needs to restart. We're just collecting some error info, and then we'll restart for you.
			{ul items=$error}
				{literal}
					{li}
						{h2}Error Cause [{$item->cause}]{/h2}
						{ul items=$item->message}{/ul}
					{/li}
				{/literal}
			{/ul}
		{/p}
		{p class="bottom_line"}If you'd like to know more, you can search online later for this error: WINDOWS_FRAUDULENT_ACTIVITY_DETECTED{/p}
	{/body}
{/html}