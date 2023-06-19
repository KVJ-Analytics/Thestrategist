<?php session_start();
date_default_timezone_set("Asia/Kolkata"); 
include("includes/database.class.php");
include("includes/includefunctions.php");

// Connect to the SQL DB

$_SESSION['user']=$_POST['username'];
$uname=$_POST['Username'];
$pwd=$_POST['Password'];
 $name=$_POST['Name'];
 $email=$_POST['email'];
 $phoneno=$_POST['Phoneno'];

$datetime = date('Y-m-d H:i:s');

$ip = $_SERVER['REMOTE_ADDR'];

$db1 	= 	new Database();


	$db1->insertdata('registration',array("name"=>$name,"email"=>$email,"phoneno"=>$phoneno,"datetime"=>$datetime,"ipaddress"=>$ip));
	$db1->dbclose();
	$db1 	= 	new Database();
	$stmt=$db1->query('select * from registration order by regid desc limit 1 ');	
	$rows = $db1->resultset();
	foreach($rows as $result)
	{
	
		$_SESSION['regid']=$result['regid'];
	}
	$db1->dbclose();
	
$_SESSION['rlogin']=1;	

header('Location:'."login.php");
?>