  <?php					

					$sqla="select * from property_details where hot=1 order by id desc limit 0,9";

			 		$prop=mysql_query($sqla);

					while($raw=mysql_fetch_array($prop))								

					{

						$proid=$raw['id'];

						

						$sqla1=mysql_query("select image_name from pro_images where pro_id='$proid'");

			 			while($raw1=mysql_fetch_array($sqla1))								

							{

								$image1=$raw1['image_name'];

							}

						

						$properties[]=array('imagenew'=>$image1,

											'property_title'=>$raw['Property_name'],

											'price'=>$raw['Price'],

											'Property_type'=>$raw['Property_type'],

											'property_desc'=>$raw['property_desc'],

											'size'=>$raw['size'],

											'met'=>$raw['met'],

											'Bathroom'=>$raw['Bathroom'],

											'Bedroom'=>$raw['Bedroom'],

											'id'=>$raw['id'],
											'city'=>$raw['City']);

					}

				//	echo "<pre>"; print_r($properties);exit();

					?>

<div class="content_wrapper plist">
        	<div class="container">
            	<div class="row">
                	<div class="col-sm-12">
                    	<h2>Recent Properties</h2> 
                        <div class="property_items">
                       

                        <?php

						for($i=0;$i<sizeof($properties);$i++)

						{

						?>
								 <form method="POST" action="details.php" name="myform">

       							<input type="hidden" name="myValue" value="" id="myValue"/>
                        	<div class="propery_box">
                            	<a href="#" class="item_type">Rent</a>
                            	   <a href="details.php?myValue=<?php echo $properties[$i]['id']; ?>"  title="<?php echo $properties[$i]['property_title'];?>"> <img src="<?php echo admin.'/'.$properties[$i]['imagenew'];?>" width="100%" /></a>
                                <div class="property_detail">
                                	<div class="row">
                                    	<div class="col-xs-4">
                                        	<p><i class="fa fa-building-o" aria-hidden="true"></i> <?php echo $properties[$i]['size'].' '.$properties[$i]['met'];?></p>
                                        </div>
                                        <div class="col-xs-4">
                                        	<p><i class="fa fa-bed" aria-hidden="true"></i> <?php echo $properties[$i]['Bedroom'];?></p>
                                        </div>
                                        <div class="col-xs-4">
                                        	<p><i class="fa fa-bath" aria-hidden="true"></i> <?php echo $properties[$i]['Bathroom'];?></p>
                                        </div>
                                    </div>
                                    <hr/>
                                    <h4 ><?php echo $properties[$i]['property_title'];?><span><?php echo $properties[$i]['city'];?></span></h4>
                                    
                                    <h3><?php echo $properties[$i]['price'].' ';?>AED</h3>
                                    <hr/>
                                    <div class="row pad10">
                                    	
                                        <div class="col-xs-5">
                                        	<a href="#" class="view">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?php
							}
							?>
                          
                       
                    </div>
                </div>
            </div>
        </div>
      </div>