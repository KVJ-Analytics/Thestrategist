<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));	
		$this->load->model('User_model');
			$this->load->library('session');
	}
	public function index()
	{
		$ip=$_SERVER['REMOTE_ADDR'];
		$tabss='site_visits';
		$ab=$this->User_model->dis_visits($tabss,$ip);
		if(count($ab)>0)
		{
			//redirect(base_url()."Home");
		}
		else
		{
			$pr=array('ip_address'=>$ip);
			$tabss='site_visits';
			$this->User_model->ins_visites($tabss,$pr);
		}
			$u=$this->session->userdata('user_id');
		if($u!=''){
		    //data['user_status']
		    $data['user_id']=$u;
		    $menu['huser_id']=$u;
		    
		}else{
		     $data['user_id']='';
		     $menu['huser_id']='';
		}
		
			$idc=1;
			$data['pacts']='0';
		$tablec='contact';
		$menu['contact']=$this->User_model->get_toedit($idc,$tablec);
		$menu['pagetitle']='Data Analytics and Visualisation in Kochi, Kerala | The Strategist';
		//$footer['contact']=$this->User_model->get_toedit($idc,$tablec);
		$id=1;
		$menut='blogs';
		$menu['fblogs']=$this->User_model->get_data_latest($menut);
		$table='about';
		$data['aboutc']=$this->User_model->get_toedit($id,$table);
		$table3='tutorials';
		$data['tutorials']=$this->User_model->get_data_byordercon($table3);
		$table6='home_slider';
		$data['homeslider']=$this->User_model->get_data_byorder($table6);
		$table4='clients';
		$data['clients']=$this->User_model->get_data_byorder($table4);
		$table5='services';
		$data['services']=$this->User_model->get_data_byorder($table5);
		$menu['active']='home';
		$tablecat='tutorial_cat';
		$menu['basic_sub']=$this->User_model->get_data_byorder($tablecat);
		$tablef='fun_category';
		$menu['fun_category']=$this->User_model->get_data_byorder($tablef);
		$this->load->view('header',$menu);
		$this->load->view('home',$data);
		$this->load->view('footer');
	}
	public function services($pact){
	  //echo current_url();
	    		$u=$this->session->userdata('user_id');
		if($u!=''){
		    //data['user_status']
		    $data['user_id']=$u;
		    $menu['huser_id']=$u;
		    
		}else{
		     $data['user_id']='';
		     $menu['huser_id']='';
		}
		
		$tableb='sub_banner';
		$condb=array('page'=>'services');
		$sub_page['sub_det']=$this->User_model->get_databycond($condb,$tableb);
		$idc=1;
		$menut='blogs';
		$menu['fblogs']=$this->User_model->get_data_latest($menut);
		$tablec='contact';
		$menu['contact']=$this->User_model->get_toedit($idc,$tablec);
		$menu['pagetitle']='Strategist | Services';
			$table5='services';
		$data['services']=$this->User_model->get_data_byorder($table5);
						$table1p='flagship_pgms';
		$data['flagship_pgms']=$this->User_model->get_data_byorder($table1p);
	/*	$id=1;
		$table='about';
		$data['aboutc']=$this->User_model->get_toedit($id,$table);
		$table4='clients';
		$data['clients']=$this->User_model->get_data_byorder($table4);
		$table2='excel_courses';
		$cond3=array('course_type'=>'Online Courses');
		$data['on_course']=$this->User_model->get_databycond_order($cond3,$table2);
		//$table1='sub_banner';
		$cond2=array('course_type'=>'Direct Courses');
		$data['off_course']=$this->User_model->get_databycond_order($cond2,$table2);*/
		$tablem='tutorials';
		$menu['active']=$pact;
		$data['pacts']=$pact;
		$tablecat='tutorial_cat';
		$menu['basic_sub']=$this->User_model->get_data_byorder($tablecat);
		$tablef='fun_category';
		$menu['fun_category']=$this->User_model->get_data_byorder($tablef);
		$this->load->view('header',$menu);
		$this->load->view('sub_banner',$sub_page);
		$this->load->view('services',$data);
		$this->load->view('footer');
	}
	public function about()
	{
		
			$u=$this->session->userdata('user_id');
		if($u!=''){
		    //data['user_status']
		    $data['user_id']=$u;
		    $menu['huser_id']=$u;
		    
		}else{
		     $data['user_id']='';
		     $menu['huser_id']='';
		}
		$data['pacts']='0';
		$tableb='sub_banner';
		$condb=array('page'=>'about');
		$sub_page['sub_det']=$this->User_model->get_databycond($condb,$tableb);
		$idc=1;
		$menut='blogs';
		$menu['fblogs']=$this->User_model->get_data_latest($menut);
		$tablec='contact';
		$menu['contact']=$this->User_model->get_toedit($idc,$tablec);
		$menu['pagetitle']='Strategist |'.$sub_page['sub_det'][0]->title;
		$id=1;
		$table='about';
		$data['aboutc']=$this->User_model->get_toedit($id,$table);
		$table4='clients';
		$data['clients']=$this->User_model->get_data_byorder($table4);
		$table2='excel_courses';
		$cond3=array('course_type'=>'Online Courses');
		$data['on_course']=$this->User_model->get_databycond_order($cond3,$table2);
		//$table1='sub_banner';
		$cond2=array('course_type'=>'Direct Courses');
		$data['off_course']=$this->User_model->get_databycond_order($cond2,$table2);
		$tablem='tutorials';
		$menu['active']='about';
		$tablecat='tutorial_cat';
		$menu['basic_sub']=$this->User_model->get_data_byorder($tablecat);
		$tablef='fun_category';
		$menu['fun_category']=$this->User_model->get_data_byorder($tablef);
		$this->load->view('header',$menu);
		$this->load->view('sub_banner',$sub_page);
		$this->load->view('about',$data);
		$this->load->view('footer');
	}
	public function excel_functions($id)
	{
			$u=$this->session->userdata('user_id');
		if($u!=''){
		    //data['user_status']
		    $data['user_id']=$u;
		    $menu['huser_id']=$u;
		    
		}else{
		     $data['user_id']='';
		     $menu['huser_id']='';
		}
		$data['pacts']='0';
		$tablem='tutorials';
		$menu['active']='tutorials';
		$table4='fun_category';
		$data['fun_category']=$this->User_model->get_data_byorder($table4);
		$table3='excel_function';
		$cond=array('category_id'=>$id);
		$data['excel_function']=$this->User_model->get_databycond($cond,$table3);//print_r($data['excel_function']);
		$tablecat='tutorial_cat';
		$menu['basic_sub']=$this->User_model->get_data_byorder($tablecat);
		$tablef='fun_category';
		$menu['fun_category']=$this->User_model->get_data_byorder($tablef);
		$tableb='sub_banner';
		$condb=array('page'=>'functions');
		$sub_page['sub_det']=$this->User_model->get_databycond($condb,$tableb);
		$idc=1;
		$menut='blogs';
		$menu['fblogs']=$this->User_model->get_data_latest($menut);
		$tablec='contact';
		$menu['contact']=$this->User_model->get_toedit($idc,$tablec);
		$menu['pagetitle']='Strategist |'.$sub_page['sub_det'][0]->title;
		$this->load->view('header',$menu);
		$this->load->view('sub_banner',$sub_page);
		$this->load->view('functionsp',$data);
		$this->load->view('footer');
	}
	public function excel_resources()
	{
		//
			$u=$this->session->userdata('user_id');
		if($u!=''){
		    //data['user_status']
		    $data['user_id']=$u;
		    $menu['huser_id']=$u;
		    
		}else{
		     $data['user_id']='';
		     $menu['huser_id']='';
		}
		$data['pacts']='0';
		$table1='resources';
		$data['resources']=$this->User_model->get_data($table1);
		$table2='modules';
		$data['modules']=$this->User_model->get_data($table2);
		$tablem='tutorials';
		$menu['active']='resources';
		$tablecat='tutorial_cat';
		$menu['basic_sub']=$this->User_model->get_data_byorder($tablecat);
		$tablef='fun_category';
		$menu['fun_category']=$this->User_model->get_data_byorder($tablef);
		$condb=array('page'=>'resources');
		$tableb='sub_banner';
		$sub_page['sub_det']=$this->User_model->get_databycond($condb,$tableb);
		$idc=1;
		$menut='blogs';
		$menu['fblogs']=$this->User_model->get_data_latest($menut);
		$tablec='contact';
		$menu['contact']=$this->User_model->get_toedit($idc,$tablec);
		$menu['pagetitle']='Strategist |'.$sub_page['sub_det'][0]->title;
		$this->load->view('header',$menu);
		$this->load->view('sub_banner',$sub_page);
		$this->load->view('resourcesp',$data);
		$this->load->view('footer');
	}
	public function excel_training()
	{
		//training_method
			$u=$this->session->userdata('user_id');
		if($u!=''){
		    //data['user_status']
		    $data['user_id']=$u;
		    $menu['huser_id']=$u;
		    
		}else{
		     $data['user_id']='';
		     $menu['huser_id']='';
		}
		$table1g='gallery';
		$data['gallery']=$this->User_model->get_data_byorder($table1g);
				$table1p='flagship_pgms';
		$data['flagship_pgms']=$this->User_model->get_data_byorder($table1p);
		$table1='training_method';
		$data['training_method']=$this->User_model->get_data_byorder($table1);
		$table2='training_features';
		$data['training_features']=$this->User_model->get_data_byorder($table2);
		$table3='institutes';
		$data['institutes']=$this->User_model->get_data_byorder($table3);
		$table4='corporates';
		$data['corporates']=$this->User_model->get_data_byorder($table4);
					$table5='services';
		$data['services']=$this->User_model->get_data_byorder($table5);
		$tablem='tutorials';
		$menu['active']='training';
		$tablecat='tutorial_cat';
		$menu['basic_sub']=$this->User_model->get_data_byorder($tablecat);
		$tablef='fun_category';
		$menu['fun_category']=$this->User_model->get_data_byorder($tablef);
		$condb=array('page'=>'training');
		$tableb='sub_banner';
		$sub_page['sub_det']=$this->User_model->get_databycond($condb,$tableb);
		$idc=1;$data['pacts']='0';
		$menut='blogs';
		$menu['fblogs']=$this->User_model->get_data_latest($menut);
		$tablec='contact';
		$menu['contact']=$this->User_model->get_toedit($idc,$tablec);
		$menu['pagetitle']='Best advanced MS '.$sub_page['sub_det'][0]->title;
		$this->load->view('header',$menu);
		$this->load->view('sub_banner',$sub_page);
		$this->load->view('trainingp',$data);
		$this->load->view('footer');
	}
	public function excel_videos($id)
	{
	
		$u=$this->session->userdata('user_id');
		if($u!=''){
		    //data['user_status']
		    $data['user_id']=$u;
		    $menu['huser_id']=$u;
		    
		}else{
		     $data['user_id']='';
		     $menu['huser_id']='';
		}$data['pacts']='0';
		$cond1=array('id'=>$id);
		$table1='tutorials';
		$data['videos_det']=$this->User_model->get_databycond($cond1,$table1);
	//	print_r($data['videos_det']);die;
		$tablem='tutorials';
		$menu['active']='tutorials';
	$tablecat='tutorial_cat';
		$menu['basic_sub']=$this->User_model->get_data_byorder($tablecat);
		$tablef='fun_category';
		$menu['fun_category']=$this->User_model->get_data_byorder($tablef);
		$condb=array('page'=>'basics');
		$tableb='sub_banner';
		$sub_page['sub_det']=$this->User_model->get_databycond($condb,$tableb);
		$idc=1;
		$menut='blogs';
		$menu['fblogs']=$this->User_model->get_data_latest($menut);
		$tablec='contact';
		$menu['contact']=$this->User_model->get_toedit($idc,$tablec);
		$menu['pagetitle']='Strategist |'.$sub_page['sub_det'][0]->title;
		$this->load->view('header',$menu);
		$this->load->view('sub_banner',$sub_page);
		$this->load->view('videosp',$data);
		$this->load->view('footer');
	
	}
	public function excel_category($id){
	    //$data['blogs']=$this->User_model->get_data($table1);
			$u=$this->session->userdata('user_id');
		if($u!=''){
		    //data['user_status']
		    $data['user_id']=$u;
		    $menu['huser_id']=$u;
		    
		}else{
		     $data['user_id']='';
		     $menu['huser_id']='';
		}
		
	$data['pacts']='0';
		$tablem='tutorials';
		$menu['active']='tutorials';
		$tablecat='tutorial_cat';
		$menu['basic_sub']=$this->User_model->get_data_byorder($tablecat);
		$tablef='fun_category';
		$menu['fun_category']=$this->User_model->get_data_byorder($tablef);
		$condb=array('page'=>'basics');
		$tableb='sub_banner';
		$sub_page['sub_det']=$this->User_model->get_databycond($condb,$tableb);
		$idc=1;
		$menut='blogs';
		$menu['fblogs']=$this->User_model->get_data_latest($menut);
		$tablec='contact';
		$menu['contact']=$this->User_model->get_toedit($idc,$tablec);
		$menu['pagetitle']='Strategist |'.$sub_page['sub_det'][0]->title;
		$this->load->library('pagination');
		$config['base_url'] = base_url().'excel-tutorials/';
		$config['total_rows'] = count($menu['basic_sub']);
		$config['per_page'] = count($menu['basic_sub']);//20;
		$config["uri_segment"] = 5;
		$this->pagination->initialize($config);
				$limit=$config['per_page'];
		//echo $this->uri->segment(2);
		$table1='tutorials';
		$condb1=array('parent_tab'=>$id);
		$data['results']=$this->User_model->get_databycond($condb1,$table1);
		$condb1c=array('id'=>$id);
		$rc=$this->User_model->get_databycond($condb1c,$tablecat);
		$data['rcatd']=$rc[0]->category;
		//$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
       // $data["results"] = $this->User_model->get_tutorials($limit,$page);
        
        	
		$data['resultscat']=$this->User_model->get_data_byorder($tablecat);
		//print_r($data["results"]);
		$this->load->view('header',$menu);
		$this->load->view('sub_banner',$sub_page);
		$this->load->view('excelcats',$data);
		$this->load->view('footer');
	}
	public function excel_tutorials()
	{
		
		//$data['blogs']=$this->User_model->get_data($table1);
			$u=$this->session->userdata('user_id');
		if($u!=''){
		    //data['user_status']
		    $data['user_id']=$u;
		    $menu['huser_id']=$u;
		    
		}else{
		     $data['user_id']='';
		     $menu['huser_id']='';
		}
		
	
		$tablem='tutorials';
		$menu['active']='tutorials';
		$tablecat='tutorial_cat';
		$menu['basic_sub']=$this->User_model->get_data_byorder($tablecat);
		$tablef='fun_category';
		$menu['fun_category']=$this->User_model->get_data_byorder($tablef);
		$condb=array('page'=>'basics');
		$tableb='sub_banner';
		$sub_page['sub_det']=$this->User_model->get_databycond($condb,$tableb);
		$idc=1;
		$menut='blogs';
		$menu['fblogs']=$this->User_model->get_data_latest($menut);
		$tablec='contact';
		$menu['contact']=$this->User_model->get_toedit($idc,$tablec);
		$menu['pagetitle']='Strategist |'.$sub_page['sub_det'][0]->title;
		$this->load->library('pagination');
		$config['base_url'] = base_url().'excel-tutorials/';
		$config['total_rows'] = count($menu['basic_sub']);
		$config['per_page'] = count($menu['basic_sub']);//20;
		$config["uri_segment"] = 5;
		$this->pagination->initialize($config);
				$limit=$config['per_page'];
		//echo $this->uri->segment(2);
		$table1='tutorials';
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["results"] = $this->User_model->get_tutorials($limit,$page);
        $data['pacts']='0';
        	
		$data['resultscat']=$this->User_model->get_data_byorder($tablecat);
		//print_r($data["results"]);
		$this->load->view('header',$menu);
		$this->load->view('sub_banner',$sub_page);
		$this->load->view('basicsp',$data);
		$this->load->view('footer');
	}
	public function blog(){
			$u=$this->session->userdata('user_id');
		if($u!=''){
		    //data['user_status']
		    $data['user_id']=$u;
		    $menu['huser_id']=$u;
		    
		}else{
		     $data['user_id']='';
		     $menu['huser_id']='';
		}
		
		$table1='blogs';
		$data['blogs']=$this->User_model->get_data($table1);
		$data['lblogs']=$this->User_model->get_data_latest($table1);
		$tablem='tutorials';
		$menu['active']='blogs';
		$tablecat='tutorial_cat';
		$menu['basic_sub']=$this->User_model->get_data_byorder($tablecat);
		$tablef='fun_category';
		$menu['fun_category']=$this->User_model->get_data_byorder($tablef);
		$condb=array('page'=>'blogs');
		$tableb='sub_banner';
		$sub_page['sub_det']=$this->User_model->get_databycond($condb,$tableb);
	$data['pacts']='0';
		$idc=1;
		$menut='blogs';
		$menu['fblogs']=$this->User_model->get_data_latest($menut);
		$tablec='contact';
		$menu['contact']=$this->User_model->get_toedit($idc,$tablec);
		$menu['pagetitle']='Strategist |'.$sub_page['sub_det'][0]->title;
		$this->load->view('header',$menu);
		$this->load->view('sub_banner',$sub_page);
		$this->load->view('blog',$data);
		$this->load->view('footer',$menu);
	}
	public function blog_details($id){
			$u=$this->session->userdata('user_id');
		if($u!=''){
		    //data['user_status']
		    $data['user_id']=$u;
		    $menu['huser_id']=$u;
		    
		}else{
		     $data['user_id']='';
		     $menu['huser_id']='';
		}
		$data['pacts']='0';
		$cond1=array('id'=>$id);
		$table1='blogs';
		$data['blog_det']=$this->User_model->get_databycond($cond1,$table1);
		$data['lblogs']=$this->User_model->get_data_latest($table1);
		$tablem='tutorials';
		$menu['active']='blogs';
		$tablecat='tutorial_cat';
		$menu['basic_sub']=$this->User_model->get_data_byorder($tablecat);
		$tablef='fun_category';
		$menu['fun_category']=$this->User_model->get_data_byorder($tablef);
		$condb=array('page'=>'blogs');
		$tableb='sub_banner';
		$sub_page['sub_det']=$this->User_model->get_databycond($condb,$tableb);
		$idc=1;
		$menut='blogs';
		$menu['fblogs']=$this->User_model->get_data_latest($menut);
		$tablec='contact';
		$menu['contact']=$this->User_model->get_toedit($idc,$tablec);
		$menu['pagetitle']='Strategist |'.$sub_page['sub_det'][0]->title;
		$this->load->view('header',$menu);
		$this->load->view('sub_banner',$sub_page);
		$this->load->view('blog_detail',$data);
		$this->load->view('footer',$menu);
	}
	public function login(){
	    
	   $this->load->library('user_agent');
        $refer =$this->input->post('refer_from');
        if($this->input->post('lsubbut')!='')
        	    {
	        $table='user';
	        $uname=$this->input->post('username');
	        $pass=md5($this->input->post('password'));
	        $cond=array('email'=>$uname,'password'=>$pass);
	        $res=$this->User_model->get_databycond($cond,$table);
	        if(count($res)>0){
	            $this->session->set_userdata('user_id',$res[0]->id);
	            $urls=$refer;
	            redirect($urls);
	        }
	    }
	}
	public function register(){
	   
            $refer =$this->input->post('refer_from');  
       
        if($this->input->post('lsubbutr')!='')
	    {
	        $table='user';
	        $name=$this->input->post('name');
	        $place=$this->input->post('place');
	        $email=$this->input->post('mail');
	        $phone=$this->input->post('phone');
	        $pass=md5($this->input->post('password'));
	        $cond=array('name'=>$name,'place'=>$place,'email'=>$email,'phone'=>$phone,'password'=>$pass);
	        $res=$this->User_model->insert_user($cond,$table);
	       if($res){ 
	           $this->session->set_userdata('user_id',$res);
	            $urls=$refer;
	            redirect($urls);
	       }
	    }
	    
	}
		public function careers(){
			$u=$this->session->userdata('user_id');
		if($u!=''){
		    //data['user_status']
		    $data['user_id']=$u;
		    $menu['huser_id']=$u;
		    
		}else{
		     $data['user_id']='';
		     $menu['huser_id']='';
		}
		
	$data['pacts']='0';
		$tablem='tutorials';
		$menu['active']='training';
		$tablecat='tutorial_cat';
		$menu['basic_sub']=$this->User_model->get_data_byorder($tablecat);
		$tablef='fun_category';
		$menu['fun_category']=$this->User_model->get_data_byorder($tablef);
		$condb=array('page'=>'careers');
		$tableb='sub_banner';
		$sub_page['sub_det']=$this->User_model->get_databycond($condb,$tableb);
		$idc=1;
		$menut='blogs';
		$menu['fblogs']=$this->User_model->get_data_latest($menut);
		$tablec='contact';
		$menu['contact']=$this->User_model->get_toedit($idc,$tablec);
		$menu['pagetitle']='Strategist |'.$sub_page['sub_det'][0]->title;
		$this->load->view('header',$menu);
		$this->load->view('sub_banner',$sub_page);
		$this->load->view('careers',$data);
		$this->load->view('footer',$menu);
	}
	public function activation_mail(){
	      $password=$this->input->get('password');
	      $name=$this->input->get('name');
    	   $email=$this->input->get('use');//'kevinmathew94@gmail.com';//
    	   //$phonenumber=$this->input->post('phone');
    	     $subject = "Registered successfull!";
    	      $msg='
    	    Hi '.$name.',Welcome to thestrategist.co.in/ Your account is created successfully. Your account credentials are :
    	    Username : '.$email.'
    	    Password : '.$password.'
Please use the following link to activate your account 
http://thestrategist.co.in/excelvideos/user_activation.php?activation_code='.base64_encode($email).'';

mail($email, $subject, $msg,'mailing@thestrategist.co.in'); 
echo '<script>alert("mailsuccess,We will contact you shortly!")</script>';
redirect('http://thestrategist.co.in/excelvideos/checkmail.php?status=pending');
	}
	public function career_mail(){
	        $name=$this->input->post('name');
    	    $email=$this->input->post('email');
    	    $phonenumber=$this->input->post('phone');
    	    	$config['upload_path']          = './assets/images/uploads/career';

                $config['allowed_types']        = 'pdf|doc|docx';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;

if($_FILES['userfile']){

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfile'))

                {

				$error = $this->upload->display_errors();
//print_r($error);
                  echo "oops";     $insert_if = "0";

                }

                else

                {

                  //// echo "hi";    
                   $fileData = $this->upload->data();

               	$s_image = $fileData['file_name'];
 //$attched_file= "assets/images/uploads/career/".$s_image;
   // $this->email->attach($attched_file);
                 //die;
 $msg="<html>
    	    <body>
    	    <h2>Details</h2>
    	    <table style='border:none;'>
    	        <tr>
    	        <td>Name</td><td>:</td><td>".$name."</td></tr><tr>
    	        <td>Email</td><td>:</td><td>".$email."</td></tr><tr>
    	        <td>Phone Number</td><td>:</td><td>".$phonenumber."</td></tr>
    	       
    	    </table>
    	    </body>
    	    </html>";
    	    $subject="Web Site Career";
    	    $list = array('radhika@treegear.in');
           // $list = array('info@thestrategist.co.in');
           // $this->load->library('email');
            $this->load->library('email');
            $config = array();
/*$config = array();
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'xxx';
$config['smtp_user'] = 'xxx';
$config['smtp_pass'] = 'xxx';
$config['smtp_port'] = 25;
$this->email->initialize($config);*/
            $config['protocol']='smtp';
            $config['smtp_host']='ssl://bh-in-14.webhostbox.net';
            $config['smtp_port']='465';
            $config['smtp_timeout']='30';
            $config['smtp_user']='mail@thestrategist.co.in';
            $config['smtp_pass']='ex@strategist#123';
            $config['charset']='utf-8';
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $attched_file= "assets/images/uploads/career/".$s_image;
            $this->email->attach($attched_file);
            $this->email->from('mail@thestrategist.co.in', 'thestrategist.co.in');
            $this->email->to($list);
            $this->email->subject($subject);
            $this->email->message($msg);
            
            if($this->email->send()){
                $this->session->set_userdata('mailsuccess','We will contact you shortly!');
                
            }
            else{
            $this->session->set_userdata('error','Some Error Occured!');
            echo $this->email->print_debugger();
            }
            /*}else{
                $this->session->set_userdata('error','Wrong captcha');
            }*/
            redirect(base_url());
                }
}else{
     $msg="<html>
    	    <body>
    	    <h2>Details</h2>
    	    <table style='border:none;'>
    	        <tr>
    	        <td>Name</td><td>:</td><td>".$name."</td></tr><tr>
    	        <td>Email</td><td>:</td><td>".$email."</td></tr><tr>
    	        <td>Phone Number</td><td>:</td><td>".$phonenumber."</td></tr>
    	       <tr><td>resume not attached</td></tr>
    	    </table>
    	    </body>
    	    </html>";
    	    $subject="Web Site Career";
    	    $list = array('radhika@treegear.in');
           // $list = array('info@thestrategist.co.in');
           // $this->load->library('email');
            $this->load->library('email');
            $config = array();
/*$config = array();
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'xxx';
$config['smtp_user'] = 'xxx';
$config['smtp_pass'] = 'xxx';
$config['smtp_port'] = 25;
$this->email->initialize($config);*/
            $config['protocol']='smtp';
            $config['smtp_host']='ssl://bh-in-14.webhostbox.net';
            $config['smtp_port']='465';
            $config['smtp_timeout']='30';
            $config['smtp_user']='mail@thestrategist.co.in';
            $config['smtp_pass']='ex@strategist#123';
            $config['charset']='utf-8';
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
          //  $attched_file= "assets/images/uploads/career/".$s_image;
          //  $this->email->attach($attched_file);
            $this->email->from('mail@thestrategist.co.in', 'thestrategist.co.in');
            $this->email->to($list);
            $this->email->subject($subject);
            $this->email->message($msg);
            
            if($this->email->send()){
                $this->session->set_userdata('mailsuccess','We will contact you shortly!');
                
            }
            else{
            $this->session->set_userdata('error','Some Error Occured!');
            echo $this->email->print_debugger();
            }
            /*}else{
                $this->session->set_userdata('error','Wrong captcha');
            }*/
            redirect(base_url());
}
	}
	public function register_training(){
	        $name=$this->input->post('name');
    	    $email=$this->input->post('email');
    	    $phonenumber=$this->input->post('phone');
    	    $message=$this->input->post('message');
    	    $training_type=$this->input->post('training_type');
    	    /*$recaptcha = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {*/
    //echo "You got it!";

    	    $msg="<html>
    	    <body>
    	    <h2>Details</h2>
    	    <table style='border:none;'>
    	        <tr>
    	        <td>Name</td><td>:</td><td>".$name."</td></tr><tr>
    	        <td>Email</td><td>:</td><td>".$email."</td></tr><tr>
    	        <td>Phone Number</td><td>:</td><td>".$phonenumber."</td></tr>
    	        <tr>
    	        <td>Type of Training</td><td>:</td><td>".$training_type."</td></tr>
    	        <tr>
    	        <td>Message</td><td>:</td><td>".$message."</td>
    	        </tr>
    	    </table>
    	    </body>
    	    </html>";
    	    $subject="Message from Web Site";
    	   // $list = array('info@chiltonindia.com');
            $list = array('info@thestrategist.co.in');
            $this->load->library('email');
            $this->load->library('email');
            $config = array();
/*$config = array();
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'xxx';
$config['smtp_user'] = 'xxx';
$config['smtp_pass'] = 'xxx';
$config['smtp_port'] = 25;
$this->email->initialize($config);*/
            $config['protocol']='smtp';
            $config['smtp_host']='ssl://bh-in-14.webhostbox.net';
            $config['smtp_port']='465';
            $config['smtp_timeout']='30';
            $config['smtp_user']='mail@thestrategist.co.in';
            $config['smtp_pass']='ex@strategist#123';
            $config['charset']='utf-8';
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            
            $this->email->from('mail@thestrategist.co.in', 'thestrategist.co.in');
            $this->email->to($list);
            $this->email->subject($subject);
            $this->email->message($msg);
            
            if($this->email->send()){
                $this->session->set_userdata('mailsuccess','We will contact you shortly!');
                
            }
            else{
            $this->session->set_userdata('error','Some Error Occured!');
            echo $this->email->print_debugger();
            }
            /*}else{
                $this->session->set_userdata('error','Wrong captcha');
            }*/
            redirect(base_url().'excel-training');
	}
	public function newsletter(){
	        $name=$this->input->post('name');
    	    $email=$this->input->post('email');
    	    date_default_timezone_set('Asia/Kolkata');
    	    $dtime=date('Y-m-d H:i:s',strtotime('now'));
    	     $table='newsletter';
    	     $cond=array('name'=>$name,'date'=>$dtime,'email'=>$email);
	        $res=$this->User_model->insert_user($cond,$table);
	       if($res){ 
  $urls=base_url();
	    redirect($urls);
	       }
    	    
	}
	public function logout(){
	    $this->session->unset_userdata('user_id');
	    $urls=base_url();
	    redirect($urls);
	}
}
