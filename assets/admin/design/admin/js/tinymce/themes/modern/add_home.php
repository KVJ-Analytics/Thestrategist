<?php include("header.php"); ?>
<body class="skin-blue fixed sidebar-mini">
	<div class="wrapper">
  		<?php include("side_header.php"); ?>
  		<!-- =============================================== -->
        <?php include("menu.php"); ?>
  		<!-- =============================================== -->
  		<div class="content-wrapper">
  			<section class="col-lg-12">
    			<div class="content-area">
                	<div class="col-md-12">
                    	<h2><i class="fa fa-file-text-o"></i> Add About Contents</h2>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                 <?php 
		
							$layout_stmts = $mysqli->prepare("select btone,bmone,bdone,bttwo,bmtwo,bdtwo,btthree,bmthree,bdthree from home");

							$layout_stmts->execute();

							$layout_stmts->store_result();

							$layout_stmts->bind_result($btone,$bmone,$bdone,$bttwo,$bmtwo,$bdtwo,$btthree,$bmthree,$bdthree);

							$layout_stmts->fetch();

				 ?>
                <div class="content-area">
               <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="add_home_action.php" name="myform" enctype="multipart/form-data">
                            <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['user_id'];?>"/>
                	<div class="col-md-12">                                                                       
                        <div class="col-sm-12">
                        	<div class="form-wrap">
                            	<div class="form-wrap-title">
                                	<h3>About us  Contents</h3>
                                </div>
                                <div class="form-wrap-body form-tbl">
                                <table>
                                        <tr>
                                        	<td>Bottom Title1</td>
                                            <td>:</td>
                                            <td><input type="text" name="btone"  value="<?php echo $btone;?>"/></td>
                                        </tr>
                                        <tr>
                                        	<td width="15%">Bottom Image1</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file" data-default-file="<?php echo $bmone; ?>" id="input-file-now-custom-2" class="dropify" data-height="150" name="file"  /></td>
                                        </tr>
                                        <tr>
                                        	<td>Bottom  Desciption1</td>
                                            <td>:</td>
                                            <td><textarea id="mytextarea1"  name="bdone" ><?php echo html_entity_decode($bdone);?></textarea></td>
                                        </tr>
                                         <tr>
                                        	<td>Bottom Title2</td>
                                            <td>:</td>
                                            <td><input type="text" name="bttwo"  value="<?php echo $bttwo;?>"/></td>
                                        </tr>
                                        <tr>
                                        	<td width="15%">Bottom Image2</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file" data-default-file="<?php echo $bmtwo; ?>" id="input-file-now-custom-2" class="dropify" data-height="150" name="file1"  /></td>
                                        </tr>
                                        <tr>
                                        	<td>Bottom  Desciption2</td>
                                            <td>:</td>
                                            <td><textarea id="mytextarea2"  name="bdtwo" ><?php echo html_entity_decode($bdtwo);?></textarea></td>
                                        </tr>
                                         <tr>
                                        	<td>Bottom Title3</td>
                                            <td>:</td>
                                            <td><input type="text" name="btthree"  value="<?php echo $btthree;?>"/></td>
                                        </tr>
                                        <tr>
                                        	<td width="15%">Bottom Image3</td>
                                            <td width="5%">:</td>
                                            <td width="80%"><input type="file" data-default-file="<?php echo $bmthree; ?>" id="input-file-now-custom-2" class="dropify" data-height="150" name="file2"  /></td>
                                        </tr>
                                        <tr>
                                        	<td>Bottom  Desciption3</td>
                                            <td>:</td>
                                            <td><textarea id="mytextarea3"  name="bdthree" ><?php echo html_entity_decode($bdthree);?></textarea></td>
                                        </tr>
                                       
                                                                         
                                </table>
                                   
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-12 submit-form">
                        	<ul>
                            	<li><input type="submit" name="submit" value="Update" /></li>
                                <li><input type="button" name="submit" value="Reset" class="reset-btn" /></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                   </form>
                    <div class="clearfix"></div>
                </div>
    		</section>
            <div class="clearfix"></div>
  		</div>
        <?php include("footer.php");?>
</body>
</html>
