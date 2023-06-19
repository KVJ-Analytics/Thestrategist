<?php 
	include("inc/db.php");
	$id=$_REQUEST['id'];
	
	$content=stripslashes($_REQUEST['des1']);
	$top=htmlentities($content);
	
   	$mission=stripslashes($_REQUEST['des2']);
	$middle=htmlentities($mission);
	
	$vision=stripslashes($_REQUEST['des3']);
	$bottom=htmlentities($vision);
	
	$stmts =$mysqli->prepare("select image from  about_us where id=?");	
	$stmts->bind_param('i', $id);									
	$stmts->execute();
	$stmts->store_result();
	$stmts->bind_result($thumb);
	$stmts->fetch();

	//$thumb="";
	if(!empty($_FILES["file"]["name"]))
	{
		$filename=$_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"],
		  "upload/banner/" . $_FILES["file"]["name"]);
		  $thumb="upload/banner/" . $_FILES["file"]["name"];
		
		//$update=$update.",banner='$thumb'";
		//unlink($path);
	}	

	$stmts1 = $mysqli->prepare("update about_us set top=?,middle=?,bottom=?,image=? where id=?");	
	$stmts1->bind_param('ssssi',$top,$middle,$bottom,$thumb,$id);									
	$stmts1->execute();
	
	//header("location:edit_pages.php?id=$id");
?>
	<script>
        window.location.href = 'edit_about_page.php?id=<?php echo $id ?>';
    </script>