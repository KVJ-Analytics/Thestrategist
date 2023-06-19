<?php 
$menu=$_GET['menu'];
?>


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

<?php include("topmenu.php"); ?>
               
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-plus"></i> Add <?php include("$f_pathdg"); ?></h2>

               
            </div>
            <div class="box-content">
               <?php
 $admintoken=hash("md5",rand().time().rand());
  $_SESSION['admintoken']=$admintoken;
?>    
            <div class="box-content">
                <form action="menu_order/<?php echo base64_decode($menu);?>/action_code.php?menu=<?php echo $_GET['menu'];?>&action=Add" method="post" enctype="multipart/form-data" name="frm" id="frm">
<input type="hidden" name="admintoken" value="<?php echo $admintoken;?>"/>

                   <div class="form-group">
                        <label>College name</label>
                        <input type="text" id="txtCategory" name="txtcollege" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                       <select name="txtstatus" required="required" class="form-control">
                           <option value=" ">
                               Select
                           </option>
                           <option value="1">
                               Enable
                           </option>
                           <option value="0">
                               Disable
                           </option>
                       </select>
                    </div>
                    
                     <input type="hidden" name="hid_action" id="hid_action" value="Add" />
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->





















