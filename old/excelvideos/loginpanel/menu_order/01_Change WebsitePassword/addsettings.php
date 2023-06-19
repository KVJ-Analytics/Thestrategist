<?php 
$menu=$_GET['menu'];
?>
<script type="text/javascript" language="javascript">
	function validateForm(frm)
	{
				if(frm.elements['txt_username'].value.length <1)
	 		{
 				alert("You cannot leave the  Username field empty");
				frm.elements['txt_username'].focus();
 				return false;
 			}
			if(frm.elements['txt_oldpassword'].value.length <1)
	 		{
 				alert("You cannot leave the  oldpassword field empty");
				frm.elements['txt_oldpassword'].focus();
 				return false;
 			}
			if(frm.elements['txt_oldpassword'].value.length <1)
	 		{
 				alert("You cannot leave the  oldpassword field empty");
				frm.elements['txt_oldpassword'].focus();
 				return false;
 			}
			
			if(frm.elements['txt_confirmpassword'].value.length <1)
	 		{
 				alert("You cannot leave the  confirmpassword field empty");
				frm.elements['txt_confirmpassword'].focus();
 				return false;
 			}
			<?php
			$db = new db();
            $connection=$db->dbCon();
			$sql=$db->selectquery("CALL Select_AllTableData_nolimit('test_prefixlogin','','')");
			while($row=mysqli_fetch_array($sql))
			{
			
			$head1=$row['uid'];
			?>
			if(frm.elements['txt_username'].value=="<?php echo $head1; ?>")
				{
					alert("Username already exist. Please enter another one");
					frm.elements['txt_username'].focus();
					return false;
				}
			<?php
			
			}
			$db->dbClose()
			?>	
			frm.elements['hid_action'].value="Add";
			document.frm.submit();

	}
	
</script>

<form action="menu_order/<?php echo $_GET['menu'];?>/action_code.php?menu=<?php echo $_GET['menu'];?>&action=Add" method="post" enctype="multipart/form-data" name="frm" id="frm">
  <table width="100%" border="0">
  <tr>
    <td><span style="background-image:url(images/news_menu.jpg);background-repeat:no-repeat">
      <?php include("topmenu.php");?>
    </span></td>
  </tr>
  <tr>
    <td valign="top"><?php include("displayaction_msg.php");?></td>
    </tr>
  <tr>
    <td width="50%" valign="top"><table id="Table_" width="100%" height="74" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="31" height="22" align="right"><img src="images/ThalasseryCorporate_InnerBox_01.gif" width="31" height="22" alt=""></td>
        <td width="1252" style="background:url(images/ThalasseryCorporate_InnerBox_02.gif); background-repeat:repeat-x;"></td>
        <td width="28"><img src="images/ThalasseryCorporate_InnerBox_04.gif" width="28" height="22" alt=""></td>
      </tr>
      <tr>
        <td style="background:url(images/ThalasseryCorporate_InnerBox_05.gif); background-repeat:repeat-y; background-position:right;"></td>
        <td><table width="100%" height="185" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="10" height="152">&nbsp;</td>
            <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td height="41" align="left" valign="middle" class="body_text"><table width="100%" border="0" cellpadding="8">
                    
                    
                    
                    
                    <tr>
                      <td width="21%" >Username</td>
                      <td><label for="textfield"></label>
                        <input type="text" name="txt_username" id="txt_username" /></td>
                    </tr>
                    <tr>
                      <td width="21%"> Password</td> 
                      <td><input type="text" name="txt_oldpassword" id="txt_oldpassword" /></td>
                      </tr>
                    
                      <tr>
                      <td width="21%">Confirm Password</td> 
                      <td><input type="text" name="txt_confirmpassword" id="txt_confirmpassword" /></td>
                      </tr>
                     
					  <tr>                      </tr>
                    
                  </table></td>
                  </tr>
                <tr>
                  <td height="41" align="left" valign="middle" class="body_text"></td>
                  </tr>
                
            </table></td>
            <td width="15">&nbsp;</td>
          </tr>
          <tr>
            <td height="29">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td style="background:url(images/ThalasseryCorporate_InnerBox_08.gif); background-repeat:repeat-y;">&nbsp;</td>
      </tr>
      <tr>
        <td height="22" align="right"><img src="images/ThalasseryCorporate_InnerBox_09.gif" width="31" height="22" alt=""></td>
        <td style="background:url(images/ThalasseryCorporate_InnerBox_10.gif); background-repeat:repeat-x;">&nbsp;</td>
        <td><img src="images/ThalasseryCorporate_InnerBox_12.gif" width="28" height="22" alt=""></td>
      </tr>
    </table></td>
    </tr>
</table>
</form>

