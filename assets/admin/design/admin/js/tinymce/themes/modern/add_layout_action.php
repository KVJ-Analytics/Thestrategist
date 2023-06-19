<?php 
	include("inc/db.php");
		
	$title=$_REQUEST['name'];
	$lay=stripslashes($_POST['lay']);
	
	$name=strtolower($title);
	$name=str_replace(" ","_",$name);
	$pagename=$name.'.php';
	$href="layout/".$pagename;
	
	if(file_exists("layout/".$pagename))
	{
		header("Location:add_layout.php?page=1");
		exit;
	}
	
	$myfile = fopen("layout/".$pagename, "w") or die("Unable to open file!");

	fwrite($myfile, $lay);
	fclose($myfile);
		
	$stmt = $mysqli->prepare("insert into layout(layout_name,href,content) values(?,?,?)");
	$stmt->bind_param('sss',$title,$href,$lay);
	$stmt->execute();
	
	header("location:add_layout.php");
?>