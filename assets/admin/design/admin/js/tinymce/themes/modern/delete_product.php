<?php 

		include("inc/db.php");
		$id=$_REQUEST['id'];
		$userid=$_REQUEST['userid'];
		include("inc/activity.php");
		
		$stmts_imgs2 =$mysqli->prepare("select image from product_images where product_id=?");	
		$stmts_imgs2->bind_param('i', $id);									
		$stmts_imgs2->execute();
		$stmts_imgs2->store_result();
		$stmts_imgs2->bind_result($bigfile1);
		while ($stmts_imgs2->fetch())
		{
			if($bigfile1!="")
			{
				unlink($bigfile1);
			}
		}
		
		
		$stmts6 = $mysqli->prepare("delete from product_images where product_id='$id'");					
		$stmts6->execute();

	
		$stmts5 = $mysqli->prepare("delete from product where id='$id'");					
		$stmts5->execute();
		
		add_activity('Product Deleted',$title,$userid);
	
header("location:product_listing.php");

?>