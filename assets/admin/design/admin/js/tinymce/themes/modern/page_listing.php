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
                    	<h2><i class="fa fa-file-text-o"></i> Page Listings</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                	<div class="col-md-12">
                    	<div class="form-wrap">
                            <div class="form-wrap-title list-form-wrap-title">
                                <h3 class="inline-block">Created Pages</h3>
                                <ul class="list-actions">
                                	<li class="created"><a href="create_pages.php"><i class="fa fa-plus"></i>Create page</a></li>
                                    <li class="deleted"><a href="javascript:void(0);" onClick="doconfirmcheck();"><i class="fa fa-trash"></i>Delete Page</a></li>
                                    <li class="changes"><a href="javascript:void(0);" onClick="changestatus();"><i class="fa fa-sort"></i>Change Status</a></li>
                                </ul>
                            </div>
                            <div class="form-wrap-body form-tbl inner">
                            <form name="myform" id="myform" action="deletempages.php" method="post">
                            <input type="hidden" name="dp" id="dp" value="">
                                <table id="example" class="table table-striped table-bordered example" width="100%">
                                	<thead>
                                    	<tr>
                                        	<th></th>
                                            <th>Page Name</th>
                                            <th>Page Title</th>
                                            <th>Page Keyword</th>
                                            <th>Status</th>
                                            <th>Sort Order</th>
                                            <th></th>
                                        </tr>
                                	</thead>  
                                    <tbody>
                                    
                                        	<?php 
									if($user_type!="user") {
									$stmt = $mysqli->prepare("select page_id,page_name,page_title,meta_keyword,layout,status,sort_order from  page_details ORDER BY sort_order asc");

									}else{

										$stmt = $mysqli->prepare("select page_id,page_name,page_title,meta_keyword,layout,status,sort_order from  page_details where page_id!=1 ORDER BY sort_order asc");

									}
									$stmt->execute();

									$stmt->store_result();

									$stmt->bind_result($page_id,$page_name,$page_title,$page_key,$layout,$status,$sort_order);

									$i=1;

									while($stmt->fetch()){?>
                                    	<tr>
                                        	<td><input type="checkbox" name="page[]" value="<?php echo $page_id;?>"  /></td>
                                        	<td><?php echo $page_name;?></td>
                                            <td><?php echo $page_title;?></td>
                                            <td><?php echo $page_key;?></td>
                                            <?php if($status==1)
											{?>
                                            <td>Enable</td>
                                            <?php }else{ ?>
                                             <td>Disable</td>
                                             <?php
											 }
											 ?>
                                            <td><?php echo $sort_order;?></td>
                                            <td>
                                            <?php if($user_type!="user") {?>
                                            	<a href="edit_page_html.php?id=<?php echo $page_id; ?>"><button type="button" class="btn btn-success">Edit Html</button></a>
                                              <?php } ?>
                                            	<a href="edit_pages.php?id=<?php echo $page_id; ?>"><button type="button" class="btn btn-success">Edit</button></a>
                                            	<a href="delete_page.php?id=<?php echo $page_id; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
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
	$("#dp").val('');
	
	var chks = document.getElementsByName('page[]');
		
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
function changestatus()
	{
	 $("#dp").val(1);
	
	var chks = document.getElementsByName('page[]');
	
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
	document.forms["myform"].submit();
	}
    </script>
</body>
</html>
