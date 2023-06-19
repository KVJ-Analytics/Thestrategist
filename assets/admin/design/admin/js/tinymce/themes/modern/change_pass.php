<?php include("header_user.php"); ?>
<script>

       function myFunction() {

	  

        var pass1 = document.getElementById("password").value;

        var p = document.getElementById("confirm_password").value;

	    var pass = document.getElementById("username").value;

        var passw = document.getElementById("hid").value;

        

		 if (pass != passw) {

           

            document.getElementById("mydiv1").innerHTML= "Sorry.........Your existing username do not match";

          

		   return false;

		   

        }

		 if (p.length < 6) {

       document.getElementById("mydiv").innerHTML= "Passwords must be at least 6 characters long.  Please try again"; 

        return false;

    }

	

 var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 

    if (!re.test(p)) {

	 document.getElementById("mydiv").innerHTML= "Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again"; 

       

        return false;

    }

	

	if (pass1 != p) {

            //alert("Passwords Do not match");

            document.getElementById("mydiv").innerHTML= "Sorry.........Your password and confirmation do not match. Please try again";

           // document.getElementById("pass2").style.borderColor = "#E34234";

		   return false;

		           }

			//alert("hi");

			

    document.getElementById("hh").value = hex_sha512(pass1);



   /* p.value = "";

    conf.value = "";*/



    form.submit();

    return true;

       

    }

</script>
<body class="skin-blue fixed sidebar-mini">
	<div class="wrapper">
  		<?php include("side_header.php"); ?>
  		<!-- =============================================== -->
        <?php include("menu.php"); ?>
  		<!-- =============================================== -->
  		<div class="content-wrapper">
  			<section class="col-lg-12">
    			<div class="content-area">
                	<div class="col-md-12">
                    	<h2><i class="fa fa-file-text-o"></i> Change Password</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                
                <div class="content-area">
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="change_password_action.php" name="myform" enctype="multipart/form-data" >

                    	<input type="hidden" id="hid" name="hid" value="<?php echo $_SESSION['username']; ?>"/>

                        <input type="hidden" id="hh" name="hh" value=""/>

                        <div class="form-group ">

                          	<label for="cname" class="control-label col-lg-2">Username</label>

                            <div class="col-lg-10">

                            	<input class=" form-control" id="username" name="username" minlength="2" type="text" value="<?php echo $_SESSION['username']; ?>"  />

                                 <label id="mydiv1" style="color:#FF0000"></label>

                            </div>

                       	</div>

        

                        <div class="form-group ">

                          	<label for="cname" class="control-label col-lg-2">Password</label>

                            <div class="col-lg-10">

                            	<input class=" form-control" id="password" name="password" type="password" required />

                            </div>

                       	</div>

                  

                         <div class="form-group ">

                          	<label for="cname" class="control-label col-lg-2">Confirm Password</label>

                            <div class="col-lg-10">

                            	<input class=" form-control" id="confirm_password" name="confirm_password"  type="password" required />

                                <label id="mydiv" style="color:#FF0000"></label>

                            </div>

                       	</div>

                     

                        <div class="form-group">

                        	<div class="col-lg-offset-2 col-lg-10">

                            	<button class="btn btn-primary" type="submit" onClick="return myFunction()">Save</button>

                          	</div>

                        </div>

                  	</form>
                    <div class="clearfix"></div>
                </div>
    		</section>
            <div class="clearfix"></div>
  		</div>
        <?php include("footer.php");?>
</body>
</html>
