<?php include("../../db_connect_inner_code.php");
	$Name=strip_tags($_POST['Name']);
	/*$datetime=datetimeformattotable($_POST['datetime']);*/
	$menu=strip_tags($_GET['menu']);
	if($_POST['hid_action']!="")
    $action=strip_tags($_POST['hid_action']);
	else
	$action=strip_tags($_GET['action']);
	
	/* ------csrf protection------------*/
 $post_admintoken=$_POST['admintoken'];
  $session_admintoken=$_SESSION['admintoken'];
  //make sure to validate the post input to prevent other types of attacks! Not shown here for brevity
  if($post_admintoken===$session_admintoken)
  {
	  unset($_SESSION['admintoken']);
 /* ------end of csrf protection------------*/
 $flcsrf=1;
  }



	//---------------------------------Delete------------------------------------------------------------------------------
	if($action=="Delete")
	{
			$regid=base64_decode(strip_tags($_GET['regid']));
		
			
			$db1=new Database();
			$db1->deletedata('registration',array("regid" => $regid));
			$db1->dbclose();
			
				
	}
$menu=base64_decode($menu);
  $file=base64_encode($menu."/index.php");  
header("Location:"."../../indexhome.php?menu=".$_GET['menu']."&file=$file&action=$action&dropmenu=5");
?>