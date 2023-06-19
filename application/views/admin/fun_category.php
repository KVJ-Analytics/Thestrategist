
<body class="skin-blue fixed sidebar-mini">
	<div class="wrapper">
  		<div class="content-wrapper">
  			<section class="col-lg-12">
    			<div class="content-area">
                     
                	<div class="col-md-12">
                    	<h2><i class="fa fa-file-text-o"></i>Categories</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                	<div class="col-md-12">

                        <?php $success = $this->session->userdata('success');
                                if(isset($success)){
                            ?>
                            <div class="alert alert-success center text-center">
                                <strong><?php  
                                    echo $this->session->userdata('success');
                                    $this->session->unset_userdata('success');?>
                                </strong> 
                            </div>
                            <?php 
                            }
                            ?>
                            <?php 
                            $error = $this->session->userdata('error');
                                if(isset($error)){
                            ?>
                            <div class="alert alert-danger center text-center">
                                <strong><?php  
                                    echo $this->session->userdata('error');
                                    $this->session->unset_userdata('error');?>
                                </strong> 
                            </div>
                            <?php 
                            }
                            ?>
                            <?php

                            ?>
                    	<div class="form-wrap">
                           <div class="form-wrap-title list-form-wrap-title">
                                <h3 class="inline-block">Categories</h3>

                                <ul class="list-actions">
                                	<!--<li class="created"><a href="<?php echo base_url(); ?>index.php/AdminController/Services_add"><i class="fa fa-plus"></i>Add Services</a></li>-->
                                    <li class="deleted"><a href="javascript:void(0);" onClick="doconfirmcheck();"><i class="fa fa-trash"></i>Delete Multiple</a></li>
                                
                                </ul>
                            </div> 
							<div class="form-wrap-body form-tbl">
								<form name="myform2" id="myform2" method="post" action="<?php echo base_url();?>index.php/AdminController/add_category_process" enctype="multipart/form-data">
								<h3>Add Category</h3>
								
								<table style="border:none;">
                                    	<tr>
                                        	<td width="15%">Category</td>
                                            <td width="5%">:</td>
                                            <td width="80%">
                                                <input type="text" name="category" /> 
                                             </td>
                                        </tr>
										<tr>
                                        	<td width="15%">Sort Order</td>
                                            <td width="5%">:</td>
                                            <td width="80%">
                                                <input type="text" name="sort_order" /> 
                                             </td>
                                        </tr>
										
										<tr><td><input class="btn btn-primary" type="submit" name="submit" value="Add" /></td></tr>
								</table>
								
								
								</form>
							</div>
                            <div class="form-wrap-body form-tbl inner">
                            <form name="myform" id="myform" action="<?php echo base_url();?>index.php/AdminController/deleteMultiplecategory/" method="post">
                            <input type="hidden" name="dp" id="dp" value="">
                                <table id="example" class="table table-striped table-bordered example" width=100%>
                                	<thead>
                                    	<tr>
                                        	<th></th>
                                            <th>id</th>
                                            <th>category</th>
											<th>Sort Order</th>		
                                            <th></th>
                                        </tr>
                                	</thead>  
                                    <tbody>
                                        <?php 
                                        if(count($projects>0)){
                                        foreach ($projects as $row) { ?>
                                    	<tr>
                                        	<td><input type="checkbox" name="banner[]" value="<?php echo $row->id; ?>"  /></td>
                                        	<td><?php echo $row->id; ?></td>
                                            <td><?php echo $row->category;?></td>
                                           <td><?php echo $row->sort_order;?></td>
                                            <td>
                                           
                                            	
                                            	<a href="<?php echo base_url(); ?>index.php/AdminController/category_delete/<?php echo $row->id;?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                          	</td>
                                        </tr> 
                                        <?php } 
                                    }
                                    ?>                                          
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
           <script src="<?php echo base_url();?>assets/admin/js/datatables.js"></script>
    <script>
		(function($){
		  	$(".example").each(function () {
				$(this).dataTable();
			});
		}(jQuery))
    </script>
    
	<script src="<?php echo base_url();?>assets/admin/js/jquery-2.1.4.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/admin/media/bootstrap/js/bootstrap.js"></script>
	<script src="<?php echo base_url();?>assets/admin/media/layout/js/app.js"></script>
	<script src="<?php echo base_url();?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>	
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
