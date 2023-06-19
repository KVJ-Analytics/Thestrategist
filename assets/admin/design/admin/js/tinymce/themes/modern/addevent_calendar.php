<?php include("header.php"); ?>
<body class="skin-blue fixed sidebar-mini">
	<div class="wrapper">
  		<?php include("side_header.php"); ?>
  		<!-- =============================================== -->
        <?php include("menu.php"); ?>
        <div class="content-wrapper">
    		<section class="margT25 col-lg-12">
          		<div class="ttl-wrap ">
          			<h2>Event Calender </h2>
          		</div>
          		<div class="clearfix"></div>
    		</section>
            <section class="margT25 col-sm-12 calender">
            <div class="clearfix"></div>
      		<div class="example1"  style="margin:0 auto"></div>
                      
          		<div class="clearfix"></div>
    		</section>
            <section class="margT25 col-sm-2">
          		<div class="clearfix"></div>
    		</section>
    		<div class="clearfix"></div>
  		</div>
<style>

.supercal {
	width: 100%;
}

.supercal .supercal-footer span.supercal-input {
    display: none!important;
}
.supercal-today {
    display: none;
}

.supercal .supercal-header {
	display: block;
	line-height: 30px;
	margin-bottom: 20px;
	text-align: center;
	position: relative;
}

.supercal .supercal-header .prev-month {
	float: left;
}

.supercal .supercal-header .next-month {
	float: right;
}

.supercal-month {
	position: relative;
	z-index: 0;
	overflow: hidden;
}
.supercal table {
	width: 100%;
	table-layout: fixed;
	background: #fff;
}

.supercal td {
	cursor: pointer;
}
.supercal td:hover {
	background: #2f96b4 !important;
	color: #fff;
}
.supercal td.month-prev, .supercal td.month-next {
	background: #eee;
}
.supercal td.selected {
	background: #0088cc;
	color: #fff;
	font-weight: normal;
}
.supercal td.today {
	font-weight: bold;
}

/* Footer */
.supercal .supercal-footer {
	width: 100%;
	display: table;
}
.supercal .supercal-footer span.supercal-input {
	display: table-cell;
	width: 100%;
	cursor: default;
}
.supercal-header{
margin-top:-20px;
}
.calender table{
	width:100%;
	
}
.calender tr{vertical-align:middle!important;}
.calender td{
	width:30px;
	height:80px;
	border:1px solid #ccc;
	padding:10px;
	text-align:center;
	vertical-align:middle!important;
}
.calender th{
	height:25px;
	padding:10px;
}
.calender table tr td span{
	display:block;
	width:100%;
	background:#ea4a46;
	color:#fff;
	margin-bottom:3px;
	margin-top:3px;
	padding:3px;
}
</style>
<script src="js/jquery.supercal.js"></script> 
<script src="js/event.js"></script> 
 <link href="css/jquery.css" rel="stylesheet"/>
 <script src="js/date_pic_function.js" type="text/javascript"></script> 

<div class="modal fade popmod"   tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content sa-popup-wrap">
    <div class="sa-popup-border">
      <div class="modal-header">
        <button type="button" class="close sa-icon-close-popup" data-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title text-center" id="myModalLabel">Add Event</h4>
      </div>
      <div class="modal-body">
      <form id="commentForms" method="post" action="addEvent.php" name="myform"  enctype="multipart/form-data">
    	<input type="hidden" name="crdate" id="crdate" value=""/>
        
      	<table>
        	<tr>
            	<td>Title</td>
            	<td><input type="text" id="title" name="title"  autocomplete="off"  class="pop_text" required/></td>
            </tr>
        	<tr>
            	<td>Description</td>
            	<td><textarea  id="description" name="description" class="pop_text" required></textarea></td>
            </tr>
        	<tr>
            	<td>Start Date</td>
            	<td> <input type="text" id="startdate"  name="startdate" value="" class="datepicker" required/></td>
          	</tr>
        	<tr>
            	<td>End Date</td>
            	<td>
                 <input type="text" id="end_date"  name="end_date" value="" class="datepicker" required/>
                </td>
            </tr>
           
            <tr>
            	<td></td>
            	<td><button type="submit" class="btn btn-primary text-uppercase" id="event" >Submit</button></td>
            </tr>
        </table>
       </form>
      </div>
    </div>
    </div>
  </div>
</div>
<div class="modal fade popmod2"   tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content sa-popup-wrap">
    <div class="sa-popup-border">
      <div class="modal-header">
        <button type="button" class="close sa-icon-close-popup" data-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title text-center" id="myModalLabel">Event</h4>
      </div>
      <div class="modal-body">
      <form id="commentForms1" method="post" action="deleteEvent.php" name="myform"  enctype="multipart/form-data">
    	<input type="hidden" name="evdelid" id="evdelid" value=""/>
      	<table id="eventshow">
        	
        </table>
       </form>
      </div>
    </div>
    </div>
  </div>
</div>
<div class="modal fade popmod3"   tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content sa-popup-wrap">
    <div class="sa-popup-border">
      <div class="modal-header">
        <button type="button" class="close sa-icon-close-popup" data-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title text-center" id="myModalLabel">Event</h4>
      </div>
      <div class="modal-body">
      <form id="commentForms2" method="post" action="updateEvent.php" name="myform"  enctype="multipart/form-data">
    		<input type="hidden" name="evid" id="evid" value=""/>
      	<table id="eventshow">
        	<tr>
            	<td>Title</td>
            	<td><input type="text" id="title2" name="title"  autocomplete="off"  class="pop_text" required/></td>
            </tr>
        	<tr>
            	<td>Description</td>
            	<td><textarea  id="description2" name="description" class="pop_text" required></textarea></td>
            </tr>
        	<tr>
            	<td>Start Date</td>
            	<td>  
                
           <input type="text" id="startdate2"  name="startdate" value="" class="datepicker" required/>
              
              </td>
          	</tr>
        	<tr>
            	<td>End Date</td>
            	<td>
                 <input type="text" id="end_date2"  name="end_date" value="" class="datepicker" required/>
                </td>
            </tr>
            
            <tr>
            	<td></td>
            	<td><button type="submit" class="btn btn-primary text-uppercase" id="eventupdate" >Submit</button></td>
            </tr>
        </table>
       </form>
      </div>
    </div>
    </div>
  </div>
</div>
<script>$('.datepicker').datepicker();	</script>
</div>
<?php include("footer.php");?>
</body>