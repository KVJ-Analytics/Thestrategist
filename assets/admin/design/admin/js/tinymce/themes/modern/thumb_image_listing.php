<?php include("header_listing.php"); ?>
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
                    	<h2><i class="fa fa-file-text-o"></i>Set product thumb image</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                	<div class="col-md-12">
                    	<div class="form-wrap">
                           <div class="form-wrap-title list-form-wrap-title">
                                <h3 class="inline-block">Set product thumb image</h3>
                                <ul class="list-actions">
                                	
                                
                                </ul>
                            </div> 
                            <div class="form-wrap-body form-tbl inner">
                      <form name="myform" id="myform" action="edit_product_image.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $_REQUEST['id']; ?>">
                            <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['user_id'];?>"/>
                                <table id="example" class="table table-striped table-bordered example" width="100%">
                                	<thead>
                                    	<tr>
                                        	<th>select image</th>
                                            
                                        </tr>
                                	</thead>  
                                    <tbody>
                                    
                                        	 <?php 	
						  $id=$_REQUEST['id'];
						 ?>
                                    	<tr>
                                        	<td width="15%">Images</td>
                                            <td width="5%">:</td>
                                            <td width="80%">				<?php
                                            $stmts = $mysqli->prepare("select id,image,main from product_images where product_id=?");
                                                $stmts->bind_param('i', $id);
                                                $stmts->execute();			
                                                $stmts->store_result();
                                                $stmts->bind_result($imgid,$image_name,$main);
                                                while ($stmts->fetch()){	
                                                ?>
                               <input type="radio" name="thumbb" value="<?php echo $imgid;?>" <?php if($main==1){ ?> checked <?php } ?> >
                                          <img src="<?php echo $image_name;?>" width="100" height="100" style="position:relative;"/>
                                                <?php
                                                }
                                                ?>
                        		    </td>
                                        </tr>
                                         <tr>
                                            <td>:</td>
                                            <td><input type="submit" name="submit" /></td>
                                        </tr>
                                    </tbody> 
                                </table>
                                </form>
                            </div>
                		</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
    		</section>
            <div class="clearfix"></div>
  		</div>
           <script src="js/datatables.js"></script>
    <script>
		(function($){
		  	$(".example").each(function () {
				$(this).dataTable();
			});
		}(jQuery))
    </script>
    
	<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
	<script src="media/bootstrap/js/bootstrap.js"></script>
	<script src="media/layout/js/app.js"></script>
	<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>	
    <script>
    function doconfirmcheck()
	{
	
	
	var chks = document.getElementsByName('banner[]');
		
	var hasChecked = false;
	for (var i = 0; i < chks.length; i++)
	{
		if (chks[i].checked)
		{
			hasChecked = true;
			break;
		}
	}
	if (hasChecked == false)
	{
		alert("Please select at least one.");
		return false;
	}
	
	job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
	
	
	document.forms["myform"].submit();
}

    </script>
</body>
</html>
