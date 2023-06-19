<?php 

	include("inc/db.php");
	
		//$data=$this->calender_model->getEvent($event_id);
		 $arry=array();
		 $stmts = $mysqli->prepare("select event_id,title,description,startdate,enddate from events where status=0");
		 $stmts->execute();
		 $stmts->store_result();
		 $stmts->bind_result($event_id,$title,$description,$startdate,$enddate);
		 while($stmts->fetch()){
		 $arry[]=array('event_id'=>$event_id,'title'=>$title,'description'=>$description,'startdate'=>$startdate,'enddate'=>$enddate);
      }
	  echo json_encode($arry);
?>