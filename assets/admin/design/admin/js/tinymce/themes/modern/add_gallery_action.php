<?php 

	 include("inc/db.php");
	 include("inc/activity.php");
	 $user_id=$_REQUEST['userid'];
	$serv_id=$_POST['ser_id'];
	 include("resize-class.php");

	
	
	$selmax=$mysqli->prepare("select max(id) from gallery");
	$selmax->execute();
	$selmax->store_result();
	$selmax->bind_result($selid);
	$selmax->fetch();
	
	//echo $selid;exit();

	if(count($_FILES['file']['name'])>0)
		{	
							
		$j = 0; //Variable for indexing uploaded image 
    
	$target_path = "uploads/gallery/"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array
	$filename=$target_path.$_FILES['file']['name'][$i];
        //$validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
        
		$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	  if (($_FILES["file"]["size"][$i] < 100000000000) //Approx. 100kb files can be uploaded.
               ) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
               // echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
			$thumb=$target_path;	
			$stmts1 = $mysqli->prepare("insert into gallery(image1,cat) values(?,?)");
			$stmts1->bind_param('si',$thumb,$serv_id);
			$stmts1->execute();
				
            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
		
		
    }
				
	}
	
	add_activity('Gallery created',$name,$user_id);

    header("location:category_listing.php");
?>