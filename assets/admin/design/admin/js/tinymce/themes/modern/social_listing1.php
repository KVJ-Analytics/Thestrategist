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
                Social Media Listing
            </h3>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Social Media Listing
                    </header>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Social Media Name</th>
                                <th>Social Media Url</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
							
							$layout_stmts = $mysqli->prepare("select id,name,url from social");
							$layout_stmts->execute();
							$layout_stmts->store_result();
							$layout_stmts->bind_result($id,$name,$url);
									$i=1;
									while($layout_stmts->fetch()){
							?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $url; ?></td>
                                <td><a href="edit_social.php?id=<?php echo $id; ?>"><button class="btn btn-success" type="button">Edit</button></a> 
                                	<a href="delete_social.php?id=<?php echo $id; ?>"><button class="btn btn-danger" type="button">Delete</button></a>
                                </td>
                            </tr>
                            <?php $i=$i+1;} ?>
                            </tbody>
                        </table>
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
