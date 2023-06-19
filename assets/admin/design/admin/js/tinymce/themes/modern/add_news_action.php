<?php 

	include("inc/db.php");

    include("inc/activity.php");
    $user_id=$_REQUEST['userid'];
	$title=$_REQUEST['name'];
	
	$dat=$_REQUEST['dat'];
	$dt=explode('/',$dat);
	$date=$dt[2].'-'.$dt[0].'-'.$dt[1];

	$description=stripslashes($_REQUEST['des1']);

	$description=htmlentities($description);

	$rand=rand();

    $bigfile="";

	$filename=$_FILES["file"]["name"];

    move_uploaded_file($_FILES["file"]["tmp_name"],

    "uploads/news/" .$rand. $_FILES["file"]["name"]);

	$bigfile="uploads/news/".$rand. $_FILES["file"]["name"];

	$sort=$_POST['sort_order'];

	$stmts = $mysqli->prepare("insert into news(title,image,description,date,sort_order) values(?,?,?,?,?)");

	$stmts->bind_param('ssssi',$title,$bigfile,$description,$date,$sort);

	$stmts->execute();

	add_activity('News Added','News',$user_id);

    header("location:news_listing.php");



?>