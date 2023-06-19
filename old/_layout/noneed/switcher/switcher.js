/* Style Switcher */

window.console = window.console || (function(){
	var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
	return c;
})();

$(document).ready(function(){ 

	var styleswitcherstr = ' \
		<h3>Style Switcher <a href="#"><i class="fa fa-cog"></i></a></h3> \
		<div class="content"> \
		<h5>Choose Skin Color</h5> \
		<div class="switcher-box fixed"> \
		<a id="default" class="styleswitch color"></a> \
		<a id="blue" class="styleswitch color"></a> \
		<a id="red" class="styleswitch color"></a> \
		<a id="purple" class="styleswitch color"></a> \
		<a id="green" class="styleswitch color"></a> \
		<a id="orange" class="styleswitch color"></a> \
		</div><!-- End switcher-box --> \
		</div><!-- End content --> \
		';
	
	$(".switcher").prepend( styleswitcherstr );

});

/* background images */
$(document).ready(function(){ 
  
	// var startClass = $.cookie('cv-bg');
	// $("body").addClass("bg");
	
	$(".pattern").click( function(){
		var id = $(this).attr('id');
		$("body").removeClass().addClass(id);
		$.cookie('cv-bg',id);
	});

});

/* Skins Style */
$(document).ready(function(){ 

	var cookieName = 'cv-skin';

	function changeSkin(skin) {
		$.cookie(cookieName, skin);
		//$('#cv-skin').attr('href', '_layout/css/skins/' + skin + '.css');
		document.location.reload();
	}

	/*if( $.cookie(cookieName)) {
		changeSkin($.cookie(cookieName));
	}*/

	$("#default").click( function(){ changeSkin('default'); });
	$("#red").click( function(){ changeSkin('red'); });
	$("#blue").click( function(){ changeSkin('blue'); });
	$("#purple").click( function(){ changeSkin('purple'); });
	$("#green").click( function(){ changeSkin('green'); });
	$("#orange").click( function(){ changeSkin('orange'); });

});

/* Reset Switcher */
$(document).ready(function(){ 

	// Style Switcher	

	$('.switcher h3 a').click(function(e){
		e.preventDefault();
		var div = $('.switcher');
		if (div.css('left') === '-200px') {
			$('.switcher').animate({
				left: '20px'
			},300); 
		} else {
			$('.switcher').animate({
				left: '-200px'
			},300);
		}
	});
	
});						   

