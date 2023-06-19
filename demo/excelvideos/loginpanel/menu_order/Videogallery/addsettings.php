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
                <h2><i class="glyphicon glyphicon-plus"></i> Add <?php include("$f_pathdg"); ?></h2>

               
            </div>
            <div class="box-content">
               <?php
 $admintoken=hash("md5",rand().time().rand());
  $_SESSION['admintoken']=$admintoken;
  //echo $_SESSION['admintoken'];
?>    
            <div class="box-content">
                <form action="http://thestrategist.co.in/demo/excelvideos/loginpanel/menu_order/<?php echo base64_decode($menu);?>/action_code.php?menu=<?php echo $_GET['menu'];?>&action=Add" method="post" enctype="multipart/form-data" name="frm" id="frm">
<input type="hidden" name="admintoken" value="<?php echo $admintoken;?>"/>

                   <div class="form-group">
                        <label>Caption</label>
                        <input type="text" id="txtcaption" name="txtcaption" required="required" class="form-control">
                    </div>
                     
                    <?php /*?><div class="form-group">
                        <label>Photo</label>
                        <input type="file" id="photo" name="photo" >
                    </div>
                    <?php */?>
                  <div class="form-group">
                        <label>Video</label>
                         <input type="file" id="video" name="video" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Exam</label>
                       <select name="exam" id="examid" class="form-control" onchange="get_catergory()" required>
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
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                        <option value="select">...Select Category...</option>
                       <?php 
						/*	$db1 	= 	new Database();
	$stmt=$db1->query('select * from video_category');	
	$rows = $db1->resultset();
	foreach($rows as $result)
	{
						?>
						
                        <option value="<?php echo $result['category_id']; ?>"><?php echo $result['category']; ?></option>
                        <?php
							}
							$db1->dbClose();*/
							?>
                        
                        </select>
                        
                    </div>
                    
                    
                    
                   <input type="hidden" name="hid_action" id="hid_action" value="Add" />
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    function get_catergory()
        {
            var exid=document.getElementById('examid').value;
            alert(exid);
             $.ajax({
        url: "./menu_order/Videogallery/test.php",
        type: "post",
        data: {vid:exid} ,
        success: function (response) {

         //$(vvid).attr("data-prod-id",response);
         //var reslt=response; 
       //  alert(response);
         document.getElementById("category_id").innerHTML=response;// You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
        }
</script>


















