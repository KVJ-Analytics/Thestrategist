<?php

	session_start();
	require_once('Class/AdminClass.php');

	$title=stripslashes($_REQUEST['name']);

	//$main=htmlentities($main);

	$what=stripslashes($_REQUEST['des']);

	//$what=htmlentities($what);

	$bigfile=$_REQUEST['file_old'];

	$rand=rand();

	$filename=$_FILES["file"]["name"];

	if(isset($filename)){

		if(move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/banner/" .$rand. $_FILES["file"]["name"]))
		{

			$bigfile="uploads/banner/".$rand. $_FILES["file"]["name"];
			
		}
	}

	$adminObj=new AdminClass();

	$selectAbout=$adminObj->selectFacility();

	if ($selectAbout !="")
	{
		$updateAbout=$adminObj->updateFacility($title,$what,$bigfile);

		if($updateAbout){
			$_SESSION['success']="Contents Updated Successfully";
		}
		
		else{
			$_SESSION['eroor']="Some Error Occured";
		}
	
	}
	else
	{

		$insertAbout=$adminObj->insertFacility($title,$what,$bigfile);

		if($insertAbout){
			$_SESSION['success']="Contents Added Successfully";
		}
		
		else{
			$_SESSION['eroor']="Some Error Occured";
		}
		
	}
	header("Location:add_about.php");

?>