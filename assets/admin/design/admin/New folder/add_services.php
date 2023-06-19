<?php 

    // session_start();
    include("header.php");

 ?>
<link href="css/multiimage.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap-fileupload.min.css" />
<script src="js/jquery-1.8.0.min.js"></script>
<script src="js/script.js"></script>
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
                    	<h2><i class="fa fa-file-text-o"></i> Add Services</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="add_service_action.php" name="myform" enctype="multipart/form-data">
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
                                	<h3>Add Services</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	<tr>
                                        	<td>Title</td>
                                            <td>:</td>
                                            <td><input type="text" id="name" name="name" value="" required/></td>
                                        </tr>
                                       <tr>
                                        	<td width="15%">Home Icon</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file" id="input-file-now-custom-2" class="dropify" data-height="150" name="file1"  /></td>
                                        </tr>
                                    	<tr>
                                        	<td width="15%">Images(image size max of 1 MB)</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><div id="filediv"><input name="file" type="file" id="file"/></div><br/>
											  <!-- <input type="button" id="add_more" class="upload" value="Add More Files"/> -->
                                </div></td>
                                       <tr>
                                        
                                        <tr>
                                        	<td>description</td>
                                            <td>:</td>
                                            <td><textarea id="mytextarea"  name="des1" required>Hello, World!</textarea></td>
                                        </tr>
                                        <tr>
                                        	<td>Sort Order</td>
                                            <td>:</td>
                                            <td><input type="text" id="sort_order" name="sort_order" value="" required/></td>
                                        </tr>
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Add Services" /></li>
                                <li><input type="button" name="submit" value="cancel" class="cancel-btn" /></li>
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
