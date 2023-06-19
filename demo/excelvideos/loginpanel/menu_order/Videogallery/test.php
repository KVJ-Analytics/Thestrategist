<?php
 include("../../db_connect_inner_code.php");
//$vexid=$_POST['vid'];
date_default_timezone_set("Asia/Kolkata"); 
$vid=$_POST['vid'];
$datetime = date('Y-m-d H:i:s');

$y='<option value="select">...Select Category...</option>';
$db1=new Database();
	$stmt=$db1->query('select * from video_category where exam='.$vid);	
	$rows = $db1->resultset();
	foreach($rows as $result)
	{
	
	$viewid=$result['category_id'];

			$y.='<option value="'.$viewid.'" >'.$result['category'].'</option>';
	}
	$db1->dbclose(); 
echo $y;
?>



