<?php 
include("inc/db.php");
$id=$_REQUEST['page'];
$dp=$_REQUEST['dp'];
 $count=sizeof($id);
 if($dp!=1)
 {
	for($i=0;$i<$count;$i++)
	{
		$stmts = $mysqli->prepare("select href from  page_details where page_id =?");
		$stmts->bind_param('i', $id[$i]);
		$stmts->execute();
		$stmts->store_result();
		$stmts->bind_result($href);
		$stmts->fetch();
		
		$pagename=$href;
		unlink("../".$pagename);	
		
		$stmt = $mysqli->prepare("delete from page_details where page_id=?");
		$stmt->bind_param('i', $id[$i]);
		$stmt->execute();
	}
}
else
{
	for($i=0;$i<$count;$i++)
		{
			$stmts = $mysqli->prepare("select status from  page_details where page_id =?");
			$stmts->bind_param('i', $id[$i]);
			$stmts->execute();
			$stmts->store_result();
			$stmts->bind_result($status);
			$stmts->fetch();
			
			if($status==0)
			{		
				$stmt = $mysqli->prepare("update  page_details set status=1 where page_id=?");
				$stmt->bind_param('i',$id[$i]);
				$stmt->execute();
			}
			else
			{
				$stmt = $mysqli->prepare("update  page_details set status=0 where page_id=?");
				$stmt->bind_param('i', $id[$i]);
				$stmt->execute();
			}
		}
}
header("location:page_listing.php");
?>