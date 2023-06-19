<?php 

	include("inc/db.php");

		

	$name=$_REQUEST['social'];

	$url=$_REQUEST['url'];

	$class=$_REQUEST['class'];

	$sort_order=$_REQUEST['sort_order'];

		
		$bigfile="";
		
		
	if(!empty($_FILES["file1"]["name"]))
		{
	
		$filename=$_FILES["file1"]["name"];
	
		move_uploaded_file($_FILES["file1"]["tmp_name"],
	
		 "uploads/social/" .$rand. $_FILES["file1"]["name"]);
	
		 $bigfile="uploads/social/".$rand. $_FILES["file1"]["name"];
		}
		
		
		
		
	$stmt = $mysqli->prepare("insert into social(name,url,class,image,sort_order) values(?,?,?,?,?)");

	$stmt->bind_param('ssssi',$name,$url,$class,$bigfile1,$sort_order);

	$stmt->execute();

	header("location:add_social_media.php");

?>