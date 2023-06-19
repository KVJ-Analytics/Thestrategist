
<body class="skin-blue fixed sidebar-mini">
	<div class="wrapper">

  		<div class="content-wrapper">
  			<section class="col-lg-12">
    			<div class="content-area">
                	<div class="col-md-12">
                    	<h2><i class="fa fa-file-text-o"></i> Add Tutorial</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <div class="content-area">
                    
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="<?php echo base_url(); ?>index.php/AdminController/tutorials_add_process" name="myform" enctype="multipart/form-data">

                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                          

                        	<div class="form-wrap">

                            	<div class="form-wrap-title">
                                	<h3>Add Tutorial</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	<tr>
                                        	<td>Title</td>
                                            <td>:</td>
                                            <td><input type="text" name="title" value="" required/></td>
                                        </tr>
										<tr>
                                        	<td width="15%">Video</td>
                                            <td width="5%">:</td>
                                            <td width="80%">  <input type="text" id="input-file-now-custom-2" value="" name="userfileVideo" required/></td>
                                        </tr>
                                    	
                                         <tr>
                                        	<td>Description</td>
                                            <td>:</td>
                                            <td><textarea id="myTextareaimg" name="desc" ></textarea>
											
											
											<!--<textarea id="mytextarea" name="desc" /></textarea>--></td>
                                        </tr>
										<tr>
                                        	<td>Type(Top types listed in home page)</td>
                                            <td>:</td>
                                            <td><!--<input type="text" id="t_type" name="t_type" value="<?php echo $t_type; ?>" required/>-->
                                                    <select name="t_type" required>
                                                        <option value=" ">Select</option>
                                                        <option value="basic">Basic</option>
                                                        <option value="top">Top</option>
                                                        <option value="advanced">Advanced</option>
                                                    </select>
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>tutorial Category(Tab)</td>
                                            <td>:</td>
                                            <td>
                                                    <select name="parent_tab" required>
                                                        <option value=" ">Select</option>
                                                        <?php
                                                        foreach($cats as $cat){
                                                            ?>
                                                            <option value="<?php echo $cat->id; ?>"><?php echo $cat->category; ?></option>
                                                            <?php
                                                            
                                                        }
                                                        ?>
                                                    </select>
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>Sort Order</td>
                                            <td>:</td>
                                            <td><input type="text" id="sort_order" name="sort_order" value="" required/></td>
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
