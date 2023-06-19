<?php
session_start();
include("../includes/database.class.php");
include("../includes/includefunctions.php");

// Connect to the SQL DB

$_SESSION['user']=$_POST['txtuname'];
$uname=$_POST['txtuname'];
$pwd=$_POST['txtpwd'];

/* ------csrf protection------------*/
 $post_admintoken=$_POST['admintoken'];
  $session_admintoken=$_SESSION['admintoken'];
  //make sure to validate the post input to prevent other types of attacks! Not shown here for brevity
  if($post_admintoken===$session_admintoken)
  {
	  unset($_SESSION['admintoken']);
 /* ------end of csrf protection------------*/

 
$db1 	= 	new Database();
								$stmt=$db1->query('select * from login where uname=:uname and pwd=:pwd');	
								$db1->bind(':uname', $uname);
								$db1->bind(':pwd', $pwd);
								$rows = $db1->resultset();
if($db1->rowCount()>0)
{
foreach($rows as $result)
{
	$login_id=$result['id'];
	$_SESSION['login']=1;
$_SESSION['uname']=$uname;
$_SESSION['userid']=$result['id'];
$_SESSION['category']=$result['category'];
$_SESSION['admlogin']=1;
	}
	
$db1->dbclose();
header('Location:'."indexhome.php");


}
else

{
$_SESSION['admlogin']=0;
header('Location:'."index.php?noLogin=1");
}
}
else
{
$_SESSION['admlogin']=0;
header('Location:'."index.php?noLogin=1");
}
?>