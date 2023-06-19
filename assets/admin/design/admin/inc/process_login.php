<?php

include_once 'db.php';

include_once 'functions.php';

 

sec_session_start(); // Our custom secure way of starting a PHP session.

 

if (isset($_POST['username'], $_POST['p'])) {

	

	if(trim($_POST['username'])==""){

		header('Location: ../index.php?error=blank');

		exit();

	}

    $email = $_POST['username'];

    $password = $_POST['p']; // The hashed password.

 	//echo $email;

	//echo $password;

	//exit();

    if (login($email, $password, $mysqli) == true) {

        
		$user_status_stmts = $mysqli->prepare("select type from members where email=?");
			$user_status_stmts->bind_param('s', $email);
			$user_status_stmts->execute();
			$user_status_stmts->store_result();
			$user_status_stmts->bind_result($user_type);
			$user_status_stmts->fetch(); 
		
		
		// Login success 
if($user_type=='admin')
{
        header('Location: ../dashboard.php');
}
else
{
	header('Location: ../page_listing.php');
}

    } else {

        // Login failed 

        header('Location: ../index.php?error=1');

    }

} else {

    // The correct POST variables were not sent to this page. 

    echo 'Invalid Request';

}

?>