<?php session_start();
include("includes/database.class.php");
include("includes/includefunctions.php");

// Connect to the SQL DB

$_SESSION['user']=$_POST['username'];
$uname=$_POST['Username'];
$pwd=$_POST['Password'];


								$db1 	= 	new Database();
								$stmt=$db1->query('select * from website_login where uname=:uname and pwd=:pwd');	
								$db1->bind(':uname', $uname);
								$db1->bind(':pwd', $pwd);
								$rows = $db1->resultset();
								 //$db1->rowCount();
if($db1->rowCount()>0)
{
foreach($rows as $result)
{
	$login_id=$result['id'];
	$_SESSION['login']=1;
$_SESSION['uname']=$uname;
$_SESSION['userid']=$result['id'];
	}
	
$db1->dbclose();
header('Location:'."videos1.php");

}

else

{
$_SESSION['login']=2;
header('Location:'."login.php?noLogin=1");
}
?>