<?php
$vid=$_GET['regid'];
$menu=$_GET['menu'];
?>
<script language="javascript" type="text/javascript">
function deleteSettings(regid)
{
if(confirm('Do you want to delete content'))
{
window.location.href="menu_order/<?php echo base64_decode($_GET['menu']);?>/action_code.php?menu="+"<?php echo $_GET['menu'];?>"+"&action=Delete"+"&regid="+regid;
}
}
</script>



    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" 
    style="width:96%;table-layout: auto; word-wrap:break-word;" align="center">
    <thead>
    <tr>
       <th>Sl. No</th>
        <th>Name</th>
       <th>Email</th>
       <th>Phoneno</th>
       <th>Date and Time</th>
       <th>Logout Date and Time</th>
       <th>Time</th>
       <th>Action</th>
    </tr>
    </thead>
    <tbody>
    
    <?php
	
   
     
	$i=0;
	$db1 	= 	new Database();
	$stmt=$db1->query('select * from registration order by regid desc');
	$rows = $db1->resultset();
	foreach($rows as $result)
	{
	
		$name=$result['name'];
		$email=$result['email'];
		$phoneno=$result['phoneno'];
		$datetime=$result['datetime'];
		$totime=$result['totime'];
		$ipaddress=$result['ipaddress'];
		
		$time=substr($datetime,11,8);
		$h=substr($time,0,2);
		if($h<12)
		$newtime=$time."AM";
		
		elseif($h==12)
		$newtime=$h.":".substr($time,3,5)."PM";
		
		else
		{
			$newtime=($h-12).":".substr($time,3,5)."PM";
		}
	
	$time1=substr($totime,11,8);
		$h=substr($time1,0,2);
		if($h<12)
		$newtime1=$time1."AM";
		
		elseif($h==12)
		$newtime1=$h.":".substr($time1,3,5)."PM";
		
		else
		{
			$newtime1=($h-12).":".substr($time1,3,5)."PM";
		}
	
	
	?>
    <tr>
        <td align="center"><?php echo ++$i; ?></td>
        <td class="center"><?php echo $result['name']; ?></td>
         <td class="center"><?php echo $result['email']; ?></td>
          <td class="center"><?php echo $result['phoneno']; ?></td>
     
          <td class="center"><?php echo dateformat($result['datetime'])." ".$newtime; ?></td>
          <td class="center"><?php if($totime!="0000-00-00 00:00:00") echo dateformat($result['totime'])." ".$newtime1; ?></td>
          <td class="center"><?php if($totime!="0000-00-00 00:00:00") echo round(abs(strtotime($totime) - strtotime($datetime)) / 60,2). " minute"; ?></td>
         
          <?php /*?> <a class="btn btn-info" href="indexhome.php?file=<?php echo base64_encode(base64_decode($_GET['menu'])."/editsettings.php"); ?>&menu=<?php echo $_GET['menu']; ?>&category_id=<?php echo base64_encode($category_id); ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a><?php */?>
          <td>  <a class="btn btn-danger" href="javascript:deleteSettings('<?php echo base64_encode($result['regid']); ?>')">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <?php
	}
	$db1->dbclose();
	?>
    
    
    </tbody>
    </table>
