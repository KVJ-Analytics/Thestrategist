<?php

include_once 'inc/db.php';

include_once 'inc/functions.php';

 

sec_session_start();

?>

<?php if (login_check($mysqli) == false) {

		header("location:index.php");

		exit();

}

$stmt_basic = $mysqli->prepare("select site_name,email,logo from  basic where id=1");

//$stmt->bind_param('s', $id);

$stmt_basic->execute();

$stmt_basic->store_result();

// get variables from result.

$stmt_basic->bind_result($basic_site_name,$basic_email,$basic_logo);

$stmt_basic->fetch();



?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Create Page</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700' rel='stylesheet' type='text/css'>
	<!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
	<link href="media/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="media/layout/css/layout.css" rel="stylesheet" type="text/css">
	<link href="media/layout/css/skins/_all-skins.css" rel="stylesheet" type="text/css">
	<link href="media/font-awesome-4.4.0/css/font-awesome.css" rel="stylesheet" >
	<link href="css/common.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/base_color.css" rel="stylesheet" type="text/css">
    <link href="css/dropify.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

    

	<script type="text/javascript" src="ckeditor/ckeditor.js?mol04r"></script>

	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

	<script type="text/javascript" src="ckfinder/ckfinder.js"></script>

    <script type="text/JavaScript" src="js/sha512.js"></script> 

    <script type="text/JavaScript" src="js/forms.js"></script>
</head>