<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- For Window Tab Color -->
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#061948">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#061948">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#061948">
		<title><?php echo $pagetitle; ?></title>
		
		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="<?php echo base_url(); ?>assets/images/fav-icon/icon.png">
		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css">
		<style>
		</style>
		<!-- Fix Internet Explorer ______________________________________-->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
	
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-188996967-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-188996967-1');
</script>
<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "6o66u29k6r");
</script>
	</head>

	<body>
	   
		<div class="main-page-wrapper">

			<!-- ===================================================
				Loading Transition
			==================================================== -->
			<div id="loader-wrapper">
				<div id="loader"></div>
			</div>
			
<?php
foreach($contact as $cd){
    $caddress=$cd->address;
    $cemail=$cd->email;
    $cphone=$cd->phone;
}

?>
			<!-- 
			=============================================
				Theme Header One
			============================================== 
			-->
			<header class="header-one">
				<div class="top-header">
					<div class="container clearfix">
						<div class="logo float-left"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo/llogo.png" alt=""></a></div>
						<div class="address-wrapper float-right">
							<ul>
								<!--<li class="address">
									<i class="icon flaticon-placeholder"></i>
									<h6>Address:</h6>
									<p><?php echo $caddress; ?></p>
								</li>-->
								<li class="address">
									<i class="icon flaticon-multimedia"></i>
									<h6>Mail us:</h6>
									<p><?php echo $cemail; ?></p>
								</li>
								<li class="address">	<i class="icon flaticon-phone-call"></i>
									<h6>Caus:</h6>
									<p><?php echo $cphone; ?></p></li>
								<li class="quotes">
								    
								    <!--<a href="http://thestrategist.co.in/excelvideos/" >Register</a></li> -->
								     <!--<li class="quotes"><a href="https://thestrategist.co.in/moodle/" >Moodle</a></li>-->
							</ul>
						</div> <!-- /.address-wrapper -->
					</div> <!-- /.container -->
				</div> <!-- /.top-header -->

				<div class="theme-menu-wrapper">
					<div class="container">
						<div class="bg-wrapper clearfix">
							<!-- ============== Menu Warpper ================ -->
					   		<div class="menu-wrapper float-left">
					   			<nav id="mega-menu-holder" class="clearfix">
								   <ul class="clearfix">
									    <li class="<?php if($active=='home'){echo 'active';}?>"><a href="<?php echo base_url(); ?>">Home</a>
									    	<!--<ul class="dropdown">
									        	<li><a href="index-2.html">Home version one</a></li>
									        	<li><a href="index-3.html">Home version two</a></li>
									      </ul>-->
									    </li>
									    <li class="<?php if($active=='about'){echo 'active';}?>"><a href="<?php echo base_url(); ?>about">About</a>
									    	<!--<ul class="dropdown">
									    		<li><a href="about.html">About us</a></li>
									    		<li><a href="team.html">Our team</a></li>
									    		<li><a href="faq.html">Faq's</a></li>
									    		<li><a href="404.html">404</a></li>
									    		<li><a href="shop.html">Shop</a></li>
									    		<li><a href="shop-details.html">Shop details</a></li>
									            <li><a href="#">Third Level menu</a>
									    			<ul>
									    				<li><a href="#">Demo one</a></li>
									    				<li><a href="#">Demo two</a></li>
									    			</ul>
									    		</li>
									       </ul>-->
									    </li>
									      <li class="<?php if($active=='1'){echo 'active';}?>"><a href="<?php echo base_url(); ?>services/1">Data Analytics</a>
									    	<!--<ul class="dropdown">
									        	<li><a href="blog.html">Blog List</a></li>
									        	<li><a href="blog-grid.html">Blog Grid</a></li>
									        	<li><a href="blog-details.html">Blog details</a></li>
									       </ul>-->
									    </li>
									     <li class="<?php if($active=='2'){echo 'active';}?>"><a href="<?php echo base_url(); ?>services/2">Consulting</a></li>
										<li class="<?php if($active=='training'){echo 'active';}?>"><a href="<?php echo base_url(); ?>excel-training">Training</a></li>
									    <li class="<?php if($active=='tutorials'){echo 'active';}?>"><a href="#">Tutorials</a>
									    <!-- if mega drop needed use .megdrop -->	<ul class="dropdown">
									        	<li><a href="<?php echo base_url(); ?>excelvideos/">Student Login MOS</a></li>
									        	<?php
												foreach($basic_sub as $subm){
												?>
												<li><a href="<?php echo base_url(); ?>excel-category/<?php echo $subm->id; ?>"><?php echo $subm->category; ?></a></li>
									        	<?php
												}
												?>
													<li><a href="#">Excel VBA</a></li>
												 <li class="<?php if($active=='efunctions'){echo 'active';}?>"><a href="#">Excel Functions</a>
									    	<ul class="dropdown sub_ul">
											<?php 
											foreach($fun_category as $fc){
												?>
									        	<li><a href="<?php echo base_url(); ?>excel-functions/<?php echo $fc->id; ?>"><?php echo $fc->category; ?></a></li>
									        	<!--<li><a href="project-details.html">Project details</a></li>-->
												<?php
											}
											
											?>
									       </ul>
									    </li>
									       </ul>
									    </li>
									   
									    <!--<li class="<?php if($active=='blogs'){echo 'active';}?>"><a href="<?php echo base_url(); ?>blog">Blog</a>
									    	<!--<ul class="dropdown">
									        	<li><a href="blog.html">Blog List</a></li>
									        	<li><a href="blog-grid.html">Blog Grid</a></li>
									        	<li><a href="blog-details.html">Blog details</a></li>
									       </ul>-->
									    <!--</li>-->
									   <li class="<?php if($active=='5'){echo 'active';}?>"><a href="<?php echo base_url(); ?>services/5">MOS Certifications</a>
									    	<!--<ul class="dropdown">
									        	<li><a href="blog.html">Blog List</a></li>
									        	<li><a href="blog-grid.html">Blog Grid</a></li>
									        	<li><a href="blog-details.html">Blog details</a></li>
									       </ul>-->
									    </li>
								   </ul>
								</nav> <!-- /#mega-menu-holder -->
					   		</div> <!-- /.menu-wrapper -->

					   		
						</div> <!-- /.bg-wrapper -->
					</div> <!-- /.container -->
				</div> <!-- /.theme-menu-wrapper -->
			</header> <!-- /.header-one -->

