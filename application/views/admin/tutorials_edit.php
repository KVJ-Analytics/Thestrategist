
<body class="skin-blue fixed sidebar-mini">
	<div class="wrapper">

  		<div class="content-wrapper">
  			<section class="col-lg-12">
    			<div class="content-area">
                	<div class="col-md-12">
                    	<h2><i class="fa fa-file-text-o"></i> Edit Tutorial</h2>
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
                        $parent_tab=$p->parent_tab;
                        $t_type=$p->type;
                        $p_image=$p->video_poster;
                      
                       $p_order=$p->sort_order;
                    }

                    ?>
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="<?php echo base_url(); ?>index.php/AdminController/update_Tutorial" name="myform" enctype="multipart/form-data">

                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                          

                        	<div class="form-wrap">

                            	<div class="form-wrap-title">
                                	<h3>Edit Tutorial</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	
                                        <tr>
                                            <td> Title</td>
                                            <td>:</td>
                                            <td><input type="hidden" id="s_id" name="s_id" value="<?php echo $pid; ?>" required/>
                                                <input type="text" id="name" name="p_head1" value="<?php echo $ph1; ?>" required/></td>
                                        </tr>
                                        <tr>
                                            <td>Content</td>
                                            <td>:</td>
                                            <td>
											<textarea id="myTextareaimg" name="p_head2" ><?php echo $ph2; ?></textarea></td>
                                        </tr>
                                        
                                    	<tr>
                                        	<td width="15%">Video link</td>
                                            <td width="5%">:</td>
                                            <td width="80%">
                                                
                                                <input type="text" name="ban_image" value="<?php echo $p_image; ?>"></td>
                                        </tr>
                                         <tr>
                                        	<td>Type(Top types listed in home page)</td>
                                            <td>:</td>
                                            <td><!--<input type="text" id="t_type" name="t_type" value="<?php echo $t_type; ?>" required/>-->
                                                    <select name="t_type" required>
                                                        <option value=" ">Select</option>
                                                        <option value="basic" <?php if($t_type=='basic'){echo 'selected';} ?>>Basic</option>
                                                        <option value="top" <?php if($t_type=='top'){echo 'selected';} ?>>Top</option>
                                                        <option value="advanced" <?php if($t_type=='advanced'){echo 'selected';} ?>>advanced</option>
                                                    </select>
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>tutorial Category(Tab)</td>
                                            <td>:</td>
                                            <td>
                                                    <select name="parent_tab" required>
                                                        <option value=" ">Select</option>
                                                        <?php //print_r($cats);
                                                        foreach($cats as $cat){
                                                            ?>
                                                            <option value="<?php echo $cat->id; ?>" <?php if($parent_tab==$cat->id){ echo "selected"; } ?>><?php echo $cat->category; ?></option>
                                                            <?php
                                                            
                                                        }
                                                        ?>
                                                    </select>
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>Sort Order</td>
                                            <td>:</td>
                                            <td><input type="text" id="sort_order" name="sort_order" value="<?php echo $p_order; ?>" required/></td>
                                        </tr>
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Update" /></li>
                                <a href="http://thestrategist.co.in/index.php/AdminController/tutorials"><li><input type="button" name="submit" value="cancel" class="cancel-btn" /></li></a>
                                <a href="http://thestrategist.co.in/index.php/AdminController/tutorial_edit/<?php echo $pid; ?>"><li><input type="button" name="submit" value="Reset" class="reset-btn" /></li></a>
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
