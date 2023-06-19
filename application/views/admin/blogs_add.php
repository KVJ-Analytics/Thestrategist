
<body class="skin-blue fixed sidebar-mini">
	<div class="wrapper">

  		<div class="content-wrapper">
  			<section class="col-lg-12">
    			<div class="content-area">
                	<div class="col-md-12">
                    	<h2><i class="fa fa-file-text-o"></i> Add Blog</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                    
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="<?php echo base_url(); ?>index.php/AdminController/add_blog_process" name="myform" enctype="multipart/form-data">

                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                          

                        	<div class="form-wrap">

                            	<div class="form-wrap-title">
                                	<h3>Add Blog</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	<tr>
                                        	<td>Title</td>
                                            <td>:</td>
                                            <td><input type="text" name="title" value="" required/></td>
                                        </tr>
										<tr>
                                        	<td width="15%">Image (420px X 295px)MAX 1MB</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file" id="input-file-now-custom-2" class="dropify" data-height="150" name="userfileImage"  required/></td>
                                        </tr>
                                    	<!--<tr>
                                        	<td width="15%">Video</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file" id="input-file-now-custom-2" class="dropify" data-height="150" name="userfileVideo"  required/></td>
                                        </tr>-->
                                        <tr>
                                        	<td>Short Description</td>
                                            <td>:</td>
                                            <td>
											<textarea name="short_desc"></textarea>
											
											
											<!--<textarea id="mytextarea" name="desc" /></textarea>--></td>
                                        </tr>
										
										<tr>
                                        	<td>Description</td>
                                            <td>:</td>
                                            <td>
											<textarea id="mytextarea" name="desc"></textarea>
											
											
											<!--<textarea id="mytextarea" name="desc" /></textarea>--></td>
                                        </tr>
										<tr>
                                            <td> Tags [seperated with commas(,)]</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" id="name" name="p_link" value="" required/></td>
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
