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
                    	<h2><i class="fa fa-file-text-o"></i> Edit Layout</h2>
                    </div>                   
                    <div class="clearfix"></div>
                    			<?php 
			
							$lid=$_REQUEST['id'];
							$layout_stmts = $mysqli->prepare("select lay_id,layout_name,href from  layout where lay_id=?");
							$layout_stmts->bind_param('i', $lid);
							$layout_stmts->execute();
							$layout_stmts->store_result();
							$layout_stmts->bind_result($lay_id,$layout_name,$href);
							$layout_stmts->fetch();

		 ?>
                </div>
                <div class="content-area">
              <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="edit_layout_action.php" name="myform" enctype="multipart/form-data">
              <input type="hidden" name="href" value="<?php echo $href; ?>" />
              <input type="hidden" name="ids" value="<?php echo $lid; ?>" />
                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Edit Layout</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	<tr>
                                        	<td>Layout Name</td>
                                            <td>:</td>
                                            <td><input type="text" id="name" name="name" value="<?php echo $layout_name;  ?>" required/></td>
                                        </tr>
                                    	
                                        
                                        <tr>
                                        	<td>Paste Layout</td>
                                            <td>:</td>
                                            <td><textarea   name="lay" id="lay" required style="height:300px; overflow-y:auto;">
											<?php  
												$file = fopen($href, "r");
												while(!feof($file)){
													echo fgets($file);
												}
												fclose($file);
											?>
                                    </textarea></td>
                                        </tr>
                                        
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Update Layout" /></li>
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
