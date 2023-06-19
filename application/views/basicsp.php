
			<!-- 
			=============================================
				Service Details
			============================================== 
			-->
			<div class="service-details section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-xl-9 col-lg-8 col-12">
							<div class="service-content">
								<img src="<?php echo base_url(); ?>assets/images/home/20.jpg" alt="" class="cover-img">
								<h3 class="main-title">Excel Tutorials - for Beginners/Experts</h3>
								<p>If you are an beginner and want to learn Excel,this is the perfect place to start .This page will introduce you to various basic and advanced Excel features .The page is divided into various sections where you will find useful Excel tutorials and links.</p>
							

								
							</div> <!-- /.service-content -->
						</div> <!-- /.col- -->

						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 col-12 theme-sidebar-one">
							<div class="sidebar-box service-categories">
								<h5 class="title">Top Topics</h5>
								<ul>
									<?php
									foreach($resultscat as $r){
									/*if($r->type!='top')	{continue;}*/?>
										<li><a href="<?php echo base_url(); ?>excel-category/<?php echo $r->id; ?>"><?php echo $r->category; ?></a></li>
									<?php
									}
									?>
									<!--<li ><a href="#">Data Entry and Formating</a></li>
									<li><a href="#">Basic Excel Tutorials</a></li>
									<li><a href="#">Excel functions</a></li>
									<li><a href="#">Advanced Excel tutorials</a></li>
									<li><a href="#">Excel Charting</a></li>
									<li><a href="#">Excel Training</a></li>-->
									
								</ul>
							</div> <!-- /.service-categories -->
							 <!--<div class="sidebar-box sidebar-brochures">
								<h5 class="title">Brochures</h5>
								<ul>
									<li><a href="#"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download file. pdf</a></li>
									<li><a href="#"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i> Download file. ppt</a></li>
								</ul>
							</div> /.sidebar-brochures -->
							<!--<div class="sidebar-box sidebar-contact">
								<h5 class="title">Contact Form</h5>
								<form action="#">
									<input type="text" placeholder="Name">
									<input type="email" placeholder="Email">
									<textarea placeholder="Message"></textarea>
									<button class="theme-button-one">SUBMIT</button>
								</form>
							</div> <!-- /.sidebar-contact -->
						</div> <!-- /.theme-sidebar-one -->
						
					</div> <!-- /.row -->
					
					
						
					<div class="row" style="padding:2%;">
									
									
										<!--<div class="section-spacing">
											<h3> Understanding Excel Layout</h3>
											<p> It could be a bit intimidating for someone to open a workbook and look at so many things in excel.Here are the five things you need to know in the Excel layout.</p>
										</div>-->
										<?php
									foreach($results as $rd){
										?>
									<div class="row">
										<div class="col-md-6 col-12">
													<h5 style="margin-bottom:4%;"><a href="<?php echo base_url(); ?>excel-videos/<?php echo $rd->id; ?>"><?php echo $rd->title; ?>:</a></h5>
													<p><?php echo $rd->content; ?></p>
												
										</div>
										<div class="col-md-6 col-12"><img src="<?php echo base_url(); ?>assets/images/uploads/tutorials/<?php echo $rd->video_poster; ?>" alt="" class="chart"></div>
									</div>
									<?php
									}
									?>
									<!--<div class="row">
										<div class="col-md-6 col-12">
													<h5 style="margin-bottom:4%;">2. Quick Access Toolbar(QAT) : </h5>
													<p>Quick Access Toolbar gives you quick access to various useful tools and features. For example, if you often need to filter data in Excel,you can add that the QAT and it will always be visible and just a click away.</p>
												
										</div>
										<div class="col-md-6 col-12"><img src="<?php echo base_url(); ?>assets/images/home/eb2.png" alt="" class="chart"></div>
									</div>
									<div class="row">
										<div class="col-md-6 col-12">
													<h5 style="margin-bottom:4%;">3.Worksheet Area or Spreadsheet Grid : </h5>
													<p>This is Were you enter, analyze and report data. The entire area is divided into rows and columns. These rows and columns are further divided into cells. These cells can hold data(such as numbers,text,dates) and formulas. And just a click away.</p>
													
										</div>
										<div class="col-md-6 col-12"><img src="<?php echo base_url(); ?>assets/images/home/eb3.png" alt="" class="chart"></div>
									</div>
									<div class="row">
										<div class="col-md-6 col-12">
													<h5 style="margin-bottom:4%;">4. Status Bar : </h5>
													<p>Status bar, as the name suggests, would let you know of the current status. For example ,if you are doing a calculation , it will show calculating.If you are recording a macro, it will show that. A more useful feature of the status bar is that if you select a set of cells, it will show some basic statistics.</p>
												
										</div>
										<div class="col-md-6 col-12"><img src="<?php echo base_url(); ?>assets/images/home/eb4.png" alt="" class="chart"></div>
									</div>	
									-->
									
								</div> <!-- /.presentation-section -->

					<div class="row">
						<div class="col-xl-12 col-lg-12 col-12 our-blog">
							<?php echo $this->pagination->create_links(); ?>
							<!--<div class="theme-pagination">
								<ul>
									<li><a href="#">1</a></li>
									<li class="active"><a href="#">2</a></li>
									<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
								</ul>
							</div>-->
						</div>
					</div>
				</div> <!-- /.container -->
			</div> <!-- /.service-details -->



