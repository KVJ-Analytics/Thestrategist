<?php 

	 include("inc/db.php");
	 include("inc/activity.php");
	 $user_id=$_REQUEST['userid'];
	 
	 $name=$_REQUEST['name'];
	
	 $des1=$_REQUEST['des1'];
	 $des1=htmlentities($des1);
	 
	 $sort=$_REQUEST['sort'];
	
	
		
	 include("resize-class.php");

	 $stmts7=$mysqli->prepare("insert into projects(name,description,sort_order)values(?,?,?)");

	 $stmts7->bind_param('ssi',$name,$des1,$sort);

	 $stmts7->execute();

	 $stmts7->close();
	
	 $selmax=$mysqli->prepare("select max(id) from projects");
	 $selmax->execute();
	 $selmax->store_result();
	 $selmax->bind_result($selid);
	 $selmax->fetch();
	


	if(count($_FILES['file']['name'])>0)
		{	
							
		$j = 0; //Variable for indexing uploaded image 
    
	$target_path = "uploads/projects/"; //Declaring Path for uploaded images
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
			$stmts1 = $mysqli->prepare("insert into project_images(image1,pid) values(?,?)");
			$stmts1->bind_param('si',$thumb,$selid);
			$stmts1->execute();
				
            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
		
		
    }
				
	}
	
	add_activity('Projects created',$name,$user_id);

    header("location:projects_listing.php");
?>