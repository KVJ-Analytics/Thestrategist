<?php include("header.php"); ?>
<body class="sticky-header">

<section>
    <!-- left side start-->
    <?php include("menu.php"); ?>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <?php include("user_info.php"); ?>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                EDIT ABOUT PAGE CONTENT
            </h3>
        </div>
        <!-- page heading end-->
		<?php 
			
			$id=1;
			
			$stmt_services = $mysqli->prepare("select top,middle,bottom,image from about_us where id=?");	
			$stmt_services->bind_param('i', $id);								
			$stmt_services->execute();
			$stmt_services->store_result();
			$stmt_services->bind_result($top,$middle,$bottom,$image);
			$stmt_services->fetch();
		 ?>
        <!--body wrapper start-->
        <section class="wrapper">
        <!-- page start-->
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Edit About Us Page Details
            </header>
			<div class="panel-body">
            	<div class=" form">
                	<form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="edit_about_page_action.php" name="myform" enctype="multipart/form-data">
                    	<input type="hidden" name="id" value="<?php echo $id;?>"/>
                        <div class="form-group ">
                          	<label class="control-label col-md-2">Current About Image</label>
                            <div class="col-lg-10">
                              <img src="<?php echo $image; ?>" alt="" width="200" height="150" />
                            </div>
                       	</div>
                        <div class="form-group ">
                          	<label class="control-label col-md-2">About Image Upload</label>
                            <div class="col-lg-10">
                            	<div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="images/upload.jpg" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                           <span class="btn btn-default btn-file">
                                           <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                           <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                           <input type="file" class="default" name="file" />
                                           </span>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                       	</div>
                         
                        <div class="form-group ">
                        	<label for="ccomment" class="control-label col-lg-2">Page Top Content</label>
                            <div class="col-lg-10">
                            	<textarea id="des1" name="des1" rows="10" cols="80"><?php echo html_entity_decode($top);?></textarea>
                           	</div>
                     	</div>
                        
                        <div class="form-group ">
                        	<label for="ccomment" class="control-label col-lg-2">Page Middle Content</label>
                            <div class="col-lg-10">
                            	<textarea id="des2" name="des2" rows="10" cols="80"><?php echo html_entity_decode($middle);?></textarea>
                           	</div>
                     	</div>
                        <div class="form-group ">
                        	<label for="ccomment" class="control-label col-lg-2">Page Bottom Content</label>
                            <div class="col-lg-10">
                            	<textarea id="des3" name="des3" rows="10" cols="80"><?php echo html_entity_decode($bottom);?></textarea>
                           	</div>
                     	</div>
                        <div class="form-group">
                        	<div class="col-lg-offset-2 col-lg-10">
                            	<button class="btn btn-primary" type="submit">Save</button>
                          	</div> 
                        </div>
                  	</form>
         		</div>
  			</div>
        </section>
        </div>
        </div>
        
        <!-- page end-->
        </section>
        <!--body wrapper end-->

        <!--footer section start-->
        <?php include("footer.php"); ?>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>
<script type="text/javascript">
	var editor = CKEDITOR.replace( 'des1', {
    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>
<script type="text/javascript">
	var editor = CKEDITOR.replace( 'des2', {
    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>
<script type="text/javascript">
	var editor = CKEDITOR.replace( 'des3', {
    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>
<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>

<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src="js/validation-init.js"></script>
<!--common scripts for all pages-->
<script src="js/scripts.js"></script>
<script type="text/javascript" src="js/bootstrap-fileupload.min.js"></script>

</body>
</html>