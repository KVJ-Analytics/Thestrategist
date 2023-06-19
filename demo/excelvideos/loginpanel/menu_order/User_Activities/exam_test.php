<?php
include("../../db_connect_inner_code.php"); 
 
 
  $vvid=$_POST['eid'];
 
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
        <th>User Name</th>
        
        <th>No of videos viewed</th>
        <!-- <th>Name of Exam</th>-->
        <th>Total time spend on videos</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	$i=0;
	$db1 	= 	new Database();
	$stmt=$db1->query('select * from registration join login_log ON(registration.regid=login_log.user_id) where registration.category_id='.$vvid.' and login_log.fromtime >="'.$rsdate.'" and login_log.totime <="'.$rendate.'" group by registration.email order by registration.regid desc');	
	$rows = $db1->resultset();
//	print_r($rows);
		$db1->dbclose();
	foreach($rows as $result0)
	{
	
	//	$category_id=$result0['name'];
		$exm=$result0['category_id'];
		
	?>
    <tr>
        <td align="center"><?php echo ++$i; ?></td>
        <td class="center"><?php echo $result0['name']; ?></td>
        <td class="center">
            
            <?php
            $db11 	= 	new Database();
	$stmt=$db11->query('select * from video_views where student_mail="'.$result0['email'].'" and starting_video >="'.$rsdate.'" and ending_video <="'.$rendate.'" group by video_id');	
	$rows1 = $db11->resultset();
		$db11->dbclose();
	//	print_r($rows1);
	echo count($rows1);
		?>
        </td>
       <!--  <td class="center">
            
            <?php
           $db11 	= 	new Database();
	$stmt=$db11->query('select * from exams where exam='.$exm);	
	$rows1c = $db11->resultset();
		$db11->dbclose();
	foreach($rows1c as $results)
            	{
            	    echo $results['exam_name'];
            	}
   // echo $row1[0]['exam_name'];
		?>
        </td>-->
        
        <td class="center">
            
             <?php
            $db112 	= 	new Database();
	$stmt=$db112->query('select * from video_views where student_mail="'.$result0['email'].'" and starting_video >="'.$rsdate.'" and ending_video <="'.$rendate.'"');	
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
        <td class="center">
            
            <a class="btn btn-info" href="indexhome.php?file=<?php echo base64_encode(base64_decode($_GET['menu'])."/editsettings.php"); ?>&menu=<?php echo $_GET['menu']; ?>&category_id=<?php echo base64_encode($result0['email']); ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                View details
            </a>
           <!-- <a class="btn btn-danger" href="javascript:deleteSettings('<?php echo base64_encode($result['exam']); ?>')">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>-->
        </td>
    </tr>
    <?php
	}

	?>
    
    
    </tbody>
    </table>