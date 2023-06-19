<?php 

	include("inc/db.php");
	
	$title=$_REQUEST['title'];
	$description=$_REQUEST['description'];
	$status=0;
	$crdate=$_REQUEST['crdate'];
	$crdate=$crdat[2].'-'.$crdat[1].'-'.$crdat[0];
	$startdate=explode ('/',$_REQUEST['startdate']);
	$startdate=$startdate[2].'-'.$startdate[0].'-'.$startdate[1];
			
	$enddate=explode ('/',$_REQUEST['end_date']);
	$enddate=$enddate[2].'-'.$enddate[0].'-'.$enddate[1];
	$stmts = $mysqli->prepare("insert into events(title,description,startdate,enddate,createdate,status) values(?,?,?,?,?,?)");
	$stmts->bind_param('sssssi',$title,$description,$startdate,$enddate,$crdate,$status);
	$stmts->execute();

	header("Location:dashboard.php");
?>