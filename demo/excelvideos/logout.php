<?php include("sessioncode.php");
$curDateTime=date('Y-m-d H:i:s');
$regid=$_SESSION['regid'];
$db1 	= 	new Database();
$db1->updatedata('login_log',array("totime"=>$curDateTime),array("id"=>$regid));
$_SESSION['login']=0;
unset($_SESSION['login']);
header("Location:login.php");
?>