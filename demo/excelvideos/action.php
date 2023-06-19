<?php session_start();
date_default_timezone_set("Asia/Kolkata"); 
include("includes/database.class.php");
include("includes/includefunctions.php");

// Connect to the SQL DB

$_SESSION['user']=$_POST['username'];
$uname=$_POST['Username'];
$pssword=$_POST['pssword'];
 $name=$_POST['Name'];
 $video_category=$_POST['video_category'];
 $email=$_POST['email'];
 $phoneno=$_POST['Phoneno'];
 
 $mname=$_POST['mname'];
 $lname=$_POST['lname'];
 $fname=$_POST['fname'];
 $college=$_POST['college'];
	$db1 	= 	new Database();
	$stmt=$db1->query('select * from registration where email="'.$email.'"');	
	$rows = $db1->resultset();
	$db1->dbclose();
	if($db1->rowCount()>0)
{
    
  $_SESSION['account']=1;	

header('Location:'."login.php?exist-user=1");  
}else{
$datetime = date('Y-m-d H:i:s');

$ip = $_SERVER['REMOTE_ADDR'];

$db1 	= 	new Database();


	$db1->insertdata('registration',array("name"=>$name,"email"=>$email,"phoneno"=>$phoneno,"datetime"=>$datetime,"ipaddress"=>$ip,'fromtime'=>'0000-00-00 00:00:00','totime'=>'0000-00-00 00:00:00','category_id'=>$video_category,'pssword'=>$pssword,
	'last_name'=>$lname,'middle_name'=>$mname,'full_name'=>$fname,'college'=>$college));
	$db1->dbclose();
	$db1 	= 	new Database();
	$stmt=$db1->query('select * from registration order by regid desc limit 1 ');	
	$rows = $db1->resultset();
	foreach($rows as $result)
	{
	
	//	$_SESSION['regid']=$result['regid'];
	$_SESSION['activate_mail']=$result['email'];
	//	$_SESSION['category_id']=$result['category_id'];
	}
	$db1->dbclose();
	
$_SESSION['account']=2;	
//header('Location:login.php');
header('Location:'."http://thestrategist.co.in/UserController/activation_mail?use=".$email);
}
?>