<?php
// Version de MySQL.
$pma_conf_file = 'G:/wamp/phpmyadmin/'.'config.inc.php';
$langue="";
$msg="";
$langues=array();
if (file_exists($pma_conf_file))
{
    include ($pma_conf_file);
    if (extension_loaded('mysql'))
    {
        if ($link = @mysqli_connect('localhost',$cfg['Servers']['1']['user'] ,$cfg['Servers']['1']['password']))
	        $mysqli_version =  mysqli_get_server_info();
        else
	        $mysqli_version = $langues[$langue]['mysqlerror1'];
    }
    if (extension_loaded('mysqli'))
    {
        if ($link = @mysqli_connect('localhost',$cfg['Servers']['1']['user'] ,$cfg['Servers']['1']['password']))
	        $mysqli_version =  mysqli_get_server_info($link);
        else
	        $mysqli_version = $langues[$langue]['mysqlerror1'];
    }
}
else
    $mysqli_version = $langues[$langue]['mysqlerror2'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "xhtml11.dtd">

<html>
<head>
<title><?php echo $langues[$langue]['titre_html'] ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type='text/javascript' src='menu.js'></script>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>

<?php
                        // Affichage de la liste des dossiers non énumérés plus haut ( = projets ).
                        $list_ignore = array ('.','..','exemples','phpmyadmin','sqlitemanager');
						$handle=opendir("menu_order");

                        $msg = $langues[$langue]['txt_no_projet'];
						?>
						<?php
						
                        while ($file = readdir($handle)) {
						
                            if (!in_array($file,$list_ignore)) {  
							if(is_dir("menu_order/".$file))
							{  
                                $msg = '';
								$path="menu_order/".$file."/images/icon.jpg";
								$f_path="menu_order/".$file."/caption/menu_caption.php";
								$filedrop="menu_order/".$file;
							
								if(!isset($_GET['dropmenu']))
								$dropmenu=0;
								else if($filedrop=="menu_order/Topmenu")
								$dropmenu=1;
								else if($filedrop=="menu_order/Leftmenu")
								$dropmenu=2;
								else if($filedrop=="menu_order/Rightmenu")
								$dropmenu=3;
								else if($filedrop=="menu_order/Members")
								$dropmenu=4;
								else if($filedrop=="menu_order/Book")
								$dropmenu=5;
								else if($filedrop=="menu_order/Product")
								$dropmenu=6;
								else if($filedrop=="menu_order/ExcelExport")
								$dropmenu=7;
								
								?>
								 
								 <li>
								<a  href="javascript:displayMenu('divcenter','<?php echo base64_encode($file); ?>','<?php echo base64_encode($file."/index.php"); ?>)');" class="ajax-link"><?php include("$f_path") ?></a> 
                                
                           
                                 <ul>
  								<?php
								
								if($filedrop=="menu_order/Book")
								{
								
								$handleinner=opendir("menu_order/Book/BookItems");
								 while ($filed = readdir($handleinner)) {
								 $filedr="Book/BookItems/".$filed;
									if (!in_array($filed,$list_ignore)) {  
									if(is_dir("menu_order/Book/BookItems/".$filed))
									{  
									$f_pathd="menu_order/Book/BookItems/".$filed."/caption/menu_caption.php";
								?> <li><a href="javascript:displayMenu('divcenter','<?php echo base64_encode($filedr); ?>','<?php echo base64_encode($filedr."/index.php"); ?>');"><?php include("$f_pathd") ?></a>
								<?php
                                if($filedr=="Book/BookItems/StudentBook")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Book/BookItems/StudentBook");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Book/BookItems/StudentBook/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Book/BookItems/StudentBook/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Book/BookItems/StudentBook/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								?>
								
								
								
								
								
								
								
								
								
								
									<?php
                                if($filedr=="Book/BookItems/ProgressReport")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Book/BookItems/ProgressReport");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Book/BookItems/ProgressReport/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Book/BookItems/ProgressReport/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Book/BookItems/ProgressReport/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								?>
								
								
								
								
													
								
								
								
								
								
								
								
								
								
								
								
								
								<?php
                                if($filedr=="Book/BookItems/OptionalLanguage")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Book/BookItems/OptionalLanguage");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Book/BookItems/OptionalLanguage/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Book/BookItems/OptionalLanguage/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Book/BookItems/OptionalLanguage/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								?>
								
								<?php
                                if($filedr=="Book/BookItems/Student Book")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Book/BookItems/Student Book");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Book/BookItems/Student Book/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Book/BookItems/Student Book/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Book/BookItems/Student Book/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								?>
								</li>
								  <?php
								  }
								  }
								  }
								  }
								 
								 
								 
								if($filedrop=="menu_order/BookSite")
								{
								
								$handleinner=opendir("menu_order/BookSite/BookSiteItems");
								 while ($filed = readdir($handleinner)) {
								 $filedr="BookSite/BookSiteItems/".$filed;
									if (!in_array($filed,$list_ignore)) {  
									if(is_dir("menu_order/BookSite/BookSiteItems/".$filed))
									{  
									$f_pathd="menu_order/BookSite/BookSiteItems/".$filed."/caption/menu_caption.php";
								?> <li><a href="javascript:displayMenu('divcenter','<?php echo base64_encode($filedr); ?>','<?php echo base64_encode($filedr."/index.php"); ?>');"><?php include("$f_pathd") ?></a></li>
								  <?php
								  }
								  }
								  }
								  }
								 
								 
								
								if($filedrop=="menu_order/Settings")
								{
								
								$handleinner=opendir("menu_order/Settings/SettingsItems");
								 while ($filed = readdir($handleinner)) {
								 $filedr="Settings/SettingsItems/".$filed;
									if (!in_array($filed,$list_ignore)) {  
									if(is_dir("menu_order/Settings/SettingsItems/".$filed))
									{  
									$f_pathd="menu_order/Settings/SettingsItems/".$filed."/caption/menu_caption.php";
								?> <li><a href="javascript:displayMenu('divcenter','<?php echo base64_encode($filedr); ?>','<?php echo base64_encode($filedr."/index.php"); ?>');"><?php include("$f_pathd") ?></a>
                                
                                
                                 <?php
                                if($filedr=="Settings/SettingsItems/SettingsItems")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Settings/SettingsItems/SettingsItems");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Settings/SettingsItems/SettingsItems/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Settings/SettingsItems/SettingsItems/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Settings/SettingsItems/SettingsItems/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								
								?>
                                 <?php
                                if($filedr=="Settings/SettingsItems/DynamicContents_Category")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Settings/SettingsItems/DynamicContents_Category");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Settings/SettingsItems/DynamicContents_Category/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Settings/SettingsItems/DynamicContents_Category/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Settings/SettingsItems/DynamicContents_Category/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								?>
                                <?php
                                if($filedr=="Settings/SettingsItems/Missions")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Settings/SettingsItems/Missions");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Settings/SettingsItems/Missions/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Settings/SettingsItems/Missions/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Settings/SettingsItems/Missions/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								?>
                                <?php
                                if($filedr=="Settings/SettingsItems/Directory")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Settings/SettingsItems/Directory");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Settings/SettingsItems/Directory/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Settings/SettingsItems/Directory/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Settings/SettingsItems/Directory/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								?>
								 <?php
                                if($filedr=="Settings/SettingsItems/InstitutionItems")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Settings/SettingsItems/InstitutionItems");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Settings/SettingsItems/InstitutionItems/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Settings/SettingsItems/InstitutionItems/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Settings/SettingsItems/InstitutionItems/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								?>
                                
                                </li>
								  <?php
								  }
								  }
								  }
								  
								  }
								 
								 if($filedrop=="menu_order/Members")
								{
								
								$handleinner=opendir("menu_order/Members/MembersItems");
								 while ($filed = readdir($handleinner)) {
								 $filedr="Members/MembersItems/".$filed;
									if (!in_array($filed,$list_ignore)) {  
									if(is_dir("menu_order/Members/MembersItems/".$filed))
									{  
									$f_pathd="menu_order/Members/MembersItems/".$filed."/caption/menu_caption.php";
								?> <li><a href="javascript:displayMenu('divcenter','<?php echo base64_encode($filedr); ?>','<?php echo base64_encode($filedr."/index.php"); ?>');"><?php include("$f_pathd") ?></a>
                                
                                
                                 
                                
                                </li>
								  <?php
								  }
								  }
								  }
								  
								  }
 if($filedrop=="menu_order/Product")
								{
								
								$handleinner=opendir("menu_order/Product/ProductItems");
								 while ($filed = readdir($handleinner)) {
								 $filedr="Product/ProductItems/".$filed;
									if (!in_array($filed,$list_ignore)) {  
									if(is_dir("menu_order/Product/ProductItems/".$filed))
									{  
									$f_pathd="menu_order/Product/ProductItems/".$filed."/caption/menu_caption.php";
								?> <li><a href="javascript:displayMenu('divcenter','<?php echo base64_encode($filedr); ?>','<?php echo base64_encode($filedr."/index.php"); ?>');"><?php include("$f_pathd") ?></a>
                                
                                
                                 
                                
                                </li>
								  <?php
								  }
								  }
								  }
								  
								  }
								 
							if($filedrop=="menu_order/Finance_details")
								{
								
								$handleinner=opendir("menu_order/Finance_details/FinanceItems");
								 while ($filed = readdir($handleinner)) {
								 $filedr="Finance_details/FinanceItems/".$filed;
									if (!in_array($filed,$list_ignore)) {  
									if(is_dir("menu_order/Finance_details/FinanceItems/".$filed))
									{  
									$f_pathd="menu_order/Finance_details/FinanceItems/".$filed."/caption/menu_caption.php";
								?> <li><a href="javascript:displayMenu('divcenter','<?php echo base64_encode($filedr); ?>','<?php echo base64_encode($filedr."/index.php"); ?>');"><?php include("$f_pathd") ?></a>
								
								
								
								
								
								
								<?php
                                if($filedr=="Finance_details/FinanceItems/FinanceIncome")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Finance_details/FinanceItems/FinanceIncome");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Finance_details/FinanceItems/FinanceIncome/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Finance_details/FinanceItems/FinanceIncome/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Finance_details/FinanceItems/FinanceIncome/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								?>
								
								
								
								
								
								
								<?php
                                if($filedr=="Finance_details/FinanceItems/FinanceExpense")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Finance_details/FinanceItems/FinanceExpense");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Finance_details/FinanceItems/FinanceExpense/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Finance_details/FinanceItems/FinanceExpense/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Finance_details/FinanceItems/FinanceExpense/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								?>
								
								
								
								
								
								
								
								
								
								
								
								
								</li>
								  <?php
								  }
								  }
								  }
								  }
								  
								  
								  
								  
								  
								  
								  
								  
								
								if($filedrop=="menu_order/FileTransfer")
								{
								
								$handleinner=opendir("menu_order/FileTransfer/FileTransfer_Items");
								 while ($filed = readdir($handleinner)) {
								 $filedr="FileTransfer/FileTransfer_Items/".$filed;
									if (!in_array($filed,$list_ignore)) {  
									if(is_dir("menu_order/FileTransfer/FileTransfer_Items/".$filed))
									{  
									$f_pathd="menu_order/FileTransfer/FileTransfer_Items/".$filed."/caption/menu_caption.php";
								?> <li><a href="javascript:displayMenu('divcenter','<?php echo base64_encode($filedr); ?>','<?php echo base64_encode($filedr."/index.php"); ?>');"><?php include("$f_pathd") ?></a></li>
								  <?php
								  }
								  }
								  }
								  }
								   
								 	 
								 
								 
								 
								 
								if($filedrop=="menu_order/Directory")
								{
								
								$handleinner=opendir("menu_order/Directory/DirectoryItems");
								 while ($filed = readdir($handleinner)) {
								 $filedr="Directory/DirectoryItems/".$filed;
									if (!in_array($filed,$list_ignore)) {  
									if(is_dir("menu_order/Directory/DirectoryItems/".$filed))
									{  
									$f_pathd="menu_order/Directory/DirectoryItems/".$filed."/caption/menu_caption.php";
								?> <li><a href="javascript:displayMenu('divcenter','<?php echo base64_encode($filedr); ?>','<?php echo base64_encode($filedr."/index.php"); ?>');"><?php include("$f_pathd") ?></a>
                                
                                
                                 <?php
                                if($filedr=="Directory/DirectoryItems/PresentWorkingItems")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Directory/DirectoryItems/PresentWorkingItems");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Directory/DirectoryItems/PresentWorkingItems/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Directory/DirectoryItems/PresentWorkingItems/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Directory/DirectoryItems/PresentWorkingItems/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								?>
								
								
                                 <?php
                                if($filedr=="Directory/DirectoryItems/2_TestRankListItems")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Directory/DirectoryItems/2_TestRankListItems");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Directory/DirectoryItems/2_TestRankListItems/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Directory/DirectoryItems/2_TestRankListItems/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Directory/DirectoryItems/2_TestRankListItems/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								?>
								
								
								
								 <?php
                                if($filedr=="Directory/DirectoryItems/4_ActingHandsItems")
								{
								?>
                                <ul>
                                <?php
								$handleinnerg=opendir("menu_order/Directory/DirectoryItems/4_ActingHandsItems");
								 while ($filedg = readdir($handleinnerg)) {
								 
								 $filedrg="Directory/DirectoryItems/4_ActingHandsItems/".$filedg;
								
								 if (!in_array($filedg,$list_ignore)) {  
								
									if(is_dir("menu_order/Directory/DirectoryItems/4_ActingHandsItems/".$filedg) && $filedg!="caption" )
									{ 
									$f_pathdg="menu_order/Directory/DirectoryItems/4_ActingHandsItems/".$filedg."/caption/menu_caption.php";
									
									?><li><a href="javascript:displayMenu('divcenter','<?php echo $filedrg; ?>','<?php echo $filedrg; ?>/index.php&dropmenu=<?php echo $dropmenu;?>');"><?php include("$f_pathdg") ?></a>
                                    <?php
									}
									}
								 }
								?>
                                
                                </ul>
                                <?php
								}
								?>
								
								
								
                                </li>
								  <?php
								  }
								  }
								  }
								  
								  }
								 
								 
								 
								 
								 
								 
								 
								
								 
								 
								 
								 
								 
								 
								 
								 
								 	if($filedrop=="menu_order/School")
								{
								
								$handleinner=opendir("menu_order/School/SchoolItems");
								 while ($filed = readdir($handleinner)) {
								 $filedr="School/SchoolItems/".$filed;
									if (!in_array($filed,$list_ignore)) {  
									if(is_dir("menu_order/School/SchoolItems/".$filed))
									{  
									$f_pathd="menu_order/School/SchoolItems/".$filed."/caption/menu_caption.php";
								?> <li><a href="javascript:displayMenu('divcenter','<?php echo base64_encode($filedr); ?>','<?php echo base64_encode($filedr."/index.php"); ?>');"><?php include("$f_pathd") ?></a></li>
								  <?php
								  }
								  }
								  }
								  }
								  ?>
                                  
                                  
                                  
                                  
                                  
                                  </ul>
								  
								  
								  <?php 
                               	}
                            }
                        }
						?>
								  	</li>
                                    
                                    <li><a href="logout.php">Logout</a></li>
                                   
<?php
                        closedir($handle);
                        echo $msg;
                    ?>

