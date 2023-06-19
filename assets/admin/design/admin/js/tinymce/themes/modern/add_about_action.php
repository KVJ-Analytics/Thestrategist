<?php

	include("inc/db.php");
	include("inc/activity.php");
	$user_id=$_REQUEST['userid'];
	
	$title=$_REQUEST['title'];
	$subtitle=$_REQUEST['subtitle'];
	
	$institution=stripslashes($_REQUEST['des2']);
	$institution=htmlentities($institution);
	
	$history=stripslashes($_REQUEST['des3']);
	$history=htmlentities($history);

	
	
	
	
	$id=1;
	
	$stmts =$mysqli->prepare("select image from about where id=?");	

	$stmts->bind_param('i', $id);									

	$stmts->execute();

	$stmts->store_result();

	$stmts->bind_result($thumb);

	$stmts->fetch();
	
	
	
	if(!empty($_FILES["file2"]["name"]))
	{

		$filename=$_FILES["file2"]["name"];

		move_uploaded_file($_FILES["file2"]["tmp_name"],

		"uploads/about/".$_FILES["file2"]["name"]);

		$thumb="uploads/about/".$_FILES["file2"]["name"];
	}	

	

	$stmts_imgs1 =$mysqli->prepare("select * from about");	
	$stmts_imgs1->execute();
	$stmts_imgs1->store_result();
	
if ($stmts_imgs1->num_rows!=0)
	{
		$stmts = $mysqli->prepare("update about set title=?,subtitle=?,institution=?,history=?,image=?");

		$stmts->bind_param('sssss',$title,$subtitle,$institution,$history,$thumb);

		$stmts->execute();
	}
	else
	{
		$stmts = $mysqli->prepare("insert into about (title,subtitle,instituition,history,image) values (?,?,?,?,?)");

		$stmts->bind_param('sssss',$title,$subtitle,$instituition,$history,$thumb);

		$stmts->execute();
	}
	//add_activity('About Page Updated','About',$user_id);

	header("Location:add_about.php");

?>