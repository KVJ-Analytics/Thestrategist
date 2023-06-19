<?php session_start();
/*if($_SESSION['rlogin']!=1)
header('Location:'."index.php");*/?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Excel Videos</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/log.css">
	
  <style>
.round3 { 
      width: 300px;
    height: 100px;    
    padding: 50px;
    border: 1px solid red;
}
	

</style>

</head>

<body oncontextmenu="return false;" onLoad="disableClick()" class="img js-fullheight" style="background-image: url(images/1496410.jpg);">
<!--
<div align="center" style="padding-top:200px;">
<div class="col-sm-4"></div>

<div class="col-sm-4">-->
<?php if($_SESSION['login']==2)
{
	
	?><span style="color:#F00; font-weight:bold;">Invaid Username or Password</span>
    <?php
	$_SESSION['login']=0;
	unset($_SESSION['login']);
}
 if($_SESSION['login']==21)
{
	
	?><span style="color:#F00; font-weight:bold;">User Account was deactivated by the Admin .Please contact the admin for re activation !</span>
    <?php
	$_SESSION['login']=0;
	unset($_SESSION['login']);
}
if($_SESSION['login']==12)
{
	
	?><span style="color:#F00; font-weight:bold;">You are not activated the account.Please check the mail for activation link !</span>
    <?php
	$_SESSION['login']=0;
	unset($_SESSION['login']);
}
?>
<?php if($_SESSION['account']==1)
{
	
	?><span style="color:#F00; font-weight:bold;">Already Existing User.Login to user account</span>
    <?php
	$_SESSION['account']=0;
	unset($_SESSION['account']);
}
?>
<?php if($_SESSION['account']==2)
{
	
	?><span style="color:#32CD32; font-weight:bold;" >Registered Successfully! Check Your Mail for account activation link.</span>
    <?php
	$_SESSION['account']=0;
	unset($_SESSION['account']);
}
?>
<!-- Material form login -->
<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">The Strategist.co.in</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Login</h3>
		      	<form class="signin-form" action="logincode.php" method="post" enctype="multipart/form-data">
		      		<div class="form-group">
		      			<input type="email" class="form-control" id="Username" placeholder="Registered Mail" name="Username" required>
		      		</div>
	            <div class="form-group">
	              <input type="Password" class="form-control" id="Password" placeholder="Password" name="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-secondary submit px-3"  onclick="javascript:validatefrm();">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-success">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; <a href="index.php" class="px-2 py-2 mr-md-1 rounded">Or Sign In</a>&mdash;</p>
	          <!--<div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>-->
		      </div>
				</div>
			</div>
		</div>
	</section>
<script language="javascript">
		function validatefrm()
			{
			frm1.onsubmit=function(){	
				if(document.frm1.Username.value=="")
					{
						alert("Please Enter Your  Registered Mail");
						document.frm1.Username.focus();
						return false;
					}
					
					if(document.frm1.Password.value=="")
					{
						alert("Please Enter Your Password ");
						document.frm1.Password.focus();
						return false;
					}

				
				<?php /*?>if(document.frm1.Name.value=="")
					{
						alert("Please Enter Your Name");
						document.frm1.Name.focus();
						return false;
					}
					
					if(document.frm1.email.value=="")
					{
						alert("Please Enter Your Email");
						document.frm1.email.focus();
						return false;
					}
				if(!emailCheck(document.frm1.email.value))
					{
						alert("Invalid E-mail Address! Please re-enter.")
						document.frm1.email.focus();
						return false;
					}
					
					
					
		    if(document.getElementById('Phoneno').value.length>1)
		   {
			   var mob = /^[1-9]{1}[0-9]{9}$/;
				var txtMobile = document.getElementById('Phoneno');
				if (mob.test(txtMobile.value) == false) 
				{
    			alert("Please enter valid mobile number.");
    			document.getElementById('Phoneno').focus();
    			return false;
				}
			}
					
					
					 if(document.getElementById('Phoneno').value.length<1)
		  {
			  alert("Please Enter Your Mobile Number");
			  document.getElementById('Phoneno').focus();
			  return false;
			  
		  }	<?php */?>
					
						
				
				<?php /*?>
				if(document.frm1.txtaddress1.value=="")
					{
						alert("Please Enter Your Address");
						document.frm1.txtaddress1.focus();
						return false;
					}
					
					if(document.frm1.txtaddress2.value=="")
					{
						alert("Please Enter Your Address");
						document.frm1.txtaddress2.focus();
						return false;
					}
				
				
				if(document.frm1.country.value=="")
					{
						alert("Please Enter Your Country");
						document.frm1.country.focus();
						return false;
					}							
						return true();<?php */?>
			}
			}
			
				<?php /*?>function emailCheck(value)
					{
						if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value))
							{
						  		return (true);
							}
							else
							{
								return (false);
							}
					}<?php */?>
	</script>

<?php /*?><script language="javascript" type="application/javascript">
function validate()
{
		alert("Invalid Login Details");
	
}
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
     return false;
    }      
 }
    </script><?php */?>
</body>
</html>
