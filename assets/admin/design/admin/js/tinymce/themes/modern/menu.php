<?php 
			$user_name=$_SESSION['username'];
			$user_status_stmts = $mysqli->prepare("select type from members where username=?");
			$user_status_stmts->bind_param('s', $user_name);
			$user_status_stmts->execute();
			$user_status_stmts->store_result();
			$user_status_stmts->bind_result($user_type);
			$user_status_stmts->fetch(); 
?>
<aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                  <li> <a href="dashboard.php"> <span class="sa-icon"><i class="fa fa-tachometer"></i>DASHBOARD</span> </a> </li>                  		                  <li> <a href="banner_listing.php"> <span class="sa-icon"><i class="fa fa-tachometer"></i>Main Banner Slider</span> </a> </li> 
                  <li> <a href="page_listing.php"> <span class="sa-icon"><i class="fa fa-tachometer"></i>Pages</span> </a> </li>
                  <li> <a href="add_about.php"> <span class="sa-icon"><i class="fa fa-tachometer"></i>About Us Content</span> </a> </li>
                  <li> <a href="achievements_listing.php"> <span class="sa-icon"><i class="fa fa-picture-o"></i>Achievments</span> </a> </li>
             
                  <li> <a href="courses_listing.php"> <span class="sa-icon"><i class="fa fa-tachometer"></i>Courses</span> </a> </li>
                   <li> <a href="corner_listing.php"> <span class="sa-icon"><i class="fa fa-tachometer"></i>Students Corner</span> </a> </li>
                  
                  <li> <a href="social_listing.php"> <span class="sa-icon"><i class="fa fa-picture-o"></i>Social Media</span> </a> </li>
               
                   
                    <?php if($user_type=="admin") { ?>
                     
                     <li> <a href="add_menu.php"> <span class="sa-icon"><i class="fa fa-picture-o"></i>Menu</span> </a> </li>
                     <li> <a href="users_list.php"> <span class="sa-icon"><i class="fa fa-user"></i>User</span> </a> </li>
                     <li> <a href="layout_listing.php"> <span class="sa-icon"><i class="fa fa-picture-o"></i>layout</span> </a> </li>
                   <?php } ?>
                   <li> <a href="settings.php"> <span class="sa-icon"><i class="fa fa-cogs"></i>Settings</span></a> </li>
                  
                </ul>
            </section>
        </aside>