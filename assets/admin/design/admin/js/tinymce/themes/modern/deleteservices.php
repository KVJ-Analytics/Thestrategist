<?php 

include("inc/db.php");
$id=$_REQUEST['services'];
$userid=$_REQUEST['userid'];
include("inc/activity.php");
for($i=0;$i< sizeof($id);$i++)

		{
			$stmts_imgs1 =$mysqli->prepare("select image from services where id=?");	
			$stmts_imgs1->bind_param('i', $id[$i]);									
			$stmts_imgs1->execute();
			$stmts_imgs1->store_result();
			$stmts_imgs1->bind_result($image);
			$stmts_imgs1->fetch();
			if($image!="")
			{
				unlink($image);
			}
			
			$stmts5 = $mysqli->prepare("delete from services where id=?");
			$stmts5->bind_param('i', $id[$i]);					
			$stmts5->execute();				
			add_activity('services Deleted',$title,$userid);		
		}
		
header("location:services_listing.php");
?>