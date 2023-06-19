<?php session_start();
include("includes/database.class.php");
include("includes/includefunctions.php");
date_default_timezone_set("Asia/Kolkata"); 

$uname=$_POST['Username'];
$pwd=$_POST['Password'];
$db1 	= 	new Database();
								$stmt=$db1->query('select * from registration where email=:uname and acount_status="1" and admin_approval="1" and pssword="'.$pwd.'"');	
								$db1->bind(':uname', $uname);
								$rows1 = $db1->resultset();
								$db1->dbclose();

if($db1->rowCount()>0)
{
    
    foreach($rows1 as $result)
{
    $_SESSION['userid']=$result['regid'];
$uid=$result['regid'];
$_SESSION['category_id']=$result['category_id'];
$_SESSION['exam']=$result['category_id'];
$ex=$result['category_id'];
$_SESSION['user_email']=$result['email'];
} 

$db12 	= 	new Database();
								$stmt=$db12->query('select * from website_login where exam=:uname order by id desc limit 1');	
								$db12->bind(':uname', $ex);
								//$db1->bind(':pwd', $pwd);
								$rows = $db12->resultset();
								 //$db1->rowCount();
								
if($db12->rowCount()>0)
{
foreach($rows as $result)
{
	//$login_id=$result['id'];
	$_SESSION['login']=1;
$_SESSION['uname']=$result['uname'];
$pass=$result['pwd'];
$uuname=$result['uname'];
$_SESSION['exam']=$result['exam'];
	}
	
$db12->dbclose();




}

$datetime = date('Y-m-d H:i:s');

$ip = $_SERVER['REMOTE_ADDR'];

$db1 	= 	new Database();


	$db1->insertdata('login_log',array("user_id"=>$uid,"datetime"=>$datetime,"ipaddress"=>$ip,'fromtime'=>$datetime,'totime'=>'0000-00-00 00:00:00'));
	$db1->dbclose();    
    
    	                        $db11= 	new Database();
								$stmt=$db11->query('select * from login_log where user_id=:pwd order by id desc limit 1');	
								//$db11->bind(':uname', $uuname);
								$db11->bind(':pwd', $uid);
								$rows11 = $db11->resultset();
								 //$db1->rowCount();
								 $db11->dbclose();  
    	foreach($rows11 as $result11)
            {
                $_SESSION['regid']=$result11['id'];
                
            }
 header('Location:'."videos1.php");






}else{
	$db1e1 	= 	new Database();
								$stmt=$db1e1->query('select * from registration where email=:uname and acount_status="0" and admin_approval="1" and pssword="'.$pwd.'"');	
								$db1e1->bind(':uname', $uname);
								$rows = $db1e1->resultset();

if($db1e1->rowCount()>0)
{
    $db1e1->dbclose();
    $_SESSION['login']=12;
    header('Location:'."login.php?notapproved=1");
 }else{
   
   
   
   $db1e 	= 	new Database();
								$stmt=$db1e->query('select * from registration where email=:uname and acount_status="1" and admin_approval="0" and pssword="'.$pwd.'"');	
								$db1e->bind(':uname', $uname);
								$rows = $db1e->resultset();

if($db1e->rowCount()>0)
{
   $db1e->dbclose();
   
   
   
   //echo 'done';
   
   
   
      $_SESSION['login']=21;
header('Location:'."login.php?notactivated=1");
   
   

}
  //  echo "not registered yet";
  
  
  $db1e 	= 	new Database();
								$stmt=$db1e->query('select * from registration where email=:uname and pssword="'.$pwd.'"');	
								$db1e->bind(':uname', $uname);
								$rows = $db1e->resultset();

if($db1e->rowCount()>0)
{
   $db1e->dbclose();

}else{
    $_SESSION['login']=2;
header('Location:'."login.php?noLogin=1"); 
}
}
}





die;
// Connect to the SQL DB

//$_SESSION['user']=$_POST['username'];
$uname=$_POST['Username'];
$pwd=$_POST['Password'];
// check and get user registration details
	$db1e 	= 	new Database();
								$stmt=$db1e->query('select * from registration where email=:uname and acount_status="0" and pssword="'.$pwd.'"');	
								$db1e->bind(':uname', $uname);
								$rows = $db1e->resultset();

if($db1e->rowCount()>0)
{
   $db1e->dbclose();
   $db1 	= 	new Database();
								$stmt=$db1->query('select * from registration where email=:uname and acount_status="1" and admin_approval="1" and pssword="'.$pwd.'"');	
								$db1->bind(':uname', $uname);
								$rows = $db1->resultset();

if($db1->rowCount()>0)
{
foreach($rows as $result)
{
	//$login_id=$result['id'];

//$_SESSION['uname']=$uname;
$_SESSION['userid']=$result['regid'];
$uid=$result['regid'];
$_SESSION['category_id']=$result['category_id'];
$_SESSION['exam']=$result['category_id'];
$ex=$result['category_id'];
$_SESSION['user_email']=$result['email'];

	}
	
$db1->dbclose();


$db1 	= 	new Database();
								$stmt=$db1->query('select * from website_login where exam=:uname order by id desc limit 1');	
								$db1->bind(':uname', $ex);
								//$db1->bind(':pwd', $pwd);
								$rows = $db1->resultset();
								 //$db1->rowCount();
								
if($db1->rowCount()>0)
{
foreach($rows as $result)
{
	//$login_id=$result['id'];
	$_SESSION['login']=1;
$_SESSION['uname']=$result['uname'];
$pass=$result['pwd'];
$uuname=$result['uname'];

	}
	
$db1->dbclose();




}

	$db11= 	new Database();
								$stmt=$db11->query('select * from website_login where uname=:uname and pwd=:pwd');	
								$db11->bind(':uname', $uuname);
								$db11->bind(':pwd', $pwd);
								$rows = $db11->resultset();
								 //$db1->rowCount();
								 $db11->dbclose();  
							
if($db11->rowCount()>0)
{
  //echo "in";  
$datetime = date('Y-m-d H:i:s');

$ip = $_SERVER['REMOTE_ADDR'];

$db1 	= 	new Database();


	$db1->insertdata('login_log',array("user_id"=>$uid,"datetime"=>$datetime,"ipaddress"=>$ip,'fromtime'=>$datetime,'totime'=>'0000-00-00 00:00:00'));
	$db1->dbclose();    
    
    	                        $db11= 	new Database();
								$stmt=$db11->query('select * from login_log where user_id=:pwd');	
								//$db11->bind(':uname', $uuname);
								$db11->bind(':pwd', $uid);
								$rows11 = $db11->resultset();
								 //$db1->rowCount();
								 $db11->dbclose();  
    	foreach($rows11 as $result11)
            {
                $_SESSION['regid']=$result11['id'];
            }
    
    
    //print_r($rows11); 
    
foreach($rows as $result)
{

	$login_id=$result['id'];
	$_SESSION['login']=1;
$_SESSION['uname']=$uname;
//$_SESSION['userid']=$result['id'];
$_SESSION['exam']=$result['exam'];
	}
	
//$db1->dbclose();
 header('Location:'."videos1.php");
//if($result['exam']==1){
   
/*}else{
     header('Location:'."videos2.php");
}*/

}

else

{
$_SESSION['login']=2;
header('Location:'."login.php?noLogin=1");
}















}else{
  //  echo "not registered yet";
    $_SESSION['reg']=2;
header('Location:'."index.php?notreg=1");
}
}else{
  //  echo "not registered yet";
    $_SESSION['act_reg']=2;
header('Location:'."index.php?notreg=1");
}

?>