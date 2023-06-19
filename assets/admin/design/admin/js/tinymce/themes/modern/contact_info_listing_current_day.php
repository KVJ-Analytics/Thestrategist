<?php include("header.php"); ?>
<script>
function searchname(id1)
{
	var name=document.getElementById("name").value;
	var email=document.getElementById("email").value;
	var subject=document.getElementById("subject").value;
	
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function()
  	{
  		if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
    		document.getElementById("pdtajax").innerHTML=xmlhttp.responseText;
			//alert(xmlhttp.responseText);
    	}
  	}
	xmlhttp.open("GET","searchcontact.php?name="+name+'&email='+email+'&subject='+subject,true);
	xmlhttp.send();
}

</script>
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
              Today Enquiry Listings
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
                     Today Enquiry Listings Details
                    </header>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="pdtajax">
                            	<?php 
									
									$today=date('y-m-d');
									$today="20".$today;
									$stmt = $mysqli->prepare("select id,name,email,subject,msg from contact_info where date LIKE '$today%' ORDER BY date desc");
									$stmt->execute();
									$stmt->store_result();
									// get variables from result.
									$stmt->bind_result($id,$name,$email,$subject,$msg);
									$i=1;
									while($stmt->fetch()){
								?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $subject; ?></td>
                                <td><?php echo $msg; ?></td>
                                <td>
                                	<?php /*?><a href="view_contact_info.php?id=<?php echo $id; ?>"><button class="btn btn-success" type="button">Edit</button></a><?php */?> 
                                	<a href="delete_conatct_info.php?id=<?php echo $id; ?>"><button class="btn btn-danger" type="button">Delete</button></a>
                                </td>
                            </tr>
                            <?php $i=$i+1;}?>
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
