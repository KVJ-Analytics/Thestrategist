<body class="skin-blue fixed sidebar-mini">
	<div class="wrapper">

  		<div class="content-wrapper">
  			<section class="col-lg-12">
    			<div class="content-area">
                	<div class="col-md-12">
                    	<h2><i class="fa fa-file-text-o"></i> Add Resources</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                    
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="<?php echo base_url(); ?>index.php/AdminController/add_Resources_process" name="myform" enctype="multipart/form-data">

                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                          

                        	<div class="form-wrap">

                            	<div class="form-wrap-title">
                                	<h3>Add Resources</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	<tr>
                                        	<td>title</td>
                                            <td>:</td>
                                            <td><input type="text" name="title" value="" required/></td>
                                        </tr>
										
										<tr>
                                        	<td>Description</td>
                                            <td>:</td>
                                            <td><textarea id="mytextarea1" name="desc"></textarea></td>
                                        </tr>
										
                                </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Add" /></li>
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
</body>
</html>
