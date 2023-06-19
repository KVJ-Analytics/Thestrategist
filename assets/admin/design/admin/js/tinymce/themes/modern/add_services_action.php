<?php 

	 include("inc/db.php");
	 include("inc/activity.php");
	 $user_id=$_REQUEST['userid'];

	 include("resize-class.php");

	 $name=$_REQUEST['name'];
	 $caption=$_REQUEST['caption'];
	  $page=$_POST['page'];
	 $des1=$_REQUEST['des1'];
	 $des1=htmlentities($des1);
	 
	 
	$rand=rand();
	if(!empty($_FILES["file"]["name"]))

	{

		move_uploaded_file($_FILES["file"]["tmp_name"],

		  "uploads/services/" .$rand. $_FILES["file"]["name"]);

		  $bigfile="uploads/services/" .$rand. $_FILES["file"]["name"];

	}	
	else
	{
		$bigfile="";
	}
	
	
	if(!empty($_FILES["file1"]["name"]))

	{

		move_uploaded_file($_FILES["file1"]["tmp_name"],

		  "uploads/services/" .$rand. $_FILES["file1"]["name"]);

		  $bigfile1="uploads/services/" .$rand. $_FILES["file1"]["name"];
	}	
	else
	{
		$bigfile1="";
	}
	
	
	 $sort=$_REQUEST['sort'];
	
		 
	$stmts7=$mysqli->prepare("insert into services(name,caption,icon,image,description,page,sort_order)values(?,?,?,?,?,?,?)");

	$stmts7->bind_param('sssssii',$name,$caption,$bigfile1,$bigfile,$des1,$page,$sort);

	$stmts7->execute();

	$stmts7->close();
	
	
	add_activity('service created',$name,$user_id);

    header("location:services_listing.php");
?>