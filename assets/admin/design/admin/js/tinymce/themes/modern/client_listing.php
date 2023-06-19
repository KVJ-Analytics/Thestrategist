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
                    	<h2><i class="fa fa-file-text-o"></i>Client Listings</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                	<div class="col-md-12">
                    	<div class="form-wrap">
                           <div class="form-wrap-title list-form-wrap-title">
                                <h3 class="inline-block">Clients</h3>
                                <ul class="list-actions">
                                	<li class="created"><a href="add_clients.php"><i class="fa fa-plus"></i>Add Client</a></li>
                                    <li class="deleted"><a href="javascript:void(0);" onClick="doconfirmcheck();"><i class="fa fa-trash"></i>Delete Clients</a></li>
                                
                                </ul>
                            </div> 
                            <div class="form-wrap-body form-tbl inner">
                            <form name="myform" id="myform" action="deleteclients.php" method="post">
                            <input type="hidden" name="dp" id="dp" value="">
                            <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['user_id'];?>"/>
                                <table id="example" class="table table-striped table-bordered example" width="100%">
                                	<thead>
                                    	<tr>
                                        	<th></th>
                                            <th>Title</th>
                                            <th>Images</th>                                           
                                            <th>Sort Order</th>
                                            <th></th>
                                        </tr>
                                	</thead>  
                                    <tbody>
                                    
                                        	 <?php 	
							$i=1;
							$stmts5_banner = $mysqli->prepare("select brand_id,title,image,sort_order from brand order by sort_order asc");	
			//$stmts5->bind_param('i', $pack_page_id);									
							$stmts5_banner->execute();
							$stmts5_banner->store_result();
							$stmts5_banner->bind_result($brand_id,$title,$image,$sort_order);
							while($stmts5_banner->fetch())
							{
							?>
                                    	<tr>
                                        	<td><input type="checkbox" name="banner[]" value="<?php echo $brand_id;?>"  /></td>
                                        	<td><?php echo $title;?></td>
                                            <td><img src="<?php echo $image;?>" height="70"/></td>
                                           
                                           
                                            <td><?php echo $sort_order;?></td>
                                            <td>
                                           
                                            	<a href="edit_client.php?id=<?php echo $brand_id; ?>"><button type="button" class="btn btn-success">Edit</button></a>
                                            	<a href="delete_client.php?id=<?php echo $brand_id; ?>&userid=<?php echo $_SESSION['user_id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                          	</td>
                                        </tr>
                                    <?php $i=$i+1;}?>                                             
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
