<?php 

	require_once("Class/AdminClass.php");
	
	$id=$_REQUEST['value'];
	$adminObj=new AdminClass;
	$deleteServiceImage=$adminObj->deleteServicesImage($id);


	// $stmts5 = $mysqli->prepare("delete from service_images where id='$id'");					
	// 		$stmts5->execute();
	echo "Image deleted";
?>