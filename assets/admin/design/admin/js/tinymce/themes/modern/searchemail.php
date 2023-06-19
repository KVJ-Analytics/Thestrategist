<?php 
	include("inc/db.php"); 
	$email=$_REQUEST['email'];

	$stmt = $mysqli->prepare("select id,email from news_letter where email Like '%$email%'");
	//$stmt->bind_param('s', $val);
	$stmt->execute();
	$stmt->store_result();
	// get variables from result.
	$stmt->bind_result($id,$email);
	$i=1;
	while($stmt->fetch()){
					
	echo "<tr>
		<td>$i</td>
		<td>$email</td>
		<td>";
			
	echo "<a href='delete_news_letter.php?id=$id'><button class='btn btn-danger' type='button'>Delete</button></a>";
	
	   echo " </td>
	</tr>";
	 $i=$i+1; 
	 }
 ?>
