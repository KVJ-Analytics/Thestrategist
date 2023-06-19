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
                    	<h2><i class="fa fa-file-text-o"></i> Edit Courses</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <?php 
							$id=$_REQUEST['id'];
							$layout_stmts = $mysqli->prepare("select courseid,name,detailimage,duration,description,sort_order from courses where courseid=?");
							$layout_stmts->bind_param('i', $id);
							$layout_stmts->execute();
							$layout_stmts->store_result();
							$layout_stmts->bind_result($id,$name,$detailimage,$duration,$description,$sort_order);
							$layout_stmts->fetch();
							
		 		?>
                <div class="content-area">
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="edit_courses_action.php" name="myform" enctype="multipart/form-data">
               <input type="hidden" name="pid" id="pid" value="<?php echo $id;?>"/>
               <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['user_id'];?>"/>
                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Edit Courses</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                    
                                    <table>
                                    	<tr>
                                        	<td>Title</td>
                                            <td>:</td>
                                            <td><input id="cname" name="name" minlength="2" type="text" required value="<?php echo $name;?>"/></td>
                                        </tr>
                                        
                                        <tr>
                                       
                                             <tr>
                                        	<td width="15%">Detail Image</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file"  id="input-file-now-custom-2" class="dropify" data-height="150" name="file"  data-default-file="<?php echo $detailimage; ?>"/></td>
                                        </tr>
                                       <tr>
                                        	<td>Duration</td>
                                            <td>:</td>
                                            <td><input id="duration" name="duration" minlength="2" type="text" required value="<?php echo $duration;?>"/></td>
                                        </tr>
                                       <tr>
                                        	<td>Description</td>
                                            <td>:</td>
                                          <td><textarea id="mytextarea" name="des1" ><?php echo $description;?></textarea></td>
                                        </tr>                                        
                                        <tr>
                                        	<td>Sort Order</td>
                                            <td>:</td>
                                            <td><input id="sort" name="sort"  type="text"  required value="<?php echo $sort_order;?>"/></td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Update Courses" /></li>                                
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
        <div class="footer">
            <div class="col-md-12">
                <p>Copyright &copy; 2015 All rights reserved</p>
            </div>
            <div class="clearfix"></div>
        </div>
	</div>

<?php include("footer.php");?>       
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
  
xmlhttp.open("GET","delete_service_img.php?value="+id,true);
xmlhttp.send();
}
</script>
<!--common scripts for all pages-->


</body>
</html>
