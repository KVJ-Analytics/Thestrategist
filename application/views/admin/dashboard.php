
<body class="skin-blue fixed sidebar-mini">
	<div class="wrapper">

  		<div class="content-wrapper">
  			<section class="col-lg-12">
    			<div class="content-area">
                	<div class="col-md-12">
                    	<h2><i class="fa fa-tachometer"></i> Dashboard</h2>
                    </div>
                    <!--<div class="col-sm-2 padR5">
                    	<div class="dash-item pages_bg">
                        	<h3><a href="<?php echo base_url() ?>AdminController/packages"><i class="fa fa-file-text-o"></i> Packages</a></h3>
                        </div>
                    </div>
                             
                    <div class="col-sm-2 pad5">
                    	<div class="dash-item banner_bg">
                        	<h3><a href="<?php echo base_url() ?>AdminController/agents"><i class="fa fa-user"></i>Agents</a></h3>
                        </div>
                    </div>-->
                      <!-- <div class="col-sm-2 pad5">
                        <div class="dash-item gallery_bg">
                            <h3><a href="<?php //echo base_url() ?>admin/events"><i class="fa fa-picture-o"></i>Events</a></h3>
                        </div>
                    </div>  --> 
                   <!--  <div class="col-sm-2 pad5">
                    	<div class="dash-item enq_bg">
                        	<h3><a href="<?php //echo base_url() ?>admin/achivements"><i class="fa fa-question-circle"></i>Achivements</a></h3>
                        </div>
                    </div> -->
                    <!--<div class="col-sm-2 pad5">
                    	<div class="dash-item setting_bg">
                        	<h3><a href="<?php echo base_url() ?>AdminController/settings"><i class="fa fa-cogs"></i>Settings</a></h3>
                        </div>
                    </div>
                    <div class="col-sm-2 padL5">
                    	<div class="dash-item user_bg">
                        	<h3><a href="<?php echo base_url() ?>AdminController/users"><i class="fa fa-user"></i>User</a></h3>
                        </div>
                    </div>-->
                    <div class="clearfix"></div>
                </div>
                      <div class="content-area">
                    <div class="col-sm-5 padR5">
                        <div class="activity">
                            <div class="activity_head">
                                <h4>Activites</h4>
                                <ul>
                                    <li><a href="#"><img src="<?php echo base_url() ?>assets/admin/images/act_close.png" /></a></li>
                                </ul>
                            </div>
                           
                            <div class="activity_body">
                                <table class="table table-condensed">
                              <?php foreach ($act as $keys ) { ?>
                                    <tr>
                                        <td><?php echo $keys->date; ?></td>
                                        <td></td>
                                        <td><?php 
                                        echo $keys->activity; ?></td>
                                    </tr>
                                <?php } ?>

                                </table>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="col-sm-3 pad5">
                        <div class="activity">
                            <div class="activity_head">
                                <h4>Site Visits</h4>
                                <ul>
                                    <li><a href="#"><img src="<?php echo base_url() ?>assets/admin/images/act_close.png" /></a></li>
                                </ul>
                            </div>
                            <div class="activity_body visits text-center">
                                <img src="<?php echo base_url() ?>assets/admin/images/visit.png"/>
                                <h1><?php echo count($visit); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="clearfix"></div>
                </div>
    		</section>
            <div class="clearfix"></div>
  		</div>
</body>
</html>
