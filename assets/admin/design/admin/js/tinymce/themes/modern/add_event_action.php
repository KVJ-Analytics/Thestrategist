<?php 

	include("inc/db.php");
	include("inc/activity.php");
	$user_id=$_REQUEST['userid'];
	
	$title=$_REQUEST['name'];	

	$description=stripslashes($_REQUEST['des1']);

	$description=htmlentities($description);

	$rand=rand();
	
	$bigfile="";
	


	
	
	$date=$_POST['datepick'];
	$date=explode('/',$date);
	$date=$date[2].'-'.$date[0].'-'.$date[1];

	$sort=$_POST['sort_order'];
	$type=$_POST['type'];

	$stmts = $mysqli->prepare("insert into events(title,date_event,description,type,sort_order) values(?,?,?,?,?)");

	$stmts->bind_param('sssssi',$title,$date,$description,$type,$sort);

	$stmts->execute();

	
	add_activity('Event created',$title,$user_id);
	
	header("location:add_event.php");



?>