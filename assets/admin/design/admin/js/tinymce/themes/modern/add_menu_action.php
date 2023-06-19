<?php

	include_once 'inc/db.php';

	$name=$_POST['name'];

	$sub_title=$_POST['sub_title'];

	$parent=$_POST['parent'];

	$sort=$_POST['sort_order'];

	$pagelink=$_POST['link'];

	//echo "insert into menu(name,parent,sort_order,page_url) values('$name','$parent', '$sort', '$pagelink')";exit();

	$stmt = $mysqli->prepare("insert into menu(name,sub_title,parent,sort_order,page_url) values(?,?,?,?,?)");

	$stmt->bind_param('sssis',$name,$sub_title,$parent, $sort, $pagelink);

	$stmt->execute();

	header("location:add_menu.php");
//
?>