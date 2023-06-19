<?php

	include("inc/db.php");

	include("inc/activity.php");
	$user_id=$_REQUEST['userid'];

	$id=$_REQUEST['ids'];

	$title=$_REQUEST['name'];

	$page_link=$_REQUEST['page_link'];

	$caption=stripslashes($_REQUEST['des1']);

	$caption=htmlentities($caption);

	

	$stmts_imgs1 =$mysqli->prepare("select image from banner  where banner_id=?");	

	$stmts_imgs1->bind_param('i', $id);									

	$stmts_imgs1->execute();

	$stmts_imgs1->store_result();

	$stmts_imgs1->bind_result($bigfile);

	$stmts_imgs1->fetch();	

	$rand=rand();



	if(!empty($_FILES["file"]["name"]))

	{

		$filename=$_FILES["file"]["name"];

		move_uploaded_file($_FILES["file"]["tmp_name"],

		  "uploads/banner/" .$rand. $_FILES["file"]["name"]);

		  $bigfile="uploads/banner/" .$rand. $_FILES["file"]["name"];

	}	

	

	$sort_order=$_REQUEST['sort_order'];

	//echo "update banner set title='$title',image='$bigfile',caption='$caption',sort_order='$sort_order' where banner_id='$id'";exit();

	$stmts = $mysqli->prepare("update banner set title=?,image=?,caption=?,page_link=?,sort_order=? where banner_id=?");

	$stmts->bind_param('ssssii',$title,$bigfile,$caption,$page_link,$sort_order,$id);

	$stmts->execute();

	add_activity('Banner Updated',$title,$user_id);

	header("Location:banner_listing.php");

?>