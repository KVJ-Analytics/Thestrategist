<?php 

	session_start();
	require_once("Class/WorkClass.php");
	
	// $user_id=$_REQUEST['userid'];

	// include("resize-class.php");


	$name=$_REQUEST['name'];

	$sort=""; 

	$url="";


	$des1="";

	//$image=$_REQUEST['galry'];
	//$desc=$_REQUEST['des'];
	 $desc=stripslashes($_REQUEST['des']);

	$workObj=new WorkClass;
	$workDetails=$workObj->insertWork($name,$desc);
	//echo $workDetails;

	 
		 
	// $stmts7=$mysqli->prepare("insert into portfolio(name,url,description,sort_order,category)values(?,?,?,?,?)");

	// $stmts7->bind_param('sssis',$name,$url,$des1,$sort,$galry);

	// $stmts7->execute();

	// $stmts7->close();
	
	// $selmax=$mysqli->prepare("select category from portfolio order by id desc limit 0,1");
	// $selmax->execute();
	// $selmax->store_result();
	// $selmax->bind_result($selid);
	// $selmax->fetch();
	
	
	if($workDetails){
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
				$insertWorkImage =$workObj->insertWorkImage($workDetails,$thumb);

				if($insertWorkImage){

					$_SESSION['success']="Banner Added Successfully";
				}
				else{
					$_SESSION['eroor']="Some Error Occured";
				}


	            } else {//if file was not moved.
	                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
	            }
	        } else {//if file size and file type was incorrect.
	            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
	        }
			
			
	    }
					
		}
	}
	
	

    header("location:gallery_listing.php");
?>