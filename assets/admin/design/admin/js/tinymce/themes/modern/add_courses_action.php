<?php 

	 include("inc/db.php");
	 include("inc/activity.php");
	 $user_id=$_REQUEST['userid'];

	 include("resize-class.php");

	 $name=$_REQUEST['name'];
	
	
	 
	 
	
	
	
	if(!empty($_FILES["file1"]["name"]))

	{

		move_uploaded_file($_FILES["file1"]["tmp_name"],

		  "uploads/courses/" .$rand. $_FILES["file1"]["name"]);

		  $bigfile1="uploads/courses/" .$rand. $_FILES["file1"]["name"];
	}	
	else
	{
		$bigfile1="";
	}
	
	 $duration=$_REQUEST['duration'];
	
	 $des1=$_REQUEST['des1'];
	 $des1=htmlentities($des1);
	
	 $sort=$_REQUEST['sort'];
	
		 
	$stmts7=$mysqli->prepare("insert into courses(name,detailimage,duration,description,sort_order)values(?,?,?,?,?)");

	$stmts7->bind_param('ssssi',$name,$bigfile1,$duration,$des1,$sort);

	$stmts7->execute();

	$stmts7->close();
	
	
	//add_activity('service created',$name,$user_id);

    header("location:courses_listing.php");
?>