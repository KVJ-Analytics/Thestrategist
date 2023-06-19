<?php 

include("inc/db.php");
$id=$_REQUEST['banner'];

$userid=$_REQUEST['userid'];
include("inc/activity.php");
for($i=0;$i< sizeof($id);$i++)
		{
		
		$stmts_imgs2 =$mysqli->prepare("select image from gallery_images where gal_id=?");	
		$stmts_imgs2->bind_param('i', $id[$i]);									
		$stmts_imgs2->execute();
		$stmts_imgs2->store_result();
		$stmts_imgs2->bind_result($bigfile1);
		while ($stmts_imgs2->fetch())
		{
			if($bigfile1!="")
			{
				unlink($bigfile1);
			}
		}
		
		$stmts6 = $mysqli->prepare("delete from gallery_images where gal_id=?");
		$stmts6->bind_param('i',$id[$i]);						
		$stmts6->execute();

		$stmts_imgs1 =$mysqli->prepare("select name,icon from gallery where id=?");	
		$stmts_imgs1->bind_param('i', $id[$i]);									
		$stmts_imgs1->execute();
		$stmts_imgs1->store_result();
		$stmts_imgs1->bind_result($title,$icon);
		$stmts_imgs1->fetch();
		if($icon!="")
		{
			unlink($icon);
		}
		
		$stmts5 = $mysqli->prepare("delete from gallery where id=?");
		$stmts5->bind_param('i', $id[$i]);					
		$stmts5->execute();
				
			add_activity('Page Deleted',$title,$userid);
		
		}
		
header("location:services_listing.php");

?>