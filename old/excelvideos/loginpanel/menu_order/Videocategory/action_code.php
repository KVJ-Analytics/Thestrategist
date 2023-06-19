<?php include("../../db_connect_inner_code.php");
	$category=strip_tags($_POST['txtCategory']);
	
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
	//----------------------------------Add----------------------------------------------------------------------------
	if($action=="Add"  && $flcsrf==1)
	{
	
	
	
		$db9 	= 	new Database();
    $db9->insertdata('video_category',array("category" => $category));
	}
	
	//---------------------------------Edit----------------------------------------------------------------------------
	else if($action=="Update"  && $flcsrf==1)
	{
	$category_id=strip_tags($_POST['category_id']);	
	
	$db1 	= 	new Database();
		$db1->updatedata('video_category',array("category" => $category),array("category_id" => $category_id));
		$db1->dbclose();
	}
	//---------------------------------Delete------------------------------------------------------------------------------
	else if($action=="Delete")
	{
			$category_id=base64_decode(strip_tags($_GET['category_id']));
		
			
			$db1=new Database();
			$db1->deletedata('video_category',array("category_id" => $category_id));
			$db1->dbclose();
			
				
	}
$menu=base64_decode($menu);
  $file=base64_encode($menu."/index.php");  
header("Location:"."../../indexhome.php?menu=".$_GET['menu']."&file=$file&action=$action&dropmenu=5");
?>