<?php session_start();
date_default_timezone_set("Asia/Kolkata"); 
include("./includes/database.class.php");
include("./includes/includefunctions.php");
$vdt=$_POST['vdt'];
$vid=$_POST['vid'];
$email=$_SESSION['user_email'];
$datetime = date('Y-m-d H:i:s');
$db1= new Database();

//$db1->insertdata('video_views',array("name"=>$name,"email"=>$email,"phoneno"=>$phoneno,"datetime"=>$datetime,"ipaddress"=>$ip));
$db1->insertdata('video_views',array("video_id"=>$vid,"starting_video"=>$datetime,"ending_video"=>'0000-00-00 00:00:00',"video_duration"=>$vdt,"student_mail"=>$email));
	$db1->dbclose();



//echo $email;

$db1=new Database();
	$stmt=$db1->query('select * from video_views where student_mail="'.$email.'" order by id desc limit 1 ');	
	$rows = $db1->resultset();
	foreach($rows as $result)
	{
	
	$viewid=$result['id'];
		
	}
	$db1->dbclose();
echo $viewid;
?>