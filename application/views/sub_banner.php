<?php
foreach($sub_det as $sub){
	
	$ptitle=$sub->title;
	$pbanner=$sub->image;
	
}
?>
			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="theme-inner-banner section-spacing" style="background: url(<?php echo base_url(); ?>assets/images/uploads/sub_banner/<?php echo $pbanner; ?>) no-repeat center center;">
				<div class="overlay">
					<div class="container">
						<h2><?php echo $ptitle; ?></h2>
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.theme-inner-banner -->
