<?php include("header.php"); ?>
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
                    	<h2><i class="fa fa-file-text-o"></i> Add Portfolio</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                	<form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="add_gallery_action.php" name="myform" enctype="multipart/form-data">
                    <input type="hidden" name="dp" id="dp" value="">
                              <input type="hidden" name="userid" id="usreid" value="<?php echo $_SESSION['user_id'];?>">
                  	<div class="col-md-12">                        
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Add Portfolio Images</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	<tr>
                                        	<td>Name</td>
                                            <td>:</td>
                                            <td><input id="cname" name="name" minlength="2" type="text" required /></td>
                                        </tr>
                                        <tr>
                                        	<td width="15%">Images(image size max of 1 MB)</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
											  <input type="button" id="add_more" class="upload" value="Add More Files"/>
                        </div></td>
                                       <tr>
                                        	<td>Description</td>
                                            <td>:</td>
                                            <td><textarea id="des" name="des" ></textarea></td>
                                        </tr>
                               
                                      
                                       
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Add Portfolio" /></li>
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
        <script>
	  tinymce.init({
		selector: '#des',
		 height: 200,
		  plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table contextmenu paste code jbimages'
		  ],
		  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages',
		  content_css: [
			'//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
			'//www.tinymce.com/css/codepen.min.css'
		  ],
		  relative_urls: false
	  });
  	</script>
</body>
</html>