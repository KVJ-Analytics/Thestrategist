
			<!--
			=====================================================
				Faq Page
			=====================================================
			-->
			<div class="faq-page section-spacing">
				<div class="container">
					<div class="theme-title-one">
						<h2>Our Resources</h2>
						<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today stillers</p>
					</div> <!-- /.theme-title-one -->
					<div class="row">
					<?php
					foreach($resources as $resc){
						?>
						<div class="col-md-6 col-sm-6 col-12" >
							<div style="margin-top:5%;width:100%;text-align:justify;padding:2%;border-left:1px #001648d6 solid;border-top:3px #001648 solid;border-right:1px #001648d6 solid;border-bottom:1px #001648d6 solid;">
								<h3><?php echo $resc->title; ?></h3>
								<br/>
								<?php echo $resc->content; ?>
								<!--<p style="text-align:justify;">
								Learn Excel in well furnished classrooms. Face to Face interaction with the trainer in the City of Joy (Kolkata). Learners should bring

								<ul style="text-align:justify;">
								<li>OWN LAPTOP</li>
								<li>ENTHUSIASM TO LEARN</li>
								</ul>
								
								
								</p>
								<p style="text-align:justify;">The first class is open to all and then make an informed decision
								100% backup of missed classes. 
								Fresh weekend batch starting soon. Contact us to know more...
								
								<br/>#InvestInYourself
								</p>-->
							</div>
						</div>
						
						<?php
						 }
						?>
						<!--<div class="col-md-6 col-sm-6 col-12">
							<div style="margin-top:5%;width:100%;text-align:justify;padding:2%;border-left:1px #001648d6 solid;border-top:3px #001648 solid;border-right:1px #001648d6 solid;border-bottom:1px #001648d6 solid;">
								<h3>Video Classes</h3>
								<br/>
								<p style="text-align:justify;">
								Want to learn Excel at your own pace and time?	We provide full HD videos of the classes. Receive videos at you home. We have published a host of training videos on our YouTube channel.	Make an informed decision.
								
								</p>
								<p style="text-align:justify;">Our video classes are delivered all across the globe. Register as our student and receive lectures at home.
										<br/>#InvestInYourself
								</p>
							</div>
						</div>-->
					</div>
	        		
				</div> <!-- /.container -->
			</div> <!-- /.faq-page -->

			<!-- 
			=============================================
				About Company Stye Two
			============================================== 
			-->
			<div class="about-compnay-two	">
				<div class="overlay" style="color:#fff;">
					<div class="container">
						<div class="row no-gutters">
							<div class="row">
										<div class="col-md-4 col-12">
											<?php 
											$c=count($modules);
											$cf=round($c/2);
											$i=1;
											foreach($modules as $md){
												if($i>$cf){break;}
											?>
											
											
											
											
											
											<h4 style="color:#fff;"><?php echo $md->title; ?></h4>
											<p>
											<?php echo $md->content; ?>
											</p>
											<?php if($i==$cf){break;}?>
											<p>&nbsp;</p><p>&nbsp;</p>
											<?php
											$i++;}
											?>
											<!--<h4 style="color:#fff;">Financial Modelling
											<br/>
										Course Summary:</h4>
											<p>
																					
										Financial Functions, Options Projection and valuations, B-Plan models Statistical and Regression Analysis and more…
											</p>-->
										</div>
										<div class="col-md-4 col-12"><img src="<?php echo base_url(); ?>assets/images/home/pattern_new2.png" alt="" class="chart"></div>
										<div class="col-md-4 col-12">
										<?php 
											$c=count($modules);
											$cf=round($c/2);
											$i=1;
											foreach($modules as $md2){
												if($i<=$cf){$i++;continue;}
											?>
											
											
											<h4 style="color:#fff;"><?php echo $md2->title; ?></h4>
											<p>
											<?php echo $md2->content; ?>
											<?php if($i==$c){break;}?>
											<p>&nbsp;</p><p>&nbsp;</p>
											<?php
											$i++;}
											?>
										
										
										<!--	<h4 style="color:#fff;">Advanced Excel
											<br/>
											Course Summary</h4>
										<p>
																						
											Advanced Lookup & Logical functions, Advanced Date & Text functions.
											Data validation, Formula Auditing techniques.
											Scenario Manager and What-if Analysis. Pivot and Dashboard and Chart techniques. Macros/ VBA etc.…
											</p>
											<p>&nbsp;</p><p>&nbsp;</p>
											<h4 style="color:#fff;">Corporate Presentation
												<br/>			Course Summary</h4>
										<p>
																					
										
												Power tips on PPT & Word,
												How to make easy and attractive Corporate presentation.
												Speed tricks, Gmail, Chrome tricks
											</p>-->
										</div>
									</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.about-compnay-two -->
			<div class="row">
				<div class="col-xl-5 col-lg-3 col-12 our-blog">
											<p>&nbsp;</p>
											<ul class="" style="color:#000;">
												<li>
													<i style="color: #001a57;margin-left: 2%;font-size: 74px;float: left;margin-right: 2%;" class="icon flaticon-people"></i>
													<h4 style="">Register</h4>
													<p>The Love Boat soon will be making another run plore strange.</p><p>&nbsp;</p><br/>
												</li>
												<li>
													<i style="color: #001a57;margin-left: 2%;font-size: 74px;float: left;margin-right: 2%;" class="icon flaticon-technology"></i>
													<h4 style="">Payment</h4>
													<p>The Love Boat soon will be making another run plore strange.</p><p>&nbsp;</p><br/>
												</li>
												<li>
													<i style="color: #001a57;margin-left: 2%;font-size: 74px;float: left;margin-right: 2%;" class="icon flaticon-chart"></i>
													<h4 style="">Receive</h4>
													<p>The Love Boat soon will be making another run plore strange.</p>
												</li>
											</ul>
				</div>
				<div class="col-xl-7 col-lg-3 col-12 our-blog">
					<img src="<?php echo base_url(); ?>assets/images/portfolio/map2.png" />
				</div>
			</div>


			<!--
			=====================================================
				Partner Slider
			=====================================================
			-->
			<div class="partner-section bg-color">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-4 col-12">
							<h6>OUR <br>PARTNERS</h6>
						</div>
						<div class="col-md-9 col-sm-8 col-12">
							<div class="partner-slider">
								<div class="item"><img src="<?php echo base_url(); ?>assets/images/logo/p-1.png" alt=""></div>
								<div class="item"><img src="<?php echo base_url(); ?>assets/images/logo/p-2.png" alt=""></div>
								<div class="item"><img src="<?php echo base_url(); ?>assets/images/logo/p-3.png" alt=""></div>
								<div class="item"><img src="<?php echo base_url(); ?>assets/images/logo/p-4.png" alt=""></div>
								<div class="item"><img src="<?php echo base_url(); ?>assets/images/logo/p-5.png" alt=""></div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.partner-section -->

