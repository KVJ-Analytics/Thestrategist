<?php 
	
	session_start();
	require_once("Class/AdminClass.php");
		// include("inc/db.php");

		// $id=$_REQUEST['id'];

  //       $stmts_imgs2 =$mysqli->prepare("select image from service_images where ser_id=?");	
		// $stmts_imgs2->bind_param('i', $id);									
		// $stmts_imgs2->execute();
		// $stmts_imgs2->store_result();
		// $stmts_imgs2->bind_result($bigfile1);
		// while ($stmts_imgs2->fetch())
		// {
		// 	if($bigfile1!="")
		// 	{
		// 		unlink($bigfile1);
		// 	}
		// }


  //       $stmts6 = $mysqli->prepare("delete from service_images where ser_id='$id'");					
		// $stmts6->execute();

		

		// $stmt = $mysqli->prepare("delete from services where id=?");

  //       $stmt->bind_param('i',$id);

  //       $stmt->execute();

   
	
	$id=$_REQUEST['id'];
	$count=sizeof($id);
	$userid=$_REQUEST['userid'];

	$adminObj=new AdminClass;
	$allServices=$adminObj->deleteServices($id);

	if($allServices){


		$_SESSION['success']="Service Deleted Successfully";
	}
	else{
		$_SESSION['eroor']="Some Error Occured";
	}





// for($i=0;$i<$count;$i++)
	
// {	
	
// 	// $stmts_imgs2 =$mysqli->prepare("delete  from services  where ser_id=?");	
// 	// $stmts_imgs2->bind_param('i', $id[$i]);									
// 	// $stmts_imgs2->execute();
		
// 	//add_activity('Portfolio Deleted',$title,$userid);

// }
header("location:services_listing.php");
?>

