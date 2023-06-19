<?php include("../../db_connect_inner_code.php");
	 $caption=strip_tags($_POST['txtcaption']);
	$category_id=strip_tags($_POST['category_id']);
	$video=$_POST['video'];
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
	
	$db1=new Database();
			$db1->query('select * from  video_gallery order by video_id desc limit 1');
			$rows = $db1->resultset();
			foreach($rows as $result)
			{
	
		$video_id=$result['video_id']+1;
	}
	$db1->dbclose();	
	
	$whitelist = array(".gif", ".jpg", ".jpeg", ".png",".mp4");
	foreach ($whitelist as $item) {
	if(preg_match("/$item\$/i", $_FILES['video']['name'])) 
	{
	$video=$_FILES['video']['name'];
	if($_FILES['video']['error']==0)
	{
		$ext= strtolower(substr(strrchr($video,"."),1));
		$elen=strlen($ext);
		$flen=strlen($video);
		$slen=$flen-$elen-1;
		$sname=substr($video,0,$slen);
		 $video=$sname.$video_id.".".$ext;
		
		move_uploaded_file($_FILES["video"]["tmp_name"],"../../../assets/video/".$video);
		/*imageCompression_hw("../../../../../assets/gallery/".$photo,300,200,"../../../../../assets/gallerythumb/".$photo);
		imageCompression("../../../../../assets/gallery/".$photo,800,"../../../../../assets/gallery/".$photo);*/
	}	
	}
	}
	
		$db9 	= 	new Database();
    $db9->insertdata('video_gallery',array("category_id"=>$category_id,"caption"=>$caption,"video"=>$video));
	}
	
	//---------------------------------Edit----------------------------------------------------------------------------
	else if($action=="Update"  && $flcsrf==1)
	{
	$video_id=strip_tags($_POST['video_id']);	
	$video=$_FILES['video']['name'];
	 $db1 	= 	new Database();
			$db1->query('select video from video_gallery where video_id=:video_id');
			$db1->bind(':video_id',$video_id);
			$rows = $db1->resultset();
			foreach($rows as $result)
			{
			
				$video1=$result['video'];
				
				
			}
	$db1->dbclose();
	if(($_FILES['video']['error']==0) && ($_FILES['video']['name']!=''))
	{
	       
			if($video!="" && file_exists("../../../assets/video/".$video1))
			{
			unlink("../../../assets/video/".$video1);
			}
			
	$whitelist = array(".gif", ".jpg", ".jpeg", ".png",".mp4");
	foreach ($whitelist as $item) {
	if(preg_match("/$item\$/i", $_FILES['video']['name'])) 
	{
    $video=$_FILES['video']['name'];
	if($_FILES['video']['error']==0)
	{
		$ext= strtolower(substr(strrchr($video,"."),1));
		$elen=strlen($ext);
		$flen=strlen($video);
		$slen=$flen-$elen-1;
		$sname=substr($video,0,$slen);
		 $video=$sname.$video_id.".".$ext;
		
		move_uploaded_file($_FILES["video"]["tmp_name"],"../../../assets/video/".$video);
		$db1 	= 	new Database();
		$db1->updatedata('video_gallery',array("video"=>$video),array("video_id"=>$video_id));
		$db1->dbclose();
	}	
	}
	}
	}	

	
	
	$db1 	= 	new Database();
$db1->updatedata('video_gallery',array("category_id"=>$category_id,"caption"=>$caption),array("video_id"=>$video_id));
		$db1->dbclose();
	}
	//---------------------------------Delete------------------------------------------------------------------------------
	else if($action=="Delete")
	{
			$video_id=base64_decode(strip_tags($_GET['video_id']));
			$db1=new Database();
			$db1->query('select video from video_gallery where video_id=:video_id');
			$db1->bind(':video_id', $video_id);
			$rows = $db1->resultset();
			foreach($rows as $result)
			{
			
				$video=$result['video'];
				
			}
			$db1->dbclose();
			if($video!="" && file_exists("../../../assets/video/".$video))
			{
			unlink("../../../assets/video/".$video);
			
			}
			
			$db1=new Database();
			$db1->deletedata('video_gallery',array("video_id"=>$video_id));
			$db1->dbclose();
			
				
	}
$menu=base64_decode($menu);
  $file=base64_encode($menu."/index.php");  
header("Location:"."../../indexhome.php?menu=".$_GET['menu']."&file=$file&action=$action&dropmenu=5");
?>