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
                    	<h2><i class="fa fa-file-text-o"></i> Add Categories</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                	<form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="add_category_action.php" name="myform" enctype="multipart/form-data">
                  	<div class="col-md-12">                        
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Add Banner Images</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	<tr>
                                        	<td>Name</td>
                                            <td>:</td>
                                            <td><input id="cname" name="name" type="text" required /></td>
                                        </tr>
                                    	
                                        <tr>
                                        	<td>Sort Order</td>
                                            <td>:</td>
                                            <td><input id="sort_order" name="sort_order"  type="text" required /></td>
                                        </tr>
                                       
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Add Category" /></li>
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
