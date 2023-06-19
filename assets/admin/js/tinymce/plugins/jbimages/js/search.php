<div class="search_wrapper">
 <form class="advance-search-form clearfix" action="property_list.php" method="post" enctype="multipart/form-data" name="f1">
        	<div class="container">
            	<div class="row">
                	<div class="col-sm-3">
                    <select name="status" id="select-status" >
                          
                           <option value="Rent">For Rent</option>
                           <option value="Sale">For Sale</option>
                    </select>
                    	
                    </div>
                    <div class="col-sm-3">
                    		<select name="state"  id="state" onChange="getloc(this.value);">
                                	       			<option value="">City</option>
                                                     <?php 	
							$i=1;
							$stmts5 = mysql_query("select id,name from emirates order by sort_order asc");							
							while($stmts6=mysql_fetch_array($stmts5)){
							?>
                            <option value="<?php echo $stmts6['id'];?>"><?php echo $stmts6['name'];?></option>
                            <?php
							}
							?>
                                           		</select>
                    </div>
                    <div class="col-sm-3">
                    			<select id="citys" name="city" >
                                            <option value="Location">Location</option>
                			
                                        </select>
                    </div>
                    <div class="col-sm-3">
                    	<select name="property_type" id="select-property-type" >
                                         <option value="Property-Type">Property Type</option>
                                             <option value="Residencial">Residencial</option> <option value="Commercial">Commercial</option> <option value="Land">Land</option> <option value="Residencial">Apartment</option><option value="Building">Building</option><option value="Full Floor">Full Floor</option><option value="HOTEL">HOTEL</option><option value="Hotel Apartment">Hotel Apartment</option><option value="Labour Camp">Labour Camp</option><option value="Land">Land</option><option value="Office">Office</option><option value="Pent House">Pent House</option><option value="Plots">Plots</option><option value="Retail">Retail</option><option value="Shop">Shop</option><option value="Showroom">Showroom</option><option value="Townhouse">Townhouse</option><option value="Villa">Villa</option><option value="Warehouse">Warehouse</option><option value="Studio">Studio</option>
                                        </select>
                    </div>
                   
                </div>
                <div class="row">
                	<div class="col-sm-3">
                     <select name="beds" id="select-bedrooms" >
                                        <option value="any" selected="selected">Beds</option>
                                        <option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                       <option value="10">10</option>
                                        <option value="10+">10+</option>
                                            
                                        </select>
                           </div>
                    <div class="col-sm-3">
                    	<select name="baths" id="select-bathrooms" >
                                        <option value="any" selected="selected">Baths</option>
                                        	<option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="10+">10+</option>
                                            
                                            
                                        </select>
                    </div>
                    <div class="col-sm-3">
                    	<div class="row">
                        	<div class="col-sm-6">
                                <select name="price_from" id="select-min-price"  onChange="getToPrice(this.value);">
                                           		<option selected="selected" value="">Price From</option>
												<?php 
								
								$price=mysql_query("select * from price");
								while($raw=mysql_fetch_array($price))
								{
								?>
                    <option value="<?php echo $raw['price'];?>"><?php echo $raw['price'];?></option>
                   		  <?php }?>
                                           
                                        </select>
                            </div>
                            <div class="col-sm-6">
                                <select name="priceto" id="select-max-price" >
                                <option selected="selected" value="">Price From</option>
                                    <?php 
								$price=mysql_query("select * from price");
								while($raw=mysql_fetch_array($price))
								{
								?>
                    <option value="<?php echo $raw['price'];?>"><?php echo $raw['price'];?></option>
                          <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    	<input type="submit" name="submit" value="FIND YOUR HOMES " />
                    </div>       
                </div>
            </div>
        </div>
        </form>
 </div>
  <script>
	function getloc(city) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("citys").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getloc.php?state="+city, true);
  xhttp.send();
}
    
    </script>