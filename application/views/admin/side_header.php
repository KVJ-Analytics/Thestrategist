<style>
.dropbtn {
    background-color: #193351;
    color: white;
    /*padding: 16px;
    font-size: 16px;*/

    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: rgb(54, 212, 181);
}
</style>
<header class="main-header">
    		<!-- Logo -->
    		<a href="index2.html" class="logo">
      			<span class="logo-lg text-left"><img src="<?php echo base_url(); ?>assets/images/logo/llogo.png"></span>
    		</a>
    		<nav class="navbar navbar-static-top" role="navigation">
      		<!-- Sidebar toggle button-->
      			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <i class="fa fa-2x fa-bars color-grey"></i> </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">      
                        <li class="dropdown messages-menu"> 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-lg fa-check-square-o sa-color1"></i> Task </a> 
                        </li>
                         <li class="dropdown notifications-menu"> 
                            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-lg fa-bell-o sa-color1"></i> Notifications</a> 
                           <li>fdgfdgf</li> -->

                           <a href="#"><i class="fa fa-lg fa-bell-o sa-color1"></i>Notification <span class="badge" style="background-color: red"></span></a>
                        </li>
                      
                     <!--    <li class="dropdown">
                          <a onclick="myFunction()" class="dropbtn"> <i class="fa fa-lg fa-bell-o sa-color1"></i>Notifications</a>
                          <div id="myDropdown" class="dropdown-content" style="margin-right: 10px">
                            <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>
                          </div>
                        </li> -->


                        <li class="dropdown tasks-menu"> 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-lg fa-envelope-o sa-color1"></i> Inbox</a> 
                        </li>
                        <li class="dropdown tasks-menu"> 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-lg fa-gear sa-color1"></i> Settings</a> 
                        </li>
                    </ul>
                </div>
                <div class="navbar-right margR0 user-sec">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu"> 
                            <a href="<?php echo base_url();?>AdminController/logout"  > 
                                <img src="<?php echo base_url(); ?>assets/admin/images/user.png" class="user-image" alt="User Image"> 
                                <span class="hidden-xs welcome">Username<?php 
                                //if($this->session->userdata('userid')){
                                   // $userid = $this->session->userdata('userid');
                                   // echo $this->AdminModel->fetchUsername($userid);
                                //}  ?> Logout</span> 
                            </a>
                            
                        </li>
                    </ul>
                </div>      
    		</nav>
  		</header>