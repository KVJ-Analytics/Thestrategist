<?php
	
	session_start();
	require_once("Class/AdminClass.php");

	

	$id=$_REQUEST['id'];

	$url=$_REQUEST['url'];

	$bigfile=$_REQUEST['old_file'];;

	$caption=stripslashes($_REQUEST['des1']);

	//$caption=htmlentities($caption);

	 $rand=rand();

	if(!empty($_FILES["file"]["name"]))

	{

	

		$filename=$_FILES["file"]["name"];

		move_uploaded_file($_FILES["file"]["tmp_name"],

		  "uploads/clients/" .$rand. $_FILES["file"]["name"]);

		  $bigfile="uploads/clients/" .$rand. $_FILES["file"]["name"];

	

	}	

	

	$sort_order=$_REQUEST['sort_order'];

	$adminObj=new AdminClass;

	if($adminObj->updateClient($url,$bigfile,$caption,$sort_order,$id))
	{

		$_SESSION['success']="Client Details Updated Successfully";
	}
	else{
		$_SESSION['eroor']="Some Error Occured";
	}
				

	//echo "update banner set title='$title',image='$bigfile',caption='$caption',sort_order='$sort_order' where banner_id='$id'";exit();

	// $stmts = $mysqli->prepare("update banner set title=?,image=?,caption=?,sort_order=? where banner_id=?");

	// $stmts->bind_param('sssii',$title,$bigfile,$caption,$sort_order,$id);

	// $stmts->execute();

	

	header("Location:clients_listing.php");

?>