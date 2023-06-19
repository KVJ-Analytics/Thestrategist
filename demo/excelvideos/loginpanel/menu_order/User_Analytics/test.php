<?php
include("../../db_connect_inner_code.php"); 
  $sdate=$_POST['vid'];
  $endate=$_POST['vdt'];

 $college=$_POST['college'];
  $shours=$_POST['shours'];
  $smins=$_POST['smins'];
  $ssecs=$_POST['ssecs'];
  $enhs=$_POST['enhs'];
  $enmins=$_POST['enmins'];
 $ensecs=$_POST['ensecs'];
if($shours<10){
    $shours='0'.$shours;
}
if($smins<10){
    $smins='0'.$smins;
}

if($ssecs<10){
    $ssecs='0'.$ssecs;
}
if($enhs<10){
    $enhs='0'.$enhs;
}

if($enmins<10){
    $enmins='0'.$enmins;
}
if($ensecs<10){
    $ensecs='0'.$ensecs;
}

 $rsdate=$sdate." ".$shours.":".$smins.":".$ssecs;
 $rendate=$endate." ".$enhs.":".$enmins.":".$ensecs;
//die;
?>



 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" 
    id="etable" style="width:96%;table-layout: auto; word-wrap:break-word;" align="center">
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
//	echo $i=0;die;
	$db1 	= 	new Database();
	//echo 'select * from registration where college="'.$college.'" and datetime >= "'.$rsdate.'" AND datetime <= "'.$rendate.'"';
	$stmt=$db1->query('select * from registration where college="'.$college.'" and datetime >= "'.$rsdate.'" AND datetime <= "'.$rendate.'"');	
	$rows = $db1->resultset();
		$db1->dbclose();
	//	print_r($rows);die;
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
    
    