<?php

	include("inc/db.php");

	include("inc/activity.php");
	$user_id=$_REQUEST['userid'];

	$id=$_REQUEST['ids'];

	$title=$_REQUEST['name'];

	

	$sort_order=$_REQUEST['sort_order'];


	$stmts = $mysqli->prepare("update category set title=?,sort_order=? where id=?");

	$stmts->bind_param('sii',$title,$sort_order,$id);

	$stmts->execute();

	add_activity('Category Updated',$title,$user_id);

	header("Location:category_listing.php");

?>