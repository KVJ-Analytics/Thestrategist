<?php

	include("inc/db.php");

		include("inc/activity.php");
	$user_id=$_REQUEST['userid'];

	$id=$_REQUEST['ids'];

	$title=$_REQUEST['name'];
    $percentage=$_REQUEST['per'];
	

	

	

	

	
	

	$sort_order=$_REQUEST['sort_order'];

	//echo "update banner set title='$title',image='$bigfile',caption='$caption',sort_order='$sort_order' where banner_id='$id'";exit();

	$stmts = $mysqli->prepare("update achieve set title=?,percentage=?,sort_order=? where id=?");

	$stmts->bind_param('ssii',$title,$percentage,$sort_order,$id);
              
	$stmts->execute();

	//add_activity('Client Updated',$title,$user_id);

	header("Location:achievements_listing.php");

?>