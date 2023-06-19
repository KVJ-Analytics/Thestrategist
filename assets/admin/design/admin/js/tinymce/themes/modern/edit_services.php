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
                    	<h2><i class="fa fa-file-text-o"></i> Edit Services</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <?php 
							$id=$_REQUEST['id'];
							$layout_stmts = $mysqli->prepare("select id,name,caption,icon,image,description,page,sort_order from services where id=?");
							$layout_stmts->bind_param('i', $id);
							$layout_stmts->execute();
							$layout_stmts->store_result();
							$layout_stmts->bind_result($id,$name,$caption,$icon,$image,$description,$page,$sort_order);
							$layout_stmts->fetch();
							
		 		?>
                <div class="content-area">
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="edit_services_action.php" name="myform" enctype="multipart/form-data">
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
                                        	<td>Title</td>
                                            <td>:</td>
                                            <td><input id="cname" name="name" minlength="2" type="text" required value="<?php echo $name;?>"/></td>
                                        </tr>
                                        <tr>
                                        	<td>Home Caption</td>
                                            <td>:</td>
                                            <td><input id="caption" name="caption" minlength="2" type="text"  value="<?php echo $caption;?>"/></td>
                                        </tr>
                                         </tr>
                                        
                                        
                                            <tr>
                                        	<td width="15%">Home Icon</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file"  id="input-file-now-custom-2" class="dropify" data-height="150" name="file1" data-default-file="<?php echo $icon; ?>"/></td>
                                        </tr>
                                        <tr>
                                       
                                             <tr>
                                        	<td width="15%">Image</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file"  id="input-file-now-custom-2" class="dropify" data-height="150" name="file"  data-default-file="<?php echo $image; ?>"/></td>
                                        </tr>
                                       
                                       <tr>
                                        	<td>Description</td>
                                            <td>:</td>
                                          <td><textarea id="mytextarea" name="des1" ><?php echo $description;?></textarea></td>
                                        </tr>
                                        <tr>
                                        	<td>Page </td>
                                            <td>:</td>
                                            <td>
                                                <select name="page">
                                                <?php
              					  $stmt = $mysqli->prepare("select page_name from  page_details where page_id='$page' ");
									$stmt->execute();
									$stmt->store_result();
									$stmt->bind_result($page_name);
									$stmt->fetch();
									?>
                                    <?php
              					  $stmt1 = $mysqli->prepare("select page_id,page_name from  page_details where layout='services'and page_id!='$page' ORDER BY sort_order asc");
									$stmt1->execute();
									$stmt1->store_result();
									$stmt1->bind_result($page_id1,$page_name1);
									?>
                                                 <option value="<?php echo $page;?>"><?php echo $page_name;?></option>
													<?php
                                                    while($stmt1->fetch())
                                                    {
                                                    ?>
                                                        <option value="<?php echo $page_id1;?>"><?php echo $page_name1;?></option>
                                                     <?php
                                                     }
                                                     ?>
                                                </select>
                                            </td>
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
                            	<li><input type="submit" name="submit" value="Update Services" /></li>
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
