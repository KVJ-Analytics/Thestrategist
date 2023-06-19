<?php 
include("inc/db.php");
$id=$_REQUEST['news'];
$count=sizeof($id);

for($i=0;$i<$count;$i++)
{
$stmts_imgs1 =$mysqli->prepare("select image from news where id=?");	
$stmts_imgs1->bind_param('i', $id[$i]);									
$stmts_imgs1->execute();
$stmts_imgs1->store_result();
$stmts_imgs1->bind_result($bigfile);
$stmts_imgs1->fetch();	

unlink($bigfile);


$stmts_imgs2 =$mysqli->prepare("delete from news where id=?");	
$stmts_imgs2->bind_param('i', $id[$i]);									
$stmts_imgs2->execute();
}
header("location:news_listing.php");
?>