<?php
include 'inc/db.php';
	$q=$_GET['q'];
	//$my_data=mysql_real_escape_string($q);
	//echo $my_data;exit();
	
	$stmts = $mysqli->prepare("select href from  page_details WHERE href LIKE '%$q%'");
										/*$stmt->bind_param('s', $id);*/
	$stmts->execute();
	$stmts->store_result();
	$stmts->bind_result($href);
	
	
	//$sql="SELECT href FROM page_details WHERE href LIKE '$my_data%'";
//	$result = mysql_query($sql);
	
	if ($stmts->num_rows!=0)
	{
		while($stmts->fetch())
		{
			echo $href."\n";
		}
	}
?>