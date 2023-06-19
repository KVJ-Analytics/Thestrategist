
<body class="skin-blue fixed sidebar-mini">
	<div class="wrapper">

  		<div class="content-wrapper">
  			<section class="col-lg-12">
    			<div class="content-area">
                	<div class="col-md-12">
                    	<h2><i class="fa fa-file-text-o"></i> Edit Modules</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                    <?php
                    foreach($project_edit as $p)
                    {
                        $pid=$p->id;
                        $ph1=$p->title;
                        $ph2=$p->content;
						//$fcat=$p->category_id;
                        //$psub1=$p->video;
                        
                       //$p_image=$p->image;
                      
                       //$p_order=$p->sort_order;
                    }

                    ?>
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="<?php echo base_url(); ?>index.php/AdminController/update_Modules" name="myform" enctype="multipart/form-data">

                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                          

                        	<div class="form-wrap">

                            	<div class="form-wrap-title">
                                	<h3>Edit Modules</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	
                                        <tr>
                                            <td> Title</td>
                                            <td>:</td>
                                            <td>
											<input type="hidden" id="s_id" name="s_id" value="<?php echo $pid; ?>" required/>
                                                <input type="text" id="name" name="p_head1" value="<?php echo $ph1; ?>" required/></td>
                                        </tr>
                                        <tr>
                                            <td> content</td>
                                            <td>:</td>
                                            <td><!--<input type="text" name="p_head2" value="<?php echo $ph2; ?>" required/>-->
											<textarea id="mytextarea1" name="desc"><?php echo $ph2; ?></textarea></td>
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
