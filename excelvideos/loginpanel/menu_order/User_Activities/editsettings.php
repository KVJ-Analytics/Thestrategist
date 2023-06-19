<?php 
$menu=$_GET['menu'];
?>

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



	
	
	   <?php
	   $category_id=base64_decode($_GET['category_id']);
	 $db11 	= 	new Database();
	$stmt=$db11->query('select * from registration where acount_status="1" and email="'.$category_id.'"');	
	$rows1 = $db11->resultset();
		$db11->dbclose();
	//	print_r($rows1);
	//echo count($rows1);
	 if(count($rows1)>0){
            $diff=0;
        	foreach($rows1 as $result)
            	{
            	  $user_name=$result['full_name'];
            	}
	 }
	 
	?>
	<?php include("topmenu2.php"); ?>
<br/><br/>	<h3 style="float:left;width:100%;">Details of  student : <?php echo $user_name;?></h3>
   <table id="etable" class="table table-striped table-bordered bootstrap-datatable datatable responsive" 
    style="width:96%;table-layout: auto; word-wrap:break-word;" align="center">
    <thead>
    <tr>
        <th>Sl. No</th>
        <th>Video title</th>
        <th>No of video views</th>
        <th>Total time spend on videos(in Seconds)</th>
        <!--<th>Actions</th>-->
    </tr>
    </thead>
    
    
    
    
    <tbody>
        
        
        
    <?php
$db11 	= 	new Database();
	$stmt=$db11->query('select * from video_views JOIN video_gallery ON video_gallery.video_id=video_views.video_id where video_views.student_mail="'.$category_id.'" group by video_views.video_id');
	// table1 INNER JOIN table2 ON table1.matching_column = table2.matching_column;
	$rows1 = $db11->resultset();
		$db11->dbclose();
		$i=0;
		//	print_r($rows1);
	foreach($rows1 as $result)
	{
	
		$caption=$result['caption'];
	//	$category_id=$result['exam_name'];
 $vvid=$result['video_id'];
	?>
    <tr>
        <td align="center"><?php echo ++$i; ?></td>
        <td class="center"><?php echo $caption; ?></td>
        <td class="center">
            
            <?php
            
	
             $db112 	= 	new Database();
	$stmt=$db112->query('select *,sum(video_duration) as vtotal,count(video_id)as vcount from video_views where video_id='.$vvid.' and student_mail="'.$category_id.'"');	
	$rows12 = $db112->resultset();
		$db112->dbclose();
	//	print_r($rows12);
		
		if(count($rows12)>0){
           
        	foreach($rows12 as $result)
            	{
            	    $vcount=$result['vcount'];
            	    $vtotal=$result['vtotal'];
            	}
		}
		echo $vcount;
		?>
        </td>
         
            
        </td>
         <td class="center">
            
             <?php
             
             
             echo $vtotal;
         


		?> 
            
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
            var ssid=document.getElementById('sid').value;
           if(sdate!='' && edndate!=''){ 
           $.ajax({
        url: "menu_order/<?php echo base64_decode($_GET['menu']);?>/student_test.php?menu=<?php echo $_GET['menu'];?>",
        type: "post",
        data: {vid:sdate,shours:sh,smins:smin,ssecs:ssec,vdt:edndate,enhs:enh,enmins:enmin,ensecs:ensec,sid:ssid} ,
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