				<?php
				foreach($blog_det as $blog){
					$title=$blog->title;
					$content=$blog->content;
					$date=$blog->date;
					$image=$blog->image;
					$tags=$blog->link;
				}
				?>
			<!-- 
			=============================================
				Our Blog
			============================================== 
			-->
			<div class="our-blog section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-xl-9 col-lg-8 col-12">
							<div class="post-wrapper blog-details">
								<div class="single-blog">
									<div class="image-box">
										<img src="<?php echo base_url();?>assets/images/uploads/blogs/<?php echo $image; ?>" alt="">
										<div class="overlay"><a href="#" class="date"><?php echo date("M d,Y ",strtotime($date)); ?></a></div>
									</div> <!-- /.image-box -->
									<div class="post-meta">
										<h5 class="title"><?php echo $title; ?></h5>
										<p><?php echo $content; ?></p>
										</div> <!-- /.post-meta -->
									<div class="share-option clearfix">
										<ul class="tag-meta float-left">
											<li><i class="fa fa-tags" aria-hidden="true"></i> Tags :<?php echo $tags; ?></li>
											<!--<li><a href="#">Business,</a></li>
											<li><a href="#">Consulting,</a></li>
											<li><a href="#">Financial</a></li>-->
										</ul>
										<!--<ul class="social-icon float-right">
											<li><i class="fa fa-share-alt" aria-hidden="true"></i> Share :</li>
											<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
										</ul>-->
									</div> <!-- /.share-option -->
								</div> <!-- /.single-blog -->
							</div> <!-- /.post-wrapper -->
							
							
							
						</div>
						<!-- ===================== Blog Sidebar ==================== -->
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
							<!--<div class="sidebar-container sidebar-search">
								<form action="#">
									<input type="text" placeholder="Search...">
									<button><i class="fa fa-search" aria-hidden="true"></i></button>
								</form>
							</div> <!-- /.sidebar-search --
							<div class="sidebar-container sidebar-categories">
								<h5 class="title">Categories</h5>
								<ul>
									<li><a href="#">Travel and Aviation</a></li>
									<li><a href="#">Business Services</a></li>
									<li><a href="#">Consumer Products</a></li>
									<li><a href="#">Financial Services</a></li>
									<li><a href="#">Software Research</a></li>
								</ul>
							</div>  /.sidebar-categories -->
							<div class="sidebar-container sidebar-recent-post">
								<h5 class="title">Recent Posts</h5>
								<ul>
										<?php
									$i=0;
							foreach($lblogs as $blgl){
								if($i==5){
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
							</div> <!-- /.sidebar-recent-post -->
							<!--<div class="sidebar-container sidebar-archives">
								<h5 class="title">Archives</h5>
								<ul>
									<li><a href="#">January 2018</a></li>
									<li><a href="#">February 2018</a></li>
									<li><a href="#">March 2018</a></li>
								</ul>
							</div> <!-- /.sidebar-archives -->
							<!--<div class="sidebar-tags">
								<h5 class="title">Tags</h5>
								<ul class="clearfix">
									<li><a href="#">Business</a></li>
									<li><a href="#">Consulting</a></li>
									<li><a href="#">Sales</a></li>
									<li><a href="#">Startup</a></li>
									<li class="active"><a href="#">Marketing</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Financial</a></li>
									<li><a href="#">Research</a></li>
								</ul>
							</div> <!-- /.sidebar-tags -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.blog-details -->
			

