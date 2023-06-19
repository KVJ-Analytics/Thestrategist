<?php
$vid=$_GET['id'];
$menu=$_GET['menu'];
?>
<script language="javascript" type="text/javascript">
function deleteSettings(category_id)
{
if(confirm('Do you want to delete contennt'))
{
window.location.href="menu_order/<?php echo base64_decode($_GET['menu']);?>/action_code.php?menu="+"<?php echo $_GET['menu'];?>"+"&action=Delete" + "&category_id=" + category_id;
}
}
</script>


    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" 
    style="width:96%;table-layout: auto; word-wrap:break-word;" align="center">
    <thead>
    <tr>
        <th>Sl. No</th>
        <th>Exams</th>
       
        <th>No of categories</th>
         <th>Total no of videos</th>
       
        <th>No of users</th>
        <th>Total time spend on videos</th>
    </tr>
    </thead>
    <tbody>
    <?php
	$i=0;
	$db1 	= 	new Database();
	$stmt=$db1->query('select * from exams');	
	$rows = $db1->resultset();
		$db1->dbclose();
	foreach($rows as $result)
	{
	
		$category_id=$result['exam'];
	//	$category_id=$result['exam_name'];
		
	?>
    <tr>
        <td align="center"><?php echo ++$i; ?></td>
        <td class="center"><?php echo $result['exam_name']; ?></td>
        
        <td class="center">
            
           <?php

	$db11 	= 	new Database();
	$stmt=$db11->query('select * from video_category where exam='.$category_id);	
	$rows2 = $db11->resultset();
		$db11->dbclose();
echo count($rows2);
		
	?> 
        </td>
         <td class="center">
            
           <?php

	$db11 	= 	new Database();
	$stmt=$db11->query('select * from video_gallery where exam='.$category_id);	
	$rows2 = $db11->resultset();
		$db11->dbclose();
echo count($rows2);
		
	?> 
        </td>
          <td class="center">
            
           <?php

	$db11 	= 	new Database();
	$stmt=$db11->query('select * from registration where category_id='.$category_id);	
	$rows2 = $db11->resultset();
		$db11->dbclose();
echo count($rows2);
		
	?>
        </td>
        <td class="center">
        <?php
            $db112 	= 	new Database();
	$stmt=$db112->query('select * from video_views where exam='.$category_id);	
	$rows12 = $db112->resultset();
		$db112->dbclose();
	//	print_r($rows12);
	
        if(count($rows1)>0){
            $diff=0;
        	foreach($rows12 as $result)
            	{
            	    $diff+=strtotime($result['ending_video']) - strtotime($result['starting_video']);
            	}
            	//echo $diff;
            	if($diff<60){
            	    echo $diff." Seconds";
            	}else if($diff>60){
            	    echo round($diff/60).".".($diff%60)." Minutes";
            	}else{
            	    echo round($diff/(60*60)).".".($diff%(60*60))." Hours";
            	}
        }


		?> 
		</td>
    </tr>
    <?php
	}

	?>
    
    
    </tbody>
    </table>