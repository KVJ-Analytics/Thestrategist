
<body class="skin-blue fixed sidebar-mini">
	<div class="wrapper">

  		<div class="content-wrapper">
  			<section class="col-lg-12">
    			<div class="content-area">
                	<div class="col-md-12">
                    	<h2><i class="fa fa-file-text-o"></i> Edit Sub Banner</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                    <?php
                    foreach($sub_banners_edit as $p)
                    {
                       $pid=$p->id;
                       $pname=$p->page;
                       $p_image=$p->image;
                      
                       $p_order=$p->title;
                    }

                    ?>
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="<?php echo base_url(); ?>index.php/AdminController/update_sub_banners" name="myform" enctype="multipart/form-data">

                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                          

                        	<div class="form-wrap">

                            	<div class="form-wrap-title">
                                	<h3>Edit Banner for <?php echo $pname; ?></h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	
                                         <tr>
                                            <td>Page title</td>
                                            <td>:</td>
                                            <td><input type="hidden" id="s_id" name="s_id" value="<?php echo $pid; ?>" required/>
                                                <input type="text" id="sort_order" name="sort_order" value="<?php echo $p_order; ?>" required/></td>
                                        </tr>
                                    	<tr>
                                        	<td width="15%">Banner Image (1920px X 705px)</td>
                                            <td width="5%">:</td>
                                            <td width="80%">
                                                <input type="file" id="input-file-now-custom-2" data-default-file="<?php echo base_url();?>assets/images/uploads/sub_banner/<?php echo $p_image; ?>" class="dropify" data-height="150" name="userfileImage" /> 
                                                <input type="hidden" name="ban_image" value="<?php echo $p_image; ?>"></td>
                                        </tr>
                                        
                                       
                                       
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Update" /></li>
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
