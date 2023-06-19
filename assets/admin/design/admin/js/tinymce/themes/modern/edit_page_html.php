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
                    	<h2><i class="fa fa-file-text-o"></i> Edit Html Code</h2>
                    </div>
                   
                    <div class="clearfix"></div>
                </div>
                <?php 
			
			$id=$_REQUEST['id'];
			
			$stmts = $mysqli->prepare("select href from  page_details where page_id=?");	
			$stmts->bind_param('i', $id);									
			$stmts->execute();
			$stmts->store_result();
			$stmts->bind_result($href);
			$stmts->fetch();
			
			$href="../".$href;
		 ?>
                <div class="content-area">
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="edit_page_html_action.php" name="myform" enctype="multipart/form-data">
               <input type="hidden" name="href" value="<?php echo $href; ?>" />
                        <input type="hidden" name="ids" value="<?php echo $id; ?>" />
                	<div class="col-md-12">
            
        				<div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Edit Code</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                	<table>
                                    	<tr>
                                        	<td width="15%">Edit code</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><textarea class="form-control" id="lay" name="lay" rows="20">
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
                            	<li><input type="submit" name="submit" value="Update Code" /></li>
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
