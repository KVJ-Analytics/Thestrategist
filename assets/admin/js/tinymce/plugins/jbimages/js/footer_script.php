<script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/responsiveslides.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script>
    	$(document).ready(function(){		
			$(window).load(function(){
				$('#preloader').fadeOut('slow',function(){$(this).remove();});
			});
			
			if($(window).width()>=768){
				
				var abt_bg = $(".abt_bg").height();
				var dt_bg = $(".dt_bg").height();
				var dt_bx = $(".dt_bx").height();
				

				if(abt_bg>dt_bg){
					$(".dt_bg").css("height",abt_bg+100);
					dt_bg=abt_bg;
				}else{
					$(".abt_bg").css("height",dt_bg+100);
				}
				
				$(".dt_bx").css("margin-top",(dt_bg-dt_bx)/2);
				
			}
			
			$(".rslides").responsiveSlides({
				auto: true,             // Boolean: Animate automatically, true or false
  				speed: 900,            // Integer: Speed of the transition, in milliseconds
  				timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
  				pager: false,           // Boolean: Show pager, true or false
  				nav: true,            
			});
			
			$('.property_items').owlCarousel({
				items:3,
				margin:30,
				stagePadding:0,
				smartSpeed:450,
				autoplay:true,
				loop:true,
				dots:false,
				singleItem: true,
				responsiveClass:true,
				responsive:{
					0:{
						items:1,
						nav:true
					},
					600:{
						items:2,
						nav:true
					},
					1000:{
						items:3,
						nav:true
					}
				}
			});
			
			$('.agent_lists').owlCarousel({
				items:2,
				margin:30,
				stagePadding:0,
				smartSpeed:450,
				autoplay:true,
				loop:true,
				dots:false,
				singleItem: true,
				responsiveClass:true,
				responsive:{
					0:{
						items:1,
						nav:true
					},
					600:{
						items:2,
						nav:true
					},
					1000:{
						items:2,
						nav:true
					}
				}
			});
			
			if($(window).width()>=768){
				$('ul.nav li.dropdown').hover(function() {
				  $(this).find('.mymenu').stop(true, true).delay(200).fadeIn(500);
				}, function() {
				  $(this).find('.mymenu').stop(true, true).delay(200).fadeOut(500);
				});
			}
		});
    </script>
    <script> 
    $(document).ready(function(){

		var str=location.href.toLowerCase();

        $(".nav li a").each(function() {

			if (str.indexOf(this.href.toLowerCase()) > -1) {

            	$("li").removeClass("active");

					 $(this).parent().addClass("active");
                }
        });

		$("li .active").parents().each(function(){

			$("li .active").removeClass("active");

				if ($(this).is("li")){

					$(this).addClass("active");

				}
		});
		
});
    </script>