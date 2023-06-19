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
                Edit Site Information
            </h3>
        </div>
        <!-- page heading end-->
		<?php 
			$id=1;
			//echo "select * from page_details where page_id='$id'";exit();
			
			$stmts5_banner =$mysqli->prepare("select site_name,owner_name,phone,address,home_con,foot,email,contact_map,youtube,facebook_url,twitter_url,linkdn_url,gplus_url,logo,banner,fav_ico from basic where id=?");	
			$stmts5_banner->bind_param('i', $id);									
			$stmts5_banner->execute();
			$stmts5_banner->store_result();
			$stmts5_banner->bind_result($site_name,$owner_name,$phone,$address,$home_con,$foot,$email,$contact_map,$you,$facebook_url,$twitter_url,$linkdn_url,$gplus_url,$logo,$banner,$fav);
			$stmts5_banner->fetch();
			
		 ?>
        <!--body wrapper start-->
        <section class="wrapper">
        <!-- page start-->
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Site Information
            </header>
			<div class="panel-body">
            	<div class=" form">
                	<form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="basic_info_action.php" name="myform" enctype="multipart/form-data">
                    	<input type="hidden" name="id" value="<?php echo $id; ?>" />
                    	<div class="form-group ">
                          	<label for="cname" class="control-label col-lg-2">Site Name</label>
                            <div class="col-lg-10">
                            	<input class=" form-control" id="cname" name="name" minlength="2" type="text" required value="<?php echo $site_name; ?>" />
                            </div>
                       	</div>
                        <div class="form-group ">
                          	<label for="cname" class="control-label col-lg-2">Owner Name</label>
                            <div class="col-lg-10">
                            	<input class=" form-control" id="href" name="oname" minlength="2" type="text" required value="<?php echo $owner_name; ?>" />
                            </div>
                       	</div>
                        <div class="form-group ">
                          	<label for="cname" class="control-label col-lg-2">Phone Number(Show on top of site)</label>
                            <div class="col-lg-10">
                            	<input class=" form-control" id="cname" name="phone" minlength="2" type="text" value="<?php echo $phone; ?>"  />
                            </div>
                       	</div>
                        <div class="form-group ">
                          	<label for="cname" class="control-label col-lg-2">Address1</label>
                            <div class="col-lg-10">
                            	<textarea id="des1" name="address" rows="10" cols="80"><?php echo html_entity_decode($address);?></textarea>
                            </div>
                       	</div>
                         <div class="form-group ">
                          	<label for="cname" class="control-label col-lg-2">Home Welcome Content</label>
                            <div class="col-lg-10">
                            	<textarea id="des2" name="address1" rows="10" cols="80"><?php echo html_entity_decode($home_con);?></textarea>
                            </div>
                       	</div>
                        <div class="form-group ">
                        	<label for="ccomment" class="control-label col-lg-2">Footer Content</label>
                            <div class="col-lg-10">
                            	<textarea class="form-control " id="foot" name="foot" ><?php echo $foot; ?></textarea>
                           	</div>
                     	</div>
                        <div class="form-group ">
                          	<label class="control-label col-md-2">Current Logo</label>
                            <div class="col-lg-10">
                              <img src="<?php echo $logo; ?>" alt="" width="200"  />
                            </div>
                       	</div>
                        <div class="form-group ">
                          	<label class="control-label col-md-2">logo Image Upload</label>
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
                                                   <input type="file" class="default" name="file1" />
                                                   </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                            </div>
                                        </div>
                            </div>
                       	</div>
                        
                        
                        <div class="form-group ">
                          	<label class="control-label col-md-2">Current Fav Icon</label>
                            <div class="col-lg-10">
                              <img src="<?php echo $fav; ?>" alt="" width="35" />
                            </div>
                       	</div>
                        <div class="form-group ">
                          	<label class="control-label col-md-2">Fav Icon Image Upload</label>
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
                                                   <input type="file" class="default" name="fav" />
                                                   </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                            </div>
                                        </div>
                            </div>
                       	</div>
                        
                        <div class="form-group ">
                          	<label for="cname" class="control-label col-lg-2">Email</label>
                            <div class="col-lg-10">
                            	<input class=" form-control" id="cname" name="email" minlength="2" type="text" value="<?php echo $email; ?>" />
                            </div>
                       	</div>
                        <div class="form-group ">
                        	<label for="ccomment" class="control-label col-lg-2">Google map</label>
                            <div class="col-lg-10">
                            	<textarea class="form-control " id="map" name="map" ><?php echo $contact_map; ?></textarea>
                           	</div>
                     	</div>
                        <div class="form-group ">
                        	<label for="ccomment" class="control-label col-lg-2">Profile Video</label>
                            <div class="col-lg-10">
                            	<textarea class="form-control " id="you" name="you" ><?php echo $you; ?></textarea>
                           	</div>
                     	</div>
                        <div class="form-group ">
                          	<label class="control-label col-md-2">Current Default Banner</label>
                            <div class="col-lg-10">
                              <img src="<?php echo $banner; ?>" alt="" width="200"  />
                            </div>
                       	</div>
                        <div class="form-group ">
                          	<label class="control-label col-md-2">Default Banner Image Upload</label>
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
