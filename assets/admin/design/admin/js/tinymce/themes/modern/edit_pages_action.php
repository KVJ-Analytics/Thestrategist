<?php 

	include("inc/db.php");
	include("inc/activity.php");
	$user_id=$_REQUEST['userid'];
	$id=$_REQUEST['pid'];
	$title=$_REQUEST['name'];
	$description=htmlentities($_REQUEST['des1']);
	$layout=$_REQUEST['layout'];
	$sort_order=$_REQUEST['sort_order'];
	
	
	$stmts = $mysqli->prepare("update  condor_pages set page_name=?,layout=?,content=?,sort_order=? where page_id=?");
	$stmts->bind_param('sssii',$title,$layout,$description,$sort_order,$id);
	$stmts->execute();
	

	add_activity('Page Updated',$title,$user_id);	
	header("location:pages_listing.php");

?>