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
                    	<h2><i class="fa fa-file-text-o"></i> Edit Banner</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <?php 

			$banner_id=$_REQUEST['id'];

			$stmts5_banner =$mysqli->prepare("select title,image,url,sort_order from brand where brand_id=?");	

			$stmts5_banner->bind_param('i', $banner_id);									

			$stmts5_banner->execute();

			$stmts5_banner->store_result();

			$stmts5_banner->bind_result($title,$image,$url,$sort_order);

			$stmts5_banner->fetch();

		 ?>
                <div class="content-area">
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="edit_client_action.php" name="myform" enctype="multipart/form-data">
               <input type="hidden" name="ids" value="<?php echo $banner_id; ?>" />
               <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['user_id'];?>"/>
                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Edit Banner Images</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	<tr>
                                        	<td>Title</td>
                                            <td>:</td>
                                            <td><input type="text" id="name" name="name" value="<?php echo $title; ?>" required/></td>
                                        </tr>
                                    	<tr>
                                        	<td width="15%">Banner Image</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file" data-default-file="<?php echo $image; ?>" id="input-file-now-custom-2" class="dropify" data-height="150" name="file"  /></td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>Caption</td>
                                            <td>:</td>
                                            <td><input type="text" id="url" name="url" value="<?php echo $url; ?>" required/></td>
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
                            	<li><input type="submit" name="submit" value="Update Client" /></li>
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
