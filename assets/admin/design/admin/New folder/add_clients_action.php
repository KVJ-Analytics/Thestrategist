<?php 
	session_start();
	require_once("Class/AdminClass.php");
	$adminObj=new AdminClass;


	//$title=$_REQUEST['name'];

	$url=$_REQUEST['url'];

	$caption=stripslashes($_REQUEST['des1']);

	$caption=htmlentities($caption);

	$rand=rand();

	$filename=$_FILES["file"]["name"];

	move_uploaded_file($_FILES["file"]["tmp_name"],

	"uploads/clients" .$rand. $_FILES["file"]["name"]);

	$bigfile="uploads/clients".$rand. $_FILES["file"]["name"];

	$sort=$_POST['sort_order'];


	if($adminObj->insertClients($bigfile,$url,$caption,$sort)){


		$_SESSION['success']="Client Added Successfully";
	}
	else{
		$_SESSION['eroor']="Some Error Occured";
				
	}

	// $stmts = $mysqli->prepare("insert into banner(title,image,caption,sort_order) values(?,?,?,?)");

	// $stmts->bind_param('sssi',$title,$bigfile,$caption, $sort);

	// $stmts->execute();

	

	header("location:add_clients.php");



?>