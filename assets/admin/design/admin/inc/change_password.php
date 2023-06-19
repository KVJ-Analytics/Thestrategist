<?php
include_once 'db.php';
//include_once 'psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['p'])) {
    // Sanitize and validate the data passed in
    echo $user=$_POST['ids']; 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
	$pass=$password;
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
 
    $prep_stmt = "SELECT username, password, salt FROM members WHERE id = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    // check existing email  
    if ($stmt) {
		$stmt->bind_param('s', $user);
		$stmt->execute();
		$stmt->store_result();
		
		$stmt->bind_result($username, $db_password, $salt);
		$stmt->fetch();

		// hash the password with the unique salt.
		if ($stmt->num_rows >= 1) {
		
			$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
			// Create salted password 
			$password = hash('sha512', $password . $random_salt);
			
			if ($update_stmt = $mysqli->prepare("UPDATE members set password = ?, salt = ? WHERE id = ? ")) {
			$update_stmt->bind_param('sss', $password, $random_salt, $user);
			
				if (! $update_stmt->execute()) {
					header('Location: ../error.php?err=Registration failure: INSERT');
				}else{
					header('Location: ../index.php');
				}
			}
		} else{
			echo "Old Password not matches";
		}
    	// TODO: 
    	// We'll also have to account for the situation where the user doesn't have
    	// rights to do registration, by checking what type of user is attempting to
    	// perform the operation.
	}
}else{
	echo"no isset value";
}
?>