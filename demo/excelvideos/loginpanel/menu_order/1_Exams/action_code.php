<?php include("../../db_connect_inner_code.php");
//	$category=strip_tags($_POST['txtCategory']);
	$exam=strip_tags($_POST['txtexam']);
//	$uname=strip_tags($_POST['txtusername']);
//	$pass=strip_tags($_POST['txtpassword']);
	
	date_default_timezone_set("Asia/Kolkata"); 
	
	$datetime = date('Y-m-d H:i:s');
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
    $db9->insertdata('exams',array("exam_name" => $exam));
    $db9->dbclose();
   /* $db9 	= 	new Database();
    $db9->insertdata('exams',array("exam_name" => $exam));
    $db9->dbclose();*/
    	$db1 	= 	new Database();
	$stmt=$db1->query('select * from exams where exam_name="'.$exam.'" order by exam desc limit 1 ');	
	$rows = $db1->resultset();
	foreach($rows as $result)
	{
	
		 $exam_id=$result['exam'];
		
		}
	$db1->dbclose();
   /*	$db91= new Database();
    $db91->insertdata('website_login',array("name"=>"admin","uname"=>$uname,"pwd"=>$pass,"onlinestatus"=>0,"enabledstatus"=>1,"usertype_id"=>1,"create_date"=>$datetime,"lastvisited_date"=>"000-00-00 00:00:00","lastvisited_ip"=>"000.00.00","exam"=>$exam_id,"exam_name"=>$exam));
    $db91->dbclose();*/
	}
	
	//---------------------------------Edit----------------------------------------------------------------------------
	else if($action=="Update"  && $flcsrf==1)
	{
	$category_id=strip_tags($_POST['exam_id']);	
	
	$db1 	= 	new Database();
		$db1->updatedata('exams',array("exam_name" => $exam),array("exam" => $category_id));
		$db1->dbclose();
	}
	//---------------------------------Delete------------------------------------------------------------------------------
	else if($action=="Delete")
	{
			$category_id=base64_decode(strip_tags($_GET['category_id']));
		
			
			$db1=new Database();
			$db1->deletedata('exams',array("exam" => $category_id));
			$db1->dbclose();
				$db1=new Database();
			$db1->deletedata('website_login',array("exam" => $category_id));
			$db1->dbclose();
			//die;
				
	}
$menu=base64_decode($menu);
  $file=base64_encode($menu."/index.php");  
header("Location:"."../../indexhome.php?menu=".$_GET['menu']."&file=$file&action=$action&dropmenu=5");
?>