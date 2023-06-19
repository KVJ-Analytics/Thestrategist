<table id="Table_" width="100%" height="74" border="0" cellpadding="0" cellspacing="0">
<tr>
        <td width="31" height="22"><img src="images/ThalasseryCorporate_InnerBox_01.gif" width="31" height="22" alt=""></td>
        <td width="1233" style="background:url(images/ThalasseryCorporate_InnerBox_02.gif); background-repeat:repeat-x;"></td>
    <td width="28"><img src="images/ThalasseryCorporate_InnerBox_04.gif" width="28" height="22" alt=""></td>
  </tr>
      <tr>
        <td style="background:url(images/ThalasseryCorporate_InnerBox_05.gif); background-repeat:repeat-y;"></td>
        <td><table width="100%" border="0">
          <tr>
            <td width="18%"><table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td><img src="menu_order/<?php echo $_GET['menu'];?>/images/connection.jpg" alt="Blood Group"/></td>
                  <td>
                  <?php if($_GET['action']=="New")
				  echo "<img src=\"images/New_inner.jpg\" alt=New />";
				  else if ($_GET['action']=="Edit")
				  echo "<img src=\"images/Edit_inner.jpg\" alt=Edit />";
				  else
				  echo "<img src=\"images/View_inner.jpg\" alt=View />";
				  ?>
                  </td>
              </tr>
              </table></td>
            <td width="82%" align="right"><table border="0">
              <tr>
               
                <td>
                
                </td>
                <td>
                <?php
                if($_GET['action']=="Edit")
				{
				?>
                <a href="#" onClick="validateForm(frm)"><img src="images/ThalasseryCorporate_Edit.gif" width="92" height="73" border="0" /></a>
                 <?php
                }
				?><input id="hid_action" name="hid_action" type="hidden" />
                </td>
                <td><a href="#" onClick="deleteSettings(frm)"><img src="images/ThalasseryCorporate_Delete.gif" alt="Delete" width="91" height="73" border="0" /></a></td>
				
                <td><a href="indexhome.php?menu=<?php echo $_GET['menu']; ?>&file=<?php echo $_GET['menu']; ?>/index.php"><img src="images/ThalasseryCorporate_Close.gif" alt="Help" width="92" height="73" border="0" /></a></td>
                <td><img src="images/ThalasseryCorporate_Help.gif" alt="Help" width="92" height="73" /></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td style="background:url(images/ThalasseryCorporate_InnerBox_08.gif); background-repeat:repeat-y;">&nbsp;</td>
      </tr>
      <tr>
        <td height="22"><img src="images/ThalasseryCorporate_InnerBox_09.gif" width="31" height="22" alt=""></td>
        <td style="background:url(images/ThalasseryCorporate_InnerBox_10.gif); background-repeat:repeat-x;">&nbsp;</td>
        <td><img src="images/ThalasseryCorporate_InnerBox_12.gif" width="28" height="22" alt=""></td>
      </tr>
    </table>
