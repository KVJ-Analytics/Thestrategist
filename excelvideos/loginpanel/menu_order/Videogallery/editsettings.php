<?php 
$menu=$_GET['menu'];
?>

<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#"><?php include("$f_pathdg"); ?></a>
        </li>
    </ul>
</div>   

<?php include("topmenu.php"); ?>
               
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-plus"></i> Edit <?php include("$f_pathdg"); ?></h2>

               
            </div>  <?php
 $admintoken=hash("md5",rand().time().rand());
  $_SESSION['admintoken']=$admintoken;
?>    
            <div class="box-content">
             <?php 
			 $video_id=base64_decode($_GET['video_id']);
			  $db1 	= 	new Database();
			$db1->query('select * from video_gallery where video_id=:video_id');
			$db1->bind(':video_id',$video_id);
			$rows = $db1->resultset();
			foreach($rows as $result)
			{
	 $caption=$result['caption'];
		$category_id=$result['category_id'];
		$exam=$result['exam'];
		$video=$result['video'];
		$path="../assets/video/".$result['video'];
	}
	$db1->dbclose();
	?>
                <form action="http://thestrategist.co.in/demo/excelvideos/loginpanel/menu_order/<?php echo base64_decode($_GET['menu']);?>/action_code.php?menu=<?php echo $_GET['menu'];?>&action=Update" method="post" enctype="multipart/form-data" name="frm" id="frm">
             <input type="hidden" name="admintoken" value="<?php echo $admintoken;?>"/>
                
	<input type="hidden" name="video_id" id="video_id" value="<?php echo $video_id; ?>" />
                   <div class="form-group">
                          <label>Caption</label>
                        <input type="text" id="txtcaption" name="txtcaption" required="required" class="form-control" value="<?php echo $caption; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Video</label>
                        <br />
                        <iframe src="<?php echo $path;?>" height="80" /></iframe><br /><br />
                        <input type="file" id="video" name="video" >
                       <br /><br />
                    </div>
                     <div class="form-group">
                         <select name="exam" class="form-control" style="width:200px;" required>
                         <option value=" ">Select</option>
                           <?php
                           
                                	 $db1 	= 	new Database();
                                			$db1->query('select * from website_login');
                                		
                                			$rows2 = $db1->resultset();
                                		
                                	$db1->dbclose();
	
	
	
                        foreach($rows2 as $result)
                        			{
                        	
                        	$s='';
                        		$exam2=$result['exam'];
                        		$exam_name=$result['exam_name'];
                        		if($exam==$exam2){$s="selected";}else{$s='';}
                        	
                        		echo '<option value="'.$exam2.'" '.$s.'>'.$exam_name.'</option>';
                        	}
	?>
                      </select>
                    </div>
                   <?php /*?> <div class="form-group">
                          <label>Video</label>
                        <input type="file" id="video" name="video" required="required" class="form-control" value="<?php echo $video; ?>">
                    </div>
                    <?php */?>
                    
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                        <option value="select">...Select Category...</option>
                       <?php 
							$db1 	= 	new Database();
	$stmt=$db1->query('select * from video_category');	
	$rows = $db1->resultset();
	foreach($rows as $result)
	{
						?>
						
                        <option value="<?php echo $result['category_id']; ?>" <?php if($result['category_id']==$category_id){?> selected="selected"<?php }?>><?php echo $result['category']; ?></option>
                        <?php
							}
							$db1->dbClose();
							?>
                        
                        </select>
                        
                    </div>
                    
                   
                      
                   <input type="hidden" name="hid_action" id="hid_action" value="Update" />
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->





















