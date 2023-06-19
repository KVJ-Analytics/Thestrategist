<?php

	include("inc/db.php");

	$user_id=$_REQUEST['userid'];
	
	include("inc/activity.php");
	
	$id=$_REQUEST['ids'];

	$title=$_REQUEST['name'];

	$dat=$_REQUEST['dat'];
	$dt=explode('/',$dat);
	$date=$dt[2].'-'.$dt[0].'-'.$dt[1];

	$description=stripslashes($_REQUEST['des1']);

	$description=htmlentities($description);

	$stmts_imgs1 =$mysqli->prepare("select image from news where id=?");	

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

		  "uploads/news/" .$rand. $_FILES["file"]["name"]);

		  $bigfile="uploads/news/" .$rand. $_FILES["file"]["name"];

	

	}	

	

	$sort_order=$_REQUEST['sort_order'];

	//echo "update banner set title='$title',image='$bigfile',caption='$caption',sort_order='$sort_order' where banner_id='$id'";exit();

	$stmts = $mysqli->prepare("update news set title=?,image=?,description=?,date=?,sort_order=? where id=?");

	$stmts->bind_param('ssssii',$title,$bigfile,$description,$date,$sort_order,$id);

	$stmts->execute();

	add_activity('News Updated','',$user_id);

	header("Location:news_listing.php");

?>