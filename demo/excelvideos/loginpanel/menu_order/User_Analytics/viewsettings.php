<?php
$vid=base64_decode($_GET['college_id']);

$vvid=base64_decode($_GET['category_id']);//die;
$menu=$_GET['menu'];
?>
<script language="javascript" type="text/javascript">
function deleteSettings(category_id)
{
if(confirm('Do you want to delete contennt'))
{
window.location.href="menu_order/<?php echo base64_decode($_GET['menu']);?>/action_code.php?menu="+"<?php echo $_GET['menu'];?>"+"&action=Delete" + "&category_id=" + category_id;
}
}
</script>

 <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#"><?php include("$f_pathdg"); ?></a>
        </li>
    </ul>
</div>    

<?php include("topmenu3.php"); ?>
    <table id="etable" class="table table-striped table-bordered bootstrap-datatable datatable responsive" 
    style="width:96%;table-layout: auto; word-wrap:break-word;" align="center">
    <thead>
    <tr>
        <th>Sl. No</th>
        <th>User Name</th>
        
        <th>No of videos viewed</th>
        <!-- <th>Name of Exam</th>-->
        <th>Total time spend on videos</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	$i=0;
	$db1 	= 	new Database();
	$stmt=$db1->query('select * from registration where category_id='.$vvid.' and college='.$vid.' group by email order by regid desc');	
	$rows = $db1->resultset();
//	print_r($rows);
		$db1->dbclose();
	foreach($rows as $result0)
	{
	
	//	$category_id=$result0['name'];
		$exm=$result0['category_id'];
		
	?>
    <tr>
        <td align="center"><?php echo ++$i; ?></td>
        <td class="center"><?php echo $result0['name']; ?></td>
        <td class="center">
            
            <?php
            $db11 	= 	new Database();
	$stmt=$db11->query('select * from video_views where student_mail="'.$result0['email'].'" group by video_id');	
	$rows1 = $db11->resultset();
		$db11->dbclose();
	//	print_r($rows1);
	echo count($rows1);
		?>
        </td>
       <!--  <td class="center">
            
            <?php
           $db11 	= 	new Database();
	$stmt=$db11->query('select * from exams where exam='.$exm);	
	$rows1c = $db11->resultset();
		$db11->dbclose();
	foreach($rows1c as $results)
            	{
            	    echo $results['exam_name'];
            	}
   // echo $row1[0]['exam_name'];
		?>
        </td>-->
        
        <td class="center">
            
             <?php
            $db112 	= 	new Database();
	$stmt=$db112->query('select * from video_views where student_mail="'.$result0['email'].'"');	
	$rows12 = $db112->resultset();
		$db112->dbclose();
	//	print_r($rows12);
	
        if(count($rows1)>0){
            $diff=0;
        	foreach($rows12 as $result)
            	{
            	   if($result['ending_video']=='0000-00-00 00:00:00' || $result['starting_video']=='0000-00-00 00:00:00'){
            	      $diff+= $result['video_duration'];
            	   }else{ 
            	   $diff+=strtotime($result['ending_video']) - strtotime($result['starting_video']);
            	   }
            	}
            	//echo $diff;
            	if($diff<60){
            	    echo $diff." Seconds";
            	}else if($diff>60){
            	    echo round($diff/60).".".($diff%60)." Minutes";
            	}else{
            	    echo round($diff/(60*60)).".".($diff%(60*60))." Hours";
            	}
        }


		?> 
            
        </td>
        <td class="center">
            
            <a class="btn btn-info" href="indexhome.php?file=<?php echo base64_encode(base64_decode($_GET['menu'])."/editsettings.php"); ?>&menu=<?php echo $_GET['menu']; ?>&category_id=<?php echo base64_encode($result0['email']); ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                View details
            </a>
           <!-- <a class="btn btn-danger" href="javascript:deleteSettings('<?php echo base64_encode($result['exam']); ?>')">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>-->
        </td>
    </tr>
    <?php
	}

	?>
    
    
    </tbody>
    </table>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function get_all_indates()
        {
           var sdate=document.getElementById('start_date').value;
          var sh=document.getElementById('shours').value;
           var smin=document.getElementById('smin').value;
           var ssec=document.getElementById('ssec').value;
           var edndate=document.getElementById('end_date').value;
          var enh=document.getElementById('enhours').value;
           var enmin=document.getElementById('enmin').value;
           var ensec=document.getElementById('ensec').value;
           var eids=document.getElementById('eid').value;
         if(sdate!='' && edndate!=''){ $.ajax({
        url: "menu_order/<?php echo base64_decode($_GET['menu']);?>/exam_test.php?menu=<?php echo $_GET['menu'];?>",
        type: "post",
        data: {vid:sdate,shours:sh,smins:smin,ssecs:ssec,vdt:edndate,enhs:enh,enmins:enmin,ensecs:ensec,eid:eids} ,
        success: function (response) {
document.getElementById("etable").innerHTML = response;
        // $(vvid).attr("data-prod-id",response);
         //var reslt=response; 
        // alert(response); // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
        }else{
           alert('Select the dates to filter');
        }
        }
    </script>