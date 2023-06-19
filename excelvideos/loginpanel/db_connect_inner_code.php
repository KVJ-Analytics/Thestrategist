<?php session_start();
include("../../../includes/database.class.php");
include("../../../includes/functions.php");
include("../../../includes/includefunctions.php");
if($_SESSION['admlogin']!=1)
{
header("location:index.php");
}
//-------------------Related to Online & Offline --------------------
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600) && $_SESSION['memberloginid']!="")
{
header("location:logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time();
?>