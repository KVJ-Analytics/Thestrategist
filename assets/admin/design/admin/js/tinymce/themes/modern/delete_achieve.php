<?php 
include("inc/db.php");
include("inc/activity.php");

$id=$_REQUEST['id'];
$userid=$_REQUEST['userid'];




$stmts_imgs2 =$mysqli->prepare("delete  from achieve  where id=?");	
$stmts_imgs2->bind_param('i', $id);									
$stmts_imgs2->execute();


//add_activity('Client Deleted',$title,$userid);

header("location:achievements_listing.php");
?>