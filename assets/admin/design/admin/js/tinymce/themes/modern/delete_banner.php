<?php 
include("inc/db.php");
include("inc/activity.php");

$id=$_REQUEST['id'];
$userid=$_REQUEST['userid'];

$stmts_imgs1 =$mysqli->prepare("select image,title from banner  where banner_id=?");	
$stmts_imgs1->bind_param('i', $id);									
$stmts_imgs1->execute();
$stmts_imgs1->store_result();
$stmts_imgs1->bind_result($bigfile,$title);
$stmts_imgs1->fetch();	

if($bigfile!="")
{
	unlink($bigfile);
}


$stmts_imgs2 =$mysqli->prepare("delete  from banner  where banner_id=?");	
$stmts_imgs2->bind_param('i', $id);									
$stmts_imgs2->execute();


add_activity('Banner Deleted',$title,$userid);

header("location:banner_listing.php");
?>