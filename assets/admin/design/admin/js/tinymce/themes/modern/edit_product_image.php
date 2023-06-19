<?php 

	include("inc/db.php");
	$product_id=$_REQUEST['product_id'];
	$thumbb=$_REQUEST['thumbb'];
//echo $product_id;
//echo $thumbb;exit();
	
	$stmts1 = $mysqli->prepare("update product_images set main=0 where product_id=?");	
	$stmts1->bind_param('i',$product_id);									
	$stmts1->execute();
	
	$stmts = $mysqli->prepare("update product_images set main=1 where id=?");	
	$stmts->bind_param('i',$thumbb);									
	$stmts->execute();

?>

    <script>

        window.location.href = 'thumb_image_listing.php?id=<?php echo $product_id; ?>';

    </script>