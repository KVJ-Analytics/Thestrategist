<?php 
    
    // session_start();
    include("header.php");
    require_once('Class/AdminClass.php');

 ?>
<body class="skin-blue fixed sidebar-mini">
	<div class="wrapper">
  		<?php include("side_header.php"); ?>
  		<!-- =============================================== -->
        <?php include("menu.php"); ?>
  		<!-- =============================================== -->
  		<div class="content-wrapper">
  			<section class="col-lg-12">
    			<div class="content-area">
                	<div class="col-md-12">
                    	<h2><i class="fa fa-file-text-o"></i> Add About Contents</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                 <?php 

                       
                        $adminObj=new AdminClass();
                        $selectFacility=$adminObj->selectFacility();
                        
                       // print_r($selectFacility)
							// $layout_stmts = $mysqli->prepare("select main_content,what from about ");

							// $layout_stmts->execute();

							// $layout_stmts->store_result();

							// $layout_stmts->bind_result($main_content,$what);

							// $layout_stmts->fetch();

				 ?>
                <div class="content-area">
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="add_about_action.php" name="myform" enctype="multipart/form-data">
                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                             <?php 
                                if(isset($_SESSION['success'])){
                            ?>
                            <div class="alert alert-success center text-center">
                                <strong><?php  
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']);?>
                                </strong> 
                            </div>
                            <?php 
                            }
                            ?>
                            <?php 
                                if(isset($_SESSION['error'])){
                            ?>
                            <div class="alert alert-danger center text-center">
                                <strong><?php  
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);?>
                                </strong> 
                            </div>
                            <?php 
                            }
                            ?>
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3> Add About Contents</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                        <tr>
                                            <td>Title</td>
                                            <td>:</td>
                                            <td><input type="text" id="name" name="name" value="<?php echo $selectFacility['f_title']; ?>" required/></td>
                                        </tr>
                                        <tr>
                                            <td>Who Are You?</td>
                                            <td>:</td>
                                            <td><textarea id="mytextarea"  name="des"><?php echo $selectFacility['f_description']; ?></textarea></td>
                                        </tr>
                                    	
                                    	<tr>
                                            <td valign="top">Default Banner</td>
                                            <td valign="top">:</td>
                                            <td><input type="file" id="input-file-now-custom-2" class="dropify" data-default-file="<?php echo $selectFacility['f_image']; ?>" data-height="150" name="file"  /></td>
                                            <input type="hidden"  value="<?php echo $selectFacility['f_image']; ?>" name="file_old"  />
                                        </tr>
                                       
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Update" /></li>
                               
                                <li><input type="button" name="submit" value="Reset" class="reset-btn" /></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                   </form>
                    <div class="clearfix"></div>
                </div>
    		</section>
            <div class="clearfix"></div>
  		</div>
        <?php include("footer.php");?>
</body>
</html>
