<?php
	include_once 'inc/db.php';
	$id=$_REQUEST['id'];
	
	$stmt = $mysqli->prepare("delete  from  menu where id =?");
	$stmt->bind_param('i', $id);
	$stmt->execute();
	echo "Deleted";
	
?>
