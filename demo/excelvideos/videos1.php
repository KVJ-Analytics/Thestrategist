<?php include("sessioncode.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Excel Videos</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
  @font-face {
  font-family: 'Sansation';
    src:  url('Sansation.ttf.woff') format('woff'),
    url('Sansation.ttf.svg#Sansation') format('svg'),
    url('Sansation.ttf.eot'),
    url('Sansation.eot?#iefix') format('embedded-opentype'); 
    font-weight: normal;
    font-style: normal;
}
   video::-internal-media-controls-download-button {
    display:none;
   }

   video::-webkit-media-controls-enclosure {
        overflow:hidden;
   }

   video::-webkit-media-controls-panel {
        width: calc(100% + 30px); 
   }
   
   
.tabs-left > .nav-tabs {
  border-bottom: 0;
}

.tab-content > .tab-pane,
.pill-content > .pill-pane {
  display: none;
}

.tab-content > .active,
.pill-content > .active {
  display: table;
    font-family: Calibri;

}


.tab-content p{
padding:15px;
    font-family: Calibri;


}

.sansclass{
    font-family: Calibri;
margin:30px auto 30px 10px;

}

.tabs-left > .nav-tabs > li {
  float: none;
}

.nav > li > a > img {
padding-right:10px;
}

.tabs-left > .nav-tabs > li > a {
  min-width: 74px;
  margin-right: 0;
  margin-bottom: 3px;
    font-family: Calibri;

}

.tabs-left > .nav-tabs {
  float: left;
  margin-right: 19px;
  border-right: 1px solid #ddd;
}

.tabs-left > .nav-tabs > li > a {
  margin-right: -1px;
  -webkit-border-radius: 4px 0 0 4px;
     -moz-border-radius: 4px 0 0 4px;
          border-radius: 4px 0 0 4px;
		  color:#808080;
		  font-size:16px;
}

.tabs-left > .nav-tabs > li > a:hover,
.tabs-left > .nav-tabs > li > a:focus {
  border-color: #eeeeee #dddddd #eeeeee #eeeeee;
}

.tabs-left > .nav-tabs .active > a,
.tabs-left > .nav-tabs .active > a:hover,
.tabs-left > .nav-tabs .active > a:focus {
  border-color: #ddd transparent #ddd #ddd;
  *border-right-color: #ffffff;

}

.excelhead{
margin-top:50px;
margin-bottom:30px;
}
</style>
</head>

<body onLoad="disableClick()" oncontextmenu="return false">

<div align="right" style="padding-top:25px; padding-right:50px; margin-right:20px;"><a href="logout.php"> Log out</a></div>
<br /><br />

<div class="container-fluid excelhead">
    <div class="row">
		<div class="col-xs-12">
		  <h2 class="sansclass">Excel Tutorials</h2>
       
			<!-- tabs -->
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs">
                
             <?php 
	$k=0;
	$db1 	= 	new Database();
								$stmt=$db1->query('select * from video_category where exam='.$_SESSION['category_id'].' order by category_id asc');	
								$rows = $db1->resultset();
	foreach($rows as $result)
	{
		$k++;
		$category_id1=$result['category_id'];
		
		
	?>
                
                
					<li><a href="#tab<?php echo $category_id1; ?>" data-toggle="tab"><img src="images/20150310_logo_excel-2013.png"/><?php echo $result['category'];   ?> </a></li>
					<?php /*?><li><a href="#about" data-toggle="tab"><img src="images/20150310_logo_excel-2013.png"/>Perform Operation with Formulas and Functions</a></li>
					<li><a href="#services" data-toggle="tab"><img src="images/20150310_logo_excel-2013.png"/>Create Table</a></li>
					<li><a href="#contact" data-toggle="tab"><img src="images/20150310_logo_excel-2013.png"/> Create and Manage Work Sheet and Work Book </a></li><?php */?>
                    
                    
           <?php
	}
	$db1->dbClose();
	?>         
                                       
                    
    
				</ul>
                
				<div class="tab-content">
                
                
                
                
                <?php 
	$k=0;
	$db1 	= 	new Database();
	$db2	= 	new Database();
								$stmt=$db1->query('select * from video_category where exam='.$_SESSION['category_id'].' order by category_id asc');	
								$rows = $db1->resultset();
	foreach($rows as $result)
	{
		$k++;
		$caption=$result['caption'];
		$category_id=$result['category_id'];
		
								?>
                
                
                
                
                
					<div class="tab-pane <?php if($k==1){?> active <?php } ?>" id="tab<?php echo $category_id; ?>">                
						<div class="">
                       
                        <?php
                        $stmt2=$db2->query('select * from video_gallery where exam='.$_SESSION['category_id'].' and category_id=:category_id');
								$db2->bind(":category_id",$category_id);
								$rows2 = $db2->resultset();
	foreach($rows2 as $result2)
	{
		$caption=$result2['caption'];
		$path="assets/video/".$result2['video'];
		$video=$result2['video'];
		$vid=$result2['video_id'];
	?>
                        <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" id="<?php echo 'v'.$vid;?>" controlsList="nodownload" data-prod-id="0" data-id="<?php echo $vid;?>">
  <source src="<?php echo $path;?>" type="video/mp4">
</video>
<p><?php echo $caption;?></p>

                            </div>    
                            
                          								<?php
	}
	
	?>
     </div>
    </div>		
   
	<?php	}
	
	$db1->dbClose();
    
    ?>				
    
					
				</div>
			</div>
			<!-- /tabs -->
		</div>
	</div>
</div>

<div align="center"> <?php
$servername = "localhost";
$username = "thestr_excel";
$password = "X8n]vDxeKkf%";
$dbname = "thestr_excel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM hit";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $id=$row["id"];
       $count=$row["count"];
    }
} else {
    echo "0 results";
}
 if(!isset($_SESSION['count']))
{


$_SESSION['count']=$count+1;
echo $count1=$_SESSION['count'];
$sql = "UPDATE hit SET count='$count1' WHERE id=1";
$conn->query($sql);
$conn->close();
}
else
echo $_SESSION['count'];
?> 


Visits</div>
<script>

	 
$('video').bind('play', function (e) {
    // Hide Middle Play button
    var id=$(this).data('id');
   // alert("played"+id);
    
  var vvid= '#v'+id;
  //alert(document.getElementById('v'+id).duration);
  var vduration=document.getElementById('v'+id).duration;
 var values = id;

 $.ajax({
        url: "test.php",
        type: "post",
        data: {vid:values,vdt:vduration} ,
        success: function (response) {

         $(vvid).attr("data-prod-id",response);
         //var reslt=response; //alert(response); // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
    
    
    
});
$('video').bind('pause', function (e) {
    // Hide Middle Play button
    //alert("paused");
     var ids=$(this).data('prod-id');
  //   alert("paused"+ids);
   //var vvid= '#v'+id;
 var valuess = ids; //up_views.php
 //die;
    $.ajax({
        url: "up_views.php",
        type: "post",
        data: {vid:valuess} ,
        success: function (response) {

       //  $(vvid).attr("data-prod-id",response);
         //var reslt=response; //
        // alert(response); // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
    
    
});
/*$('video').bind('ended', function (e) {
    // Hide Middle Play button
    alert("ended");
});*/
    </script>
 <script>
      function disableClick(){
        document.onclick=function(event){
          if (event.button == 2) {
            return false;
          }
        }
      }
	  
	  document.onkeydown = function(e) {
    if(e.keyCode == 123) {
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
     return false;
    }

    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
     return false