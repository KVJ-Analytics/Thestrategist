 <?php include("inc/db.php"); 
$val=$_REQUEST['t1'];

$stmt = $mysqli->prepare("select page_id,page_name,banner,sort_order from  page_details where page_name Like '%$val%'");
//$stmt->bind_param('s', $val);
$stmt->execute();
$stmt->store_result();
// get variables from result.
$stmt->bind_result($page_id, $pagename, $banner,$sort);
$i=1;
while($stmt->fetch()){


										
										

						
echo "  <tr>
	<td> $i</td>
	<td> $pagename</td>
	<td><img src='$banner' height='100' /></td>
	<td>$sort</td>
	<td>
	<a href='edit_page_html.php?id=<?php echo $page_id; ?>'><button class='btn btn-success' type='button'>Edit page code</button></a>
	<a href='edit_pages.php?id=$page_id'><button class='btn btn-success' type='button'>Edit</button></a> ";
		
echo "    <a href='delete_page.php?id=$page_id'><button class='btn btn-danger' type='button'>Delete</button></a>";

   echo " </td>
</tr>";
 $i=$i+1; }
 ?>
