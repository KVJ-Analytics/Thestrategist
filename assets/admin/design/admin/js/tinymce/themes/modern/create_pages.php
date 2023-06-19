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
                    	<h2><i class="fa fa-file-text-o"></i> Create Page</h2>
                    </div>
                    <?php if(isset($_REQUEST['page'])){?>
  <label for="ccomment" class="control-label col-lg-2" style="color:red; font-size:10px;">Page Name already exists!!</label>
								<?php } ?>
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="create_page_action.php" name="myform" enctype="multipart/form-data">
                	<div class="col-md-12">
                    	<div class="col-sm-6">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Basic Details</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                	<table>
                                    	<tr>
                                        	<td width="25%">Page Name</td>
                                            <td width="5%">:</td>
                                            <td width="70%"><input type="text" id="cname" name="name" value="" required /></td>
                                        </tr>
                                        <tr>
                                        	<td>Page Title</td>
                                            <td>:</td>
                                            <td><input type="text" name="title" value="" required/></td>
                                        </tr>
                                        <tr>
                                        	<td>Page Heading</td>
                                            <td>:</td>
                                            <td><input type="text" name="head" value="" required/></td>
                                        </tr>
                                        <tr>
                                        	<td>Page Url Status</td>
                                            <td>:</td>
                                            <td>
                                                <select id="url_status" name="url_status">
                                                	<option value="1">Enable</option>
                                                    <option value="0">Disable</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>Page Status</td>
                                            <td>:</td>
                                            <td>
                                                <select id="status" name="status">
                                                	<option value="1">Enable</option>
                                                    <option value="0">Disable</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>SEO Informations</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                	<table>
                                    	<tr>
                                        	<td width="28%">SEO Keyword</td>
                                            <td width="5%">:</td>
                                            <td width="67%"><input type="text" name="seo_key" value="" /></td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>Meta Keyword</td>
                                            <td>:</td>
                                            <td><input type="text" name="key" value="" /></td>
                                        </tr>
                                        <tr>
                                        	<td valign="top">Meta Description</td>
                                            <td valign="top">:</td>
                                            <td><textarea name="desc"></textarea></td>
                                        </tr>
                                        <tr>
                                        	<td>Meta Auther</td>
                                            <td>:</td>
                                            <td><input type="text" name="author" value="" /></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Appearance Settings & Content Management</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                	<table>
                                    	<tr>
                                        	<td width="15%">Banner Image</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file" id="input-file-now-custom-2" class="dropify" data-height="150" name="file"  /></td>
                                        </tr>
                                       <!-- <tr>
                                        	<td width="15%">Banner Icon</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file" id="input-file-now-custom-2" class="dropify" data-height="150" name="file1"  /></td>
                                        </tr>
                                        <tr>
                                        	<td>Banner Title</td>
                                            <td>:</td>
                                            <td><input type="text" id="banner_title" name="banner_title" value="" required/></td>
                                        </tr>
                                        <tr>
                                        	<td>Banner Content</td>
                                            <td>:</td>
                                            <td><input type="text" id="banner_content" name="banner_content" value="" required/></td>
                                        </tr>
                                        
                                        <tr>
                                        	<td width="28%">Default Image</td>
                                            <td width="5%">:</td>
                                            <td width="67%"><input type="file" id="input-file-now-custom-2" class="dropify" data-height="150" name="image" value="" /></td>
                                        </tr>-->
                                        <?php $stmt = $mysqli->prepare("select layout_name from  layout");
											  $stmt->execute();
											  $stmt->store_result();
									          $stmt->bind_result($lay);
										?>
                                        <tr>
                                        	<td>Page Layout</td>
                                            <td>:</td>
                                            <td>
                                                <select name="layout">
                                                <?php while($stmt->fetch()){?>
                                                	<option value="<?php echo $lay;?>"><?php echo $lay;?></option>
												<?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>Page Content</td>
                                            <td>:</td>
                                            <td><textarea id="mytextarea"  name="des1" required>Hello, World!</textarea></td>
                                        </tr>
                                        <tr>
                                        	<td>Sort Order</td>
                                            <td>:</td>
                                            <td><input type="text" id="sort_order" name="sort_order" value="" required/></td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Create Page" /></li>
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
