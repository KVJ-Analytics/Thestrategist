	<?php session_start();
	$user_id=$_REQUEST['userid'];
	
	include("inc/db.php");
	include("inc/activity.php");
	
	$name=$_REQUEST['name'];
	$featured = 0;
	$description=stripslashes($_REQUEST['des1']);
	$description=htmlentities($description);
	if(isset($_POST['featured'])){
		$featured = $_POST['featured'];
	}
	$sort_order=$_REQUEST['sort_order'];
	
	$stmts = $mysqli->prepare("insert into product(name,description,featured,sort_order) values(?,?,?,?)");
	$stmts->bind_param('ssii',$name,$description,$featured,$sort_order);
	$stmts->execute();
	
	$selmax=$mysqli->prepare("select max(id) from product");
	$selmax->execute();
	$selmax->store_result();
	$selmax->bind_result($selid);
	$selmax->fetch();
	
	if(count($_FILES['file']['name'])>0)
	{						
		$j = 0; //Variable for indexing uploaded image 
		$target_path = "uploads/product/"; //Declaring Path for uploaded images
    	for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array
			$filename=$target_path.$_FILES['file']['name'][$i];
        	//$validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        	$ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
        	$file_extension = end($ext); //store extensions in the variable
			$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
        	$j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	  		if (($_FILES["file"]["size"][$i] < 100000000000)) //Approx. 100kb files can be uploaded.) 
			{
            	if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
               		// echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
					if($i==0){
						$main=1;
					}else{
						$main=0;
					}
					$thumb=$target_path;	
					$stmts1 = $mysqli->prepare("insert into product_images(image,product_id,main) values(?,?,?)");
					$stmts1->bind_param('sii',$thumb,$selid,$main);
					$stmts1->execute();
				} else {//if file was not moved.
                	echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            	}
        	}else {//if file size and file type was incorrect.
            	echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        	}
    	}		
	}
	
	add_activity('product created',$name,$user_id);
	header("location:add_product.php?flag=success");
?>