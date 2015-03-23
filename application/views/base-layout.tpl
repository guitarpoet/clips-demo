{html}
    {head}
		{context key='css'}
		<!-- End Of CSS -->
		{block name="header"}{/block}
		<!-- End of Header -->
    {/head}
	{body}
		{block name="head"}{/block}
		<!-- End Of Head -->
		{block name="main"}{/block}
		<!-- End Of Main -->
		{block name="foot"}{/block}
		<!-- End Of Foot -->
		{js}
		<!-- End Of JS -->
		<script>
			function updateItemPosition(owlcarousel) {
				owlcarousel.find('.owlcarousel-item').each(function(i) {
					var self = $(this);
					self.find('.alert').attr('targetposition', i);
				} );
			}			
			
			$('.owl-carousel').each(function(){

				var owl = $(this);

				owl.owlCarousel({
					items: 1,
					afterInit: function(owlcarousel) {
						updateItemPosition(owlcarousel);
					}
				});

				var owlApi = owl.data('owlCarousel');

				owl.on('alert.close', function(e, item){
					var targetPosition = item.attr('targetposition');
					owlApi.removeItem(targetPosition);
					owlApi.jumpTo(targetPosition);
				});				
				
			});
		</script>		
	{/body}
{/html}