<?php
if($_GET['action']=="Add" ||$_GET['action']=="Update" || $_GET['action']=="Delete" )
{
?><table width="100%" border="0">
        <tr>
          <td width="27">&nbsp;</td>
          <td width="32"><img src="images/message.jpg" alt="Message"></td>
          <td width="542"><?php 
		  
		  if($_GET['action']=="Add")
		echo "<img src='images/ok.png' /><span class='body_text_msg'>&nbsp;Dynamic Content Added Successfully</span>";
		?>
                      <?php if($_GET['action']=="Update")
		echo "<img src='images/ok.png' /><span class='body_text_msg'>&nbsp;Dynamic Content Updated Successfully</span>";
		?>
                      <?php if($_GET['action']=="Delete")
		echo "<img src='images/ok.png' /><span class='body_text_msg'>&nbsp;Dynamic Content Deleted Successfully</span>";
		?></td>
        </tr>
      </table>
      <?php
	  }
	  ?>