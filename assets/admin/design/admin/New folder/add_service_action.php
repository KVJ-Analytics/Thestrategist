<?php 
	session_start();
	require_once("Class/AdminClass.php");

	$title=$_REQUEST['name'];
	
	$caption=stripslashes($_REQUEST['des1']);

	//$caption=htmlentities($caption);

	$rand=rand();

	$sort=$_POST['sort_order'];
	$status=0;

	$filename=$_FILES["file1"]["name"];

    move_uploaded_file($_FILES["file1"]["tmp_name"],

	"uploads/services/" .$rand. $_FILES["file1"]["name"]);

	$icon="uploads/services/".$rand. $_FILES["file1"]["name"];

	$adminObj=new AdminClass;
	

	// if($service)
	// {

	
		if(!empty($_FILES["file"]["name"]))
		{	
			

		$filename=$_FILES["file"]["name"];

		move_uploaded_file($_FILES["file"]["tmp_name"],

		  "uploads/services/" .$rand. $_FILES["file"]["name"]);

		  echo $bigfile="uploads/services/" .$rand. $_FILES["file"]["name"];

		  //$bigfile="uploads/banner/" .$rand. $_FILES["file"]["name"];

		 $service=$adminObj->insertServices($title,$icon,$bigfile,$caption,$sort,$status);

		if($service){

			$_SESSION['success']="Service Added Successfully";
		}
		else{
			$_SESSION['eroor']="Some Error Occured";
		
		
		}
			// $j = 0; //Variable for indexing uploaded image 

			// $target_path = "uploads/services/"; //Declaring Path for uploaded images
			// for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array
			// 	$filename=$target_path.$_FILES['file']['name'][$i];
			// 	//$validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
			// 	$ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
			// 	$file_extension = end($ext); //store extensions in the variable

			// 	$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
			// 	$j = $j + 1;//increment the number of uploaded images according to the files in array       

			// 	if (($_FILES["file"]["size"][$i] < 100000000000) //Approx. 100kb files can be uploaded.
			// 	) {
			// 		if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
			// 		// echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
			// 		$thumb=$target_path;	
			// 		$serviceImage=$adminObj->insertServicesImage($thumb,$service);

			// 		if($serviceImage){

			// 			$_SESSION['success']="Service Added Successfully";
			// 		}
			// 		else{
			// 			$_SESSION['eroor']="Some Error Occured";
			// 		}


			// 		} else {//if file was not moved.
			// 		echo $j. ').<span id="error">please try again!.</span><br/><br/>';
			// 		}
			// 	} else {//if file size and file type was incorrect.
			// 	echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
			// 	}


			// }

		// }
	}

header("location:add_services.php");



?>