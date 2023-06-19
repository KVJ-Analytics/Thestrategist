<?php

	include("inc/db.php");

		include("inc/activity.php");
	$user_id=$_REQUEST['userid'];

	$id=$_REQUEST['ids'];

	$title=$_REQUEST['name'];
    $url=$_REQUEST['url'];
	

	

	

	

	$stmts_imgs1 =$mysqli->prepare("select image from brand  where brand_id=?");	

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

		  "uploads/brands/" .$rand. $_FILES["file"]["name"]);

		  $bigfile="uploads/brands/" .$rand. $_FILES["file"]["name"];

	

	}	

	

	$sort_order=$_REQUEST['sort_order'];

	//echo "update banner set title='$title',image='$bigfile',caption='$caption',sort_order='$sort_order' where banner_id='$id'";exit();

	$stmts = $mysqli->prepare("update brand set title=?,image=?,url=?,sort_order=? where brand_id=?");

	$stmts->bind_param('sssii',$title,$bigfile,$url,$sort_order,$id);
              
	$stmts->execute();

	add_activity('Client Updated',$title,$user_id);

	header("Location:client_listing.php");

?>