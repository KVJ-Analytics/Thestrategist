<?php 
require_once('DatabaseClass.php');

class Adminclass extends DatabaseClass{

	//Begin User

	function insertUser($name,$email, $password, $random_salt, $type){

		$query="INSERT INTO `yk_login_details`(`l_username`, `l_email`, `l_password`, `l_salt`, `l_type`, `l_status`) VALUES('$name','$email', '$password', '$random_salt', '$type',0)";
		$queryCon=mysqli_query($this->con,$query);
		return true;
	}
	function allUsers(){

		$query="SELECT * FROM `yk_login_details` WHERE `l_status`=0";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)) {
			$result[]=$row;
		}
		return $result;

	}

	function selectuserById($id){
		$query="SELECT * FROM `yk_login_details` WHERE `l_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;
	}

	function updateUser($id,$name,$email,$type){

		$query="UPDATE `yk_login_details` SET `l_username`='$name',`l_email`='$email',`l_type`='$type' WHERE `l_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;


	}

	function deleteUser($id){

		$query="DELETE FROM `yk_login_details` WHERE `l_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;


	}

	function loginCheck($l_userName,$l_status){
		$query="SELECT * FROM `yk_login_details` WHERE `l_email`='$l_userName' and `l_status`='$l_status'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;
	}

	//End User

	//Begin Site Details

	function insertBasicInformation($name,$oname,$siteinfo,$phone,$mobile,$content,$email,$map,$you,$facebook,$twitter,$linkdn,$gplus,$logo,$banner,$fav,$bank,$account){

		$query="INSERT INTO `yk_basic`(`site_name`, `owner_name`, `siteinfo`, `phone`,`mobile`, `address`, `email`, `contact_map`, `youtube`, `facebook_url`, `twitter_url`, `linkdn_url`, `gplus_url`, `logo`, `banner`, `fav_ico`, `bank_details`, `account_details`)VALUES('$name','$oname','$siteinfo','$phone','$mobile','$content','$email','$map','$you','$facebook','$twitter','$linkdn','$gplus','$logo','$banner','$fav','$bank','$account')";
		$queryCon=mysqli_query($this->con,$query);
		return true;


	}

	function selectBasicInformation(){

		$query="SELECT * FROM `yk_basic` where `id`=1";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;
	}

	function updateBasicInformation($name,$oname,$siteinfo,$phone,$mobile,$content,$email,$map,$you,$facebook,$twitter,$linkdn,$gplus,$logo,$banner,$fav,$bank,$account){

			 $query="UPDATE `yk_basic` SET `site_name`='$name',`owner_name`='$oname',`siteinfo`='$siteinfo',`phone`='$phone',`address`='$content',`email`='$email',`contact_map`='$map',`youtube`='$you',`facebook_url`='$facebook',`twitter_url`='$twitter',`linkdn_url`='$linkdn',`gplus_url`='$gplus',`logo`='$logo',`banner`='$banner',`fav_ico`='$fav' WHERE `id`=1";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	//End Site Details

	//Begin Menu Details

	function insertMenu($name,$sub_title,$parent,$sort,$pagelink){

		$query="INSERT INTO `yk_menu`(`m_name`, `m_sub_title`, `m_parent`, `m_sort_order`, `m_page_url`) VALUES('$name','$sub_title','$parent','$sort','$pagelink')";
		$queryCon=mysqli_query($this->con,$query);
		return true;


	}


	function selectMenus(){

		$query="SELECT * FROM `yk_menu` ORDER BY `m_sort_order`";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)) {
			$result[]=$row;
		}
		return $result;
	}

	function selectMenuById($id){
		$query="SELECT * FROM `yk_menu` WHERE `m_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;
	}

	function updateMenu($id,$name,$sub_title,$parent,$sort,$page_link){

		$query="UPDATE `yk_menu` SET `m_name`='$name',`m_sub_title`='$sub_title',`m_parent`='$parent',`m_sort_order`='$sort',`m_page_url`='$page_link' WHERE `m_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}


	function selectMenuByName($my_data){

		$query="SELECT `m_name` FROM ak_menu WHERE `m_name` LIKE '%$my_data%' ORDER BY `m_name`";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)) {
			$result[]=$row;
		}
		return $result;
	}

	function deleteMenu($id){

		$query="DELETE FROM `yk_menu` WHERE `m_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;

	}



	//End Menu

	//Begin Layout Details
	
	function insetLayout($title,$href){

		$query="INSERT INTO `yk_layout`(`lay_name`, `lay_href`, `lay_status`) VALUES('$title','$href','1')";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function slectLayout(){

		$query="SELECT * FROM `yk_layout`";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)) {
			$result[]=$row;
		}
		return $result;
	}

	function selectLayoutById($lid){

		$query="SELECT * FROM `yk_layout` WHERE `lay_id`='$lid'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;

	}

	function updateLayout($title,$href,$id){

		$query="UPDATE `yk_layout` SET `lay_name`='$title',`lay_href`='$href' WHERE `lay_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function deleteLayout($lid){

		$query="DELETE FROM `yk_layout` WHERE `lay_id`='$lid'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	//End Layout

	//Begin Page Details

	function insertPage($pgname,$title, $head,$key,$desc,$seo_key,$author,$content,$thumb,$href,$lay,$sort_order,$url_status,$status){

		 $query="INSERT INTO `yk_page_details`(`page_name`, `page_title`, `page_head`, `meta_keyword`, `meta_description`, `seo_key`, `author`, `contents`, `banner`, `href`, `layout`, `sort_order`, `url_status`, `status`) VALUES('$pgname','$title', '$head','$key','$desc','$seo_key','$author','$content','$thumb','$href','$lay','$sort_order','$url_status','$status')";
		$queryCon=mysqli_query($this->con,$query);
		return mysqli_insert_id($this->con);

	}

	function allPage($page_id){

		$query="SELECT * FROM `yk_page_details` WHERE `page_id` !='$page_id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;

	}

	function allPages(){

		$query="SELECT * FROM `yk_page_details` ORDER BY `sort_order`";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)) {
			$result[]=$row;
		}
		return $result;
	}
	function selectPageById($id){

		$query="SELECT * FROM `yk_page_details` WHERE `page_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;

	}
	function selectPagesLink($href){

		$query="SELECT * FROM `yk_page_details` WHERE `href` LIKE '%$href%'";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)) {
			$result[]=$row;
		}
		return $result;
	}

	function updatePage($id,$title,$head,$key,$desc,$seo_key,$author,$content,$thumb,$sort_order,$url_status,$status){

		
		$query="UPDATE `yk_page_details` SET `page_title`='$title',`page_head`='$head',`meta_keyword`='$key',`meta_description`='$desc',`seo_key`='$seo_key',`author`='$author',`contents`='$content',`banner`='$thumb',`sort_order`='$sort_order',`url_status`='$url_status',`status`='$status' WHERE `page_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function updatePagestatus($status,$id){

		$query="UPDATE `yk_page_details` SET `status`='$status' WHERE `page_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;
	}

	function deletePage($id){

		$query="DELETE FROM `yk_page_details` WHERE `page_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function updatePageLayout($pagename,$lay,$id){

		$query="UPDATE `yk_page_details` SET `href`='$pagename',`layout`='$lay' WHERE `page_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;


	}
	function pageByURL($pagename){
		$query="SELECT * FROM `yk_page_details` WHERE `href`='$pagename'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;
	}

		//End page

	//Begin About Details


	function insertAbout($title,$about,$stregth,$mission){

		 $query="INSERT INTO `yk_about`(`a_title`, `a_content`, `a_mission`, `a_strength`) VALUES ('$title','$about','$mission','$stregth')";
		$queryCon=mysqli_query($this->con,$query);
		return mysqli_insert_id($this->con);
	}


	function selectAbout(){

		$query="SELECT * FROM `yk_about` WHERE `a_id`=1";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;

	}
	function updateAbout($title,$about,$stregth,$mission){

		echo $query="UPDATE `yk_about` SET `a_title`='$title',`a_content`='$about',`a_mission`='$mission',`a_strength`='$stregth' WHERE `a_id`=1";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	// function deleteResortImage($id){

	// 	$query="DELETE FROM `yk_ayurveda_images` WHERE `ai_id`='$id'";
	// 	$queryCon=mysqli_query($this->con,$query);
	// 	return true;

	// }
	//end About 

	function insertTeam($title,$about,$history,$jersey_des,$jersy){

		 $query="INSERT INTO `yk_team`(`t_title`,`t_description`, `t_history`,`t_jersey_des`, `t_jersey`) VALUES ('$title','$about','$history','$jersey_des','$jersy')";
		$queryCon=mysqli_query($this->con,$query);
		return true;
	}
		function selectTeam(){

		$query="SELECT * FROM `yk_team` WHERE `t_id`=1";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;

	}
	function updateTeam($title,$about,$history,$jersey_des,$jersy){

		echo $query="UPDATE `yk_team` SET `t_title`='$title',`t_description`='$about',`t_history`='$history',`t_jersey`='$jersy',`t_jersey_des`='$jersey_des' WHERE `t_id`=1";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}
	//end team
	//begin Achivement
	function insertAchivement($title,$year,$place,$about,$thumb,$sort){

		 $query="INSERT INTO `yk_achivements`(`ac_name`, `ac_year`, `ac_position`, `ac_description`, `ac_thumb`, `ac_sort_order`) VALUES ('$title','$year','$place','$about','$thumb','$sort')";
		$queryCon=mysqli_query($this->con,$query);
		return mysqli_insert_id($this->con);
	}

	function insertAchivementImage($insertAchivement,$image_path){

		 $query="INSERT INTO `yk_achivement_images`(`ac_img_ac_id`, `ac_img_image`) VALUES ('$insertAchivement','$image_path')";
		$queryCon=mysqli_query($this->con,$query);
		return true;
	}


	function selectAchivement()
	{
		$query="SELECT * FROM `yk_achivements` ORDER BY `ac_sort_order`";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)){
			$result[]=$row;
		
		}
		return $result;
	}

	function selectAchivementById($id){

		$query="SELECT * FROM `yk_achivements` WHERE `ac_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;

	}
	

	function selectAchivementImageById($id)
	{
		$query="SELECT * FROM `yk_achivement_images` WHERE `ac_img_ac_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)){
			$result[]=$row;
		
		}
		return $result;
	}

	function updateAchivement($id,$title,$year,$place,$about,$thumb,$sort){

		 $query="UPDATE `yk_achivements` SET `ac_name`='$title',`ac_year`='$year',`ac_position`='$place',`ac_description`='$about',`ac_thumb`='$thumb',`ac_sort_order`='$sort' WHERE `ac_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function deleteAchivement($id){

		$query="DELETE FROM `yk_achivements` WHERE `ac_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function deleteAchivementImage($id){

		$query="DELETE FROM `yk_achivement_images` WHERE `ac_img_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	//end Achivement
	//begin gallery
	
	function insertGallery($name,$thumb,$sort){

		$query="INSERT INTO `yk_gallery`( `g_name`, `g_image`, `g_sort_order`) VALUES ('$name','$thumb','$sort')";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function selectGallery(){

		$query="SELECT * FROM `yk_gallery` ORDER BY `g_sort_order`";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)){
			$result[]=$row;
		
		}
		return $result;

	}

	function selectGalleyById($id){

		$query="SELECT * FROM `yk_gallery` WHERE `g_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;

	}

	function updateGallery($id,$name,$image,$sort){

		$query="UPDATE `yk_gallery` SET `g_name`='$name',`g_image`='$image',`g_sort_order`='$sort' WHERE `g_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function deleteGallery($id){

		$query="DELETE FROM `yk_gallery` WHERE `g_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	//end gallery
	//begin events
	
	function insertEvents($title,$content,$date,$posted,$image,$sort){

	$query="INSERT INTO `yk_events`(`e_title`, `e_image`, `e_description`, `e_date`, `e_posted_by`, `e_sort_order`) VALUES ('$title','$image','$content','$date','$posted','$sort')";
	$queryCon=mysqli_query($this->con,$query);
	return true;

	}

	function selectEvents(){

		$query="SELECT * FROM `yk_events` ORDER BY `e_sort_order`";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)){
			$result[]=$row;
		
		}
		return $result;

	}

	function selectEventById($id){

		$query="SELECT * FROM `yk_events` WHERE `e_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;

	}

	function updateEvent($id,$title,$content,$date,$posted,$image,$sort){

		$query="UPDATE `yk_events` SET `e_title`='$title',`e_image`='$image',`e_description`='$content',`e_date`='$date',`e_posted_by`='$posted',`e_sort_order`='$sort' WHERE `e_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function deleteEvent($id){

		$query="DELETE FROM `yk_events` WHERE `e_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}
//end event
//begin squad
	
	function insertSquad($name,$position,$thumb,$image,$sort){

	$query="INSERT INTO `yk_squad`(`s_name`, `s_position`, `s_thumb`, `s_image`, `s_sort_order`) VALUES ('$name','$position','$thumb','$image','$sort')";
	$queryCon=mysqli_query($this->con,$query);
	return true;

	}

	function selectSquad(){

		$query="SELECT * FROM `yk_squad` ORDER BY `s_sort_order`";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)){
			$result[]=$row;
		
		}
		return $result;

	}

	function selectSquadById($id){

		$query="SELECT * FROM `yk_squad` WHERE `s_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;

	}

	function updateSquad($id,$name,$position,$thumb,$image,$sort){

		$query="UPDATE `yk_squad` SET `s_name`='$name',`s_position`='$position',`s_thumb`='$thumb',`s_image`='$image',`s_sort_order`='$sort' WHERE `s_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function deleteSquad($id){

		$query="DELETE FROM `yk_squad` WHERE `s_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

//end squads
//begin news
	function insertNews($title,$year,$tag_title,$about,$thumb,$sort){

		$query="INSERT INTO `yk_news`(`n_tag_title`, `n_title`, `n_date`, `n_thumb`, `n_description`, `n_sort_order`) VALUES ('$tag_title','$title','$year','$n_thumb','$about','$sort')";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function selectNews()
	{
		$query="SELECT * FROM `yk_news` ORDER BY `n_sort_order`";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)){
			$result[]=$row;
		
		}
		return $result;
	}

	function selectNewsById($id){

		$query="SELECT * FROM `yk_news` WHERE `n_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;

	}

	function updateNews($id,$title,$tag_title,$year,$about,$thumb,$sort){

		$query="UPDATE `yk_news` SET `n_tag_title`='$tag_title',`n_title`='$title',`n_date`='$year',`n_thumb`='$thumb',`n_description`='$about',`n_sort_order`='$sort' WHERE `n_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function deleteNews($id){

		$query="DELETE FROM `yk_news` WHERE `n_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

//end news

//begin Banner
	function insertBanner($title,$bigfile,$caption, $sort){

		$query="INSERT INTO `yk_banner`(`ban_title`, `ban_image`, `ban_caption`, `ban_sort_order`) VALUES('$title','$bigfile','$caption', '$sort') ";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function selectBanners(){

		$query="SELECT * FROM `yk_banner`  ORDER BY `ban_sort_order` ASC";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)) {
			$result[]=$row;
		}
		return $result;
	}

	function selectDisplayBanners(){

		$query="SELECT * FROM `yk_banner`  ORDER BY `ban_sort_order` DESC";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)) {
			$result[]=$row;
		}
		return $result;
	}

	function selectSingleBanners(){

		$query="SELECT * FROM `yk_banner` where `ban_id` =1  LIMIT 1";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;
	}

	function selectBannerById($banner_id){

		$query="SELECT * FROM `yk_banner` WHERE `ban_id`='$banner_id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;
	}

	function updateBanner($title,$bigfile,$caption,$sort_order,$id){

		$query="UPDATE `yk_banner` SET `ban_title`='$title',`ban_image`='$bigfile',`ban_caption`='$caption',`ban_sort_order`='$sort_order' WHERE `ban_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;
	}

	function deleteBanner($id){

		$query="DELETE FROM `yk_banner` WHERE `ban_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;
	}
	//end Banner
	


	//Begin Social Media

	function insertSocialMedia($name,$url,$class,$sort_order){

		$query="INSERT INTO `yk_social_media`(`so_name`, `so_url`, `so_class`, `so_sort_order`, `so_status`) VALUES('$name','$url','$class', '$sort_order','0') ";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function selectSocialMedias(){

		$query="SELECT * FROM `yk_social_media` WHERE `so_status`=0 ORDER BY `so_sort_order` ASC";
		$queryCon=mysqli_query($this->con,$query);
		$result=array();
		while ($row=mysqli_fetch_array($queryCon)) {
			$result[]=$row;
		}
		return $result;
	}

	function selectSocialMediaById($id){

		$query="SELECT * FROM `yk_social_media` WHERE `so_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;
	}

	function updateSocialMedia($name,$url,$id,$class,$sort_order){

		$query="UPDATE `yk_social_media` SET `so_name`='$name',`so_url`='$url',`so_class`='$class',`so_sort_order`='$sort_order' WHERE `so_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;

	}

	function deleteSocial($id){

		$query="DELETE FROM `yk_social_media` WHERE `so_id`='$id'";
		$queryCon=mysqli_query($this->con,$query);
		return true;
	}

		//End Social Media
	//visitors count
		function insertVisitorsCount($counter,$user_ip,$date){

		$query="INSERT INTO `yk_visitors`( `v_counter`, `v_ip_address`, `v_date`) VALUES ('$counter','$user_ip','$date')";
		$queryCon=mysqli_query($this->con,$query);
		return true;
	}
	function selectVisitorsCount(){

		$query="SELECT `v_counter` from yk_visitors ORDER BY `v_id` DESC LIMIT 1";
		$queryCon=mysqli_query($this->con,$query);
		$row=mysqli_fetch_array($queryCon);
		return $row;
	}

	function add_activity($activity_name,$desc,$user)
	{
		
		$date=date('y-m-d h:i:s');	
		$query="INSERT INTO `yk_site_activity`( `name`, `description`, `date_activity`,`user`) VALUES ('$activity_name','$desc','$date','$user')";
		$queryCon=mysqli_query($this->con,$query);
		return true;
	}

				
}
?>