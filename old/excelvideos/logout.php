<?php include("sessioncode.php");
$curDateTime=date('Y-m-d H:i:s');
$regid=$_SESSION['regid'];
$db1 	= 	new Database();
$db1->updatedata('registration',array("totime"=>$curDateTime),array("regid"=>$regid));
$_SESSION['login']=0;
unset($_SESSION['login']);
header("Location:index.php");
?>