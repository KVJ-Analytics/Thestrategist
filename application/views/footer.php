<style>.theme-footer-one .top-footer .footer-list ul li:before{content:'';}</style>
			<!--
			=====================================================
				Footer
			=====================================================
			-->
			<footer class="theme-footer-one">
				<div class="top-footer">
					<div class="container">
						<div class="row">
							<div class="col-xl-4 col-lg-3 col-sm-6 about-widget">
								<h6 class="title">FIND US</h6>
								<?php
                        foreach($contact as $cdf){
                            $cfaddress=$cdf->address;
                            $cfemail=$cdf->email;
                            $cfphone=$cdf->phone;
                        }
                        
                        ?>
								<div class="queries">
								    <ul><li><i class="icon flaticon-placeholder"></i>Address : <a href="#"><?php echo $cfaddress;?></a></li>
								    <li><i class="icon flaticon-multimedia"></i>Email : <a href="#"><?php echo $cfemail;?></a></li>
								    <li><i class="flaticon-phone-call"></i>Phone : <a href="#"><?php echo $cfphone;?></a></li>
								    </ul>
								    
								</div>
							</div> <!-- /.about-widget -->
						<!--	<div class="col-xl-4 col-lg-3 col-sm-6 footer-recent-post">
								<h6 class="title">RECENT POSTS</h6>
								<ul>
										<?php
									$i=0;
							foreach($fblogs as $blgl){
								if($i==2){
									break;
								}
							?>
							<li class="clearfix">
										<img src="<?php echo base_url();?>assets/images/uploads/blogs/<?php echo $blgl->image; ?>" alt="" class="float-left">
										<div class="post float-left">
											<a href="<?php echo base_url();?>blog_details/<?php echo $blgl->id; ?>"><?php echo $blgl->title; ?></a>
											<div class="date"><?php echo date("M d,Y ",strtotime($blgl->date)); ?></div>
										</div>
									</li>
									<?php
									$i++;
									}
									?>
								
								</ul>
							</div>  /.footer-recent-post -->
							<div class="col-xl-4 col-lg-3 col-sm-6 footer-list">
								<h6 class="title">Pages</h6>
								<ul>
									<li><a href="<?php echo base_url(); ?>">Home</a></li>
									<li><a href="<?php echo base_url(); ?>about">About</a></li>
									<li><a href="<?php echo base_url(); ?>excel-tutorials">Data Analytics</a></li>
									<li><a href="<?php echo base_url(); ?>excel-functions/1">Consulting</a></li>
									<!--<li><a href="<?php echo base_url(); ?>blog">Blogs</a></li>-->
									<li><a href="<?php echo base_url(); ?>careers">Careers</a></li>
									<li><a href="<?php echo base_url(); ?>excel-training">Training</a></li>
								</ul>
							</div> <!-- /.footer-list -->
							<div class="col-xl-4 col-lg-3 col-sm-6 footer-newsletter" id="newslet">
								<h6 class="title">NEWSLETTER</h6>
								<form method="post" action="<?php echo base_url(); ?>newsletter">
									<input type="text" name="name" placeholder="Name *">
									<input type="email" name="email" placeholder="Email *">
									<button type="submit" class="theme-button-one">SUBSCRIBE</button>
								</form>
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.top-footer -->
				<div class="bottom-footer">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-12"><p>&copy; Copyrights 2019. All Rights Reserved.</p></div>
							<div class="col-md-6 col-12">
								<ul>
									<li><a href="#">Powered By Treegear Technologies</a></li>
									
									
									
								</ul>
							</div>
						</div>
					</div>
				</div> <!-- /.bottom-footer -->
			</footer> <!-- /.theme-footer -->
			

	        

	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>
			


		<!-- Optional JavaScript _____________________________  -->

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
		<script src="<?php echo base_url(); ?>assets/vendor/jquery.2.2.3.min.js"></script>
		<!-- Popper js -->
		<script src="<?php echo base_url(); ?>assets/vendor/popper.js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- Camera Slider -->
		<script src='<?php echo base_url(); ?>assets/vendor/Camera-master/scripts/jquery.mobile.customized.min.js'></script>
	    <script src='<?php echo base_url(); ?>assets/vendor/Camera-master/scripts/jquery.easing.1.3.js'></script> 
	    <script src='<?php echo base_url(); ?>assets/vendor/Camera-master/scripts/camera.min.js'></script>
	    <!-- menu  -->
		<script src="<?php echo base_url(); ?>assets/vendor/menu/src/js/jquery.slimmenu.js"></script>
		<!-- WOW js -->
		<script src="<?php echo base_url(); ?>assets/vendor/WOW-master/dist/wow.min.js"></script>
		<!-- owl.carousel -->
		<script src="<?php echo base_url(); ?>assets/vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- js count to -->
		<script src="<?php echo base_url(); ?>assets/vendor/jquery.appear.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/jquery.countTo.js"></script>
		<!-- Fancybox -->
		<script src="<?php echo base_url(); ?>assets/vendor/fancybox/dist/jquery.fancybox.min.js"></script>

		<!-- Theme js -->
		<script src="<?php echo base_url(); ?>assets/js/theme.js"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>
		<?php
	if($pacts)
        {?>
        <script>
           $(document).ready(function (){
   var p='<?php echo $pacts;?>';
   $("html, body").animate({scrollTop: $("#t"+p).offset().top }, 1000);
                                          });
        </script>
        <?php
        }
?>
<script>




 // poster frame click event
$(document).on('click','.js-videoPoster',function(ev) {
  ev.preventDefault();
  var $poster = $(this);
  var $wrapper = $poster.closest('.js-videoWrapper');
  videoPlay($wrapper);
});

// play the targeted video (and hide the poster frame)
function videoPlay($wrapper) {
  var $iframe = $wrapper.find('.js-videoIframe');
  var src = $iframe.data('src');
  // hide poster
  $wrapper.addClass('videoWrapperActive');
  // add iframe src in, starting the video
  $iframe.attr('src',src);
}

// stop the targeted/all videos (and re-instate the poster frames)
function videoStop($wrapper) {
  // if we're stopping all videos on page
  if (!$wrapper) {
    var $wrapper = $('.js-videoWrapper');
    var $iframe = $('.js-videoIframe');
  // if we're stopping a particular video
  } else {
    var $iframe = $wrapper.find('.js-videoIframe');
  }
  // reveal poster
  $wrapper.removeClass('videoWrapperActive');
  // remove youtube link, stopping the video from playing in the background
  $iframe.attr('src','');
}
/*$('#stra_butt').('click',function(){
    
});*/
function show_login()
{
    document.getElementById('regblock').style.display="none";
    document.getElementById('logblock').style.display="block";
    
    
    document.getElementById('slog').style.color="#fff";
    document.getElementById('slog').style.backgroundColor ="#021747";
    document.getElementById('sreg').style.color="#021747";
    document.getElementById('sreg').style.backgroundColor ="#fff";
}
function show_register()
{
     document.getElementById('logblock').style.display="none";
    document.getElementById('regblock').style.display="block";
    document.getElementById('sreg').style.color="#fff";
    document.getElementById('sreg').style.backgroundColor ="#021747";
    document.getElementById('slog').style.color="#021747";
    document.getElementById('slog').style.backgroundColor ="#fff";
}
function hide_form()
{
    document.getElementById('pwindow').style.display="none";
}
function get_log()
{
    document.getElementById('pwindow').style.display="block";
}
function checkp(){
    var pass=document.getElementById('pass').value;
    var cpass=document.getElementById('cpass').value;
    if(pass!=cpass){
        document.getElementById('cpass').style.borderColor='red';
        document.getElementById("rebut").disabled = true;
    }else{
         document.getElementById('cpass').style.borderColor='green';
        document.getElementById("rebut").disabled = false;
    }
    //alert(pass+'..'+cpass);
}
function hide_success(){
    document.getElementById('stabd').style.display="none";
}
</script>
</html>