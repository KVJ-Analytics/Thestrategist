<?php include("header.php"); ?>
<body class="sticky-header">

<section>
    <!-- left side start-->
    <?php include("menu.php"); ?>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <?php include("user_info.php"); ?>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
               Choose Year and Month
            </h3>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <section class="wrapper">
        <!-- page start-->
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                 Choose Year and Month
            </header>
			<div class="panel-body">
            	<div class=" form">
                	<form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="contact_info_year.php" name="myform" enctype="multipart/form-data">
                    	<div class="form-group ">
                          	<label for="cname" class="control-label col-lg-2">Choose Year</label>
                            <div class="col-lg-10">
                            	<select name="year">
                                	<?php for($i=2015;$i<2050;$i++){ ?>
                                    	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                       	</div> 
                        
                        <div class="form-group ">
                          	<label for="cname" class="control-label col-lg-2">Choose Month</label>
                            <div class="col-lg-10">
                            	<select name="month">
                                	<option value="01">Jan</option>
                                    <option value="02">FEB</option>
                                    <option value="03">MAR</option>
                                    <option value="04">APR</option>
                                    <option value="05">MAY</option>
                                    <option value="06">JUNE</option>
                                    <option value="07">JULY</option>
                                    <option value="08">AUG</option>
                                    <option value="09">SEP</option>
                                    <option value="10">OCT</option>
                                    <option value="11">NOV</option>
                                    <option value="12">DEC</option>
                                </select>
                            </div>
                       	</div>
                        
                        <div class="form-group">
                        	<div class="col-lg-offset-2 col-lg-10">
                            	<button class="btn btn-primary" type="submit">Save</button>
                          	</div>
                        </div>
                  	</form>
         		</div>
  			</div>
        </section>
        </div>
        </div>
        
        <!-- page end-->
        </section>
        <!--body wrapper end-->

        <!--footer section start-->
        <?php include("footer.php"); ?>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>

<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src="js/validation-init.js"></script>
<!--common scripts for all pages-->
<script src="js/scripts.js"></script>

<script type="text/javascript" src="js/bootstrap-fileupload.min.js"></script>

</body>
</html>
