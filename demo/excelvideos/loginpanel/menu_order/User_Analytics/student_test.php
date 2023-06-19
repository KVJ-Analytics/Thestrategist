<?php
include("../../db_connect_inner_code.php"); 
 
 
  $sid=$_POST['sid'];
 
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



  <table id="etable" class="table table-striped table-bordered bootstrap-datatable datatable responsive" 
    style="width:96%;table-layout: auto; word-wrap:break-word;" align="center">
    <thead>
    <tr>
        <th>Sl. No</th>
        <th>Video title</th>
        <th>No of video views</th>
        <th>Total time spend on videos</th>
        <!--<th>Actions</th>-->
    </tr>
    </thead>
    
    
    
    
    <tbody>
        
        
        
    <?php
$db11 	= 	new Database();
	$stmt=$db11->query('select * from video_views JOIN video_gallery ON video_gallery.video_id=video_views.video_id where video_views.student_mail="'.$sid.'" and video_views.starting_video >="'.$rsdate.'" and video_views.ending_video <="'.$rendate.'" group by video_views.video_id');
	// table1 INNER JOIN table2 ON table1.matching_column = table2.matching_column;
	$rows1 = $db11->resultset();
		$db11->dbclose();
		$i=1;
		//	print_r($rows1);
		if(count($rows1)>0){
	foreach($rows1 as $result)
	{
	
		$caption=$result['caption'];
	//	$category_id=$result['exam_name'];
 $vvid=$result['video_id'];
	?>
    <tr>
        <td align="center"><?php echo ++$i; ?></td>
        <td class="center"><?php echo $caption; ?></td>
        <td class="center">
            
            <?php
            
	
             $db112 	= 	new Database();
	$stmt=$db112->query('select *,sum(video_duration) as vtotal,count(video_id)as vcount from video_views where video_id='.$vvid.' and student_mail="'.$sid.'" and video_views.starting_video >="'.$rsdate.'" and video_views.ending_video <="'.$rendate.'"');	
	$rows12 = $db112->resultset();
		$db112->dbclose();
	//	print_r($rows12);
		
		if(count($rows12)>0){
           
        	foreach($rows12 as $result)
            	{
            	    $vcount=$result['vcount'];
            	    $vtotal=$result['vtotal'];
            	}
		}
		echo $vcount;
		?>
        </td>
         
            
        </td>
         <td class="center">
            
             <?php
             
             
             echo $vtotal;
         


		?> 
            
        </td>
        
    </tr>
    <?php
	}}else{
	    echo "No views at this interval";
	}

	?>
    
    
    </tbody>
    </table>