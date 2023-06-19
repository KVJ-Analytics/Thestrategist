<?php
require_once('DatabaseClass.php');
class WorkClass extends DatabaseClass
{
	
	// function insertWorkCategoery($name,$sort_order)
	// {
	// 	$query="INSERT INTO `sm_work_type`(`wt_type`, `wt_sort_order`) VALUES('$name','$sort_order')";
	// 	$queryCon=mysqli_query($this->con,$query);
	// 	return true;
	// }

	function allWorkCategory()
	{
		$query="SELECT * FROM `sm_work_type`";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)){
			$result[]=$row;
		
		}
		return $result;
	}

	function insertResort($name,$des){

		$query="INSERT INTO `ak_ayurveda`(`ar_title`, `ar_description`) VALUES ('$name','$des')";
		$queryCon=mysqli_query($this->con,$query);
		return mysqli_insert_id($this->con);
	}

	function insertResortImage($ar_id,$image){

		echo $query="INSERT INTO `ak_ayurveda_images`(`ai_at_id`, `ai_images`) VALUES ('$ar_id','$image')";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function selectAllWorks()
	{
		$query="SELECT * FROM `sm_works` where `w_status`=0";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)){
			$result[]=$row;
		
		}
		return $result;
	}

	function selectSingleWork($wid)
	{
		$query="SELECT * FROM `sm_works` WHERE `w_id`='$wid'";
		$queryCon=mysqli_query($this->con,$query);
		
		$result=mysqli_fetch_array($queryCon);
		return $result;
	}

	function imagesByWork($id)
	{
		$query="SELECT * FROM `sm_works_gallery` WHERE `wimg_w_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)){
			$result[]=$row;
		
		}
		return $result;
	}

	function updateWork($name,$id,$des){

		$query="UPDATE `sm_works` SET `w_title`='$name',`w_description`='$des' WHERE `w_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function allWorkGallery()
	{
		$query="SELECT sm_works.*,sm_works_gallery.* FROM sm_works RIGHT JOIN sm_works_gallery ON `sm_works`.`w_id` =`sm_works_gallery`.`wimg_w_id`";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)){
			$result[]=$row;
		
		}
		return $result;
	}

	function deleteWorkGallery($id){

		$query="DELETE FROM `sm_works_gallery` WHERE `wimg_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function deleteWork($wid){

		$query="UPDATE `sm_works` SET `w_status`=1 WHERE `w_id`='$wid'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}
}
?>