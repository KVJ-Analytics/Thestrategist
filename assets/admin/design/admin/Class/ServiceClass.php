<?php 
require_once('DatabaseClass.php');

class ServiceClass extends DatabaseClass{

		//selectSiteDetails()

	function insertService($title,$icon,$banner,$caption,$sort,$status){

		echo $query ="INSERT INTO `ce_service`( `s_title`, `s_description`, `s_thumb`, `s_image`, `s_sort_order`) VALUES('$title','$caption','$icon','$banner','$sort')";

		$queryCon=mysqli_query($this->con,$query);

		//$stmts->execute();
		return mysqli_insert_id($this->con);

		
	}

	function allServices(){

		$service="SELECT * FROM `ce_service` order by `s_sort_order` ASC";
		$serviceCon=mysqli_query($this->con,$service);
		$result=array();
		while ($row=mysqli_fetch_array($serviceCon)) {
			$result[]=$row;
		}
		return $result;
	}

	function selectSingleServices($ser_id){

		$query="SELECT * FROM `ce_service` WHERE `s_id`='$ser_id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;
	}

	function updateServices($title,$icon,$banner,$caption,$sort,$sid){

		echo $query="UPDATE `ce_service` SET `s_title`='$title',`s_description`='$caption',`s_thumb`='$icon',`s_image`='$banner',`s_sort_order`='$sort'  WHERE `s_id`='$sid'";
		$queryCon=mysqli_query($this->con,$query);
		return true;
	}

	function deleteServices($id){


		$query="DELETE FROM `ce_service` WHERE `s_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return $queryCon;
	 }

				
}
?>