        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                       <h3>About : </h3>
                       <p>Precious Real Estate can create a plan to suit your needs and personality.  </p>
                    </div>
                    <div class="col-sm-4">
                       	<h3>Address :</h3>
                        <?php echo html_entity_decode($basic['address']);?>
                    </div>
                    <div class="col-sm-4">
                       	<h3>Contact : :</h3>
                        <p>Tel : <?php echo $basic['phone'];?><br /> E-mail : <?php echo $basic['email'];?></p>
                    </div>
                    
                </div>
            </div>
        </footer>
        <div class="footer_nav">
        	<div class="container">
            	<div class="row">
                	<div class="col-sm-12">
                    	<hr/>
                    </div>
                	<div class="col-sm-6">
                    	<p>© <?php echo date('y');?> precious. All Rights Reserved.</p>
                    </div>
                    <div class="col-sm-6">
                    	<ul class="social">
                        	<?php
						$soc=mysql_query("select * from social"); 
						while($soc1=mysql_fetch_array($soc))
						{
						?>
                                 <li><a href="<?php echo $soc1['url'];?>" target="_blank"><img src="<?php echo admin.'/'.$soc1['image'];?>" /></a></li>
                        <?php
						}
						?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>