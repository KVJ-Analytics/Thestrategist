<?php 
include("inc/db.php");
include("inc/activity.php");
$id=$_REQUEST['achieve'];
$count=sizeof($id);
$userid=$_REQUEST['userid'];
for($i=0;$i<$count;$i++)
	
{

	$stmts_imgs2 =$mysqli->prepare("delete  from achieve  where id=?");	
	$stmts_imgs2->bind_param('i', $id[$i]);									
	$stmts_imgs2->execute();
		
	//add_activity('Client Deleted',$title,$userid);

}
header("location:achievements_listing.php");
?>