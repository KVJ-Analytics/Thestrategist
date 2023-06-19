<?php
include("../../db_connect_inner_code.php"); 
  $sdate=$_POST['vid'];
  $endate=$_POST['vdt'];


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
        <th>Exams</th>
       
        <th>No of categories</th>
         <th>Total no of videos</th>
       
        <th>No of users Logged</th>
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
        <td class="center"><a href="indexhome.php?file=<?php echo base64_encode(base64_decode($_GET['menu'])."/viewsettings.php"); ?>&menu=<?php echo $_GET['menu']; ?>&category_id=<?php echo base64_encode($category_id); ?>"><?php echo $result['exam_name']; ?></a></td>
        
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
$stmt=$db11->query('select * from registration join login_log ON(registration.regid=login_log.user_id) where registration.category_id='.$category_id.' and login_log.fromtime >="'.$rsdate.'" and login_log.totime <="'.$rendate.'"');	
	$rows2 = $db11->resultset();
		$db11->dbclose();
echo count($rows2);
		
	?>
        </td>
          <td class="center">
        <?php
            $db112 	= 	new Database();
           // echo 'select * from video_views JOIN video_gallery(video_gallery.video_id=video_views.video_id) where video_gallery.exam='.$category_id;//die;
	$stmt=$db112->query('select * from video_views JOIN video_gallery ON(video_gallery.video_id=video_views.video_id) where video_gallery.exam='.$category_id.' and video_views.starting_video >="'.$rsdate.'" and video_views.ending_video <="'.$rendate.'"'); //.' group by video_views.video_id');	
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
	$stmt=$db112->query('select * from video_views JOIN video_gallery ON(video_gallery.video_id=video_views.video_id) where video_gallery.exam='.$category_id.' and video_views.starting_video >="'.$rsdate.'" and video_views.ending_video <="'.$rendate.'"');	
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
        }else{
            echo "0 Seconds";
        }


		?> 
		</td>
		
    </tr>
    <?php
	}

	?>
    
    
    </tbody>
    </table>