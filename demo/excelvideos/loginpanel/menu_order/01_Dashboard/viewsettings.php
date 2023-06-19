<link href="http://thestrategist.co.in/demo/excelvideos/css/sb-admin.css" rel="stylesheet">
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


  <div class="row"style="margin:0;">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-users"></i>
                </div>
                <div class="mr-5">  <?php

	$db11 	= 	new Database();
	$stmt=$db11->query('select * from registration');	
	$rows2 = $db11->resultset();
		$db11->dbclose();
echo count($rows2);
		
	?> Users</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="http://thestrategist.co.in/demo/excelvideos/loginpanel/indexhome.php?menu=UmVnaXN0cmF0aW9u&file=UmVnaXN0cmF0aW9uL2luZGV4LnBocA==)">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-list"></i>
                </div>
                 
                <div class="mr-5"><?php
	$i=0;
	$db1 	= 	new Database();
	$stmt=$db1->query('select * from exams');	
	$rows = $db1->resultset();
		$db1->dbclose();
	
	echo count($rows);	
	?> Exams</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="http://thestrategist.co.in/demo/excelvideos/loginpanel/indexhome.php?menu=MV9FeGFtcw==&file=MV9FeGFtcy9pbmRleC5waHA=)">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
         
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-file-video-o"></i>
                </div>
                <div class="mr-5">  <?php

	$db11 	= 	new Database();
	$stmt=$db11->query('select * from video_gallery');	
	$rows2 = $db11->resultset();
		$db11->dbclose();
echo count($rows2);
		
	?>  Videos!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="http://thestrategist.co.in/demo/excelvideos/loginpanel/indexhome.php?menu=VmlkZW9nYWxsZXJ5&file=VmlkZW9nYWxsZXJ5L2luZGV4LnBocA==)">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
           <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-play"></i>
                </div>
                <div class="mr-5"> <?php
            $db112 	= 	new Database();
          
	$stmt=$db112->query('select * from video_views'); 
	$rows12 = $db112->resultset();
		$db112->dbclose();
        echo count($rows12);
        ?> Video Views!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="http://thestrategist.co.in/demo/excelvideos/loginpanel/indexhome.php?menu=VXNlcl9BY3Rpdml0aWVz&file=VXNlcl9BY3Rpdml0aWVzL2luZGV4LnBocA==)">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
