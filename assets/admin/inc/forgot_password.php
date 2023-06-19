<?php 
	include_once 'db.php';
	include_once 'functions.php';
	include_once 'email_template.php';
	if(isset($_POST['email'])){
		$email=$_POST['email'];
		if (forgot_password($email,$mysqli) == true) {
			if(forgot_template($email,$mysqli)==true){
				echo "email successfuly sent";
			}	
		}
	}
?>