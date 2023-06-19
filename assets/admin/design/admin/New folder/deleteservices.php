<?php 
   
   	session_start();
	require_once("Class/AdminClass.php");
		
	$id=$_REQUEST['services'];
	$count=sizeof($id);
	$userid=$_REQUEST['userid'];

	$adminObj=new AdminClass;
	

	for($i=0;$i<$count;$i++)
	{
	

		$allServices=$adminObj->deleteServices($id[$i]);

		//$pagename=$selectPageById['href'];
		
		//$pagename=$href;
		//unlink("../".$pagename);

		//$deletePage=$adminObj->deletePage($id[$i]);	

		if($allServices){

		$_SESSION['success']="Multiple Services Deleted Successfully";
		}
		
		else{
			$_SESSION['error']="Some Error Occured";
		}
		
		
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