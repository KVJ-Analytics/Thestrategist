<?php 
$website_email="info@butterfliesumarry.in";
function pagecontents($id)
{
$db1 	= 	new Database();
								$db1->query('select * from page_contents where contents_id=:id');	
								$db1->bind(":id",$id);
								$rows = $db1->resultset();
								foreach($rows as $result)
								{
									echo $result['country_name'];
								}
								$db1->dbclose();
}

function Gender($id)
{
	$obj 	= 	new Database();
$qry=$obj->query("select Gender from member_physical  where member_physical.Member_AcId =:id"); 
$obj->bind(":id",$id);
$rows = $obj->resultset();	
                        foreach($rows as $result)
                        {
$Gender=$result['Gender'];
}
						$obj->dbclose();
return($Gender);
}
function Raasi($id)
{
	$obj 	= 	new Database();
$qry=$obj->query("select raasi from settings_raasi  where raasi_id=:id"); 
$obj->bind(":id",$id);
$rows = $obj->resultset();	
                        foreach($rows as $result)
                        {
$raasi=$result['raasi'];
}
						$obj->dbclose();
return($raasi);
}
function Star($id)
{
	$obj 	= 	new Database();
$qry=$obj->query("select star from  settings_star where star_id=:id"); 
$obj->bind(":id",$id);
$rows = $obj->resultset();	
                        foreach($rows as $result)
                        {
$star=$result['star'];
}
						$obj->dbclose();
return($star);
}


function MemberName($id)
{
	$obj 	= 	new Database();
$qry=$obj->query("select Name from member_accountdetails  where Member_AcId =:id"); 
$obj->bind(":id",$id);
$rows = $obj->resultset();	
foreach($rows as $result)
{
$Name=$result['Name'];
}
$obj->dbclose();
return($Name);
}
function MemberEmail($id)
{
	$obj 	= 	new Database();
$qry=$obj->query("select Email from member_accountdetails  where Member_AcId =:id"); 
$obj->bind(":id",$id);
$rows = $obj->resultset();	
foreach($rows as $result)
{
$Email=$result['Email'];
}
$obj->dbclose();
return($Email);
}
function MemberRegId($id)
{
	$obj 	= 	new Database();
$qry=$obj->query("select RegId from member_accountdetails  where Member_AcId =:id"); 
$obj->bind(":id",$id);
$rows = $obj->resultset();	
foreach($rows as $result)
{
$RegId=$result['RegId'];
}
$obj->dbclose();
return($RegId);
}
function HeightCms($id)
{
	$obj2 	= 	new Database();
$qry=$obj2->query("select * from  settings_height  where id =:id"); 
$obj2->bind(":id",$id);
$rows2 = $obj2->resultset();	
foreach($rows2 as $result2)
{
$heightcm=$result2['heightcm'];
}
$obj2->dbclose();
return($heightcm);
}
function Complexion($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select complexion from settings_complexion where id='$id'");
$obj2->bind(":id",$id);
$rows2 = $obj2->resultset();	
foreach($rows2 as $result2)
{
$complexion=$result2['complexion'];
}
$obj2->dbclose();
return($complexion);
}
function Caste($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select caste from settings_caste where id='$id'");
$obj2->bind(":id",$id);
$rows2 = $obj2->resultset();	
foreach($rows2 as $result2)
{
$caste=$result2['caste'];
}
$obj2->dbclose();
return($caste);
}
function Education($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select education from settings_education where id='$id'");
$obj2->bind(":id",$id);
$rows2 = $obj2->resultset();	
foreach($rows2 as $result2)
{
$education=$result2['education'];
}
$obj2->dbclose();
return($education);
}
function OccupationCategory($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select occupationcategory from settings_occupationcategory where id='$id'");
$obj2->bind(":id",$id);
$rows2 = $obj2->resultset();	
foreach($rows2 as $result2)
{
$occupationcategory=$result2['occupationcategory'];
}
$obj2->dbclose();
return($occupationcategory);
}
function District($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select district from settings_district where id='$id'");
$obj2->bind(":id",$id);
$rows2 = $obj2->resultset();	
foreach($rows2 as $result2)
{
$district=$result2['district'];
}
$obj2->dbclose();
return($district);
}
function State($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select  	State from settings_state where id='$id'");
$obj2->bind(":id",$id);
$rows2 = $obj2->resultset();	
foreach($rows2 as $result2)
{
$State=$result2['State'];
}
$obj2->dbclose();
return($State);
}
function WorkingCountry($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select country from settings_country where country_id='$id'");
$obj2->bind(":id",$id);
$rows2 = $obj2->resultset();	
foreach($rows2 as $result2)
{
$country=$result2['country'];
}
$obj2->dbclose();
return($country);
}
function Country($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select country from settings_country where country_id='$id'");
$obj2->bind(":id",$id);
$rows2 = $obj2->resultset();	
foreach($rows2 as $result2)
{
$country=$result2['country'];
}
$obj2->dbclose();
return($country);
}

function IsMemberExist_Account($UserName)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select Member_AcId from member_accountdetails where UserName='$UserName'");
$obj2->bind(":UserName",$UserName);
$rows2 = $obj2->resultset();
$k=0;	
foreach($rows2 as $result2)
{
$k++;
}
$obj2->dbclose();
return($k);
}

function  IsMemberExist_AdAccount($UserName)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select Member_AcId from advertisers_accountdetails where UserName='$UserName'");
$obj2->bind(":UserName",$UserName);
$rows2 = $obj2->resultset();
$k=0;	
foreach($rows2 as $result2)
{
$k++;
}
$obj2->dbclose();
return($k);
}

function displayad($type)
{
	
$obj2 	= 	new Database();
$qry=$obj2->query("select * from advertisement where display=:type");
$obj2->bind(":type",$type);
$rows2 = $obj2->resultset();	
foreach($rows2 as $fryart)
{
$adid=$fryart['id'];
		$display=$fryart['display'];
		$priority=$fryart['priority'];
		$caption=$fryart['caption'];
		$linktype=$fryart['linktype'];
		$link=$fryart['link'];
		$Photo="assets/Advertisement/".$fryart['Photo'];
		$k++;
		?><div style="padding-left:10px; padding-top:5px; padding-bottom:5px;">
        <?php
		if($linktype=="Video")
		{
		?><a href="javascript:videoad('<?php echo $adid; ?>');"><img src="<?php echo $Photo;?>" alt="<?php echo $imgalt1; ?>" border="0" width="820" height="100"/></a>
		<?php
		}
		else if($linktype=="Link")
		{
		?><a href="<?php echo $link; ?>"><img src="<?php echo $Photo;?>" alt="<?php echo $imgalt2; ?>" border="0"  width="820" height="100"/></a>
		<?php
		}
		else
		{?><img src="<?php echo $Photo;?>" alt="<?php echo $imgalt3; ?>"  width="820" height="100"/>
		<?php
		}
		?></div>
        <?php
}
$obj2->dbclose();
}

//---------------------Weight----------------------------------

function Weights($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select weight from settings_weight where id=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
                        foreach($rows as $fary)
                        {
$weight=$fary['weight'];
						}
$obj2->dbclose();
return($weight);	
}

//---------------------Body Type----------------------------------

function BodyType($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select * from settings_bodytype where id=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
                        foreach($rows as $fary)
                        {
$bodytype=$fary['bodytype'];
						}
$obj2->dbclose();
return($bodytype);	
}

//---------------------Blood group----------------------------------

function Bloodgroup($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select * from settings_bloodgroup where id=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$bloodgroup=$fary['bloodgroup'];
}
$obj2->dbclose();
return($bloodgroup);

}

//---------------------Physical Status----------------------------------

function PhysicalStatus($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select * from settings_physicalstatus where id=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$physicalstatus=$fary['physicalstatus'];
}
$obj2->dbclose();
return($physicalstatus);
}

//---------------------Marital Status----------------------------------

function MaritalStatus($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select * from settings_maritalstatus where id=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$maritalstatus=$fary['maritalstatus'];
}
$obj2->dbclose();
return($maritalstatus);
}

//---------------------Mother Tongue----------------------------------

function MotherTongue($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select * from settings_mothertongue where id=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$mothertongue=$fary['mothertongue'];
}
$obj2->dbclose();
return($mothertongue);
}
//---------------------Spoken Language----------------------------------

function SpokenLanguage($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select * from settings_spokenlanguage where id=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$spokenlanguage=$fary['spokenlanguage'];
}
$obj2->dbclose();
return($spokenlanguage);
}
//---------------------Religion---------------------------------------------

function Religion($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select * from settings_religion where id=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$religion=$fary['religion'];
}
$obj2->dbclose();
return($religion);
}
//---------------------Income------------------------------------------
function Income($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select * from settings_income where id=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$income=$fary['income'];
}
$obj2->dbclose();
return($income);
}

//---------------------Family Type-----------------------------------------
function FamilyType($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select * from settings_familytype where id=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$familytype=$fary['familytype'];
}
$obj2->dbclose();
return($familytype);
}
//---------------------Family Status------------------------------------------
function FamilyStatus($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select * from settings_familystatus where id=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$familystatus=$fary['familystatus'];
}
$obj2->dbclose();
return($familystatus);
}
//---------------------Family Value------------------------------------------
function FamilyValue($id)
{

$obj2 	= 	new Database();
$qry=$obj2->query("select * from settings_familyvalue where id=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$familyvalue=$fary['familyvalue'];
}
$obj2->dbclose();
return($familyvalue);
}
//---------------------profile created by Id------------------------------------------
function Profilecreatedby($id)
{
$obj2 	= 	new Database();
$qry=$obj2->query("select * from settings_profilecreatedby where id=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$profilecreatedby=$fary['profilecreatedby'];
}
$obj2->dbclose();
return($profilecreatedby);
}


function profilerate($rate_id)
{
	$obj2 	= 	new Database();
$qryy=$obj2->query("select * from settings_rate where rate_id=:rate_id");
$obj2->bind(":rate_id",$rate_id);
$rows2 = $obj2->resultset();	
$obj2->rowCount();
foreach($rows2 as $fryv1)
{
	return($fryv1['rate']);
}
$obj2->dbclose();
}
function updatebalanceamount($id,$rate)
{
	$obj2 	= 	new Database();
$qry=$obj2->query("select balanceamount from member_accountdetails where member_accountdetails.Member_AcId=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$balanceamount=$fary['balanceamount'];
}
$balanceamount=$balanceamount-$rate;
$obj2->dbclose();

	$db1 	= 	new Database();
		$db1->updatedata('member_accountdetails',array("balanceamount" => $balanceamount),array("Member_AcId" => $id));
		$db1->dbclose();
		return $balanceamount;
}
function balanceamount($id)
{
	$obj2 	= 	new Database();
$qry=$obj2->query("select balanceamount from member_accountdetails where member_accountdetails.Member_AcId=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$balanceamount=$fary['balanceamount'];
}
		return $balanceamount;
}
function updateadbalanceamount($id,$rate)
{
	$obj2 	= 	new Database();
$qry=$obj2->query("select balanceamount from  advertisers_accountdetails where  advertisers_accountdetails.Member_AcId=:id"); 
$obj2->bind(":id",$id);
$rows = $obj2->resultset();	
foreach($rows as $fary)
{
$balanceamount=$fary['balanceamount'];
}
$balanceamount=$balanceamount-$rate;
$obj2->dbclose();

	$db1 	= 	new Database();
		$db1->updatedata('advertisers_accountdetails',array("balanceamount" => $balanceamount),array("Member_AcId" => $id));
		$db1->dbclose();
		return $balanceamount;
}
?>