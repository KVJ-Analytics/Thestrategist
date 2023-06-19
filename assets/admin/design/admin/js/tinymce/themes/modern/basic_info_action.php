<?php 

	include("inc/db.php");

	$id=$_REQUEST['id'];

	$name=$_REQUEST['name'];

	$oname=$_REQUEST['oname'];
	
	$siteinfo=$_REQUEST['siteinfo'];

	$mobile=$_REQUEST['mobile'];
	$phone=$_REQUEST['phone'];
	$fax=$_REQUEST['fax'];
	

	$address=stripslashes($_REQUEST['address']);
	$address=htmlentities($address);
	
	/*$address2=stripslashes($_REQUEST['address2']);
	$address2=htmlentities($address2);*/
	
	
	$address2="";

	

    $email=$_REQUEST['email'];
	$feed_email=$_REQUEST['feed_email'];

	$map=stripslashes($_REQUEST['map']);

	$map=htmlentities($map);

	$you=stripslashes($_REQUEST['you']);

	$you=htmlentities($you);



//	$map=$_REQUEST['map'];

	$facebook="#";

	$twitter="#";

	$linkdn="#";

	$gplus="#";

	

	//$href="page.php?page_id=".$id;

	

	$stmts_imgs1 =$mysqli->prepare("select logo,banner,fav_ico from basic where id=?");	

	$stmts_imgs1->bind_param('i', $id);									

	$stmts_imgs1->execute();

	$stmts_imgs1->store_result();

	$stmts_imgs1->bind_result($logo,$banner,$fav);

	$stmts_imgs1->fetch();



	

	//echo $image=$_FILES["file"]["name"];exit();

	

	if(!empty($_FILES["file"]["name"]))

	{

		$filename1=$_FILES["file"]["name"];

		move_uploaded_file($_FILES["file"]["tmp_name"],

		  "uploads/" . $_FILES["file"]["name"]);

		  $bigfile1="uploads/" . $_FILES["file"]["name"];

		// *** Include the classv

		

		$logo=$bigfile1;

	}

	

	if(!empty($_FILES["file2"]["name"]))

	{

		$filename=$_FILES["file2"]["name"];

		move_uploaded_file($_FILES["file2"]["tmp_name"],

		  "uploads/" . $_FILES["file2"]["name"]);

		$bigfile="uploads/" . $_FILES["file2"]["name"];

		$banner=$bigfile;

	}	

	

	if(!empty($_FILES["fav"]["name"]))

	{

		$filename=$_FILES["fav"]["name"];

		move_uploaded_file($_FILES["fav"]["tmp_name"],

		  "uploads/" . $_FILES["fav"]["name"]);

		$fav="uploads/" . $_FILES["fav"]["name"];

	}

	

	$stmts_imgs2 =$mysqli->prepare("update basic set site_name=?,owner_name=?,siteinfo=?,mobile=?,phone=?,fax=?,address=?,address2=?,email=?,feed_email=?,contact_map=?,youtube=?,facebook_url=?,twitter_url=?,linkdn_url=?,gplus_url=?,logo=?,banner=?,fav_ico=? where id=?");
	$stmts_imgs2->bind_param('sssssssssssssssssssi', $name,$oname,$siteinfo,$mobile,$phone,$fax,$address,$address2,$email,$feed_email,$map,$you,$facebook,$twitter,$linkdn,$gplus,$logo,$banner,$fav,$id);
	$stmts_imgs2->execute();

	

	

	header("location:settings.php?id=$id");





?>