<?php session_start();
date_default_timezone_set("Asia/Kolkata"); 
include("./includes/database.class.php");
include("./includes/includefunctions.php");
$seconds=0;
$vid=$_POST['vid'];
$email=$_SESSION['user_email'];
 $datetime = date('Y-m-d H:i:s');
$db1= new Database();
	$stmt=$db1->query('select * from video_views where id='.$vid);	
	$rows = $db1->resultset();
	foreach($rows as $result)
	{
	
  $viewid=$result['starting_video'];
		
	}
	$db1->dbclose();
	
	
	echo $seconds = strtotime($datetime) - strtotime($viewid);
	$db1= new Database();

$db1->updatedata('video_views',array("ending_video"=>$datetime,"video_duration"=>$seconds),array('id'=>$vid));
	$db1->dbclose();

?>