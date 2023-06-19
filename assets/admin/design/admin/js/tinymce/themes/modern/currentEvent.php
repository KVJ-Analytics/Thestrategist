<?php 

	include("inc/db.php");
	include("inc/activity.php");
	     $event_id=$_REQUEST['event_id'];
		//$data=$this->calender_model->getEvent($event_id);
		 $stmts = $mysqli->prepare("select title,description,startdate,enddate from events where event_id=? AND status=0");
		 $stmts->bind_param('i',$event_id);
		 $stmts->execute();
		 $stmts->store_result();
		 $stmts->bind_result($title,$description,$startdate,$enddate);
		 while ($stmts->fetch()){
													
		$startdate=explode('-',$startdate);
		$startdate=$startdate[2].'-'.$startdate[1].'-'.$startdate[0];
		
		$enddate=explode('-',$enddate);
		$enddate=$enddate[2].'-'.$enddate[1].'-'.$enddate[0];
		echo '
        	<tr>
            	<td></td>
            	<td><p>'.$title.'</p></td>
            </tr>
        	<tr>
            	<td></td>
            	<td><p>'.$description.'</p></td>
            </tr>
        	<tr>
            	<td></td>
            	<td>  

              </td>
          	</tr>
        	<tr>
            	<td></td>
            	<td>
                 <p><i class="fa fa-calendar" style="padding-right:10px;"></i>'.$startdate.' to '.$enddate.'</p>
                </td>
            </tr>
           
            <tr>
            	<td></td>
            	<td><a href="javascript:void(0);" id="'.$event_id.'cal'.'" onclick="editEve('.$event_id.');" style="padding-right:10px;"><i class="fa fa-pencil-square-o" style="padding-right:10px;"></i>Edit</a>
                <a href="javascript:void(0);" onclick="deleteEve('.$event_id.');"><i class="fa fa-trash" style="padding-right:10px;"></i>Delete</a>
                </td>
            </tr>
       ';
	   }
?>