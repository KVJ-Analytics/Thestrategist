<?php include("header.php"); ?>
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
                    	<h2><i class="fa fa-file-text-o"></i> Edit Social Media</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <?php 

			

			$id=$_REQUEST['id'];

			

			

							$layout_stmts = $mysqli->prepare("select id,name,url,class,image,sort_order from social where id=?");

							$layout_stmts->bind_param('i', $id);

							$layout_stmts->execute();

							$layout_stmts->store_result();

							$layout_stmts->bind_result($id,$name,$url,$class,$image,$sort_order);

							$layout_stmts->fetch();

			

			//echo "select * from page_details where page_id='$id'";exit();

			

		 ?>

                <div class="content-area">
             <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="edit_social_action.php" name="myform" enctype="multipart/form-data">
              <input type="hidden" name="ids" value="<?php echo $id; ?>" />
                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Edit Social Media</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	<tr>
                                        	<td>Choose Social Media</td>
                                            <td>:</td>
                                            <td><select  id="select" name="social" >

                                		<option value="<?php echo $name; ?>"><?php echo $name; ?></option>

                                        <option value="Facebook">Facebook</option>

                                        <option value="Twitter">Twitter</option>

                                        <option value="Gplus">Gplus</option>

                                        <option value="You Tube">You Tube</option>

                                        <option value="Rss">Rss</option>

                                        <option value="Linked In">Linked In</option>

                                        <option value="Instagram">Instagram</option>

                              	</select>  </td>
                                        </tr>
                                    	
                                        <tr>
                                        	<td>Social Media Url</td>
                                            <td>:</td>
                                            
                                            
                                            
                                            
                                            
                                            <td><input type="text" id="url" name="url" value="<?php echo $url;  ?>" /></td>
                                        </tr>
                                            <?php if($user_type!="user") {?>
                                        <tr>
                                        	<td>Class (If any css class Required)</td>
                                            <td>:</td>
                                            <td><input type="text" id="class" name="class" value="" /></td>
                                        </tr>
                                      <?php }else{ ?>

                        	<input  id="class" name="class"  type="hidden" value="<?php echo $class; ?>"  />

                        <?php } ?>
                        
                                        <tr>
                                        	<td valign="top">Image</td>
                                            <td valign="top">:</td>
                                            <td><input type="file" id="input-file-now-custom-2" class="dropify" data-default-file="<?php echo $image; ?>" data-height="150" name="file1"  /></td>
                                        </tr>
                        
                        
                                        <tr>
                                        	<td>Sort Order</td>
                                            <td>:</td>
                                            <td><input type="text" id="sort_order" name="sort_order" value="<?php echo $sort_order; ?>" required/></td>
                                        </tr>
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Update Social" /></li>
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
