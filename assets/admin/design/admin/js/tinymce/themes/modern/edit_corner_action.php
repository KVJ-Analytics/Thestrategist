<?php 

	include("inc/db.php");
	include("inc/activity.php");
	$user_id=$_REQUEST['userid'];
	$id=$_REQUEST['pid'];

	 $name=$_REQUEST['name'];
	
	
	$stmts =$mysqli->prepare("select frontimage,detailimage from corner where cornerid=?");	

	$stmts->bind_param('i', $id);									

	$stmts->execute();

	$stmts->store_result();

	$stmts->bind_result($bigfile,$bigfile1);

	$stmts->fetch();
	
	
	
	if(!empty($_FILES["file"]["name"]))
	{

		$filename=$_FILES["file"]["name"];

		move_uploaded_file($_FILES["file"]["tmp_name"],

		  "uploads/services/".$_FILES["file"]["name"]);

		  $bigfile="uploads/services/".$_FILES["file"]["name"];
	}	
	if(!empty($_FILES["file1"]["name"]))
	{

		$filename=$_FILES["file1"]["name"];

		move_uploaded_file($_FILES["file1"]["tmp_name"],

		  "uploads/services/".$_FILES["file1"]["name"]);

		  $bigfile1="uploads/services/".$_FILES["file1"]["name"];
	}	

 	 $des1=$_REQUEST['des1'];
	 $des1=htmlentities($des1);
	 $sort=$_REQUEST['sort'];
    $stmts = $mysqli->prepare("update corner set name=?,frontimage=?,detailimage=?,description=?,sort_order=? where cornerid=?");
	$stmts->bind_param('ssssii',$name,$bigfile,$bigfile1,$des1,$sort,$id);
	$stmts->execute();

	
	header("location:corner_listing.php");

?>