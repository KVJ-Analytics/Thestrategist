<?php
$aid=base64_decode($_GET["activation_code"]);
include("includes/database.class.php");


	 $category_id=strip_tags($aid);	
		$db1 	= 	new Database();
	$stmt=$db1->query('select * from registration where email="'.$category_id.'"');	
	$rows = $db1->resultset();
	$db1->dbclose();
	if($db1->rowCount()>0)
{
	$db11 	= 	new Database();
		$db11->updatedata('registration',array("acount_status" => "1"),array("email" => $category_id));
		$db11->dbclose();
//acount_status
?>
<html>
   <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
       <style>.text-xs-center{text-align:center;}</style>
   </head> <body><div class="jumbotron text-xs-center">
  <h1 class="display-3"style="color:green;">Welcome to thestrategist.co.in !</h1>
  <p class="lead"><strong>Your Account Activation Completed !</strong> Now Login for watching videos.</p>
  <hr>
  <p>
    Having trouble? <a href="">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="http://thestrategist.co.in/demo/excelvideos/login.php" role="button">Continue to Login</a>
  </p>
</div>
</body>
</html>
<?php

}else{
    //echo "Invalid Activationcode";
    ?>
    
    
    <html>
   <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
       <style>.text-xs-center{text-align:center;}</style>
   </head> <body><div class="jumbotron text-xs-center">
  
  <p class="lead"><strong>Invalid Activation Code</p>
  <hr>
  <p>
    Having trouble? <a href="">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="http://thestrategist.co.in/demo/excelvideos" role="button">Go to Registration</a>
  </p>
</div>
</body>
</html>
    <?php
}
?>