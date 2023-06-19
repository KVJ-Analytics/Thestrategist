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
<div  >

    <table id="etable" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="width:96%;table-layout: auto; word-wrap:break-word;" align="center">
    <thead>
    <tr>
        <th>Sl. No</th>
        <th>Exams</th>
       
        <th>No of categories</th>
         <th>Total no of videos</th>
       
        <th>No of users</th>
         <th>No of video views</th>
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
        <td class="center"><a href="indexhome.php?file=<?php echo base64_encode(base64_decode($_GET['menu'])."/exam_details.php"); ?>&menu=<?php echo $_GET['menu']; ?>&category_id=<?php echo base64_encode($category_id); ?>"><?php echo $result['exam_name']; ?></a></td>
        
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
           // echo 'select * from video_views JOIN video_gallery(video_gallery.video_id=video_views.video_id) where video_gallery.exam='.$category_id;//die;
	$stmt=$db112->query('select * from video_views JOIN video_gallery ON(video_gallery.video_id=video_views.video_id) where video_gallery.exam='.$category_id); //.' group by video_views.video_id');	
	$rows12 = $db112->resultset();
		$db112->dbclose();
        echo count($rows12);
	
       /* if(count($rows12)>0){
            $diff=0;
        	foreach($rows12 as $result)
            	{
            	    $diff+=$result['video_duration'];//strtotime($result['ending_video']) - strtotime($result['starting_video']);
            	}
            	//echo $diff;
            	if($diff<60){
            	    echo $diff." Seconds";
            	}else if($diff>60){
            	    echo round($diff/60).".".($diff%60)." Minutes";
            	}else{
            	    echo round($diff/(60*60)).".".($diff%(60*60))." Hours";
            	}
        }*/


		?> 
		</td>
        <td class="center">
        <?php
            $db112 	= 	new Database();
           // echo 'select * from video_views JOIN video_gallery(video_gallery.video_id=video_views.video_id) where video_gallery.exam='.$category_id;//die;
	$stmt=$db112->query('select * from video_views JOIN video_gallery ON(video_gallery.video_id=video_views.video_id) where video_gallery.exam='.$category_id);	
	$rows12 = $db112->resultset();
		$db112->dbclose();
	//	print_r($rows12);
	
        if(count($rows12)>0){
            $diff=0;
        	foreach($rows12 as $result)
            	{
            	    $diff+=$result['video_duration'];//strtotime($result['ending_video']) - strtotime($result['starting_video']);
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
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function get_all_indates()
        {
           var sdate=document.getElementById('start_date').value;
          var sh=document.getElementById('shours').value;
           var smin=document.getElementById('smin').value;
           var ssec=document.getElementById('ssec').value;
           var edndate=document.getElementById('end_date').value;
          var enh=document.getElementById('enhours').value;
           var enmin=document.getElementById('enmin').value;
           var ensec=document.getElementById('ensec').value;
          if(sdate!='' && edndate!=''){   
           $.ajax({
        url: "menu_order/<?php echo base64_decode($_GET['menu']);?>/test.php?menu=<?php echo $_GET['menu']; ?>",
        type: "post",
        data: {vid:sdate,shours:sh,smins:smin,ssecs:ssec,vdt:edndate,enhs:enh,enmins:enmin,ensecs:ensec} ,
        success: function (response) {
document.getElementById("etable").innerHTML = response;
        // $(vvid).attr("data-prod-id",response);
         //var reslt=response; 
        // alert(response); // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
    
    
    
          }else{
           alert('Select the dates to filter');
        }
        }
    </script>