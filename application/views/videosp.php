<style>
$color-button:       #fff;
$color-button-hover: #f00;

.videoWrapper {
  position: relative;
  width: 100%;
  height: 0;
  background-color: #000;
  &43 {
    padding-top: 75%;
  } 
  &169 {
    padding-top: 56%;
  } 
}
.videoIframe {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: transparent;
}
.videoPoster {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  cursor: pointer;
  border: 0;
  outline: none;
  background-position: 50% 50%;
  background-size: 100% 100%;
  background-size: cover;
  text-indent: -999em;
  overflow: hidden;
  opacity: 1;
  -webkit-transition: opacity 800ms, height 0s;
  -moz-transition: opacity 800ms, height 0s;
  transition: opacity 800ms, height 0s;
  -webkit-transition-delay: 0s, 0s;
  -moz-transition-delay: 0s, 0s;
  transition-delay: 0s, 0s;
  &:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 80px;
    height: 80px;
    margin: -40px 0 0 -40px;
    border: 5px solid $color-button;
    border-radius: 100%;
    -webkit-transition: border-color 300ms;
    -moz-transition: border-color 300ms;
    transition: border-color 300ms;
  }
  &:after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    margin: -20px 0 0 -10px;
    border-left: 40px solid $color-button;
    border-top: 25px solid transparent;
    border-bottom: 25px solid transparent;
    -webkit-transition: border-color 300ms;
    -moz-transition: border-color 300ms;
    transition: border-color 300ms;
  }
  &:hover,
  &:focus {
    &:before {
      border-color: $color-button-hover;
    }
    &:after {
      border-left-color: $color-button-hover;
    }
  }
  .videoWrapperActive & {
    opacity: 0;
    height: 0;
    -webkit-transition-delay: 0s, 800ms;
    -moz-transition-delay: 0s, 800ms;
    transition-delay: 0s, 800ms;
  }
}
.img_overlay{
    
z-index:400;
    background-color: #000f3261;
    margin-top: -35%;
    margin-left: 3%;
    border:0;
}
.img_overlay:hover{background-color:#001a57}

// MISC STUFF FOR THIS EXAMPLE

body {
  font-family: avenir,sans-serif;
}
main {
  max-width: 800px;
  margin: 20px auto;
}
.blog-grid ul{
    /*margin-left:5%;*/
}
</style>
			<!-- 
			=============================================
				Our Blog
			============================================== 
			-->
			
			<div class="blog-grid section-spacing">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-12 our-blog">
							<div class="post-wrapper row">

							<?php
							if(count($videos_det)>0){
						foreach($videos_det as $vd){
							?>
							
								<div class="col-md-12 col-12">
									<div class="single-blog">
									
										<div class="post-meta">
											<h2 class="title"><a href="blog-details.html"><?php echo $vd->title; ?></a></h2>
											<?php echo $vd->content; ?>
										<div style="width:100%;height:auto;margin-top:50px;" class="">
											    <?php
											 
											        echo '<iframe width="100%" height="450px" src="https://www.youtube.com/embed/'.$vd->video_poster.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
											   
											    ?>
											    
											   
											
											</div>
										</div> <!-- /.post-meta -->
									</div> <!-- /.single-blog -->
								</div> <!-- /.col- -->
								
								<?php
}}
							?>
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								 
							</div> <!-- /.post-wrapper -->
							<!--<div class="theme-pagination">
								<ul>
									<li><a href="#">1</a></li>
									<li class="active"><a href="#">2</a></li>
									<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
								</ul>
							</div>-->
						</div>
						
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.blog-inner-page -->
			

