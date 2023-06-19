<div class="top_nav">
        	<div class="container">
            	<div class="row">
                	<div class="col-sm-4">
                    	<ul>
                        	<?php
						$soc=mysql_query("select * from social"); 
						while($soc1=mysql_fetch_array($soc))
						{
						?>
                        	<li><a href="<?php echo $soc1['url'];?>"><i class="<?php echo $soc1['class'];?>" aria-hidden="true"></i></a></li>
                           <?php
						}
						?>
                        </ul>
                    </div>
                    <div class="col-sm-8">
                    	<ul class="basic">
                        	<li><a href="#">( Tel ) <?php echo $basic['phone'];?> </a></li>
                            <li><a href="#"><?php echo $basic['email'];?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>