<?php 
$menu=$_GET['menu'];
?>
<?php include("datepicker.php"); ?>
<script>
$(function() {
$( "#txtClosingDate" ).datepicker({ dateFormat: "dd/mm/yy" }).val();
});
</script>
<script language="javascript" type="text/javascript">

	function validate()
	{
		frm.onsubmit=function()
		{
			
		if(document.getElementById('txtOldPassword').value=="")
		{
			alert("Old Password is required!");
			document.getElementById('txtOldPassword').focus();
			return false;
		}
		if(document.getElementById('txtnewPassword').value=="")
		{
			alert("New Password is required!");
			document.getElementById('txtnewPassword').focus();
			return false;
		}
		
		if(document.getElementById('txtnewPassword').value=="")
		{
			alert("Confirm Password is required!");
			document.getElementById('txtnewPassword').focus();
			return false;
		}
		if(document.getElementById('txtnewPassword').value!=document.getElementById('txtCPassword').value)
		{
			alert("Password not match!");
			document.getElementById('txtnewPassword').focus();
			return false;
		}
		
		
		}
	}
</script>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#"><?php include("$f_pathdg"); ?></a>
        </li>
    </ul>
</div>   
<?php if(base64_decode(strip_tags($_GET['fl']))==2)
{
	?><div align="center" style="font-weight:bold; color:#F00">Password changed successfully.</div>
    <?php
}
else  if(base64_decode(strip_tags($_GET['fl']))==1)
{?><div align="center" style="font-weight:bold; color:#F00">Cannot change Password.</div>
    <?php
}
?>
               
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-plus"></i> <?php include("$f_pathdg"); ?></h2>

               
            </div>
            <div class="box-content">
    <?php
 $admintoken=hash("md5",rand().time().rand());
  $_SESSION['admintoken']=$admintoken;
?>          
                <form action="menu_order/<?php echo base64_decode($_GET['menu']);?>/action_code.php?menu=<?php echo $_GET['menu'];?>" method="post" enctype="multipart/form-data" name="frm" id="frm">
                 <input type="hidden" name="admintoken" value="<?php echo $admintoken;?>"/>  
                  <div class="form-group">
                        <label>Old Password</label>
                        <input type="password"   class="form-control" id="txtOldPassword" name="txtOldPassword" placeholder="Old Password" required  style="width:200px;"/>
                    </div>
                  <div class="form-group">
                        <label>New Password</label>
                        <input type="password"   class="form-control" id="txtnewPassword" name="txtnewPassword" placeholder="New Password" required  style="width:200px;"/>
                    </div>
                   
                   <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password"   class="form-control" id="txtCPassword" name="txtCPassword" placeholder="Confirm Password" required  style="width:200px;"/>
                    </div>
                  
                   <input type="hidden" name="hid_action" id="hid_action" value="Update" />
               <button type="submit" class="btn btn-info" onclick="javascript:validate();">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->





















