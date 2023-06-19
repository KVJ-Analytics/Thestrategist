
      <h3>Filter Results</h3>      
    <div  style="float:right; width:auto; margin-bottom:10px; margin-right:20px;"><!--<a class="btn btn-success" href="indexhome.php?file=<?php echo base64_encode(base64_decode($_GET['menu'])."/addsettings.php"); ?>&menu=<?php echo $_GET['menu']; ?>">
                <i class="glyphicon glyphicon-plus icon-white"></i>
                Add
            </a>-->
            <a class="btn btn-success" href="indexhome.php?file=<?php echo base64_encode(base64_decode($_GET['menu'])."/all_history.php"); ?>&menu=<?php echo $_GET['menu']; ?>">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View All
            </a>
            </div>
            
    <div  style="/*float:right;*/ width:100%; margin-bottom:10px; margin-right:20px;">
        <!--<a class="btn btn-success" href="indexhome.php?file=<?php echo base64_encode(base64_decode($_GET['menu'])."/addsettings.php"); ?>&menu=<?php echo $_GET['menu']; ?>">
                <i class="glyphicon glyphicon-plus icon-white"></i>
                Add
            </a>-->
            <select class="form-control" name="shours" id="scollege" style="float:left;width:12%;margin-right:2%;margin-bottom:2%;">
                <option ="00">Select College</option>
                 <?php

	$db1c 	= 	new Database();
	$stmt=$db1c->query('select * from colleges');	
	$rowsc = $db1c->resultset();
//	print_r($rows);
		$db1c->dbclose();
	foreach($rowsc as $result0)
	{
	
	//	$category_id=$result0['name'];
	//	$exm=$result0['category_id'];
		
	?>
                <option value="<?php echo $result0['id']; ?>"><?php echo $result0['college']; ?> </option>
                <?php
                }
                ?>
            </select>
            
            <input style="float:left;width:25%;margin-right:2%;margin-bottom:2%;" class="form-control" type="text" onfocus="this.type='date'" name="start_date" id="start_date" placeholder="Start Date" />
            <select class="form-control" name="shours" id="shours" style="float:left;width:12%;margin-right:2%;margin-bottom:2%;">
                <option ="00">Hours</option>
                <?php
                for($i=1;$i<25;$i++)
                {
                ?>
                <option ="<?php echo $i; ?>"><?php echo $i; ?> </option>
                <?php
                }
                ?>
            </select>
               <select class="form-control" name="smin" id="smin" style="float:left;width:12%;margin-right:2%;margin-bottom:2%;">
                <option ="00">Minutes</option>
                <?php
                for($i=1;$i<61;$i++)
                {
                ?>
                <option ="<?php echo $i; ?>"><?php echo $i; ?> </option>
                <?php
                }
                ?>
            </select>
            <select class="form-control" name="ssec" id="ssec" style="float:left;width:17%;margin-right:2%;margin-bottom:2%;">
                <option ="00">Seconds</option>
                <?php
                for($j=1;$j<61;$j++)
                {
                ?>
                <option ="<?php echo $j; ?>"><?php echo $j; ?> </option>
                <?php
                }
                ?>
            </select>
            <br/><br/>
            <input style="float:left;width:25%;margin-right:2%;margin-bottom:2%;" class="form-control" type="text" onfocus="this.type='date'" name="end_date" id="end_date" placeholder="End Date" />
            <select class="form-control" name="enhours" id="enhours" style="float:left;width:12%;margin-right:2%;margin-bottom:2%;">
                <option ="00">Hours</option>
                <?php
                for($i=1;$i<25;$i++)
                {
                ?>
                <option ="<?php echo $i; ?>"><?php echo $i; ?> </option>
                <?php
                }
                ?>
            </select>
             <select class="form-control" name="enmin" id="enmin" style="float:left;width:12%;margin-right:2%;margin-bottom:2%;">
                <option ="00">Minutes</option>
                <?php
                for($i=1;$i<61;$i++)
                {
                ?>
                <option ="<?php echo $i; ?>"><?php echo $i; ?> </option>
                <?php
                }
                ?>
            </select>
             <select class="form-control" name="ensec" id="ensec" style="float:left;width:17%;margin-right:2%;margin-bottom:2%;">
                <option ="00">Seconds</option>
                <?php
                for($i=1;$i<61;$i++)
                {
                ?>
                <option ="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                }
                ?>
            </select>
            
            <a style="float:left;" id="search1" class="btn btn-success" href="#" onclick="get_all_indates()">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Search
            </a>
            </div>