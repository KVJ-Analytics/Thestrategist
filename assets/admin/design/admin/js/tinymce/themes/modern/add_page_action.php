<?php 
	include("inc/db.php");
	include("inc/activity.php");
	$userid=$_REQUEST['userid'];
	
	$name=$_REQUEST['name'];
	
	$pgname=$name;
	$name=strtolower($name);
	$name=str_replace(",","",$name);
	$name=str_replace("-","",$name);
	$name=str_replace("|","",$name);
	$name=str_replace(" ","-",$name);
	
	$title="";
	$head="";
	$key="";
	$desc="";
	$seo_key="";
	$author="";
	
	$content=stripslashes($_REQUEST['des1']);
	$content=htmlentities($content);
	
	
	$sort_order=$_REQUEST['sort_order'];
	$url_status="";
	$status=1;
	$thumb="";
	
	$stmt = $mysqli->prepare("select MAX(page_id) from  page_details");
	//$stmt->bind_param('s', $id);
	$stmt->execute();
	$stmt->store_result();
	// get variables from result.
	$stmt->bind_result($page_id);
	$stmt->fetch();
    $stmt->close();   
	$page_id=$page_id+1;
	$pagename=$name.'.php';
	if(file_exists("../".$pagename))
	{
		header("Location:add_pages.php?page=1");
		exit;
	}
	$href=$pagename;
	$lay=$_REQUEST['layout'];
	
	
	$stmts = $mysqli->prepare("insert into page_details(page_id,page_name,page_title,page_head,meta_keyword,meta_description,seo_key,author,contents,banner,href,layout,sort_order,url_status,status) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmts->bind_param('isssssssssssiii',$page_id,$pgname,$title, $head,$key,$desc,$seo_key,$author,$content,$thumb,$href,$lay,$sort_order,$url_status,$status);
	$stmts->execute();
	$stmts->close();   
	
	
	$stmts1 = $mysqli->prepare("select href from layout where lay_id=?");
	$stmts1->bind_param('s', $lay);
	$stmts1->execute();
	$stmts1->store_result();
	// get variables from result.
	$stmts1->bind_result($layouthref);
	$stmts1->fetch();
    $stmts1->close();   
	//echo $layouthref;exit();
	$myfile = fopen("../".$pagename, "w") or die("Unable to open file!");
	include($layouthref);
	fwrite($myfile, $txt);
	fclose($myfile);
	add_activity('Page Added',$pgname,$userid);
?>
	<script>

        window.location.href = 'add_pages.php';

    </script>