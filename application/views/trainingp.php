
		
			<!-- 
			=============================================
				Our Solution
			============================================== 
			-->
		   <?php
			    if($this->session->userdata('mailsuccess')!=''){
			        ?>
			        
			        	<div id="stabd" onmouseleave="hide_success()" onmouseover="hide_success()" style="width:100%;height:45px;text-align:center;background-color:green;color:#fff;padding-top:1%;padding-bottom:2%;"><h5 onclick="hide_success()" style="color:#fff;">Mail Sended Successfully</h5></div>
			        <?php
			    $this->session->unset_userdata('mailsuccess');}
			    ?>
			<div class="our-solution section-spacing">
			 
				<div class="container">
					<div class="theme-title-one">
						<h2>Training Sections</h2>
					</div> <!-- /.theme-title-one -->
					<div class="wrapper">
						<div class="row">
						
						<?php
						foreach($training_method as $tm){
						?>
							<div class="col-lg-6 col-sm-6 col-12">
								<div class="single-solution-block">
									<img src="<?php echo base_url(); ?>assets/images/uploads/training_methods/<?php echo $tm->image;?>" alt="" class="icon">
									<h5><a href="#"><?php echo $tm->title;?></a></h5>
									<p><?php echo $tm->content;?></p>
								</div> <!-- /.single-solution-block -->
							</div> <!-- /.col- -->
							<?php
							}
							?>
							<!--<div class="col-lg-6 col-sm-6 col-12">
								<div class="single-solution-block">
									<img src="<?php echo base_url(); ?>assets/images/icon/6.png" alt="" class="icon">
									<h5><a href="#">Your Team & Our Place</a></h5>
									<p>We have well furnished and ventilated classrooms to have your team. Trainees need to bring their own laptops.</p>
								</div> <!-- /.single-solution-block --
							</div> <!-- /.col- -->
							
						</div> <!-- /.row -->
					</div> <!-- /.wrapper -->
				</div> <!-- /.container -->
			</div> <!-- /.our-solution -->


			<!-- 
			=============================================
				About Company Stye Two
			============================================== 
			-->
			<div class="about-compnay-two">
				<div class="overlay" style="color:#fff;">
					<div class="container">
						<div class="row no-gutters">
							<div class="row">
										<div class="col-md-4 col-12">
											<ul class="best-list-item">
												<?php 
											$c=count($training_features);
											$rem=$c%2;
											$cf=round($c/2);
											/*if($rem!=0){
												echo $cf=$cf+1;
											}*/
											$i=1;
											foreach($training_features as $md){
												if($i>$cf){break;}
											?>
											<li>
													<!--<i class="icon flaticon-interface"></i>-->
													<h4 style="color:#fff;"><?php echo $md->short_desc; ?></h4><p>&nbsp;</p><p>&nbsp;</p>
													<!--<p>The Love Boat soon will be making another run plore strange.</p>-->
												</li>
											
												<?php //training_features
													$i++;	}
												?>
											</ul>
										</div>
										<div class="col-md-4 col-12"><img src="<?php echo base_url(); ?>assets/images/home/pattern_new.png" alt="" class="chart"></div>
										<div class="col-md-4 col-12">
											<ul class="best-list-item">
												<?php 
											$c=count($training_features);
											$rem=$c%2;
											$cf=round($c/2);
											/*if($rem!=0){
												echo $cf=$cf+1;
											}*/
											$i=1;
											foreach($training_features as $md){
												if($i<=$cf){$i++;continue;}
											?>
											<li>
													<!--<i class="icon flaticon-interface"></i>-->
													<h4 style="color:#fff;"><?php echo $md->short_desc; ?></h4><p>&nbsp;</p><p>&nbsp;</p>
													<!--<p>The Love Boat soon will be making another run plore strange.</p>-->
												</li>
											
												<?php //training_features
													$i++;	}
												?>
												
											</ul>
										</div>
									</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.about-compnay-two -->



			
				<!-- 
			=============================================
				Core Values
			============================================== 
			-->
			<div class="core-values section-spacing">
				<div class="container">
				    	<div class="wrapper">
							<div class="row">
						
							<div class="col-lg-12 col-12 text order-lg-first">
								<div class="theme-title-one">
									<h2>Our Flagship Programs</h2>
								</div> <!-- /.theme-title-one -->
										<table class="ptable" style="width:100%;">
		        
		           <thead>
		               <tr>
		                   <th>
		                    Our Programs Title
		                       
		                   </th>
		                   <th>
		                    Type
		                       
		                   </th>
		                   
		                   <th>
		                     Duration
		                       
		                   </th>
		                   <th>
		                    Materials
		                      
		                   </th>
		                   <th>
		                    Nature
		                       
		                   </th>
		                   
		                   </tr>
		           </thead>
		            <tbody>
		                <?php 
		                foreach($flagship_pgms as $fp){
		                    ?>
		                
		              <tr>
		               <td>
		                  <a href="<?php echo $fp->link;?>"><?php echo $fp->title;?></a>
		              </td>
		               <td>
		                  <?php echo $fp->type;?>
		              </td>
		               <td>
		                  <?php echo $fp->duration;?>
		              </td>
		               <td>
		                 <?php echo $fp->materials;?>
		              </td>
		              <td>
		                  <?php echo $fp->nature;?>
		              </td>
		              </tr>
		              
		              <?php
		              }
		              ?>
		              
		           </tbody> 
		        
		    </table>
								<!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->

						</div> <!-- /.row -->
					</div> 
				</div> 	<span id="t5"></span>
			</div> 
							<!-- 
			=============================================
				training form
			============================================== 
			-->
			<div class="consultation-form section-spacing">
				<div class="container">
					<div class="theme-title-one">
						<h2>Register to Start Learning</h2>
						<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today stillers</p>
					</div> <!-- /.theme-title-one -->
					<div class="clearfix main-content no-gutters row">
						<div class="col-xl-6 col-lg-5 col-12"><div class="img-box"></div></div>
						<div class="col-xl-6 col-lg-7 col-12">
							<div class="form-wrapper">
								<form action="<?php echo base_url(); ?>register_training" method="post" class="theme-form-one">
									<div class="row">
										<div class="col-md-6"><input type="text" name="name" placeholder="Name *" required></div>
										<div class="col-md-6"><input type="text" name="phone" placeholder="Phone *" required></div>
										<div class="col-md-6"><input type="email" name="email"placeholder="Email *" required></div>
										<div class="col-md-6">
											<select class="form-control" name="training_type" id="exampleSelect1" required>
										      <option value=" ">Service you’re looking for?</option>
										      <option value="Online class">Onlineclass</option>
										      <option value="Video Tutorials">Video Tutorials</option>
										      <option value="Direct class">Direct class</option>
										      <option value="Training at my place">Training at my place</option>
										    </select>
										</div>
										<div class="col-12"><textarea name="message" placeholder="Message"></textarea></div>
									</div> <!-- /.row -->
									<button type="submit" name="train_sub" class="theme-button-one">Register</button>
								</form>
							</div> <!-- /.form-wrapper -->
						</div> <!-- /.col- -->
					</div> <!-- /.main-content -->
				</div> <!-- /.container -->
			</div>
			
			
		<?php
	//	print_r($services);
$i=1;
foreach($services as $s){
if($s->id==3||$s->id==5){

if($s->page_image=='nill'){
?>

		<span id="t<?php echo $s->id; ?>"></span>

			<!-- 
			=============================================
				Core Values
			============================================== 
			-->
			<div class="core-values">
				<div class="container">
				    	<div class="wrapper">
							<div class="row">
						
							<div class="col-lg-12 col-12 text order-lg-first">
								<div class="theme-title-one">
									<h2><?php echo $s->title; ?></h2>
								</div> <!-- /.theme-title-one -->
											<p><?php echo $s->content; ?></p>
								<!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->

						</div> <!-- /.row -->
					</div> 
				</div> 
			</div> 
<?php
}else{
?>

				<span id="t<?php echo $s->id; ?>"></span>
				<!-- 
			=============================================
				About Company Stye Two
			============================================== 
			-->
			<div class="about-compnay-two no-bg section-spacing" style="<?php if($i>1){ echo "margin-top:50px"; } ?>" id="">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-12 text order-lg-last">
								<div class="theme-title-one">
									<h2><?php echo $s->title; ?></h2>
								</div> <!-- /.theme-title-one -->
												<p><?php echo $s->content; ?>
                </p>
								<!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->
							<div class="col-lg-6 col-12 order-lg-first">
								<img src="<?php echo base_url(); ?>assets/images/services/<?php echo $s->page_image; ?>" alt="" class="left-img">
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.about-compnay-two -->

    <?php
}
$i++;}}
?>

			
			
			
			
			
			
			
			
			

					<!-- 
			=============================================
				Our Case
			============================================== 
			-->
			<div class="our-case section-spacing">
				<div class="container">
					<div class="theme-title-one">
						<h2>Institutes</h2>
						<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today stillers</p>
					</div> <!-- /.theme-title-one -->
					<div class="wrapper">
						<div class="row">
						<?php
						
						foreach($institutes as $ins){
							?>
							<div class="col-lg-3 col-sm-6 col-12" style="border:1px #e4dddd solid;">
								<div class="single-case-block">
									<img style="width:272px;height:90px;" src="<?php echo base_url(); ?>assets/images/uploads/institutes/<?php echo $ins->image; ?>" alt="">
								
								</div> <!-- /.single-case-block -->
							</div> <!-- /.col- -->
							<?php
							}
							?>
						
							
						</div> <!-- /.row -->
					</div> <!-- /.wrapper -->
					<!--<div class="view-all"><a href="project.html" class="theme-button-one">VIEW ALL</a></div>-->
				</div> <!-- /.container -->
			</div> <!-- /.our-case -->
			<!-- 
			=============================================
				Our Corporate
			============================================== 
			-->
			<div class="our-case section-spacing">
				<div class="container">
					<div class="theme-title-one">
						<h2>Corporate</h2>
						<p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today stillers</p>
					</div> <!-- /.theme-title-one -->
					<div class="wrapper">
						<div class="row">
						<?php
						
						foreach($corporates as $cor){
							?>
							<div class="col-lg-3 col-sm-6 col-12" style="border:1px #e4dddd solid;">
								<div class="single-case-block">
									<img style="width:272px;height:90px;" src="<?php echo base_url(); ?>assets/images/uploads/corporates/<?php echo $cor->image; ?>" alt="">
									
								</div> <!-- /.single-case-block -->
							</div> <!-- /.col- -->
							<?php
							}
							?>
							
						</div> <!-- /.row -->
					</div> <!-- /.wrapper -->
					<!--<div class="view-all"><a href="project.html" class="theme-button-one">VIEW ALL</a></div>-->
				</div> <!-- /.container -->
			</div> <!-- /.our-case -->
			
			<!--	<!!!!!!!!!!!!!
			
			Gallery ------------------  -->
			
			
				<!-- 
			=============================================
				Core Values
			============================================== 
			-->
			<div class="core-values">
				<div class="container">
					<div class="theme-title-one">
						<h2>EXCEL COURSE</h2>
						<p>Here you will find a lot of free tutorials and videos. Below are some areas that you can begin with.</p>
					</div> 
					<div class="wrapper">
						<div class="core-value-slider">
					<?php
					foreach($gallery as $g ){
					?>
						<div class="item">
								<div class="single-value-block">
									
									<div class="text">
									 <img src="<?php echo base_url(); ?>assets/images/uploads/gallery/<?php echo $g->image;?>">
									</div> 
								</div> 
							</div>
							<?php
							}
							?>
							<!--<div class="item">
								<div class="single-value-block">
									
									<div class="text">
									    <img src="<?php echo base_url(); ?>assets/images/uploads/blogs/blog_1.png">

									</div> 
								</div> 
							</div>
							<div class="item">
								<div class="single-value-block">
									
									<div class="text">
									 <img src="<?php echo base_url(); ?>assets/images/uploads/blogs/blog_1.png">
									</div> 
								</div> 
							</div>
							<div class="item">
								<div class="single-value-block">
									
									<div class="text">
									 <img src="<?php echo base_url(); ?>assets/images/uploads/blogs/blog_1.png">
									</div> 
								</div> 
							</div>
							<div class="item">
								<div class="single-value-block">
									
									<div class="text">
									 <img src="<?php echo base_url(); ?>assets/images/uploads/blogs/blog_1.png">
									</div> 
								</div> 
							</div> -->
						</div> 
					</div> 
				</div> 
			</div> 

	