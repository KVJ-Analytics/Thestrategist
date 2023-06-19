<?php 
include_once 'functions.php';
function forgot_template($email,$mysqli){
	$data=array();
	$data=getkey($email,$mysqli);
	$user_id=$data['user_id'];
	$key=$data['randam_key'];
	$sub="Password Reset Key";
	$from="info@oneinfosystems.in";
	$logo='https://www.google.com/images/srpr/logo11w.png';	
	$title="";
	$url="http://www.oneinfosystems.in/cms_work";
	$subjectPara1 = 'Forgot Password Url'; 
	$subjectPara2 = 'Please Click the below link for change Password'; 
	$href=$url."/user/index.php?value=".$user_id."&key=".$key;
	
	$message = '<!DOCTYPE HTML>'. 
	'<head>'. 
	'<meta http-equiv="content-type" content="text/html">'. 
	'<title>Email notification</title>'. 
	'</head>'. 
	'<body>'. 
	'<div id="header" style="width: 80%;height: 60px;margin: 0 auto;padding: 10px;color: #fff;text-align: center;background-color: #E0E0E0;font-family: Open Sans,Arial,sans-serif;">'. 
	   '<img height="50" width="220" style="border-width:0" src="'.$logo.'" alt="'.$title.'" title="'.$title.'">'. 
	'</div>'. 
	
	'<div id="outer" style="width: 80%;margin: 0 auto;margin-top: 10px;">'.  
	   '<div id="inner" style="width: 78%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px;">'. 
		   '<h1 style="font-size: 16px;font-weight: bold;">'.$subjectPara1.'</h1>'. 
		   '<p>'.$subjectPara2.'<br><a href="'.$href.'" style="color:#333333">Click here to reset your password</a></p>'. 
		   
	   '</div>'.   
	'</div>'. 
	
	'<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">'. 
	   'All rights reserved @ '.$title.' 2014'. 
	'</div>'. 
	'</body>'; 
	
	/*EMAIL TEMPLATE ENDS*/ 
	if(sent_mail($email,$sub,$from,$message)==true){
		return true;
	}else{
		return false;
	}	
}

function sent_mail($to,$subject,$from,$message){

	
	// mandatory headers for email message, change if you need something different in your setting. 
	$headers  = "From: " . $from . "\r\n"; 
	$headers .= "Reply-To: ". $from . "\r\n"; 
	$headers .= "CC: test@example.com\r\n"; 
	$headers .= "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
	
	// Remember, mail function may not work in PHP localhost setup but the email template can be used anywhere like (PHPmailer, swiftmailer, 			PHPMail classes etc.) 
	// Sending mail 
	if(mail($to, $subject, $message, $headers)) 
	{ 
		return true;
	} 
	else 
	{ 
		return false;
	} 
	
}
?>