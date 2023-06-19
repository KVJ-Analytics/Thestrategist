<?php session_start();
if($_SESSION['login']!=1)
{
	header("Location:index.php");
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Excel Videos</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
  @font-face {
  font-family: 'Sansation';
    src:  url('Sansation.ttf.woff') format('woff'),
    url('Sansation.ttf.svg#Sansation') format('svg'),
    url('Sansation.ttf.eot'),
    url('Sansation.eot?#iefix') format('embedded-opentype'); 
    font-weight: normal;
    font-style: normal;
}
   video::-internal-media-controls-download-button {
    display:none;
   }

   video::-webkit-media-controls-enclosure {
        overflow:hidden;
   }

   video::-webkit-media-controls-panel {
        width: calc(100% + 30px); 
   }
   
   
.tabs-left > .nav-tabs {
  border-bottom: 0;
}

.tab-content > .tab-pane,
.pill-content > .pill-pane {
  display: none;
}

.tab-content > .active,
.pill-content > .active {
  display: table;
    font-family: Calibri;

}


.tab-content p{
padding:15px;
    font-family: Calibri;


}

.sansclass{
    font-family: Calibri;
margin:30px auto 30px 10px;

}

.tabs-left > .nav-tabs > li {
  float: none;
}

.nav > li > a > img {
padding-right:10px;
}

.tabs-left > .nav-tabs > li > a {
  min-width: 74px;
  margin-right: 0;
  margin-bottom: 3px;
    font-family: Calibri;

}

.tabs-left > .nav-tabs {
  float: left;
  margin-right: 19px;
  border-right: 1px solid #ddd;
}

.tabs-left > .nav-tabs > li > a {
  margin-right: -1px;
  -webkit-border-radius: 4px 0 0 4px;
     -moz-border-radius: 4px 0 0 4px;
          border-radius: 4px 0 0 4px;
		  color:#808080;
		  font-size:16px;
}

.tabs-left > .nav-tabs > li > a:hover,
.tabs-left > .nav-tabs > li > a:focus {
  border-color: #eeeeee #dddddd #eeeeee #eeeeee;
}

.tabs-left > .nav-tabs .active > a,
.tabs-left > .nav-tabs .active > a:hover,
.tabs-left > .nav-tabs .active > a:focus {
  border-color: #ddd transparent #ddd #ddd;
  *border-right-color: #ffffff;

}

.excelhead{
margin-top:50px;
margin-bottom:30px;
}
</style>
</head>

<body onLoad="disableClick()" oncontextmenu="return false">

<div align="right" style="padding-top:25px; padding-right:50px; margin-right:20px;"><a href="logout.php"> Log out</a></div>
<br /><br />

<div class="container-fluid excelhead">
    <div class="row">
		<div class="col-xs-12">
		  <h2 class="sansclass">Excel Tutorials</h2>
			<!-- tabs -->
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#home" data-toggle="tab"><img src="images/20150310_logo_excel-2013.png"/>Create Charts and Objects </a></li>
					<li><a href="#about" data-toggle="tab"><img src="images/20150310_logo_excel-2013.png"/>Perform Operation with Formulas and Functions</a></li>
					<li><a href="#services" data-toggle="tab"><img src="images/20150310_logo_excel-2013.png"/>Create Table</a></li>
					<li><a href="#contact" data-toggle="tab"><img src="images/20150310_logo_excel-2013.png"/> Create and Manage Work Sheet and Work Book </a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="home">                
						<div class="">
                        
                        
                        <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/1 Creating a chart.mp4" type="video/mp4">
</video>
<p>Creating a chart</p>





                            </div>    
                            
                            
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/2 Adding Series.mp4" type="video/mp4">
</video>
<p> Adding Series</p>
                            </div>    
                            
                            
                               <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/3 switch row or  column.mp4" type="video/mp4">
</video>
<p> switch row or  column</p>
                            </div>    
                            
                            
                            
                            
                             <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/4 Renamming Axis.mp4" type="video/mp4">
</video>
<p>Renamming Axis</p>
                            </div>    
                            
                            
                            
                                <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/5 Changing Colour, Style Layout.mp4" type="video/mp4">
</video>
<p>Changing Colour, Style Layout</p>
                            </div>    
                            
                            
                             <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/6 Adding Legend.mp4" type="video/mp4">
</video>
<p>Adding Legend</p>
                            </div>    
                            
                            
                            
                             
							<div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/7 MovingChart.mp4" type="video/mp4">
</video>
<p>MovingChart</p>
                            </div>     
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/8Addingdata in a Chart.mp4" type="video/mp4">
</video>
<p>Addingdata in a Chart</p>

                            </div> 
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/9 Resizing the Chart.mp4" type="video/mp4">
</video>
<p>Resizing the Chart</p>

                            </div>    
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/10 Inserting a Picture.mp4" type="video/mp4">
</video>
<p>Inserting a Picture</p>

                            </div>    
                            
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/11 Rotation of Image.mp4" type="video/mp4">
</video>
<p>Rotation of Image</p>

                            </div> 
                            
                                   
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/12 Pattern fill in an Image.mp4" type="video/mp4">
</video>
<p>Pattern fill in an Image</p>

                            </div>     
                            
                            
                  <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/13 Inserting Line Sparkline.mp4" type="video/mp4">
</video>
<p>Inserting Line Sparkline</p>

                            </div>     
                            
                            
                <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/14 Inserting Column Sparkline.mp4" type="video/mp4">
</video>
<p>Inserting Column Sparkline</p>

                            </div>                 
                            
                                      
               <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/15 Adding Seris.mp4" type="video/mp4">
</video>
<p>Adding Series</p>

                            </div>  
                            
                            
                            
                            
                  <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/16 Changing Layout and Deleting Axis Titles.mp4" type="video/mp4">
</video>
<p>Changing Layout and Deleting Axis Titles</p>

                            </div>     
                            
                            
                <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/17 Swaping Axis.mp4" type="video/mp4">
</video>
<p>Swaping Axis</p>

                            </div>                 
                            
                                      
               <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateChartsandObjects/18 Inter Changing Axis.mp4" type="video/mp4">
</video>
<p>Inter Changing Axis</p>

                            </div>             
                            
                            
                                            
                            
                            
                            
						</div>
					</div> 
                    
  <!------------------------------------------------------------------------------------------------------------------------------------------------>                  
                    
					<div class="tab-pane" id="about"> 
						<div class="">
							  <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/PerformOperation/1 countif.mp4" type="video/mp4">
</video>
<p>countif</p>

                            </div>     
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/PerformOperation/2 SUMIf.mp4" type="video/mp4">
</video>
<p>SUMIf</p>

                            </div>     
                            
                            
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/PerformOperation/3 Concatinate.mp4" type="video/mp4">
</video>
<p>Concatinate</p>

                            </div>     
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/PerformOperation/4 proper.mp4" type="video/mp4">
</video>
<p>proper</p>

                            </div>     
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/PerformOperation/5 Left.mp4" type="video/mp4">
</video>
<p>Left</p>

                            </div>     
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/PerformOperation/6 IF condition.mp4" type="video/mp4">
</video>
<p>IF condition</p>

                            </div>     
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/PerformOperation/7 Average If.mp4" type="video/mp4">
</video>
<p>Average If</p>

                            </div>     
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/PerformOperation/8 Max.mp4" type="video/mp4">
</video>
<p>Max</p>

                            </div>     
                            
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/PerformOperation/9 Copy Peaste.mp4" type="video/mp4">
</video>
<p>Copy Peaste</p>

                            </div>     
                            
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/PerformOperation/10 Lower.mp4" type="video/mp4">
</video>
<p>Lower</p>

                            </div>     
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/PerformOperation/11 Peaste Formulas.mp4" type="video/mp4">
</video>
<p>Peaste Formulas</p>

                            </div>     
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/PerformOperation/12 Subtotal.mp4" type="video/mp4">
</video>
<p>Subtotal</p>

                            </div>     
                            
                             <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/PerformOperation/13 Show Formula.mp4" type="video/mp4">
</video>
<p>Show Formula</p>

                            </div>    
                            
                            
                            
                            
                            
                            
                                           
						</div>
					</div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
	  <!------------------------------------------------------------------------------------------------------------------------------------------------>                  
			
                
                
                
					<div class="tab-pane" id="services"> 
						<div class="">
                          <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateTable/1 Creating Table.mp4" type="video/mp4">
</video>
<p>Creating Table</p>

                            </div>     
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateTable/2 Banded Row.mp4" type="video/mp4">
</video>
<p> Banded Row</p>

                            </div>     
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateTable/3 Total Row.mp4" type="video/mp4">
</video>
<p>Total Row</p>

                            </div>     
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateTable/4 Table Style.mp4" type="video/mp4">
</video>
<p>Table Style</p>

                            </div>     
                            
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateTable/5 Converting To Range.mp4" type="video/mp4">
</video>
<p>Converting To Range</p>

                            </div>     
                            
                            
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateTable/6 Remove Duplicates.mp4" type="video/mp4">
</video>
<p>Remove Duplicates</p>

                            </div>     
                            
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateTable/7 Delete Column.mp4" type="video/mp4">
</video>
<p>Delete Column</p>

                            </div>     
                            
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateTable/8 Renaming Table.mp4" type="video/mp4">
</video>
<p>Renaming Table</p>

                            </div>     
                            
                            
                            
                               <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateTable/9 Alternate Text.mp4" type="video/mp4">
</video>
<p>Alternate Text</p>

                            </div>     
                            
                            
                            
                               <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/CreateTable/10 Editng Text.mp4" type="video/mp4">
</video>
<p>Editng Text</p>

                            </div>     
                            
							
                            
                            
                                           
						</div>
					</div>
                    
                    
                    
                    
                    
       <!------------------------------------------------------------------------------------------------------------------------------------------------>                  
               
                    
				
					<div class="tab-pane" id="contact"> 
						 <div class="">
                         
                         
                         <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/1 Insert new Worksheet.mp4" type="video/mp4">
</video>
<p>Insert new Worksheet</p>

                            </div>     
                            
                            
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/2 Filling Series.mp4" type="video/mp4">
</video>
<p>Filling Series</p>

                            </div>    
                            
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/3 Hide Column.mp4" type="video/mp4">
</video>
<p>Hide Column</p>

                            </div>     
                            
                            
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/4 Equation Filling.mp4" type="video/mp4">
</video>
<p>Equation Filling</p>

                            </div>     
                            
                            
                            
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/5 Hide Worksheet.mp4" type="video/mp4">
</video>
<p>Hide Worksheet</p>

                            </div>     
                            
                            
                            
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/6 Un Hide Worksheet.mp4" type="video/mp4">
</video>
<p>Un Hide Worksheet</p>

                            </div>     
                            
                            
                            
                            
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/7 Changing Tab Colour.mp4" type="video/mp4">
</video>
<p>Changing Tab Colour</p>

                            </div>     
                            
                            
                            
                            
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/8 Copy Worksheet.mp4" type="video/mp4">
</video>
<p>Copy Worksheet</p>

                            </div>     
                            
                            
                            
                            
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/9 Hide Rows.mp4" type="video/mp4">
</video>
<p>Hide Rows</p>

                            </div>     
                            
                            
                            
                            
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/10 Inserting Column.mp4" type="video/mp4">
</video>
<p>Inserting Column</p>

                            </div>     
                            
                            
                            
                            
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/11 Renaming Worksheet.mp4" type="video/mp4">
</video>
<p>Renaming Worksheet</p>

                            </div>     
                            
                            
                            
                            <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/12 Moving worksheet.mp4" type="video/mp4">
</video>
<p>Moving worksheet</p>

                            </div>     
                            
                            
                           
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/13 Selecting and Deleating Range.mp4" type="video/mp4">
</video>
<p>Selecting and Deleating Range</p>

                            </div>     
                            
                            
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/14 Increasing Decimal.mp4" type="video/mp4">
</video>
<p>Increasing Decimal</p>

                            </div>     
                            
                            
                            
                            
                              <div class="col-sm-6">
                            <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
  <source src="video/create-manage/15 Wrap text.mp4" type="video/mp4">
</video>
<p>Wrap text</p>

                            </div>    
                            
                            
                            
                            
<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/15 Wrap text.mp4" type="video/mp4">
  </video>
  <p>Wrap text</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/16 Auto Adjust Column width.mp4" type="video/mp4">
  </video>
  <p>Auto Adjust Column width</p>
</div>



<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/17 Find and Replace.mp4" type="video/mp4">
  </video>
  <p>Find and Replace</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/18 conditional formtng.mp4" type="video/mp4">
  </video>
  <p>conditional formtng</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/19 Row Height.mp4" type="video/mp4">
  </video>
  <p>Row Height</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/20 Merge.mp4" type="video/mp4">
  </video>
  <p>Merge</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/21 Insert Hyperllink Mail Address.mp4" type="video/mp4">
  </video>
  <p>Insert Hyperllink Mail Address</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/22 Insert Hyperlink to Web Address.mp4" type="video/mp4">
  </video>
  <p>Insert Hyperlink to Web Address</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/23 Inserting Footer.mp4" type="video/mp4">
  </video>
  <p>Inserting Footer</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/24 Inserting Header.mp4" type="video/mp4">
  </video>
  <p>Inserting Header</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/25 Set Print Area.mp4" type="video/mp4">
  </video>
  <p>Set Print Area</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/26 Insert page Break.mp4" type="video/mp4">
  </video>
  <p>Insert page Break</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/27 Row To Repeat.mp4" type="video/mp4">
  </video>
  <p>Row To Repeat</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/28 Margin.mp4" type="video/mp4">
  </video>
  <p>Margin</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/29 Remove Duplicates.mp4" type="video/mp4">
  </video>
  <p>Remove Duplicates</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/30 Import Data.mp4" type="video/mp4">
  </video>
  <p>Import Data</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/31 Freeze Pane.mp4" type="video/mp4">
  </video>
  <p>Freeze Pane</p>
</div>

<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/32 Deleating Personal Information.mp4" type="video/mp4">
  </video>
  <p>Deleating Personal Information</p>
</div>
<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/33 Worksheet on Single Page.mp4" type="video/mp4">
  </video>
  <p>Worksheet on Single Page</p>
</div>
<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/34 Company Name.mp4" type="video/mp4">
  </video>
  <p>Company Name</p>
</div>
<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/35 Sort.mp4" type="video/mp4">
  </video>
  <p>Sort</p>
</div>

    <div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/36 Merge Across A1-N1.mp4" type="video/mp4">
  </video>
  <p>Merge Across A1-N1</p>
</div>
<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/37 Unhide Between Worksheets.mp4" type="video/mp4">
  </video>
  <p>Unhide between Worksheets</p>
</div>                        
                            
       <div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/38 Hyperlink Within Workbook.mp4" type="video/mp4">
  </video>
  <p>Hyperlink Within Workbooks</p>
</div>                        
                            
        <div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/39 Inserting Title.mp4" type="video/mp4">
  </video>
  <p>Inserting Title</p>
</div>
<div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/40 Importing Data with Header.mp4" type="video/mp4">
  </video>
  <p>Importing Data with Header</p>
</div>                        
                            
       <div class="col-sm-6">
  <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
    <source src="video/create-manage/41 Import data with Defaults.mp4" type="video/mp4">
  </video>
  <p>Import Data with Defaults</p>
</div>                      
                             
                            
							
                            
                                        
						 </div>
					</div>
				</div>
			</div>
			<!-- /tabs -->
		</div>
	</div>
</div>



<div align="center"> <?php
include("includes/database.class.php");
include("includes/includefunctions.php");
date_default_timezone_set("Asia/Kolkata"); 
$db1 	= 	new Database();
								$result=$db1->query('SELECT * FROM hit');	
								$rows1 = $db1->resultset();
								
//$servername = "localhost";
//$username = "excelvideos";
//$password = "kga)#@ND;;6p";
//$dbname = "excelvideos";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}

//$sql = "SELECT * FROM hit";
//$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $id=$row["id"];
       $count=$row["count"];
    }
} else {
    echo "0 results";
}
 if(!isset($_SESSION['count']))
{


$_SESSION['count']=$count+1;
echo $count1=$_SESSION['count'];
$sql = "UPDATE hit SET count='$count1' WHERE id=1";
$db1 ->query($sql);
$db1->dbclose();
}
else
echo $_SESSION['count'];
?> 


Visits</div>



 <script>
      function disableClick(){
        document.onclick=function(event){
          if (event.button == 2) {
            return false;
          }
        }
      }
	  
	  document.onkeydown = function(e) {
    if(e.keyCode == 123) {
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
     return false;
    }

    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
     return false