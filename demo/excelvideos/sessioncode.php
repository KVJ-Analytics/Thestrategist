<?php session_start();
date_default_timezone_set("Asia/Kolkata"); 
include("includes/config.php");
include("includes/database.class.php");
include("includes/functions.php");
include("includes/includefunctions.php");
include("includes/includefunctions_db.php");
if($_SESSION['login']!=1)
header("location:index.php");

$Member_AcId=$_SESSION['memberloginid'];
$PageNo=$_GET['PageNo'];
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600) && $_SESSION['memberloginid']!="")
{
header("location:logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time();


$curDateTime=date('Y-m-d H:i:s');
if($_SESSION['login']!="" && $_SESSION['login']==1)
{
$regid=$_SESSION['regid'];
$db1 	= 	new Database();
$db1->updatedata('login_log',array("totime"=>$curDateTime),array("id"=>$regid));
}

?>