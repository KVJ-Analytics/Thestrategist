<?php include("../../db_connect_inner_code.php");
	$p=filter_var($_GET['pass'], FILTER_SANITIZE_STRING);
	$oldpass=filter_var($_POST['txtOldPassword'], FILTER_SANITIZE_STRING);
	 $newpass=filter_var($_POST['txtnewPassword'], FILTER_SANITIZE_STRING);
	$pass=filter_var($_POST['txtnewPassword'], FILTER_SANITIZE_STRING);
	$fl=1;
	$flcsrf=0;
 $post_admintoken=$_POST['admintoken'];
  $session_admintoken=$_SESSION['admintoken'];
  //make sure to validate the post input to prevent other types of attacks! Not shown here for brevity
  if($post_admintoken===$session_admintoken)
  {
	  unset($_SESSION['admintoken']);
 /* ------end of csrf protection------------*/

	
	
	$menu=$_GET['menu'];
	 $action=$_POST['hid_action'];
	 $uname=$_SESSION['uname'];
	$oldpass=$oldpass;
	 							$db1 	= 	new Database();
								$stmt=$db1->query('select * from login where uname=:uname and pwd=:oldp');	
								$db1->bind(':oldp', $oldpass); 
								$db1->bind(':uname', $uname); 
								$rows = $db1->resultset();
				
	if($db1->rowCount()>0)
	{
		$newpass=$newpass;
	$db2=new Database();
	$db2->updatedata('login',array("pwd" => $newpass),array("uname" => $uname));
	$db2->dbclose();
	$fl=2;
	}
	
  }
$menu=base64_decode($menu);
$file=base64_encode($menu."/index.php");
   $fl=base64_encode($fl);
header("Location:"."../../indexhome.php?menu=".$_GET['menu']."&file=$file&action=$action&fl=$fl");
?>
