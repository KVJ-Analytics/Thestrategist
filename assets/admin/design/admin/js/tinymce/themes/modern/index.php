<?php
include_once 'inc/db.php';
include_once 'inc/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {

    $logged = 'in';

} else {

    $logged = 'out';

}

$stmt_basic = $mysqli->prepare("select site_name,email,logo from  basic where id=1");

//$stmt->bind_param('s', $id);

$stmt_basic->execute();

$stmt_basic->store_result();

// get variables from result.

$stmt_basic->bind_result($basic_site_name,$basic_email,$basic_logo);

$stmt_basic->fetch();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login | <?php echo $basic_site_name; ?></title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700' rel='stylesheet' type='text/css'>
	<link href="css/base_color.css" rel="stylesheet" type="text/css">
	<link href="css/login.css" rel="stylesheet" type="text/css">
    <script type="text/JavaScript" src="js/sha512.js"></script> 

    <script type="text/JavaScript" src="js/forms.js"></script> 
</head>
<body>
	<div class="login-wrapper">
     <form class="form-signin" action="inc/process_login.php" method="post" name="login_form">
    	<div class="login-box">
        	<div class="login-logo">
            	<img src="<?php echo $basic_logo; ?>" />
            </div>
             <?php

        if (isset($_GET['error'])) { 

			if($_GET['error']==1){

		?>

            <div class="alert alert-block alert-danger fade in" style="width: 88%;margin: 0 auto;">

                <button type="button" class="close close-sm" data-dismiss="alert">

                    <i class="fa fa-times"></i>

                </button>

                <strong></strong> Username and Password mismatched.

            </div>

            <?php }else { ?>
             <div class="alert alert-block alert-danger fade in" style="width: 88%;margin: 0 auto;">

                <button type="button" class="close close-sm" data-dismiss="alert">

                    <i class="fa fa-times"></i>

                </button>

                <strong></strong> Please Fill up the fields

            </div>

            

       <?php  } }

        ?> 

            <div class="login-input-div">
            	<input type="text"  value="" placeholder="Email" name="username" />
            </div>
            <div class="login-input-div">
            	<input type="password"  value="" placeholder="Password"  name="password" id="password"/>
            </div>
            <input type="submit" name="submit" value="Login" onClick="formhash(this.form, this.form.password);" />
            <!--<a href="#">Forgot your password ? </a>-->
        </div>
     </form>
    </div>
</body>
</html>
