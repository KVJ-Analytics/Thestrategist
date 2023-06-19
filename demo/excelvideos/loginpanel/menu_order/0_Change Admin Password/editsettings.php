<?php  
$menu=$_GET['menu'];
$linkid=$_GET['ID'];
?>

<script type="text/javascript" language="javascript">
	function validateForm(frm)
	{
	     		if(frm.elements['txt_username'].value.length <1)
	 		{
 				alert("You cannot leave the  Caption field empty");
				frm.elements['txt_username'].focus();
 				return false;
 			}
			frm.elements['hid_action'].value="Update";
		document.frm.submit();

	}
</script>

<body topmargin="0" leftmargin="0">
<form action="menu_order/<?php echo $_GET['menu'];?>/action_code.php?menu=<?php echo $_GET['menu'];?>&action=Update&ID=<?php echo $linkid;?>&pass=<?php echo $p;?>" method="post" enctype="multipart/form-data" name="frm" id="frm">
  <table width="100%" border="0">
  <?php
  $linkid=$_GET['ID'];
  $db = new db();
  $connection=$db->dbCon();
  $sql=$db->selectquery("select * from login where id='$linkid'");
  while($row=mysqli_fetch_array($sql))
  {
  $u=$row['username'];
   $p=$row['pwd'];
   $pa=decode_array($p);
   ?>
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
        <td width="31" height="22" align="right"><img src="images/InnerBox_01.gif" width="31" height="22" alt=""></td>
        <td width="1252" style="background:url(images/ThalasseryCorporate_InnerBox_02.gif); background-repeat:repeat-x;"></td>
        <td width="28"><img src="images/ThalasseryCorporate_InnerBox_04.gif" width="28" height="22" alt=""></td>
      </tr>
      <tr>
        <td style="background:url(images/ThalasseryCorporate_InnerBox_05.gif); background-repeat:repeat-y; background-position:right;"></td>
        <td><table width="100%" height="185" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="10" height="152"><input type="hidden" name="download_id" id="download_id" value="<?php echo $linkid; ?>" /></td>
            <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td height="41" align="left" valign="middle" class="body_text"><table width="100%" border="0" cellpadding="8">
                    <tr>
                      <td width="21%" >Username</td>
                      <td><label for="textfield"></label>
                        <input type="text" name="txt_username" id="txt_username" value="<?php echo $u;?>"/></td>
                    </tr>
                    <tr>
                      <td width="21%">Old Password</td> 
                      <td><input  name="txt_oldpassword" id="txt_oldpassword" type="password"  /></td>
                      </tr>
                      <tr>
                      <td width="21%">New Password</td> 
                      <td><input  name="txt_newpassword" id="txt_newpassword" type="password"/></td>
                      </tr>
                      <tr>
                      <td width="21%">Confirm Password</td> 
                      <td><input  name="txt_confirmpassword" id="txt_confirmpassword" type="password"/></td>
                      </tr> 
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
		  <?php } $db->dbClose();  ?>
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
</body>
</html>

