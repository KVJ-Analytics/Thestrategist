<style>
    .lcat{
        background-color:#13438a;color:#fff;
         height:47px;
    }
    .lcats{
        background-color:#13438a;color:#fff;
         height:47px;
    }
    .lcat:hover{
       color:#001648; background-color:#fff;
       height:auto;
    }
    .theme-sidebar-one .service-categories ul li a {
    
    color: #fff;
    overflow:hidden;
    height:47px;
  
}
.theme-sidebar-one .service-categories ul li a:hover{
    overflow:wrap;
    height:auto;
}
    .theme-sidebar-one .service-categories ul li h4{
        display: block;
    font-weight: 600;
    /*font-size: 18px;*/
    color: #232323;
    line-height: 45px;
    border: 1px solid #e1e1e1;
    border-radius: 10px;
    margin-bottom: 5px;
    /*padding-left: 20px;*/}
</style>
			<!-- 
			=============================================
				Service Details
			============================================== 
			-->
			<div class="service-details section-spacing">
				<div class="container">
					<div class="row">
					    	<h4 style="width:100%;text-align:left;" class="title"><i style="color: #001a57;margin-left: 2%;font-size: 27px;float: left;margin-right: 1%;" class="icon flaticon-target"></i><?php echo $rcatd; ?> >> Topics</h4>
					    	<br/>
					    	<br/>
					
                                	<?php
                                	$ci=0;$sub='';
                                	if(count($results)>0){
									foreach($results as $r){
									if($ci==0)	{echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 col-12 theme-sidebar-one">
							<div class="sidebar-box service-categories">
							
								<ul>';
									    
									}
									if($r->sub_tab=='nill'){
									echo '<li ><a class="lcat" href="'.base_url().'excel-videos/'.$r->id.'">'.$r->title.'</a></li>';
									}else{
									    if($sub!=$r->sub_tab){if($r->sub_tab!='nill'){echo '<li><h4 class="lcats" style="background-color: #ff0303b5;color: #ffffff;text-align: center;text-decoration:none;margin-top:10px;margin-bottom:10px;">'.ltrim($r->sub_tab).'</h4><li >';}}
									    $sub=$r->sub_tab;
									    echo '<li ><a class="lcat" href="'.base_url().'excel-videos/'.$r->id.'">'.$r->title.'</a></li>';
									}
									$ci++;
							if($ci==19)	{    echo '</ul>
							</div> 
						</div>';
									    
									}
									
									if($ci==19){$ci=0;}
									}}
									if($ci<19 && $ci>0){ echo '</ul>
							</div> 
						</div>';}
									?>
									
						<!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 col-12 theme-sidebar-one">
							<div class="sidebar-box service-categories">
								<h5 class="title">Top Topics</h5>
								<ul>
									<?php
									foreach($results as $r){
									/*if($r->type!='top')	{continue;}*/?>
										<li><a href="<?php echo base_url(); ?>excel-videos/<?php echo $r->id; ?>"><?php echo $r->title; ?></a></li>
									<?php
									}
									?>
									
									
								</ul>
							</div> 
						</div> -->
						
					</div> <!-- /.row -->
					
					
						
					

				
				</div> <!-- /.container -->
			</div> <!-- /.service-details -->



