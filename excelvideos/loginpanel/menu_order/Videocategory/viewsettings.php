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
</script>


    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" 
    style="width:96%;table-layout: auto; word-wrap:break-word;" align="center">
    <thead>
    <tr>
        <th>Sl. No</th>
        <th>Category</th>
       
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	$i=0;
	$db1 	= 	new Database();
	$stmt=$db1->query('select * from video_category ');	
	$rows = $db1->resultset();
//	print_r($rows);
	foreach($rows as $result)
	{
	
		$category_id=$result['category_id'];
		
	?>
    <tr>
        <td align="center"><?php echo ++$i; ?></td>
        <td class="center"><?php echo $result['category']; ?></td>
        
        <td class="center">
            
            <a class="btn btn-info" href="indexhome.php?file=<?php echo base64_encode(base64_decode($_GET['menu'])."/editsettings.php"); ?>&menu=<?php echo $_GET['menu']; ?>&category_id=<?php echo base64_encode($category_id); ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="javascript:deleteSettings('<?php echo base64_encode($result['category_id']); ?>')">
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
