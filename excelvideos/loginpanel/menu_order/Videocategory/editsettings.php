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
			 $category_id=base64_decode($_GET['category_id']);
			  $db1 	= 	new Database();
			$db1->query('select* from video_category where category_id=:category_id');
			$db1->bind(':category_id',$category_id);
			$rows = $db1->resultset();
			foreach($rows as $result)
			{
	
		$category=$result['category'];
		$exam=$result['exam'];
		$path="../assets/gallery_category/".$result['photo'];
		
	}
	$db1->dbclose();
	
	
	
	 $db1 	= 	new Database();
			$db1->query('select * from website_login');
		
			$rows2 = $db1->resultset();
		
	$db1->dbclose();
	
	
	?>
                <form action="menu_order/<?php echo base64_decode($_GET['menu']);?>/action_code.php?menu=<?php echo $_GET['menu'];?>&action=Update" method="post" enctype="multipart/form-data" name="frm" id="frm">
             <input type="hidden" name="admintoken" value="<?php echo $admintoken;?>"/>
                
	<input type="hidden" name="category_id" id="category_id" value="<?php echo $category_id; ?>" />
                   <div class="form-group">
                        <label>Category</label>
                        <input type="text" id="txtCategory" name="txtCategory" required="required" class="form-control" value="<?php echo $category; ?>">
                    </div>
                   <div class="form-group">
                        <label>Exam</label>
                       <select name="exam" class="form-control" style="width:200px;" required>
                          <option value=" ">Select</option>
                          
                        <?php
                        foreach($rows2 as $result)
                        			{
                        	
                        	$s='';
                        		$exam2=$result['exam'];
                        		$exam_name=$result['exam_name'];
                        		if($exam==$exam2){$s="selected";}else{$s='';}
                        	
                        		echo '<option value="'.$exam2.'" '.$s.'>'.$exam_name.'</option>';
                        	}
	?>
                         <!-- <option value="1" <?php if($exam==1){echo "selected";}?>>Exam 1</option>
                          <option value="2" <?php if($exam==2){echo "selected";}?>>Exam 2</option>-->
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





















