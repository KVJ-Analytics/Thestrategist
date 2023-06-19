

			<!-- 
			=============================================
				About Company Stye Two
			============================================== 
			-->
			<div class="about-compnay-two no-bg section-spacing">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-12 text order-lg-last">
								<div class="theme-title-one">
									<h2><?php echo $aboutc[0]->title; ?></h2>
								</div> <!-- /.theme-title-one -->
													<?php echo $aboutc[0]->content; ?>
								<!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->
							<div class="col-lg-6 col-12 order-lg-first">
								<img src="<?php echo base_url(); ?>assets/images/uploads/about/<?php echo $aboutc[0]->image; ?>" alt="" class="left-img">
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.about-compnay-two -->


		

			<!--
			=====================================================
				Partner Slider
			=====================================================
			-->
			<div class="partner-section">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-4 col-12">
							<h6>AS SEEN ON</h6>
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
								<!--<div class="item"><img src="images/logo/p-5.png" alt=""></div>-->
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.partner-section -->
