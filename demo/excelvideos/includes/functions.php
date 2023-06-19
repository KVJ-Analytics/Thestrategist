<?php
	function createRandom($no=6)
   	{
		$chars = "0123456789ABCDEFGHJKLMNPQRSTUVWXYZ";
	  	srand((double)microtime()*1000000);
	  	$i = 1;
	  	$pass = '' ;
	  	while ($i <= $no)
		{
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}			
	  	return $pass;
   	}
	function IsInjected($str)
	{
	  $injections = array('(\n+)',
				  '(\r+)',
				  '(\t+)',
				  '(%0A+)',
				  '(%0D+)',
				  '(%08+)',
				  '(%09+)'
				  );
	  $inject = join('|', $injections);
	  $inject = "/$inject/i";
	  if(preg_match($inject,$str))
		{
		return true;
	  }
	  else
		{
		return false;
	  }
	}
	function cleanQuery($string)
	{
	  if(get_magic_quotes_gpc())  // prevents duplicate backslashes
	  {
		$string = stripslashes($string);
	  }
	  if (phpversion() >= '4.3.0')
	  {
		$string = mysql_real_escape_string($string);
	  }
	  else
	  {
		$string = mysql_escape_string($string);
	  }
	  return $string;
	}
	function domain_exists($email, $record = 'MX')
	{
   		list($user, $domain) = explode('@', $email);
   		return checkdnsrr($domain, $record);
	}
	function rand_string($length) {
		$str="";
		$chars = "subinsblogabcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$size = strlen($chars);
		for($i = 0;$i < $length;$i++) {
			$str .= $chars[rand(0,$size-1)];
		}
		return $str;
	}
?>