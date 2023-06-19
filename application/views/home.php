<style>
.top-feature .main-content { min-height:300px; }
</style>		
			<!-- 
			=============================================
				Theme Main Banner
			============================================== 
			-->
			<div id="theme-main-banner" class="banner-one" style="max-heig:550px">
		<?php	foreach($homeslider as $hs){
				?>
				<div data-src="<?php echo base_url(); ?>/assets/images/uploads/sliders/<?php echo $hs->image; ?>">
					<div class="camera_caption">
						<div class="container">
							<p class="wow fadeInUp animated"><?php echo $hs->title; ?></p>
							<h1 class="wow fadeInUp animated" data-wow-delay="0.3s"><?php echo $hs->content; ?></h1>
							<a href="<?php echo $hs->link; ?>" class="theme-button-one wow fadeInUp animated" data-wow-delay="0.39s">Know More</a>
						</div> <!-- /.container -->
					</div> <!-- /.camera_caption -->
				</div>
		<?php
		}
		?>
			
			</div> <!-- /#theme-main-banner -->
			
			
			<!-- 
			=============================================
				Top Feature
			============================================== 
			-->
			<div class="top-feature ">
				<div class="top-features-slide">
					<?php 
					foreach($services as $sers){
						?>
						
						<div class="item">
						<div class="main-content" style="background:#fafafa;">
							<img src="<?php echo base_url(); ?>assets/images/uploads/services/<?php echo $sers->icon_image;?>" alt="">
							<h4 style="min-height:75px;"><a href="<?php echo base_url(); ?>services#t<?php echo $sers->id;?>"><?php echo $sers->title;?></a></h4>
							<p style=""><?php //echo $sers->content;?></p>
                             <!--<a style="color:#011440;" href="<?php //echo base_url(); ?>services#t<?php echo $sers->id;?>">Read More...</a>   -->
						</div> <!-- /.main-content -->
							
					</div> <!-- /.item -->
					
					
					
					<?php
					}
					?>
				
				</div> <!-- /.top-features-slide -->
			</div> <!-- /.top-feature -->


			<!-- 
			=============================================
				About Company
			============================================== 
			-->
			<!--<div class="about-compnay section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-12"><img src="<?php echo base_url(); ?>assets/images/uploads/about/<?php //echo $aboutc[0]->image; ?>" alt=""></div>
						<div class="col-lg-6 col-12">
							<div class="text">
							
							
								<div class="theme-title-one">
									<h2><?php //echo $aboutc[0]->title; ?></h2>
									<p style='text-align:justify;'><?php //echo $aboutc[0]->short_desc; ?></p>
									
								</div> <!-- /.theme-title-one --
								
							</div> <!-- /.text --
						</div> <!-- /.col- --
					</div> <!-- /.row --
				</div> <!-- /.container --
			</div> <!-- /.about-compnay -->


			<!-- 
			=============================================
				Feature Banner
			============================================== 
			-->
			<!--<div class="feature-banner section-spacing">
				<div class="opacity">
					<div class="container">
						<h2>EXCEL VIDEOS</h2>
						<a href="http://thestrategist.co.in/excelvideos/" class="theme-button-one">Watch</a>
					</div> <!-- /.container --
				</div> <!-- /.opacity --			</div> <!-- /.feature-banner -->


			<!-- 
			=============================================
				Service Style One
			============================================== 
			-->
			<!--<div class="service-style-one section-spacing">
				<div class="container">
					<div class="theme-title-one">
						<h2>POPULAR EXCEL TUTORIALS</h2>
						<!--<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today stillers</p>--
					</div> <!-- /.theme-title-one --
					<div class="wrapper">
						<div class="row">
						<?php 
					//	foreach($tutorials as $tut){
						?>
							<div class="col-xl-4 col-md-6 col-12">
								<div class="single-service3">
								<div class="single-service2"><h5><a href="#" style="padding-top:10px;color:#fff;"><?php //echo $tut->title; ?></a></h5></div>
								<div class="single-service">
									<!--<div class="img-box"><img src="images/home/3.jpg" alt=""></div>--
									
										
										<p><?php //echo $tut->content; ?></p>
										<a href="<?php //echo base_url();?>excel-videos/<?php //echo $tut->id; ?>" style="margin-top:26px;font-size: 11px;padding: 7px;border-radius:4px;background-color:#1f4e79;color:#fff;" class="read-more">READ MORE <i class="fa fa-angle-right" aria-hidden="true"></i></a>
									 <!-- /.text --
								</div> <!-- /.single-service --
								</div> <!-- /.single-service3 --
							</div>
							<?php 
						//	}
							?>
						
						</div> <!-- /.row --
					</div> <!-- /.wrapper --
				
				</div> <!-- /.container --
			</div> <!-- /.service-style-one -->
			<!--
			=====================================================
				Partner Slider
			=====================================================
			-->
			<div class="partner-section bg-color">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-4 col-12">
							<h6 >OUR CLIENTS</h6>
						</div>
						<div class="col-md-9 col-sm-8 col-12">
							<div class="partner-slider">
								<?php 
								foreach($clients as $c)
								{
									?>
									<div class="item"><img src="<?php echo base_url(); ?>assets/images/uploads/clients/<?php echo $c->image;?>" alt=""></div>
								<?php
								}
								?>
								<!--<div class="item"><img src="<?php echo base_url(); ?>assets/images/logo/c2.png" alt=""></div>
								<div class="item"><img src="<?php echo base_url(); ?>assets/images/logo/c3.png" alt=""></div>
								<div class="item"><img src="<?php echo base_url(); ?>assets/images/logo/c4.png" alt=""></div>-->
								<!--<div class="item"><img src="images/logo/p-5.png" alt=""></div>-->
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.partner-section -->

