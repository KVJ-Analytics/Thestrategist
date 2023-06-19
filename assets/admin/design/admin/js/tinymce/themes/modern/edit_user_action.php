<?php
	include'inc/db.php';
	$id=$_REQUEST['user_id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$type=$_POST['user_type'];
	
	
	$stmt = $mysqli->prepare("update  members set username=?,email=?,type=? where id=? ");
	$stmt->bind_param('ssss',$name,$email,$type,$id);
	$stmt->execute();
	header("location:users_list.php");
?>