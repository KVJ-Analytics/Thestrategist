<?php
$vid=$_GET['id'];
$menu=$_GET['menu'];
?>
<script language="javascript" type="text/javascript">
function deleteSettings(video_id)
{
if(confirm('Do you want to delete content'))
{
window.location.href="menu_order/<?php echo base64_decode($_GET['menu']);?>/action_code.php?menu="+"<?php echo $_GET['menu'];?>"+"&action=Delete" + "&video_id=" + video_id;
}
}
</script>


    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" 
    style="width:96%;table-layout: auto; word-wrap:break-word;" align="center">
    <thead>
    <tr>
        <th width="16%">Sl. No</th>
        <th width="20%">Caption</th>
       
        <th width="14%">video</th>
         <th width="21%">Category</th>
        <th width="29%">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	$i=0;
	$db1 	= 	new Database();
	$stmt=$db1->query('select * from video_category,video_gallery where video_gallery.category_id=video_category.category_id');	
	$rows = $db1->resultset();
	foreach($rows as $result)
	{
	
		$video_id=$result['video_id'];
		$path="../assets/video/".$result['video'];
	?>
    <tr>
        <td align="center"><?php echo ++$i; ?></td>
        <td class="center"><?php echo $result['caption']; ?></td>
         <td class="center"><?php echo $result['video']; ?></td>
       
     <?php /*?>   <td class="center"><img src="<?php echo $path; ?>" height="80" /></td><?php */?>
        
          <td class="center"><?php echo $result['category']; ?></td>
        <td class="center">
            
            <a class="btn btn-info" href="indexhome.php?file=<?php echo base64_encode(base64_decode($_GET['menu'])."/editsettings.php"); ?>&menu=<?php echo $_GET['menu']; ?>&video_id=<?php echo base64_encode($video_id); ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="javascript:deleteSettings('<?php echo base64_encode($result['video_id']); ?>')">
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
