<?php include("header.php"); ?>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<link href="css/multiimage.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap-fileupload.min.css" />
<script src="js/jquery-1.8.0.min.js"></script>
<script src="js/script.js"></script>\
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
                    	<h2><i class="fa fa-file-text-o"></i> Add Students Corner</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
               

                <div class="content-area">
                	<form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="add_corner_action.php" name="myform" enctype="multipart/form-data">
                    <input type="hidden" name="dp" id="dp" value="">
                              <input type="hidden" name="userid" id="usreid" value="<?php echo $_SESSION['user_id'];?>">
                  	<div class="col-md-12">                        
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Add Students Corner</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	<tr>
                                        	<td>Title</td>
                                            <td>:</td>
                                            <td><input id="cname" name="name" minlength="2" type="text" required /></td>
                                        </tr>
                                       
                                        
                                            <tr>
                                        	<td width="15%">Front Image</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file"  id="input-file-now-custom-2" class="dropify" data-height="150" name="file" /></td>
                                        </tr>
                                        </tr>
                                        
                                        
                                            <tr>
                                        	<td width="15%">Detail Image</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file"  id="input-file-now-custom-2" class="dropify" data-height="150" name="file1" /></td>
                                        </tr>
                                      
                                       <tr>
                                        	<td>Description</td>
                                            <td>:</td>
                                          <td><textarea id="mytextarea" name="des1" ></textarea></td>
                                        </tr>
                                       
                                        <tr>
                                        	<td>Sort Order</td>
                                            <td>:</td>
                                            <td><input id="sort" name="sort"  type="text"  required/></td>
                                        </tr>
                                       
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Add Students Corner" /></li>
                                
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