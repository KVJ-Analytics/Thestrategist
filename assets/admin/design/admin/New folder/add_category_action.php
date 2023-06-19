<?php 
	require_once("Class/WorkClass.php");
	$name=$_REQUEST['name'];
	$sort_order=$_REQUEST['sort_order'];

	
 	$workObj=new WorkClass;
 	$workObj->insertWorkCategoery($name,$sort_order);

	// $stmts1 = $mysqli->prepare("insert into category(name,sort_order) values(?,?)");
	// $stmts1->bind_param('si',$name,$sort_order);
	// $stmts1->execute();
	// $stmts1->close();
	header('Location:category_listing.php');
	?>
