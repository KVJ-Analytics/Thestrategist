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
                    	<h2><i class="fa fa-file-text-o"></i> Projects Listing</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                	<div class="col-md-12">
                    	<div class="form-wrap">
                           <div class="form-wrap-title list-form-wrap-title">
                                <h3 class="inline-block"> Projects Listing</h3>
                                <ul class="list-actions">
                                	<li class="created"><a href="add_projects.php"><i class="fa fa-plus"></i>Add Projects</a></li>
                                    <li class="deleted"><a href="javascript:void(0);" onClick="doconfirmcheck();"><i class="fa fa-trash"></i>Delete Projects</a></li> 
                                </ul>
                            </div> 
                            <div class="form-wrap-body form-tbl inner">
                            <form name="myform" id="myform" action="deleteprojects.php" method="post">
                            <input type="hidden" name="dp" id="dp" value="">
                            <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['user_id'];?>"/>
                                <table id="example" class="table table-striped table-bordered example" width="100%">

                            <thead>

                            <tr>
                                <th></th>
                                
                                <th>#</th>

                                <th>Name</th>

                               

                                <th>Sort Order</th>

                                <th></th>

                            </tr>

                            </thead>

                            <tbody>

                            <?php 

$stmts5 = $mysqli->prepare("select id,name,sort_order from projects");							

$stmts5->execute();

$stmts5->store_result();

$stmts5->bind_result($id,$name,$sort_order);

									$i=1;

									while($stmts5->fetch()){
							?>

                            <tr>
								<td><input type="checkbox" name="projects[]" value="<?php echo $id;?>"  /></td>
                                <td><?php echo $i; ?></td>

                                <td><?php echo $name; ?></td>

                             
                                
                                <td><?php echo $sort_order; ?></td>

                                <td><a href="edit_projects.php?id=<?php echo $id; ?>"><button class="btn btn-success" type="button">Edit</button></a> 

                                	<a href="delete_projects.php?id=<?php echo $id; ?>"><button class="btn btn-danger" type="button">Delete</button></a>

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
	
	
	var chks = document.getElementsByName('projects[]');
		
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
