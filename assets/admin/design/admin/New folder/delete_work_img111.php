<?php 
require_once("Class/AdminClass.php");
$id=$_REQUEST['value'];
$adminObj=new AdminClass;

$deleteImage=$workObj->deleteResortImage($id);
// $stmts5 = $mysqli->prepare("delete from gallery_images where id='$id'");					
// 		$stmts5->execute();
echo "Image deleted";
?>