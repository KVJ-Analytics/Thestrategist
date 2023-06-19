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
                    	<h2><i class="fa fa-file-text-o"></i> Add Social Media</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
             <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="add_social_action.php" name="myform" enctype="multipart/form-data">
                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Add Social Media</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	<tr>
                                        	<td>Choose Social Media</td>
                                            <td>:</td>
                                            <td><select  id="select" name="social" >

                                                <option value="Facebook">Facebook</option>
        
                                                <option value="Twitter">Twitter</option>
        
                                                <option value="Gplus">Gplus</option>
        
                                                <option value="You Tube">You Tube</option>
        
                                                <option value="Rss">Rss</option>
        
                                                <option value="Linked In">Linked In</option>
        
                                                <option value="Instagram">Instagram</option>
                                                </select></td>
                                        </tr>
                                    	
                                        <tr>
                                        	<td>Social Media Url</td>
                                            <td>:</td>
                                            <td><input type="text" id="url" name="url" value="" /></td>
                                        </tr>
                                        <tr>
                                        	<td>Class (If any css class Required)</td>
                                            <td>:</td>
                                            <td><input type="text" id="class" name="class" value="" /></td>
                                        </tr>
                                        <tr>
                                        	<td valign="top">Image</td>
                                            <td valign="top">:</td>
                                            <td><input type="file" id="input-file-now-custom-2" class="dropify"  data-height="150" name="file1"  /></td>
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
                            	<li><input type="submit" name="submit" value="Add Social" /></li>
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
