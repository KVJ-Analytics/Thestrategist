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
                    	<h2><i class="fa fa-file-text-o"></i> Edit Product</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <?php 
					$id=$_REQUEST['id'];
					$layout_stmts = $mysqli->prepare("select id,name,description,featured,sort_order from product where id=?");
					$layout_stmts->bind_param('i', $id);
					$layout_stmts->execute();
					$layout_stmts->store_result();
					$layout_stmts->bind_result($id,$name,$desc,$featured,$sort_order);
					$layout_stmts->fetch();
		        ?>
                <div class="content-area">
                    <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="edit_product_action.php".php" name="myform" enctype="multipart/form-data">
                    <input type="hidden" name="pid" id="pid" value="<?php echo $id;?>"/>
                    <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['user_id'];?>"/>
                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Edit Services</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                	<table>
                                        <tr>
                                        	<td>Name</td>
                                            <td>:</td>
                                            <td><input type="text" id="name" name="name" value="<?php echo $name;?>" required/></td>
                                        </tr>
                                        <tr>
                                        	<td width="15%">Images</td>
                                            <td width="5%">:</td>
                                            <td width="80%">
												<?php
                                                $stmts = $mysqli->prepare("select id,image from product_images where product_id=?");
                                                $stmts->bind_param('i', $id);
                                                $stmts->execute();			
                                                $stmts->store_result();
                                                $stmts->bind_result($id,$image_name);
                                                while ($stmts->fetch()){	
                                                ?>
                                                <img src="<?php echo $image_name;?>" width="100" height="100" style="position:relative;"/>
                                                <a href="javascript:void(0);" onClick="delete_file('<?php echo $id;?>')"><img src="x.png"/></a>
                                                <?php
                                                }
                                                ?>
                        					</td>
                                        </tr>
                                    	<tr>
                                        	<td width="15%">Images(image size max of 1 MB)</td>
                                            <td width="5%">:</td>
                                            <td width="80%">
                                            	<div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
											  	<input type="button" id="add_more" class="upload" value="Add More Files"/>
                       			 			</td>
                                        </tr>
                                        <tr>
                                        	<td>Description</td>
                                            <td>:</td>
                                            <td>
                                            	<textarea id="mytextarea"  name="des1" ><?php echo html_entity_decode($desc);?></textarea>
                                           	</td>
                                        </tr>
                                        <tr>
                                            <td>Featured Product</td>
                                            <td>:</td>
                                            <td><input type="checkbox" value="1" name="featured" <?php if($featured==1){?> checked<?php } ?> /></td>
                                        </tr>
                                        <tr>
                                        	<td>Sort Order</td>
                                            <td>:</td>
                                            <td><input type="text" id="sort_order" name="sort_order" value="<?php echo $sort_order;?>" required/></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Update Product" /></li>
                                <li><input type="button" name="submit" value="cancel" class="cancel-btn" /></li>
                                <li><input type="button" name="submit" value="Reset" class="reset-btn" /></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
               		</div>
               		</form>
            	</div>
                <div class="clearfix"></div>
    		</section>
            <div class="clearfix"></div>
  		</div>
        <div class="footer">
            <div class="col-md-12">
                <p>Copyright &copy; 2015 All rights reserved</p>
            </div>
            <div class="clearfix"></div>
        </div>
	</div>

	<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
	<script src="media/bootstrap/js/bootstrap.js"></script>
	<script src="media/layout/js/app.js"></script>
	<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="js/dropify.min.js"></script>
    <script src="js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script>
        $(document).ready(function(){
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove:  'Supprimer',
                    error:   'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('.dropify-event').dropify();

            drEvent.on('dropify.beforeClear', function(event, element){
                return confirm("Do you really want to delete \"" + element.filename + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element){
                alert('File deleted');
            });
        });
    </script>
    <script src='js/tinymce/tinymce.min.js'></script>
    <script>
	  tinymce.init({
		selector: '#mytextarea',
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
    
    <script>
	  tinymce.init({
		selector: '#mytextarea1',
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
    
    <script>
	  tinymce.init({
		selector: '#mytextarea2',
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
 	<script type="text/javascript">
    	$('.date input').datepicker({});
   	</script>
	<script>
		function delete_file(id)
		{
			var xmlhttp;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
  			{// code for IE6, IE5
  				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  			}
			xmlhttp.onreadystatechange=function()
  			{
  				if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{
    				alert(xmlhttp.responseText);
	 				location.reload();
    			}
  			}
			xmlhttp.open("GET","delete_product_img.php?value="+id,true);
			xmlhttp.send();
		}
	</script>
	<!--common scripts for all pages-->
</body>
</html>
