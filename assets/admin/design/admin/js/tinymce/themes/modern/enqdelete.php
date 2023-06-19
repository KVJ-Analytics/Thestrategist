<?php

	include_once 'inc/db.php';
	include("inc/activity.php");
	$id=$_REQUEST['enqid'];
$userid=$_REQUEST['userid'];
	$stmt = $mysqli->prepare("delete from enquiry where id =?");

	$stmt->bind_param('i', $id);

	$stmt->execute();
	
	$title="";
	
	add_activity('Enquiry Deleted',$title,$userid);

	header("location:dashboard.php");

?>

