


<form action="menu_order/<?php echo $_GET['menu'];?>/action_code.php?menu=<?php echo $_GET['menu'];?>&action=Add" method="post" enctype="multipart/form-data" name="frm" id="frm">
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
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> <?php include("$f_pathdg"); ?></h2>

                
            </div>
            <div class="box-content row"><?php include("all_history.php"); ?>
                <div class="col-lg-7 col-md-12">
                   
                </div>
                

            </div>
        </div>
    </div>
</div>
</form>

