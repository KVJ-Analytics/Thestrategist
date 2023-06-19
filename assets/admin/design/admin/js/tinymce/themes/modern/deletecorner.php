<?php 

include("inc/db.php");
$id=$_REQUEST['corner'];
$userid=$_REQUEST['userid'];
//include("inc/activity.php");
for($i=0;$i< sizeof($id);$i++)

		{
			$stmts_imgs1 =$mysqli->prepare("select frontimage,detailimage from corner where cornerid=?");	
			$stmts_imgs1->bind_param('i', $id[$i]);									
			$stmts_imgs1->execute();
			$stmts_imgs1->store_result();
			$stmts_imgs1->bind_result($bigfile,$bigfile1);
			$stmts_imgs1->fetch();
			if($bigfile!="")
			{
				unlink($bigfile);
			}
			if($bigfile1!="")
			{
				unlink($bigfile1);
			}
			
			$stmts5 = $mysqli->prepare("delete from corner where cornerid=?");
			$stmts5->bind_param('i', $id[$i]);					
			$stmts5->execute();				
			//add_activity('services Deleted',$title,$userid);		
		}
		
		header("location:corner_listing.php");
?>