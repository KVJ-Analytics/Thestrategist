<?php
$vid=$_GET['id'];
$menu=$_GET['menu'];
?>
<script language="javascript" type="text/javascript">
function deleteSettings(frm)
{
if(confirm('Do you want to delete this content'))
{
frm.elements['hid_action'].value="Delete";
document.frm.submit();
}
}
function Selectall(frm)
{
CheckBox_Count=frm.elements['CheckBox_Count'].value;
if(frm.elements['checkbox_selectall'].checked==true)
{
		for(var i=1;i<=CheckBox_Count;i++)
		{
		chk_Name="checkbox_"+i;
		frm.elements[chk_Name].checked=true;
		}
}
else
{
for(var i=1;i<=CheckBox_Count;i++)
		{
		chk_Name="checkbox_"+i;
		frm.elements[chk_Name].checked=false;
		}
}		
}
</script>

<body topmargin="0" leftmargin="0">
<table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#E2E2E2" style="border-collapse:collapse;">
  <tr>
    <td align="center" bgcolor="#F2F2F2" class="body_text"><strong>Sl No.</strong></td>
    <td align="center" bgcolor="#F2F2F2" class="body_text"><input type="checkbox" name="checkbox_selectall" id="checkbox_selectall" value="" onClick="javascript:Selectall(frm);"></td>
    <td align="center" bgcolor="#F2F2F2" class="body_text">&nbsp;</td>
    <td height="33" bgcolor="#F2F2F2" class="body_text"><strong>Username</strong></td>
    
  </tr>
  <?php
$count=0;
$db1 = new db();
$connection=$db1->dbCon();
$sql=$db1->selectquery("select * from login");
while($row=mysqli_fetch_array($sql))
{
$linkid=$row['id'];
if($i%2==0)
$color="#CCCCCC";
else
$color="#EAEAEA";
$i=$i+1;

?>
  <tr>
    <td width="52" align="center"><?php echo ++$count; ?></td>
    <td width="22" align="center"><input type="checkbox" name="checkbox_<?php echo $count; ?>" id="checkbox_<?php echo $count; ?>" value="<?php echo $linkid; ?>"></td>
    <td width="41" align="center"><a href="indexhome.php?menu=<?php echo $_GET['menu']; ?>&file=<?php echo $_GET['menu']; ?>/editsettings.php&ID=<?php echo $linkid; ?>&action=Edit"><img src="images/edit_icon.gif" alt="Edit" border="0"></a></td>
    <td width="310" height="25" align="left"><font face="Tahoma" class="admintext" style="font-size:12px">
    <?php echo $row['username']; ?>
    </font></td>
    
  </tr>
  
  <?php
		}
		 $db1->dbClose();
		?><input type="hidden" name="CheckBox_Count" id="CheckBox_Count" value="<?php echo $count; ?>" />
</table>
