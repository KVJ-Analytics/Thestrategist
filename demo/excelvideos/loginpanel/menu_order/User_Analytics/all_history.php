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
<div id="ediv">
    
    
    
    
    
    
    
    
    
    
    
    
<?php $res_user='';?>
    <table id="etable" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="width:96%;table-layout: auto; word-wrap:break-word;" align="center">
    <thead>
    <tr>
        <th>Sl. No</th>
        <th>First Name</th>
       <th>Middle Name</th>
       <th>Last Name</th>
       <th>Full Name</th>
       <th>Phone</th>
       <th>Email</th>
       <th>Exam</th>
       <th>College</th>
       <th>No of video views</th>
       <th>viewed Videos </th>
        <th>Total time spend on videos</th>
    </tr>
    </thead>
    <tbody>
    <?php
	$i=0;
	$db1 	= 	new Database();
	$stmt=$db1->query('select * from registration');	
	$rows = $db1->resultset();
		$db1->dbclose();
	foreach($rows as $result)
	{
	
	
		
	?>
    <tr>
        <td align="center"><?php echo ++$i; ?></td>
        <td class="center"><?php echo $fname=$result['name']; ?></td>
        <td class="center"><?php echo $mname=$result['middle_name']; ?></td>
        <td class="center"><?php echo $lname=$result['last_name']; ?></td>
        <td class="center"><?php echo $fullname=$result['full_name']; ?></td>
        <td class="center"><?php echo $uphone=$result['phoneno']; ?></td>
        <td class="center"><?php echo $uemail=$result['email']; ?></td>
        <td class="center">
            
           <?php

	$db11 	= 	new Database();
	$stmt=$db11->query('select * from exams where exam='.$result['category_id']);	
	$rows2 = $db11->resultset();
		$db11->dbclose();
//echo count($rows2);
	foreach($rows2 as $rows23){
	    echo $uexam=$rows23['exam_name'];
	}	
	?> 
        </td>
         <td class="center">
            
           <?php

	$db11 	= 	new Database();
	$stmt=$db11->query('select * from colleges where id='.$result['college']);	
	$rows2 = $db11->resultset();
		$db11->dbclose();
//echo count($rows2);
	foreach($rows2 as $rows23){
	    echo $ucollege=$rows23['college'];
	}		
	?> 
        </td>
          
          <td class="center">
        <?php
            $db112 	= 	new Database();
          // echo 'select * from video_views JOIN video_gallery ON(video_gallery.video_id=video_views.video_id) where video_views.student_mail="'.$result['email'].'"';// echo 'select * from video_views JOIN video_gallery(video_gallery.video_id=video_views.video_id) where video_gallery.exam='.$category_id;//die;
	$stmt=$db112->query('select * from video_views JOIN video_gallery ON(video_gallery.video_id=video_views.video_id) where video_views.student_mail="'.$result['email'].'"'); //.' group by video_views.video_id');	
	$rows12 = $db112->resultset();
		$db112->dbclose();
        echo $uvcounts=count($rows12);
	
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
          // echo 'select * from video_views JOIN video_gallery ON(video_gallery.video_id=video_views.video_id) where video_views.student_mail="'.$result['email'].'"';// echo 'select * from video_views JOIN video_gallery(video_gallery.video_id=video_views.video_id) where video_gallery.exam='.$category_id;//die;
	$stmt=$db112->query('select * from video_views JOIN video_gallery ON(video_gallery.video_id=video_views.video_id) where video_views.student_mail="'.$result['email'].'" group by caption'); //.' group by video_views.video_id');	
	$rows12 = $db112->resultset();
		$db112->dbclose();
		$topics='';
        foreach($rows12 as $rows123){
            $topics.=$rows123['caption'].',';
        }
	echo $utopics=$topics;


		?> 
		</td>
        <td class="center">
        <?php
            $db112 	= 	new Database();
           // echo 'select * from video_views JOIN video_gallery(video_gallery.video_id=video_views.video_id) where video_gallery.exam='.$category_id;//die;
	$stmt=$db112->query('select * from video_views JOIN video_gallery ON(video_gallery.video_id=video_views.video_id) where video_views.student_mail="'.$result['email'].'"');	
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
            	    echo $utime=$diff." Seconds";
            	}else if($diff>60){
            	    echo $utime=round($diff/60).".".($diff%60)." Minutes";
            	}else{
            	    echo $utime=round($diff/(60*60)).".".($diff%(60*60))." Hours";
            	}
        }


		?> 
		</td>
		
    </tr>
    <?php
$res_user[]=array("First Name"=>$fname,"Middle Name"=>$mname,"Last Name"=>$lname,"Full Name"=>$fullname,"Phone"=>$uphone,"Email"=>$uemail,"Exam"=>$uexam,"College"=>$ucollege,
"No of videos views"=>$uvcounts,"Videos viewed"=>$utopics,"Time spended for video views"=>$utime);	}
//print_r($res_user);
	?>
    
    
    </tbody>
    </table>
      <form method="post" action="http://thestrategist.co.in/demo/excelvideos/loginpanel/menu_order/User_Analytics/xlout.php">
               
                <button type="submit" class="btn btn-primary">Convert to Excel</button>
                 <input type="hidden" name="udetails" value='<?php echo json_encode($res_user);?>'/>
    </form>
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
           var scolleges=document.getElementById('scollege').value;
           var enmin=document.getElementById('enmin').value;
           var ensec=document.getElementById('ensec').value;
          if(sdate!='' && edndate!='' && scolleges!=00){   
           $.ajax({
        url: "menu_order/<?php echo base64_decode($_GET['menu']);?>/test.php?menu=<?php echo $_GET['menu']; ?>",
        type: "post",
        data: {vid:sdate,shours:sh,smins:smin,ssecs:ssec,vdt:edndate,enhs:enh,enmins:enmin,ensecs:ensec,college:scolleges} ,
        success: function (response) {
document.getElementById("ediv").innerHTML = response;
        // $(vvid).attr("data-prod-id",response);
         //var reslt=response; 
         //alert(response); // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
    
    
    
          }else{
           alert('Select the dates/ college to filter');
        }
        }
    </script>