<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Excel Videos</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
  <style>
.round3 { 
      width: 300px;
    height: 100px;    
    padding: 50px;
    border: 1px solid red;
}
	

</style>

</head>

<body oncontextmenu="return false;" onLoad="disableClick()">

<div align="center" style="padding-top:200px;">
<div class="col-sm-4"></div>

<div class="col-sm-4">
<?php /*?><?php if($_SESSION['login']==2)
{
	
	?><span style="color:#F00; font-weight:bold;">Invaid Username or Password</span>
    <?php
	$_SESSION['login']=0;
	unset($_SESSION['login']);
}
?><?php */?>

<!-- Material form login -->
<div class="card">

  <h5 class="card-header info-color white-text text-center py-4 ">
    <strong>REGISTRATION</strong>
  </h5>
<br/><br/>
  <!--Card content-->
  <div class="card-body px-lg-5 pt-0"  style="padding-bottom:10px;">

    <!-- Form -->
    <form class="text-center" form name="frm1"style="color: #757575;"action="action.php" method="post" enctype="multipart/form-data">

      <!-- Email -->
   <?php /*?>
    <div class="form-group">
      <label class="control-label col-sm-3" style="padding:14px;" for="Username">Username:</label>
      <div class="col-sm-9" style="padding:14px;">
        <input type="text" class="form-control" id="Username" placeholder="Username" name="Username">
      </div>
      
      <div class="form-group">
      <label class="control-label col-sm-3" style="padding:14px;" for="Password">Password:</label>
      <div class="col-sm-9"style="padding:14px;">
        <input type="Password" class="form-control" id="Password" placeholder="Password" name="Password">
      </div><?php */?>
     
      
      <div class="form-group">
      <label class="control-label col-sm-3" style="padding:14px;" for="Name">Name:</label>
      <div class="col-sm-9"style="padding:14px;">
        <input type="text" class="form-control" id="Name" placeholder="Name" name="Name">
      </div>
      
      
      <div class="form-group">
      <label class="control-label col-sm-3" style="padding:14px; "for="email">Email:</label>
      <div class="col-sm-9"style="padding:14px;">
        <input type="text" class="form-control" id="email" placeholder=" Email" name="email">
      </div>
      
      
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3"style="padding:14px;" for="Phoneno">Phone no:</label>
      <div class="col-sm-9"style="padding:14px;">          
        <input type="text" class="form-control" id="Phoneno" placeholder="Phone no" name="Phoneno">
      </div>
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10"style="padding:19px">
        <button type="submit" class="btn btn-default" onclick="javascript:validatefrm();">Submit </button>
      </div>
    </div>
    
    <!-- Form -->

  </div>

</div>

</form>
</div>
</div>
<script language="javascript">
		function validatefrm()
			{
			frm1.onsubmit=function(){	
				<?php /*?>if(document.frm1.Username.value=="")
					{
						alert("Please Enter Your  Username");
						document.frm1.Username.focus();
						return false;
					}
					
					if(document.frm1.Password.value=="")
					{
						alert("Please Enter Your Password ");
						document.frm1.Password.focus();
						return false;
					}<?php */?>
				
				if(document.frm1.Name.value=="")
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
			  
		  }	
					
						
				
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
			
				function emailCheck(value)
					{
						if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value))
							{
						  		return (true);
							}
							else
							{
								return (false);
							}
					}
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
