<?php 
require_once('DatabaseClass.php');

class CareerClass extends DatabaseClass{

		//Career Details()

	function insertCareer($position,$pos_des,$sort_order){

		echo $query ="INSERT INTO `ce_positions`(`cp_position`, `cp_position_description`, `cp_sort_order`) VALUES('$position','$pos_des','$sort_order')";

		$queryCon=mysqli_query($this->con,$query);

		//$stmts->execute();
		return true;

		
	}

	function allCareers(){

		$query ="SELECT * FROM `ce_positions` ORDER BY `cp_sort_order`";

		$queryCon=mysqli_query($this->con,$query);

		$result=array();

		while ($row=mysqli_fetch_array($queryCon)) {

			$result[]=$row;
		}
		return $result;

		
	}

	function selectCareerById($cid){

		$query ="SELECT * FROM `ce_positions` WHERE `cp_id`='$cid'";

		$queryCon=mysqli_query($this->con,$query);

		$row=mysqli_fetch_array($queryCon);

		return $row;

		
	}

	function updateCareer($id,$position,$pos_des,$sort_order){

		$query ="UPDATE `ce_positions` SET `cp_position`='$position',`cp_position_description`='$pos_des',`cp_sort_order`='$sort_order' WHERE `cp_id`='$id'";

		$queryCon=mysqli_query($this->con,$query);

		//$stmts->execute();
		return mysqli_insert_id($this->con);

		
	}

	function deleteCareer($id){

		$query ="DELETE FROM `ce_positions` WHERE `cp_id`='$id'";

		$queryCon=mysqli_query($this->con,$query);

		//$stmts->execute();
		return true;

		
	}

				
}
?>