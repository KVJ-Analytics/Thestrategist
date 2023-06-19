<?php 
include("inc/db.php");
$id=$_REQUEST['value'];

$stmts5 = $mysqli->prepare("delete from gallery_images where id='$id'");					
		$stmts5->execute();
echo "Image deleted";
//header("location:property_listing.php");
?>