<?php 
    session_start();
    include("header_listing.php");

 ?>
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
                    	<h2><i class="fa fa-file-text-o"></i> Services Listings</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                	<div class="col-md-12">
                        <?php 
                                if(isset($_SESSION['success'])){
                            ?>
                            <div class="alert alert-success center text-center">
                                <strong><?php  
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']);?>
                                </strong> 
                            </div>
                            <?php 
                            }
                            ?>
                            <?php 
                                if(isset($_SESSION['error'])){
                            ?>
                            <div class="alert alert-danger center text-center">
                                <strong><?php  
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);?>
                                </strong> 
                            </div>
                            <?php 
                            }
                            ?>
                    	<div class="form-wrap">
                           <div class="form-wrap-title list-form-wrap-title">
                                <h3 class="inline-block">Services</h3>
                                <ul class="list-actions">
                                	<li class="created"><a href="add_services.php"><i class="fa fa-plus"></i>Add Services</a></li>
                                    <li class="deleted"><a href="javascript:void(0);" onClick="doconfirmcheck();"><i class="fa fa-trash"></i>Delete Services</a></li>
                                
                                </ul>
                            </div> 
                            <div class="form-wrap-body form-tbl inner">
                            <form name="myform" id="myform" action="deleteservices.php" method="post">
                            <input type="hidden" name="dp" id="dp" value="">
                                <table id="example" class="table table-striped table-bordered example" width="100%">
                                	<thead>
                                    	<tr>
                                        	<th></th>
                                            <th>Title</th>
                                                                                 
                                            <th>Sort Order</th>
                                            <th></th>
                                        </tr>
                                	</thead>  
                                    <tbody>
                                    
                        	       <?php 	
                                    require_once("Class/AdminClass.php");
                                    $adminObj=new AdminClass;
                                    $allServices=$adminObj->allServices();
                                  //  print_r($allServices);
	// 				$i=1;
	// 				$stmts5_banner = $mysqli->prepare("select ser_id,title,sort_order from services order by sort_order asc");	
	// //$stmts5->bind_param('i', $pack_page_id);									
	// 				$stmts5_banner->execute();
	// 				$stmts5_banner->store_result();
	// 				$stmts5_banner->bind_result($ser_id,$title,$sort_order);
	// 				while($stmts5_banner->fetch())
	// 				{
                                    foreach ($allServices as $services) {
                                        # code...
                                    
					               ?>

                                    	<tr>
                                        	<td><input type="checkbox" name="services[]" value="<?php echo $services['s_id'];?>"  /></td>
                                        	<td><?php echo $services['s_title'];?></td>
                                           
                                            <td><?php echo $services['s_sort_order'];?></td>
                                            <td>
                                           
                                            	<a href="edit_services.php?id=<?php echo $services['s_id']; ?>"><button type="button" class="btn btn-success">Edit</button></a>
                                            	<a href="delete_services.php?id=<?php echo $services['s_id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                          	</td>
                                        </tr>
                                    <?php }//$i=$i+1;?>                                             
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
	
	
	var chks = document.getElementsByName('services[]');
		
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
