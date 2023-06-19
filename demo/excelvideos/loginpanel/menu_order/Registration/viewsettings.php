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
function activation_Settings(regid,action){
    
 //alert(regid);
window.location.href="menu_order/<?php echo base64_decode($_GET['menu']);?>/action_code.php?menu="+"<?php echo $_GET['menu'];?>"+"&action="+action+"&regid="+regid;

}
</script>



    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" 
    style="width:96%;table-layout: auto; word-wrap:break-word;" align="center">
    <thead>
    <tr>
       <th>Sl. No</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Full Name</th>
        <th>College </th>
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
	$db1->dbclose();
	//print_r($rows);
	foreach($rows as $result)
	{
	
		$name=$result['name'];
		$email=$result['email'];
		$phoneno=$result['phoneno'];
		$datetime=$result['datetime'];
		
		$uid=$result['regid'];
		
		$db11 	= 	new Database();
	$stmt=$db11->query('select * from login_log where user_id='.$uid.' order by id desc limit 1');
	$rows11 = $db11->resultset();
	$db11->dbclose();
		//print_r($rows11);
		$totime=$result['totime'];
		if($rows11){
		   foreach($rows11 as $result11)
            	{
            	    $datetime=$result11['fromtime'];
    		    	$totime=$result11['totime'];
            	}
		}
		$ipaddress=$result['ipaddress'];
		
		$time=substr($datetime,11,8);
		$h=substr($time,0,2);
		if($h<12)
		$newtime=$time." AM";
		
		elseif($h==12)
		$newtime=$h.":".substr($time,3,5)." PM";
		
		else
		{
			$newtime=($h-12).":".substr($time,3,5)." PM";
		}
	
	$time1=substr($totime,11,8);
		$h=substr($time1,0,2);
		if($h<12)
		$newtime1=$time1."AM";
		
		elseif($h==12)
		$newtime1=$h.":".substr($time1,3,5)."PM";
		
		else
		{
			$newtime1=($h-12).":".substr($time1,3,5)." PM";
		}
	
	
	?>
    <tr>
        <td align="center"><?php echo ++$i; ?></td>
        <td class="center"><?php echo $result['name']; ?></td>
        <td class="center"><?php echo $result['middle_name']; ?></td>
        <td class="center"><?php echo $result['last_name']; ?></td>
        <td class="center"><?php echo $result['full_name']; ?></td>
        <td class="center"><?php
        $c=$result['college'];
        if($c==''){echo "not set";}else{
        	$db112 	= 	new Database();
	$stmt=$db112->query('select * from colleges where id='.$c);
	$rows112 = $db112->resultset();
	$db112->dbclose();
	if($rows112){
	foreach($rows112 as $cr){
	    echo $cr['college'];
	}}}
        ?></td>
         <td class="center"><?php echo $result['email']; ?></td>
          <td class="center"><?php echo $result['phoneno']; ?></td>
     
          <td class="center"><?php echo dateformat($result['datetime'])." ".$newtime; ?></td>
          <td class="center"><?php if($totime!="0000-00-00 00:00:00") echo date('d/m/Y',strtotime($totime))." ".$newtime1; ?></td>
          <td class="center"><?php if($totime!="0000-00-00 00:00:00") echo round(abs(strtotime($totime) - strtotime($datetime)) / 60,2). " minute"; ?></td>
         
          <?php /*?> <a class="btn btn-info" href="indexhome.php?file=<?php echo base64_encode(base64_decode($_GET['menu'])."/editsettings.php"); ?>&menu=<?php echo $_GET['menu']; ?>&category_id=<?php echo base64_encode($category_id); ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a><?php */?>
          <td>  <a class="btn btn-danger" href="javascript:deleteSettings('<?php echo base64_encode($result['regid']); ?>')">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
             <a id="act" class="btn btn-<?php if($result['admin_approval']=='0'){echo 'success';}else{echo 'danger';} ?>" href="javascript:activation_Settings('<?php echo base64_encode($result['regid']); ?>','<?php if($result["admin_approval"]=="0"){echo "activate";}else{echo "deactivate";} ?>')">
                <!--<i class="glyphicon glyphicon-trash icon-white"></i>-->
                <?php if($result['admin_approval']=='0'){echo 'activate';}else{echo 'deactivate';} ?>
            </a>
        </td>
    </tr>
    <?php
	}
	
	?>
    
    
    </tbody>
    </table>
