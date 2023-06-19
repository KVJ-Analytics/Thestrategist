<?php 
include("inc/db.php");
$id=$_REQUEST['id'];


$stmts = $mysqli->prepare("select href from  page_details where page_id =?");
$stmts->bind_param('i', $id);
$stmts->execute();
$stmts->store_result();
$stmts->bind_result($href);
$stmts->fetch();

$pagename=$href;
unlink("../".$pagename);	

$stmt = $mysqli->prepare("delete from page_details where page_id=?");
$stmt->bind_param('i', $id);
$stmt->execute();
header("location:page_listing.php");
?>