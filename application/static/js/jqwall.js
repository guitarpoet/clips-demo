function initialize() {

	var $jqwall = $('.jqwall');
	var $window = $(window);
	
	var loadImage = 0;
	var responsiveImage = $jqwall.find('.responsive img');
	var responsiveImageLength = responsiveImage.length;
	
	responsiveImage.responsiveImage({
		delay: 4000,
		onload: function() {
			loadImage++;
		},
		onerror: function() {
			loadImage++;
		},
		oncomplete: function(){
			if(loadImage > responsiveImageLength - 1) {
				loadImage = 0;
				$jqwall.freetile();
			}
		}
	});
	
	$window.resize(function(){
		
		$jqwall.find('.brick').width( ( $window.width() - 30 ) / 4 );
		$jqwall.find('.brick').css('margin-right', 10);
		$jqwall.find('.brick:nth-child(4n)').css('margin-right', 0);
		responsiveImage.responsiveImage({
			delay: 4000,
			onload: function() {
				loadImage++;
			},
			onerror: function() {
				loadImage++;
			},
			oncomplete: function(){
				console.log(loadImage);
				if(loadImage > responsiveImageLength - 1) {
					loadImage = 0;
					$jqwall.freetile();
				}
			}
		});	
		
	});
	
}