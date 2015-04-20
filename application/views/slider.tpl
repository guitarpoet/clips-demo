{extends file='base-layout.tpl'}
	{block name='main'}
		{slider id="slider2_container" class='pinet-full-slider' items=$items}
			{literal}
				{div}
					{img uri=$item->url}
				{/div}
			{/literal}
		{/slider}
	{/block}		
	{block name='script'}
		<script>
			jQuery(document).ready(function ($) {
				var options = { $AutoPlay: true };
				var jssor_slider2 = new $JssorSlider$('slider2_container', options);
			});			
		</script>
	{/block}