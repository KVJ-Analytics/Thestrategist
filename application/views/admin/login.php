
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login | </title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url() ?>assets/admin/css/base_color.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/admin/css/login.css" rel="stylesheet" type="text/css">
    <script type="text/JavaScript" src="<?php echo base_url() ?>assets/admin/js/sha512.js"></script> 

    <script type="text/JavaScript" src="<?php echo base_url() ?>assets/admin/js/forms.js"></script> 
</head>
<body>
	<div class="login-wrapper">
     <form class="form-signin" action="<?php echo base_url() ?>index.php/AdminController/loginProcess" method="post" name="login_form">
    	<div class="login-box">
        	<div class="login-logo">
            	<img src="<?php echo base_url(); ?>assets/images/logo/llogo.png" />
            </div>
                            <?php $success = $this->session->userdata('error_login');
                                if(isset($success)){
                            ?>
                            <div class="alert alert-success center text-center">
                                <strong style="color:#875711;"><?php  
                                    echo $this->session->userdata('error_login');
                                    $this->session->unset_userdata('error_login');?>
                                </strong> 
                            </div><br>
                            <?php 
                            }
                            ?>

            <div class="login-input-div">
            	<input type="text"  value="" placeholder="User Name" name="username" />
            </div>
            <div class="login-input-div">
            	<input type="password"  value="" placeholder="Password"  name="password" id="password"/>
            </div>
            <input type="submit" name="submit" value="" />
            <a href="#">Forgot your password ? </a>
        </div>
     </form>
    </div>
</body>
</html>
