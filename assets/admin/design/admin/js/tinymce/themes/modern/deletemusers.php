<?php 

include("inc/db.php");
$id=$_REQUEST['users'];
$count=sizeof($id);

for($i=0;$i<$count;$i++)
	{

		$stmts5 = $mysqli->prepare("delete from members where id='$id[$i]'");					
		$stmts5->execute();
	}

header("location:users_list.php");

?>