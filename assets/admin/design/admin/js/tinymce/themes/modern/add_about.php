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
                    	<h2><i class="fa fa-file-text-o"></i> Add About Contents</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                 <?php 
		
							$layout_stmts = $mysqli->prepare("select title,subtitle,institution,history,image from about");

							$layout_stmts->execute();

							$layout_stmts->store_result();

							$layout_stmts->bind_result($title,$subtitle,$institution,$history,$image);

							$layout_stmts->fetch();

				 ?>
                <div class="content-area">
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="add_about_action.php" name="myform" enctype="multipart/form-data">
                            <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['user_id'];?>"/>
                	<div class="col-md-12">                                                                       
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>About us  Contents</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                <table>
                                        <tr>
                                        	<td>Title</td>
                                            <td>:</td>
                                            <td><input type="text" name="title" required value="<?php echo $title;?>"/></td>
                                        </tr>
                                         <tr>
                                        	<td>Sub Title</td>
                                            <td>:</td>
                                            <td><input type="text" name="subtitle" required value="<?php echo $subtitle;?>"/></td>
                                        </tr>
                                        <tr>
                                        	<td>About Institution</td>
                                            <td>:</td>
                                            <td><textarea id="mytextarea1"  name="des2" ><?php echo html_entity_decode($institution);?></textarea></td>
                                        </tr>
                                         <tr>
                                        	<td>About Our History</td>
                                            <td>:</td>
                                            <td><textarea id="mytextarea2"  name="des3" ><?php echo html_entity_decode($history);?></textarea></td>
                                        </tr>
                                        <tr>
                                        	<td width="15%">Image</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file" data-default-file="<?php echo $image; ?>" id="input-file-now-custom-2" class="dropify" data-height="150" name="file2"  /></td>
                                        </tr>
                                       
                                                                         
                                </table>
                                   
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Update" /></li>
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
