<?php $website_email="info@butterfliesumarry.in";
$site_name="http://butterfliesumarry.in";
//---------------------date functions----------------------------------
function dateformat($datestr)
{
$day=substr($datestr,8,2);
$month=substr($datestr,5,2);
$year=substr($datestr,0,4);
$datestr=$day."/".$month."/".$year;
return($datestr);
}
function dateformat_hyphen($datestr)
{
$day=substr($datestr,8,2);
$month=substr($datestr,5,2);
$year=substr($datestr,0,4);
$datestr=$day."-".$month."-".$year;
return($datestr);
}
function datetimeformat($datestr,$sep)
{
$day=substr($datestr,8,2);
$month=substr($datestr,5,2);
$year=substr($datestr,0,4);
$datestr=$day.$sep."-".$month.$sep."-".$year." ".substr($datestr,11,8);;
return($datestr);
}
//--------------------Encode---------------------
function encode_array($args)
{
	$strlen=strlen($args);
	$Lastletter=substr($args,$strlen-1,1);
	if($strlen>1)
	{
	$string=$Lastletter.substr($args,0,$strlen-1);
	$Lastletter=substr($string,$strlen-1,1);
	$string=$Lastletter.substr($string,0,$strlen-1);
	if($strlen<9)
	$strlen="0".$strlen;
	$string=$string.$strlen;
	}
	
  return $string;
}

//--------------------decode---------------------
function decode_array($args)
{
	$strlen=strlen($args)-2;
	$args=substr($args,0,$strlen);
	$Firstletter2=substr($args,0,2);
	$string=substr($args,2,$strlen).substr($args,0,2);
	
  return $string;
}


function dateformattoTable($sdate)
{
$sdate=substr($sdate,6,4)."-".substr($sdate,3,2)."-".substr($sdate,0,2);
return $sdate;
}
function monthDisplay($month)
{
	switch($month)
	{
		case '01': $m="January";
					break;
		case '02': $m="February";
					break;
		case '03': $m="March";
					break;
		case '04': $m="April";
					break;
					
		case '05': $m="May";
					break;
		case '06': $m="June";
					break;
		case '07': $m="July";
					break;
		case '08': $m="August";
					break;
	  	case '09': $m="September";
					break;
		case '10': $m="October";
					break;
		case '11': $m="November";
					break;
		case '12': $m="December";
					break;
										
					
								
	}
	return $m;
}

function imageCompression($imgfile="",$thumbsize=0,$savePath=NULL) { 

 
	list($width,$height)=getimagesize($imgfile); 
	 $imgratio=$width/$height;  
	 
	 
	    if($imgratio>1) { 
        $newwidth=$thumbsize; 
        $newheight=$thumbsize/$imgratio; 
    } else { 
        $newheight=$thumbsize;        
        $newwidth=$thumbsize*$imgratio; 
    } 
    
    $thumb=imagecreatetruecolor($newwidth,$newheight); // Making a new true color image 
    $source=imagecreatefromjpeg($imgfile); // Now it will create a new image from the source 
    imagecopyresampled($thumb,$source,0,0,0,0,$newwidth,$newheight,$width,$height);  // Copy and resize the image 
    imagejpeg($thumb,$savePath,60); 
	 imagedestroy($thumb); 
	 }
	 
	 
	 function imageCompression_hw($imgfile,$thumbsizewidth,$thumbsizeheight,$savePath=NULL) { 

 
	list($width,$height)=getimagesize($imgfile); 
	$newwidth=$thumbsizewidth;
	$newheight=$thumbsizeheight;
    
    $thumb=imagecreatetruecolor($newwidth,$newheight); // Making a new true color image 
    $source=imagecreatefromjpeg($imgfile); // Now it will create a new image from the source 
    imagecopyresampled($thumb,$source,0,0,0,0,$newwidth,$newheight,$width,$height);  // Copy and resize the image 
    imagejpeg($thumb,$savePath,60); 
	 imagedestroy($thumb); 
	 }
	 
	 
function isValidURL($url) {
return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}

function encrypt_url($string) {
  $key = "OMAN_979805"; //key to encrypt and decrypts.
  $result = '';
  $test = "";
   for($i=0; $i<strlen($string); $i++) {
     $char = substr($string, $i, 1);
     $keychar = substr($key, ($i % strlen($key))-1, 1);
     $char = chr(ord($char)+ord($keychar));

     $test[$char]= ord($char)+ord($keychar);
     $result.=$char;
   }

   return urlencode(base64_encode($result));
}

function decrypt_url($string) {
    $key = "OMAN_979805"; //key to encrypt and decrypts.
    $result = '';
    $string = base64_decode(urldecode($string));
   for($i=0; $i<strlen($string); $i++) {
     $char = substr($string, $i, 1);
     $keychar = substr($key, ($i % strlen($key))-1, 1);
     $char = chr(ord($char)-ord($keychar));
     $result.=$char;
   }
   return $result;
}

function sanitise_store($data)
{
$data = trim($data);
$data = addslashes($data);
$data = htmlentities($data);
return $data;
}
function sanitise_retrieve($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
function validfile($file)
{
	$imageFileType = pathinfo($file,PATHINFO_EXTENSION);
	if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" ) 
$fl=1;
else
$fl=0;
return $fl;
}
function validfileupload($file)
{
	$imageFileType = pathinfo($file,PATHINFO_EXTENSION);
if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" || $imageFileType=="pdf") $fl=1;
else
$fl=0;
return $fl;
}

//------------------Year Difference------------

function yeardifference($date1,$date2)
{
$diff = abs(strtotime($date2) - strtotime($date1));
$years = $diff / (365*60*60*24);
$years=(int)$years;
return $years;
}

//------------------Year Difference------------
function datedifference($date1,$date2)
{
$sign=strtotime($date2) - strtotime($date1);
$diff = abs(strtotime($date2) - strtotime($date1));
$day = floor($diff / (30*60*60));
if($sign<0)
$day=-1*$day;
return $day;
}
function monthdifference($date1,$date2)
{
$diff = abs(strtotime($date2) - strtotime($date1));
$month = floor($diff / (30*60*60*24));
return $month;
}

function get_time_difference( $start, $end )
{
  $start_y=substr($start,0,4);
  $end_y=substr($end,0,4);
   $end_y-$start_y;
  if($end_y-$start_y>0)
  return(1);
  else
  {
  	$start_m=substr($start,5,2);
 	$end_m=substr($end,5,2);
	 if($end_m-$start_m>0)
 	 return(1);
	 else
	 {
			$start_d=substr($start,8,2);
			$end_d=substr($end,8,2);
			if($end_d-$start_d>0)
			 return(1);
			 else
			 {
			 
			$start_h=substr($start,11,2);
			$end_h=substr($end,11,2);
			if($end_h-$start_h>0)
			 return(1);
			 else
					 {
					 $start_i=substr($start,14,2);
					$end_i=substr($end,14,2);
					if($end_i-$start_i>30)
					return 1;
					}
			 }
	 }
  }
   
}

?>