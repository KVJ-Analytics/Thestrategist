<?php
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");


echo '<table border="1">';
//make the column headers what you want in whatever order you want
echo '<tr><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Full Name</th><th>Phone</th><th>Email</th>
<th>Exam</th><th>College</th><th>No of videos views</th><th>Videos viewed</th><th>Time spended for video views</th></tr>';
//loop the query data to the table in same order as the headers
$r=$_POST['udetails'];
	//echo $r;
	$arr='array(';
$x=json_decode($_POST['udetails'],true);
foreach($x as $row){
    echo "<tr><td>".$row['First Name']."</td><td>".$row['Middle Name']."</td><td>".$row['Last Name']."</td>
    <td>".$row['Full Name']."</td><td>".$row['Phone']."</td><td>".$row['Email']."</td><td>".$row['Exam']."</td>
    <td>".$row['College']."</td><td>".$row['No of videos views']."</td><td>".$row['Videos viewed']."</td><td>".$row['Time spended for video views']."</td>
    </tr>";
    // $arr.='array('.$x1["First Name"].','.$x1["Middle Name"].','.$x1["Last Name"].','.$x1["Full Name"].','.$x1["Phone"].','.$x1["Email"].','.$x1["Exam"].','.$x1["College"].','.$x1["No of videos views"].','.$x1["Videos viewed"].','.$x1["Time spended for video views"].'),';
}
   

echo '</table>';




/*//print_r($_POST);die;
$export_data = array(
	  array(
	            'Product' => 'Product 1',
	            'Valid From' => '2016-04-06 19:02:00',
	            'Valid Till' => '2016-04-07 19:04:00',
	            'Views' => 17,
	            'Quantity Request' => 4,
	            'Number of Accepted Requests' => 0,
	            'Number of Rejected Requests' => 4,
	            'Vendor' => 1,
	            'System' => 3
	        ),
	  array(
	            'Product' => 'Product 2',
	            'Valid From' => '2016-04-08 19:00:00',
	            'Valid Till' => '2016-04-15 19:00:00',
	            'Views' => 19,
	            'Quantity Request' => 1,
	            'Number of Accepted Requests' => 1,
	            'Number of Rejected Requests' => 0,
	            'Vendor' => 1,
	            'System' => 0
	        ),
	  array(
	            'Product' => 'Product 3',
	            'Valid From' => '2016-04-08 15:30:00',
	            'Valid Till' => '2016-04-12 04:30:00',
	            'Views' => 6,
	            'Quantity Request' => 1,
	            'Number of Accepted Requests' => 1,
	            'Number of Rejected Requests' => 0,
	            'Vendor' => 1,
	            'System' => 0
	        )
	);
	

	
	$r=$_POST['udetails'];
	//echo $r;
	$arr='array(';
$x=json_decode($_POST['udetails'],true);
foreach($x as $x1){
    $arr.='array('.$x1["First Name"].','.$x1["Middle Name"].','.$x1["Last Name"].','.$x1["Full Name"].','.$x1["Phone"].','.$x1["Email"].','.$x1["Exam"].','.$x1["College"].','.$x1["No of videos views"].','.$x1["Videos viewed"].','.$x1["Time spended for video views"].'),';
}
$arr=$arr.')';
//die;	//print_r($r);
echo $export_data=$arr;
die;
	$fileName = "export_data" . rand(1,100) . ".xls";
//print_r($export_data);
if ($export_data) {
	function filterData(&$str) {
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	}

	// headers for download
	header("Content-Disposition: attachment; filename=\"$fileName\"");
	header("Content-Type: application/vnd.ms-excel");

	$flag = false;
	foreach($export_data as $row) {
		if(!$flag) {
			// display column names as first row
			echo implode("\t", array_keys($row)) . "\n";
			$flag = true;
		}
		// filter data
		array_walk($row, 'filterData');
		echo implode("\t", array_values($row)) . "\n";
	}
	exit;			
}*/