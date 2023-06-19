<?php
$vid=$_GET['id'];
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
function enableSettings(category_id,status)
{
//if(confirm('Do you want to delete contennt'))
//{
window.location.href="menu_order/<?php echo base64_decode($_GET['menu']);?>/action_code.php?menu="+"<?php echo $_GET['menu'];?>"+"&action=Settings" + "&category_id=" + category_id+"&status="+status;

}
</script>


    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" 
    style="width:96%;table-layout: auto; word-wrap:break-word;" align="center">
    <thead>
    <tr>
        <th>Sl. No</th>
        <th>Exams</th>
       
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	$i=0;
	$db1 	= 	new Database();
	$stmt=$db1->query('select * from colleges');	
	$rows = $db1->resultset();
	foreach($rows as $result)
	{
	
		$category_id=$result['id'];
	//	$category_id=$result['exam_name'];
		
	?>
    <tr>
        <td align="center"><?php echo ++$i; ?></td>
        <td class="center"><?php echo $result['college']; ?></td>
        
        <td class="center">
            
            <a class="btn btn-info" href="indexhome.php?file=<?php echo base64_encode(base64_decode($_GET['menu'])."/editsettings.php"); ?>&menu=<?php echo $_GET['menu']; ?>&category_id=<?php echo base64_encode($result['id']); ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="javascript:deleteSettings('<?php echo base64_encode($result['id']); ?>')">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
            <a class="btn btn-<?php
                if($result['status']=='0'){ echo "success";}else{echo "danger";}
                ?>" href="javascript:enableSettings('<?php echo base64_encode($result['id']); ?>','<?php echo base64_encode($result['status']); ?>')">
                <!--<i class="glyphicon glyphicon-trash icon-white"></i>-->
                <?php
                if($result['status']=='0'){ echo "Enable";}else{echo "Disable";}
                ?>
            </a>
        </td>
    </tr>
    <?php
	}
	$db1->dbclose();
	?>
    
    
    </tbody>
    </table>
