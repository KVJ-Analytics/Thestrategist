<?php

	include("inc/db.php");

	include("inc/activity.php");
	$user_id=$_REQUEST['userid'];

	$id=$_REQUEST['ids'];

	$address=$_REQUEST['des1'];


	$sort_order=$_REQUEST['sort_order'];



	$stmts = $mysqli->prepare("update companies set address=?,sort_order=? where id=?");

	$stmts->bind_param('sii',$address,$sort_order,$id);

	$stmts->execute();

	add_activity('Companies Updated',$title,$user_id);

	header("Location:companies_listing.php");

?>