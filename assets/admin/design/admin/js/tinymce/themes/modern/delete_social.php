<?php 
include("inc/db.php");
$id=$_REQUEST['id'];

$layout_stmts1 = $mysqli->prepare("delete from social where id=?");
$layout_stmts1->bind_param('i', $id);
$layout_stmts1->execute();


header("location:social_listing.php");
?>