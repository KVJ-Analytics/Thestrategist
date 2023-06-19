<?php include('config.php');

error_reporting(E_ERROR | E_PARSE);
?>

<?php 
include(admin."/db.php");

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Precious Real Estate</title>
	<meta name="description" content="Precious Real Estate"/>
	<meta name="keywords" content="Precious Real Estate"/>
	<meta name="author" content="Precious Real Estate">
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,600,700" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/fav_icon.png" />
    
    <link href="css/responsiveslides.css" rel="stylesheet" type="text/css"  />        
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"  />   
    <link href="css/measurements.css" rel="stylesheet" type="text/css"  />
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css"  /> 
    <link href="css/owl.carousel-details.css" rel="stylesheet" type="text/css"  />
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css"  />
    <link href="css/owl.theme.default.min.css" rel="stylesheet" type="text/css"  /> 
    <link href="css/style.css" rel="stylesheet" type="text/css"  />  
</head>
<?php
$basic=mysql_query("select * from basic "); 
$basic=mysql_fetch_array($basic);
?>