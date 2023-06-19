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
                        <label>Exam name</label>
                        <input type="text" id="txtCategory" name="txtexam" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" id="txtCategory" name="txtusername" required="required" class="form-control">
                    </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="txtCategory" name="txtpassword" required="required" class="form-control">
                    </div>
                     <input type="hidden" name="hid_action" id="hid_action" value="Add" />
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->





















