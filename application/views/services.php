<?php
$i=1;
foreach($services as $s){

if($s->page_image=='nill'){
?>

		<span id="t<?php echo $s->id; ?>"></span>

			<!-- 
			=============================================
				Core Values
			============================================== 
			-->
			<div class="core-values">
				<div class="container">
				    	<div class="wrapper">
							<div class="row">
						
							<div class="col-lg-12 col-12 text order-lg-first">
								<div class="theme-title-one">
									<h2><?php echo $s->title; ?></h2>
								</div> <!-- /.theme-title-one -->
											<p><?php echo $s->content; ?></p>
								<!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->

						</div> <!-- /.row -->
					</div> 
				</div> 
			</div> 
<?php
}else{
?>

				<span id="t<?php echo $s->id; ?>"></span>
				<!-- 
			=============================================
				About Company Stye Two
			============================================== 
			-->
			<div class="about-compnay-two no-bg section-spacing" style="<?php if($i>1){ echo "margin-top:50px"; } ?>" id="">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-12 text order-lg-last">
								<div class="theme-title-one">
									<h2><?php echo $s->title; ?></h2>
								</div> <!-- /.theme-title-one -->
												<p><?php echo $s->content; ?>
                </p>
								<!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->
							<div class="col-lg-6 col-12 order-lg-first">
								<img src="<?php echo base_url(); ?>assets/images/services/<?php echo $s->page_image; ?>" alt="" class="left-img">
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.about-compnay-two -->

    <?php
}
$i++;}
?>
<script>

/*	$(window).on('hashchange', function() {
  let hash = window.location.hash;
  alert(hash);
  $('a').closest('li').removeClass('active');
  $('a[href="' + hash + '"]').closest('li').addClass('active');
});*/
</script>		
<?php
/*

<!-- 
			=============================================
				About Company Stye Two
			============================================== 
			-->
			<div class="about-compnay-two no-bg section-spacing" id="t1">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-12 text order-lg-last">
								<div class="theme-title-one">
									<h2>Data Analytics & Visualization</h2>
								</div> <!-- /.theme-title-one -->
												<p>We Deliver descriptive, diagnostic, predictive and prescriptive – that answer What happened? Why did it happen? What is likely to happen? What should I do about it? correspondingly, we implement the following solutions:
                Customer Analytics
                Marketing Analytics
                Sales Analytics
                Performance Analytics
                HR Analytics
                Ecommerce Analytics
                Outsourced Data Analysis
                Data Visualization
                </p>
								<!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->
							<div class="col-lg-6 col-12 order-lg-first">
								<img src="<?php echo base_url(); ?>assets/images/services/INFOGRAPHIC5.png" alt="" class="left-img">
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.about-compnay-two -->


		<span id="t2"></span>

			<!-- 
			=============================================
				Core Values
			============================================== 
			-->
			<div class="core-values" >
				<div class="container">
				    	<div class="wrapper">
							<div class="row">
						
							<div class="col-lg-12 col-12 text order-lg-first">
								<div class="theme-title-one">
									<h2>Spreadsheet Consulting</h2>
								</div> <!-- /.theme-title-one -->
											<p>We work as spreadsheet consultants for business creating reports, Excel dashboards tools for data analysis to automate processes which can save your valuable time
            As spreadsheet consultants, we are focus more on Automation, Reporting, Business Intelligence, Data Visualization, Macros and Dash Boards. We also offer a comprehensive remote service to help with all your spreadsheet problems and queries, whether you need assistance from a VBA developer or wish to design a brand-new system and find out more about what Excel can do for you.  
            </p>
								<!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->

						</div> <!-- /.row -->
					</div> 
				</div> <span id="t3"></span>
			</div> 
	
	<!-- 
			=============================================
				About Company Stye Two
			============================================== 
			-->
			<div class="about-compnay-two no-bg section-spacing" style="padding-top:3%;">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-12 text order-lg-last">
								<div class="theme-title-one">
									<h2>Industry Oriented Training</h2>
								</div> <!-- /.theme-title-one -->
											<p>
		       We work with Companies, Management Institutes and individuals who need effective training at unique &amp; affordable pricing. We provide a tailored training session for corporate clients as per their need. Our Training Solutions have benefited more than 12500 professionals across India and Abroad. We are also a Ceriport Authorized Testing Centre for Microsoft Certifications.
		   </p>
		   <p>
		       The main goal of the workshop is to provide tools   and   techniques   to   learn corporate   practices   &amp;   reinforcing decision-making skill.  These programs will   help   to   improve   the   practical knowledge of the aspirant and help to analyse data, create models, and generate insights. It will further train you in extending your skills to industry strength analytics using the Microsoft Excel. Training is hands-on, with participants working along with instructors, learning within the context of real world, practical 
		   </p>
		   <!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->
							<div class="col-lg-6 col-12 order-lg-first">
								<img src="<?php echo base_url(); ?>assets/images/services/IndustryOrientedTraining.png" alt="" class="left-img">
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.about-compnay-two -->

	<span id="t4"></span>
			<!-- 
			=============================================
				Core Values
			============================================== 
			-->
			<div class="core-values">
				<div class="container">
				    	<div class="wrapper">
							<div class="row">
						
							<div class="col-lg-12 col-12 text order-lg-first">
								<div class="theme-title-one">
									<h2>Our Flagship Programs</h2>
								</div> <!-- /.theme-title-one -->
										<table class="ptable" style="width:100%;">
		        
		           <thead>
		               <tr>
		                   <th>
		                    Our Programs Title
		                       
		                   </th>
		                   <th>
		                    Type
		                       
		                   </th>
		                   
		                   <th>
		                     Duration
		                       
		                   </th>
		                   <th>
		                    Materials
		                      
		                   </th>
		                   <th>
		                    Nature
		                       
		                   </th>
		                   
		                   </tr>
		           </thead>
		            <tbody>
		              <tr>
		               <td>
		                  Microsoft Specialist (Excel,Word,PPT) 2016
		              </td>
		               <td>
		                  Certification
		              </td>
		               <td>
		                  Five Days
		              </td>
		               <td>
		                  Data, Videos, Materials
		              </td>
		              <td>
		                  Training
		              </td>
		              </tr>
		              
		              <tr>
		               <td>
		                  Microsoft Expert (Excel, Word )2016
		              </td>
		               <td>
		                  Certification
		              </td>
		               <td>
		                  Five Days
		              </td>
		               <td>
		                  Data, Video, Materials
		              </td>
		              <td>
		                  Training
		              </td>
		              </tr>
		              
		              <tr>
		               <td>
		                  Advanced Excel For Managers
		              </td>
		               <td>
		                  Workshop
		              </td>
		               <td>
		                  Three Days
		              </td>
		               <td>
		                  Customized Workbook
		              </td>
		              <td>
		                  Workshop
		              </td>
		              </tr>
		              
		              <tr>
		               <td>
		                  Excel For Statistical Analysis
		              </td>
		               <td>
		                  Workshop
		              </td>
		               <td>
		                  Two Days
		              </td>
		               <td>
		                  Customized Workbook
		              </td>
		              <td>
		                  Advanced
		              </td>
		              </tr>
		              
		              
		               <tr>
		               <td>
		                 Excel Macro and VBA
		              </td>
		               <td>
		                  Workshop
		              </td>
		               <td>
		                  Two Days
		              </td>
		               <td>
		                  Customized Workbook
		              </td>
		              <td>
		                  Advanced
		              </td>
		              </tr>
		              
		              
		              
		               <tr>
		               <td>
		                  Financial Analytics and Modeling
		              </td>
		               <td>
		                  Workshop
		              </td>
		               <td>
		                  Two days
		              </td>
		               <td>
		                  Customized Workbook
		              </td>
		              <td>
		                  Advanced
		              </td>
		              </tr>
		              
		              
		               <tr>
		               <td>
		                 Data Analytics
		              </td>
		               <td>
		                  Workshop
		              </td>
		               <td>
		                  Three Days
		              </td>
		               <td>
		                  Customized Workbook
		              </td>
		              <td>
		                  Advanced
		              </td>
		              </tr>
		              
		              
		              
		               <tr>
		               <td>
		                  Equity Research -  NSE,NISM
		              </td>
		               <td>
		                  Certification
		              </td>
		               <td>
		                  Three Days
		              </td>
		               <td>
		                  Customized workbook
		              </td>
		              <td>
		                  Advanced
		              </td>
		              </tr>
		              
		              
		               <tr>
		               <td>
		                 Derivative Strategies
		              </td>
		               <td>
		                  Workshop
		              </td>
		               <td>
		                  Two Days
		              </td>
		               <td>
		                  Customized workbook
		              </td>
		              <td>
		                  Advanced
		              </td>
		              </tr>
		              
		              
		              
		               <tr>
		               <td>
		                  CFP cm   Certified Financial Planner
		              </td>
		               <td>
		                  Certification
		              </td>
		               <td>
		                  100 Hours
		              </td>
		               <td>
		                  Books and I learn 
		              </td>
		              <td>
		                  Online
		              </td>
		              </tr>
		              
		              
		               <tr>
		               <td>
		                 Teaching with Technology
		              </td>
		               <td>
		                  Workshop
		              </td>
		               <td>
		                  One day
		              </td>
		               <td>
		                  Activity Oriented
		              </td>
		              <td>
		                  Advanced
		              </td>
		              </tr>
		              
		              
		              
		               <tr>
		               <td>
		                  Business Finance for Managers
		              </td>
		               <td>
		                  Workshop
		              </td>
		               <td>
		                  One Day
		              </td>
		               <td>
		                  Customized Workbook
		              </td>
		              <td>
		                  Workshop
		              </td>
		              </tr>
		              
		               <tr>
		               <td>
		                  Power BI (Data visualization)
		              </td>
		               <td>
		                  Workshop
		              </td>
		               <td>
		                  One Day
		              </td>
		               <td>
		                  Customized Workbook
		              </td>
		              <td>
		                  Workshop
		              </td>
		              </tr>
		              
		              
		           </tbody> 
		        
		    </table>
								<!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->

						</div> <!-- /.row -->
					</div> 
				</div> 	<span id="t5"></span>
			</div> 
			
				<!-- 
			=============================================
				About Company Stye Two
			============================================== 
			-->
			<div class="about-compnay-two no-bg section-spacing" style="padding-top:3%;">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-12 text order-lg-last">
								<div class="theme-title-one">
									<h2>Financial Analytics and Model Building</h2>
								</div> <!-- /.theme-title-one -->
										<p>
		        We offer financial modeling as part of our commitment to providing a full range of financial support services. We work with our clients to customize the model to your needs. 
		    </p>
		   <!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->
							<div class="col-lg-6 col-12 order-lg-first">
								<img src="<?php echo base_url(); ?>assets/images/services/Financial_Analytics.png" alt="" class="left-img">
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.about-compnay-two -->
			
			
				<span id="t6"></span>
			<!-- 
			=============================================
				Core Values
			============================================== 
			-->
			<div class="core-values">
				<div class="container">
				    	<div class="wrapper">
							<div class="row">
							
							<div class="col-lg-6 col-12 text order-lg-last">
								<div class="theme-title-one">
								
								</div> <!-- /.theme-title-one -->
									<p>
                With this initiative, we aim to partner you in your quest to provide practical knowledge and insights to your students on the rapidly evolving and dynamic Market. We are keen to collaborate with your department for adding substantial value to your student’s placement.
            </p>
								<!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->
							<div class="col-lg-6 col-12 text order-lg-first">
								<div class="theme-title-one">
									<h2>Microsoft Certifications</h2>
								</div> <!-- /.theme-title-one -->
										<p>
		        Strategist helps your institution foster the qualities of academic brilliance and career readiness in your students by providing comprehensive, industry-oriented professional learning solutions and acts as the single, most reliable avenue for all your skill-development needs.  
		    </p>
								<!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->

						</div> <!-- /.row -->
					</div> 
				</div> 
					<span id="t7"></span>
			</div> 
			
	<!-- 
			=============================================
				About Company Stye Two
			============================================== 
			-->
			<div class="about-compnay-two no-bg section-spacing" style="padding-top:3%;">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-12 text order-lg-last">
								<div class="theme-title-one">
									<h2>Why should you attain Excel Certification</h2>
								</div> <!-- /.theme-title-one -->
											<p>
		       <ul style="list-style:disc;">
		            <li>Microsoft office certification gives you the tools to build a brighter future</li>
		            <li>Achieve Industry-recognized certification</li>
		            <li>Learn corporate excel skills</li>
		            <li>Boost your resume by attaching badge from Microsoft</li>
		            <li>Differentiate from other applicants</li>
		            <li>Validation of knowledge and skill </li>
		            <li>Heighten students earning potential</li>
		        </ul> </p>
		   <!--<img src="images/home/sign-black.png" alt="" class="sign">-->
							</div> <!-- /.col- -->
						
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.about-compnay-two -->*/   
			
			?>