<?php
	include_once 'inc/db.php';
	$id=$_REQUEST['id'];
	$stmt = $mysqli->prepare("delete  from contact_info where id =?");
	$stmt->bind_param('i', $id);
	$stmt->execute();
	header("location:contact_info_listing.php");
?>
