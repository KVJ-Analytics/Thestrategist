$(function () {
    'use strict';
    /*****************************************************
     * Galley
     *****************************************************/
	$('.fancybox').fancybox({
		
		openEffect : 'elastic',
		openSpeed  : 150,

		closeEffect : 'elastic',
		closeSpeed  : 150,

		closeClick : true,
		
		helpers : {
			thumbs : {
				width  : 50,
				height : 50
			}
		}
	});

});