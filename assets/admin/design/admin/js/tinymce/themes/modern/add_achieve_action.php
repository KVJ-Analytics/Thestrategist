<?php 

	include("inc/db.php");
	include("inc/activity.php");
	$user_id=$_REQUEST['userid'];
	
	$title=$_REQUEST['name'];	

	$percentage=$_REQUEST['per'];	


	
	
	

	$sort=$_POST['sort_order'];

	$stmts = $mysqli->prepare("insert into achieve(title,percentage,sort_order) values(?,?,?)");

	$stmts->bind_param('ssi',$title,$percentage,$sort);

	$stmts->execute();

	
	//add_activity('Client created',$title,$user_id);
	
	header("location:achievements_listing.php");



?>