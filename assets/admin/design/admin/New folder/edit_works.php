<?php 
// session_start();
include("header.php"); 
require_once("Class/WorkClass.php");
$workObj=new WorkClass;

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
                    	<h2><i class="fa fa-file-text-o"></i> Edit Work</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                <?php 


$id=$_REQUEST['id'];
$work=$workObj->selectSingleWork($id);

// $stmts5=$mysqli->prepare("select id,name,category from portfolio where id=?");

// $stmts5->bind_param('i',$id);							

// $stmts5->execute();

// $stmts5->store_result();

// $stmts5->bind_result($id,$name,$category);

// $stmts5->fetch();

// $stmts51=$mysqli->prepare("select name from category where id=?");

// $stmts51->bind_param('i',$category);							

// $stmts51->execute();

// $stmts51->store_result();

// $stmts51->bind_result($names);

// $stmts51->fetch();

							

?>
                	<form class="cmxform form-horizontal adminex-form" method="post" action="edit_work_action.php" name="myform" enctype="multipart/form-data">
                 <input type="hidden" name="ids" value="<?php echo $id; ?>" />
               <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['user_id'];?>"/>
                  	<div class="col-md-12">                        
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Edit Work</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	<tr>
                                        	<td>Name</td>
                                            <td>:</td>
                                            <td><input id="cname" name="name" type="text" required value="<?php echo $work['w_title'];?>"/></td>
                                        </tr>
                                       <tr>
                                        	<td width="15%">Images</td>
                                            <td width="5%">:</td>
                                            <td width="80%">
                                            <?php

                                            $imagesByWork=$workObj->imagesByWork($id);
           //                                  $stmts = $mysqli->prepare("select id,image from gallery_images where gal_id=?");

											// $stmts->bind_param('i', $category);
				
											// $stmts->execute();
				
											// $stmts->store_result();
				
											// $stmts->bind_result($id,$image_name);
				
											foreach ($imagesByWork as $image) {
                        # code...
                 
													
												?>
                                            <img src="<?php echo $image['wimg_image'];?>" alt="" width="100" height="100" style="position:relative;"/>
                            			    <a href="javascript:void(0);" onClick="delete_file('<?php echo $image['wimg_id'];?>')"><img src="x.png"/></a>
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
                        					</div>
                       			 </td>
                                        </tr>
                                        <tr>
                                          <td>Description</td>
                                            <td>:</td>
                                            <td><textarea id="des" name="des1" ><?php echo strip_tags($work['w_description']);?></textarea></td>
                                        </tr>
                                       
                                    	
                            
                                        
                                       
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Update Work" /></li>
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
		selector: '#des1',
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
  
xmlhttp.open("GET","delete_work_img.php?value="+id,true);
xmlhttp.send();
}
</script>

</body>
</html>