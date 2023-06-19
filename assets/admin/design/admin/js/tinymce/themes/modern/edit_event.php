<?php include("header.php"); ?>
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
                    	<h2><i class="fa fa-file-text-o"></i> Edit Event</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
               <?php 

				$event_id=$_REQUEST['id'];
	
				$stmts5_banner =$mysqli->prepare("select title,date_event,description,type,sort_order from events where event_id=?");	
	
				$stmts5_banner->bind_param('i', $event_id);									
	
				$stmts5_banner->execute();
	
				$stmts5_banner->store_result();
	
				$stmts5_banner->bind_result($title,$date_event,$description,$type,$sort_order);
	
				$stmts5_banner->fetch();
				
				$date_event=explode('-',$date_event);
				$date_event=$date_event[1].'/'.$date_event[2].'/'.$date_event[0];
		       ?>
                <div class="content-area">
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="edit_event_action.php" name="myform" enctype="multipart/form-data">
               <input type="hidden" name="ids" value="<?php echo $event_id; ?>" />
               <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['user_id'];?>"/>
               
                	<div class="col-md-12">                        
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>Edit Event</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                
                                <table>
                                    	<tr>
                                        	<td>Title</td>
                                            <td>:</td>
                                            <td><input type="text" id="name" name="name" value="<?php echo $title; ?>" required/></td>
                                        </tr>
                                    	<tr>
                                        	<td>Date</td>
                                            <td>:</td>
                                            <td><input type="text" id="datepick" name="datepick" value="<?php echo $date_event; ?>" required/></td>
                                        </tr>
                                        <tr>
                                        	<td>Type</td>
                                            <td>:</td>
                                            <td><select name="type">
                                            <?php
											if($type=="event")
											{
											?>
                                            	<option value="event">Event</option>
                                                <option value="news">News</option>
                                                <?php
												}else{
												?>
                                                <option value="news">News</option>
                                                <option value="event">Event</option>
                                                <?php
											}
												?>
                                            </select></td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>Description</td>
                                            <td>:</td>
                                            <td><textarea id="mytextarea"  name="des1" required><?php echo $description; ?></textarea></td>
                                        </tr>
                                        <tr>
                                        	<td>Sort Order</td>
                                            <td>:</td>
                                            <td><input type="text" id="sort_order" name="sort_order" value="<?php echo $sort_order; ?>" required/></td>
                                        </tr>
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Update Event" /></li>
                             
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
        <?php include("footer.php");?>
</body>
</html>
