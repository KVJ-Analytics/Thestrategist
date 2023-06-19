<?php 
require_once('DatabaseClass.php');

class GalleryClass extends DatabaseClass{

		//Gallery Details()

	function insertGallery($service,$name,$thumb,$content,$sort){

		echo $query ="INSERT INTO `ce_gallery`( `g_s_id`,`g_title`, `g_description`, `g_image`, `g_sorted_order`) VALUES('$service','$name','$content','$thumb','$sort')";

		$queryCon=mysqli_query($this->con,$query);

		//$stmts->execute();
		return true;

		
	}


	function selectGallery(){

		$query="SELECT * FROM `ce_gallery` ORDER BY `g_sorted_order`";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)){
			$result[]=$row;
		
		}
		return $result;

	}

	function selectGalleyById($id){

		$query="SELECT g.*,s.* FROM `ce_gallery` `g`,`ce_service` `s` WHERE `s`.`s_id`=`g`.`g_s_id` and  `g`.`g_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;

	}

	function selectGalleryByService($sid){

		$query="SELECT * FROM `ce_gallery` WHERE `g_s_id`='$sid' ORDER BY `g_sorted_order`";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)){
			$result[]=$row;
		
		}
		return $result;

	}

	function updateGallery($id,$service,$name,$image,$content,$sort){

		$query="UPDATE `ce_gallery` SET `g_s_id`='$service', `g_title`='$name',`g_description`='$content',`g_image`='$image',`g_sorted_order`='$sort' WHERE `g_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function deleteGallery($id){

		$query="DELETE FROM `ce_gallery` WHERE `g_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}


	function insertVideo($name,$video,$sort){

		echo $query ="INSERT INTO `ce_video`(`v_name`, `v_video`, `v_sort_order`) VALUES('$name','$video','$sort')";

		$queryCon=mysqli_query($this->con,$query);

		//$stmts->execute();
		return true;

		
	}

	function selectVideo(){

		$query="SELECT * FROM `ce_video` ORDER BY `v_sort_order` ASC";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)){
			$result[]=$row;
		
		}
		return $result;

	}

	function selectVideoById($id){

		$query="SELECT * FROM `ce_video` where `v_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;

	}

	function updateVideo($id,$name,$video,$sort){

		$query="UPDATE `ce_video` SET `v_name`='$name',`v_video`='$video',`v_sort_order`='$sort' WHERE `v_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function deleteVideo($id){

		$query="DELETE FROM `ce_video` WHERE `v_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

				
}
?>