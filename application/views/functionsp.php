
			<!--
			=====================================================
				Faq Page
			=====================================================
			-->
			<div class="faq-page section-spacing">
				<div class="container">
					<div class="theme-title-one">
						<div class="single-service2"><h3 style="color:#fff;padding:4px;">Excel/VBA Functions (with Live examples and Videos)</h3></div>
						<p>Here you will find a detailed view on 100+ Functions.Each Excel/VBA function is covered in detail with Examples and video.</p>
					</div> <!-- /.theme-title-one -->
					<div style="margin-top:3%;" class="theme-title-one">
						<div class="single-service2"><h4 style="color:#fff;padding:10px;">EXCEL FUNCTIONS</h4></div>
						<table style="width:100%;text-align:left;" cellpadding="10">
							<tbody>
								<?php
								$i=0;
								$list='';
									foreach($fun_category as $fc){
								
								if($i==0){$list.='<tr style="padding:3px;">';
								}
									 $list.='<td><a style="color:#555555;" href="'.base_url().'excel-functions/'.$fc->id.'"> Excel Functions - '.$fc->category.'</a></td>';
									/*<!--<td>
										Excel Functions - Math
									</td>
									<td>
										Excel Functions - Info
									</td>-->*/
								 $i=$i+1;
								if($i==3){$list.='</tr>';}
								
								if($i==3){
									$i=0;
								}
								}
								?>
								<?php echo $list;?>
								<!--<tr style="padding:3px;">
									<td>
										Excel Functions - Logical
									</td>
									<td>
										Excel Functions - Statistics
									</td>
									<td>
										Excel Functions - Financial
									</td>
								</tr>
								<tr style="padding:3px;">
									<td>
										Excel Functions - Lookup & Reference
									</td>
									<td>
										Excel Functions - Text Functions
									</td>
									<td>
										VBA Functions 
									</td>
								</tr>-->
							</tbody>
						</table>
					</div> <!-- /.theme-title-one -->
					<style>
					.des{border:1px #dedede solid;}
					table.des td,th{border:1px #dedede solid;}
					.des th{}
					</style>
	        		<div class="faq-panel">
						<table class="des" style="width:100%;text-align:left;" cellpadding="10">
							<thead>
								<tr>
									<th>Excel Function </th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>
							<?php
							if(count($excel_function)>0){foreach($excel_function as $ef){
							?>
								<tr>
									<td style="font-weight:600;"><?php echo $ef->title; ?></td>
									<td><?php echo $ef->content; ?></td>
								</tr>
								<?php
							}}
								?>
								<!--<tr>
									<td style="font-weight:600;">Excel DATEDIF Function</td>
									<td>Excel DATEDIF function can be used when you want to calculate the number of years,month and days between the two specified dates. A good Example would be calculating the age. </td>
								</tr>
								<tr>
									<td style="font-weight:600;">Excel DATEVALUE Function</td>
									<td>Excel DATEVALUE function best suited for situations when a date is stored as text. This function converts the date from text format to a serial number that Excel recognizes as a date.</td>
								</tr>
								<tr>
									<td style="font-weight:600;">Excel DAY Function</td>
									<td>Excel DAY function can be used when you want to get the day value(ranging between 1 to 31) from a specified date. It returns a value between 0 and 31 depending on the date used as the input.</td>
								</tr>
								<tr>
									<td style="font-weight:600;">Excel HOUR Function</td>
									<td>Excel HOUR function can be used when you want to get the HOUR integer value from a specified time value. It returns a value between 0(12:00 AM) and 23(11:00 PM) depending on the time value used as the input.</td>
								</tr>
								<tr>
									<td style="font-weight:600;">Excel MINUTE Function</td>
									<td>Excel MINUTE function can be used when you want to get the MINUTE integer value from a specified time value.It returns a value between 0 and 59 depending on the time value used as the input.</td>
								</tr><tr>
									<td style="font-weight:600;">Excel NETWORKDAYS Function</td>
									<td>Excel NETWORKDAYS function can be used when you want to get the number of working days between two given dates. It does not count the weekends between the specified dates(by default the weekend is Saturday and Sunday). It can also exclude any specified holidays. </td>
								</tr>
								<tr>
									<td style="font-weight:600;">Excel NETWORKDAYS.INTL Function</td>
									<td>Excel NETWORKDAYS.INTL function can be used when you want to get the number of working days between two given dates. It does not count the weekends and holidays, both of which can be specified by user. It also enables you to specify the weekends (for example you can specify Friday and Saturday as the weekend, or only Sunday as the weekend) </td>
								</tr>
								<tr>
									<td style="font-weight:600;">Excel NOW Function</td>
									<td>Excel NOW function can be used to get the current date and time value.</td>
								</tr>
								<tr>
									<td style="font-weight:600;">Excel SECOND Function</td>
									<td>Excel SECOND function can be used want to get the integer value of the seconds from a specified time value. It returns a value between 0 and depending on the time value used as the input. </td>
								</tr><tr>
									<td style="font-weight:600;">Excel TODAY Function</td>
									<td>Excel TODAY function can be used to get the current date. It returns a serial number that represents the current date.</td>
								</tr>
								<tr>
									<td style="font-weight:600;">Excel WEEKDAY Function</td>
									<td>Excel WEEKDAY function can be used to get the day of the week as a number for the specified date. It returns anumber between 1 and 7 that representing corresponding day of the week.</td>
								</tr>
								<tr>
									<td style="font-weight:600;">Excel WORKDAY Function</td>
									<td>Excel WORKDAY function can be used when you want to get the date after a given number of working days. By default it takes Saturday and Sunday as the weekends. </td>
								</tr>
								<tr>
									<td style="font-weight:600;">Excel WORKDAY.INTL Function</td>
									<td>Excel WORKDAY.INTL function can be used when you want to get the date after a given number of working days. In this function you can specify the weekend to be days other than Saturday and Sunday.</td>
								</tr>-->
							</tbody>
						</table>
						
					</div> <!-- /.faq-panel -->
				</div> <!-- /.container -->
			</div> <!-- /.faq-page -->

