<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('session');		
		$this->load->model('Admin_model');
		$this->load->library('upload'); 
	}
	public function index(){
		$this->load->view('admin/login');
		
	}
	public function login(){
		$this->load->view('admin/login');
	}
	public function loginProcess(){
			$username=$this->input->post('username');
			$password=md5($this->input->post('password'));//die;
			$det=array('username'=>$username,'password'=>$password);	
			//username :info@strategist.com,password:strategist@excel#123
			$result=$this->Admin_model->check_admin($det);
			//print_r($result);
			if(!empty($result))
			{
			foreach($result as $res1)
				{
				 $id=$res1->id;
				}
				$this->session->set_userdata("userid",$id);
    			$this->dashboard();
    		}
    		else 
    		{
	    		$this->session->set_userdata('error_login', 'Invalid Username or Password');
	    		$this->load->view("admin/login");
    		}

	}
	public function isLoggedIn(){
				$userid = $this->session->userdata("userid");
				if(!empty($userid)){
					return true;
				}else {
					return false;
				}
	}
	public function dashboard(){
				if(!$this->isLoggedIn())
					{
						redirect("AdminController/login");
					}
					else
					{
						$tabled="site_activity";
						$data['act']=$this->Admin_model->get_data($tabled);
						$tablev="site_visits";
						$data['visit']=$this->Admin_model->get_data($tablev);
						//$data="";
						$this->load->view('admin/header');
						$this->load->view('admin/side_header');
						$this->load->view('admin/menu');
						$this->load->view('admin/dashboard',$data);
						$this->load->view('admin/footer');
					}	
	}
	public function services(){
		$table='services';
				$data['projects']=$this->Admin_model->get_data_byorder($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/services',$data);
				$this->load->view('admin/footer');
	}
	public function service_add(){
		$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/add_service');
				$this->load->view('admin/footer');
	}
	public function add_Service_process(){
		$title = $this->input->post('title');
				$desc = $this->input->post('desc');
				$link = $this->input->post('link');
				$sort_order= $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/services';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

				$error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$s_image = $fileData['file_name'];

                 //die;

                }
				
				
				if ( ! $this->upload->do_upload('userfileImageicon'))

                {

				$error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$s_imageicon = $fileData['file_name'];

                 //die;

                }
				
                 $data = array('title'=>$title ,'content'=>$desc,'sort_order' => $sort_order,'icon_image'=>$s_imageicon,'page_image'=>$s_image);

				$table="services";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'Services added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/services";
				redirect($rurl);
			}
	}
	public function service_edit($id){
			$table='services';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/service_edit',$datas);
			$this->load->view('admin/footer');
	}
	public function update_services(){
				$s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('p_head1');
				$p_head2= $this->input->post('p_head2');
				//$p_subhead1= $this->input->post('p_subhead1');
				$b_image='';
				$b_imageicon='';
				//$p_link= $this->input->post('p_link');
				$slider_image = $this->input->post('ban_image');
				$slider_imageicon = $this->input->post('ban_imageicon');
				$p_order = $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/services';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

      $error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$b_image = $fileData['file_name'];

                 //die;

                }
                if($b_image=="")
                {
                	$b_image=$slider_image;
                }
				
				
				if ( ! $this->upload->do_upload('userfileImageicon'))

                {

      $error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$b_imageicon = $fileData['file_name'];

                 //die;

                }
                if($b_imageicon=="")
                {
                	$b_imageicon=$slider_imageicon;
                }
				
				
                 /*$data = array('j_title'=>$slider_title , 'j_details' => $slider_content , 'j_order' => $slider_order ,'j_image'=>$b_image);*/
                $data = array('title'=>$p_head1 ,'content' => $p_head2,'sort_order' => $p_order,'page_image'=>$b_image,'icon_image'=>$b_imageicon);
				$table="services";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'services updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/services";
				redirect($rurl);
			}
	}
	public function service_delete($id){
		$table="services";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'service deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/services";
				redirect($rurl);
	}
	public function deleteMultipleservices(){
		$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="services";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'services deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/services";
				redirect($rurl);
	}
	public function corporates(){
				$table='corporates';
				$data['projects']=$this->Admin_model->get_data_byorder($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/corporates',$data);
				$this->load->view('admin/footer');
	}
	
	public function corporates_add(){
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/add_corporates');
				$this->load->view('admin/footer');
	}
	public  function add_corporates_process(){
				$title = $this->input->post('title');
				$sort_order= $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/corporates';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

				$error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$s_image = $fileData['file_name'];

                 //die;

                }
                 $data = array('name'=>$title ,'sort_order' => $sort_order,'image'=>$s_image);

				$table="corporates";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'corporate added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/corporates";
				redirect($rurl);
			}
	}
	function corporates_edit($id){
			$table='corporates';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/edit_corporates',$datas);
			$this->load->view('admin/footer');	
	}
	function update_corporates(){
				$s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('p_head1');
				$slider_image = $this->input->post('ban_image');
				$p_order = $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/corporates';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

      $error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$b_image = $fileData['file_name'];

                 //die;

                }
                if($b_image=="")
                {
                	$b_image=$slider_image;
                }
                 /*$data = array('j_title'=>$slider_title , 'j_details' => $slider_content , 'j_order' => $slider_order ,'j_image'=>$b_image);*/
                $data = array('name'=>$p_head1 ,'sort_order' => $p_order,'image'=>$b_image);
				$table="corporates";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'corporate updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/corporates";
				redirect($rurl);
			}
	}
	function corporates_delete($id){
			$table="corporates";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'corporate deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/corporates";
				redirect($rurl);
	}
	function deleteMultiplecorporates(){
			$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="corporates";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'corporates deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/corporates";
				redirect($rurl);
	}
	public function institutes(){
				$table='institutes';
				$data['projects']=$this->Admin_model->get_data_byorder($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/institutes',$data);
				$this->load->view('admin/footer');
	}
	public function institutes_add(){
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/add_institutes');
				$this->load->view('admin/footer');
	}
	public  function add_institutes_process(){
				$title = $this->input->post('title');
				$sort_order= $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/institutes';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

				$error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$s_image = $fileData['file_name'];

                 //die;

                }
                 $data = array('name'=>$title ,'sort_order' => $sort_order,'image'=>$s_image);

				$table="institutes";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'institute added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/institutes";
				redirect($rurl);
			}
	}
	
	function institutes_edit($id){
			$table='institutes';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/edit_institutes',$datas);
			$this->load->view('admin/footer');	
	}
	function update_institutes(){
				$s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('p_head1');
				$slider_image = $this->input->post('ban_image');
				$p_order = $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/institutes';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

      $error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$b_image = $fileData['file_name'];

                 //die;

                }
                if($b_image=="")
                {
                	$b_image=$slider_image;
                }
                 /*$data = array('j_title'=>$slider_title , 'j_details' => $slider_content , 'j_order' => $slider_order ,'j_image'=>$b_image);*/
                $data = array('name'=>$p_head1 ,'sort_order' => $p_order,'image'=>$b_image);
				$table="institutes";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'institutes updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/institutes";
				redirect($rurl);
			}
	}
	function institutes_delete($id){
			$table="institutes";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'institute deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/institutes";
				redirect($rurl);
	}
	function deleteMultipleinstitutes(){
			$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="institutes";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'institutes deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/institutes";
				redirect($rurl);
	}
	
	public function clients(){
				$table='clients';
				$data['projects']=$this->Admin_model->get_data_byorder($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/clients',$data);
				$this->load->view('admin/footer');
	}
	public function clients_add(){
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/add_clients');
				$this->load->view('admin/footer');
	}
	public  function add_clients_process(){
				$title = $this->input->post('title');
				$sort_order= $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/clients';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

				$error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$s_image = $fileData['file_name'];

                 //die;

                }
                 $data = array('company'=>$title ,'sort_order' => $sort_order,'image'=>$s_image);

				$table="clients";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'clients added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/clients";
				redirect($rurl);
			}
	}
	function clients_edit($id){
			$table='clients';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/edit_clients',$datas);
			$this->load->view('admin/footer');	
	}
	function update_clients(){
				$s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('p_head1');
				$slider_image = $this->input->post('ban_image');
				$p_order = $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/clients';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

      $error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$b_image = $fileData['file_name'];

                 //die;

                }
                if($b_image=="")
                {
                	$b_image=$slider_image;
                }
                 /*$data = array('j_title'=>$slider_title , 'j_details' => $slider_content , 'j_order' => $slider_order ,'j_image'=>$b_image);*/
                $data = array('company'=>$p_head1 ,'sort_order' => $p_order,'image'=>$b_image);
				$table="clients";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'clients updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/clients";
				redirect($rurl);
			}
	}
	function clients_delete($id){
			$table="clients";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'client deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/clients";
				redirect($rurl);
	}
	function deleteMultipleclients(){
			$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="clients";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'clients deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/clients";
				redirect($rurl);
	}
	function about(){
			$table='about';
			$data['about_edit1']=$this->Admin_model->get_data($table);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/about',$data);
			$this->load->view('admin/footer');	
	}
	function edit_about_process(){
			$id = $this->input->post('ids');
			$about_title1 = $this->input->post('about_title1');
			$description1 = $this->input->post('description1');
			$description2 = $this->input->post('description2');
			$a_image = $this->input->post('a_image');
			$b_image2='';
			$b_image='';
				$config['upload_path']          = './assets/images/uploads/about';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 1000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

					$error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$b_image = $fileData['file_name'];

                 //die;

                }
                if($b_image=="")
                {
                	$b_image=$a_image;
                }
				
               $data = array('title' => $about_title1,'content'=>$description1,'short_desc'=>$description2,'image'=>$b_image);

				$table="about";

				$cond = array('id'=>$id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'about content updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/about";
				redirect($rurl);
			}  
			
	}
	
	public function training_features(){
		$table='training_features';
				$data['projects']=$this->Admin_model->get_data_byorder($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/training_features',$data);
				$this->load->view('admin/footer');
	}
	public function training_features_add(){
	
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/training_features_add');
				$this->load->view('admin/footer');
	}
	public function add_training_features_process(){
		$title = $this->input->post('title');
				
				
				$sort_order= $this->input->post('sort_order');

			 	
                 $data = array('short_desc'=>$title ,'sort_order' => $sort_order);

				$table="training_features";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'training features added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/training_features";
				redirect($rurl);
			}
	}
	
	public function training_features_edit($id){
		
	$table='training_features';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/edit_training_features',$datas);
			$this->load->view('admin/footer');	
	}
	function update_training_features(){
				$s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('title');
				
				$p_order = $this->input->post('sort_order');

                $data = array('short_desc'=>$p_head1 ,'sort_order' => $p_order);
				$table="training_features";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'training feature updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/training_features";
				redirect($rurl);
			}
	}
	
	function training_features_delete($id){
			$table="training_features";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'training features deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/training_features";
				redirect($rurl);
	}
	function deleteMultipletraining_features(){
			$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="training_features";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'training features deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/training_features";
				redirect($rurl);
	}
	public function blogs(){
		
		$table='blogs';
				$data['projects']=$this->Admin_model->get_data($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/blogs',$data);
				$this->load->view('admin/footer');	
	}
	public function blogs_add(){
	
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/blogs_add');
				$this->load->view('admin/footer');
	}
	public function add_blog_process(){
				$title = $this->input->post('title');
				$desc = $this->input->post('desc');
				$p_link = $this->input->post('p_link');
				$short_desc = $this->input->post('short_desc');
				
				//print_r($_FILES);
					$config['upload_path']          = './assets/images/uploads/blogs';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {
					echo "fail";
				echo $error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {
						echo "hi";
                       
					//	echo $error = $this->upload->display_errors();
						$fileData = $this->upload->data();

               	$s_image = $fileData['file_name'];

                 //

                }
				
			
				/*

			 	$config2['upload_path']          = './assets/images/uploads/blogs';

                $config2['allowed_types']        = 'mp4|3gp|flv|mp3|wmv';

                $config2['max_size']             = 10000000;
				$config2['max_width']            = 2048;

                $config2['max_height']           = 2048;
             



                $this->load->library('upload', $config2);

                $this->upload->initialize($config2);

                if ( ! $this->upload->do_upload('userfileVideo'))

                {
//echo "hi2";
				echo $error2 = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {
//echo "fail2";
                        $fileDatav= $this->upload->data();

               	$s_video = $fileDatav['file_name'];

                 //die;

                }*/
				
				//die;
				$s_video ='nill';
				date_default_timezone_set('Asia/Kolkata');
				$bdate=date('Y-m-d',strtotime('now'));
                 $data = array('title'=>$title ,'date'=>$bdate,'content'=>$desc,'video' => $s_video,'image'=>$s_image,'link'=>$p_link,'short_desc'=>$short_desc);

				$table="blogs";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'blog added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/blogs";
				redirect($rurl);
			}
	}
	
	
	public function blogs_edit($id){
		
	$table='blogs';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/blogs_edit',$datas);
			$this->load->view('admin/footer');	
	}
	function update_blogs_method(){
				$s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('p_head1');
				$p_head2= $this->input->post('p_head2');
				$p_link = $this->input->post('p_link');
				$slider_image = $this->input->post('ban_image');
				$short_desc = $this->input->post('short_desc');
				//$slider_video = $this->input->post('ban_video');
				//$p_order = $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/blogs';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

      $error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$b_image = $fileData['file_name'];

                 //die;

                }
                if($b_image=="")
                {
                	$b_image=$slider_image;
                }
				
				
				/*
				$config2['upload_path']          = './assets/images/uploads/blogs';

                $config2['allowed_types']        = 'mp4|3gp|flv|mp3|wmv';

                $config2['max_size']             = 10000000;
				$config2['max_width']            = 2048;

                $config2['max_height']           = 2048;
             



                $this->load->library('upload', $config2);

                $this->upload->initialize($config2);

                if ( ! $this->upload->do_upload('userfileVideo'))

                {
//echo "hi2";
				//echo $error2 = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {
//echo "fail2";
                        $fileDatav= $this->upload->data();

               	$s_video = $fileDatav['file_name'];

                 //die;

                }
				
				
				
				
				 if($s_video=="")
                {
                	$s_video=$slider_video;
                }*/
                $s_video='nill'; /*$data = array('j_title'=>$slider_title , 'j_details' => $slider_content , 'j_order' => $slider_order ,'j_image'=>$b_image);*/
                $data = array('title'=>$p_head1 ,'content' => $p_head2,'video' => $s_video,'image'=>$b_image,'link'=>$p_link,'short_desc'=>$short_desc);
				$table="blogs";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'blogs updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/blogs";
				redirect($rurl);
			}
	}
	public function Excel_Courses(){
				$table='flagship_pgms';
				$data['projects']=$this->Admin_model->get_data_byorder($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/excel_courses',$data);
				$this->load->view('admin/footer');
	}
	public function Courses_add(){
	
				
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/Courses_add');
				$this->load->view('admin/footer');
	}
	public function Courses_add_process(){
		
 $title = $this->input->post('title');
				$type= $this->input->post('ctype');
				$nature = $this->input->post('nature');
					$desc= $this->input->post('duration');
				$materials = $this->input->post('materials');
					$link= $this->input->post('link');
			
				$sort_order= $this->input->post('sort_order');

                 $data = array('title'=>$title,'sort_order' => $sort_order,'type'=>$type,'nature' => $nature,'duration'=>$desc,'materials'=>$materials,'link'=>$link);
//print_r();
				$table="flagship_pgms";

				$res=$this->Admin_model->insert_data($table,$data);

				if($res=true)
				{
					date_default_timezone_set('Asia/Kolkata');
					$idate=date('Y-m-d H:s:i',strtotime('now'));
					$datad = array('activity'=>'excel courses added','date'=>$idate);

					$tabled="site_activity";

					$ress=$this->Admin_model->insert_data($tabled,$datad);
					$rurl=base_url()."index.php/AdminController/Excel_Courses";
					redirect($rurl);
				}
	}
	
	public function Courses_edit($id){
			$table='flagship_pgms';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/Courses_edit',$datas);
			$this->load->view('admin/footer');
	}
	public function update_Courses(){
			 $s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('title');
					$type= $this->input->post('type');
				$nature = $this->input->post('nature');
					$desc= $this->input->post('duration');
				$materials = $this->input->post('materials');
					$link= $this->input->post('link');
			$p_order=$this->input->post('sort_order');
                $data = array('title'=>$p_head1,'type'=>$type,'nature' => $nature,'duration'=>$desc,'materials'=>$materials,'link'=>$link,'sort_order' => $p_order);
				$table="flagship_pgms";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'excel courses updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/Excel_Courses";
				redirect($rurl);
			}
	}
	function Courses_delete($id){
			$table="flagship_pgms";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'excel courses deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/Excel_Courses";
				redirect($rurl);
	}
	function deleteMultipleCourses(){
			$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="flagship_pgms";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'excel courses deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/Excel_Courses";
				redirect($rurl);
	}
	

	public function tutorials(){
				$table='tutorials';
				$data['projects']=$this->Admin_model->get_data_byorder($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/tutorials',$data);
				$this->load->view('admin/footer');
	}
	
	public function tutorials_add(){
	
				
				$table='tutorial_cat';
				$data['cats']=$this->Admin_model->get_data($table);
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/tutorials_add',$data);
				$this->load->view('admin/footer');
	}
	public function tutorials_add_process(){
		
		$title = $this->input->post('title');
		$desc= $this->input->post('desc');
		$t_type = $this->input->post('t_type');
		$parent_tab= $this->input->post('parent_tab');
		$sort_order= $this->input->post('sort_order');
        $s_image=$this->input->post('userfileVideo');
			 /*	$config['upload_path']          = './assets/images/uploads/tutorials';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

				$error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$s_image = $fileData['file_name'];

                 //die;

                }*/
                 $data = array('title'=>$title,'sort_order' =>$sort_order,'video_poster'=>$s_image,'content'=>$desc,'type'=>$t_type,'parent_tab'=>$parent_tab,'sub_tab'=>'nill');

				$table="tutorials";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'tutorials added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/tutorials";
				redirect($rurl);
			}
	}
	public function tutorial_edit($id){
			$table='tutorial_cat';
				$datas['cats']=$this->Admin_model->get_data($table);
			//	print_r($data['cats']);
				$table='tutorials';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/tutorials_edit',$datas);
			$this->load->view('admin/footer');
	}
	public function update_Tutorial(){
		$b_image='';
		$s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('p_head1');
				$p_head2= $this->input->post('p_head2');
				$t_type = $this->input->post('t_type');
				$slider_image = $this->input->post('ban_image');
				$p_order = $this->input->post('sort_order');
				$parent_tab= $this->input->post('parent_tab');

			 /*	$config['upload_path']          = './assets/images/uploads/tutorials';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

      $error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$b_image = $fileData['file_name'];

                 //die;

                }
                if($b_image=="")
                {
                	$b_image=$slider_image;
                }*/
                 /*$data = array('j_title'=>$slider_title , 'j_details' => $slider_content , 'j_order' => $slider_order ,'j_image'=>$b_image);*/
                $data = array('title'=>$p_head1 ,'content' => $p_head2,'sort_order' => $p_order,'video_poster'=>$slider_image,'type'=>$t_type,'parent_tab'=>$parent_tab);
				$table="tutorials";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'tutorial updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/tutorials";
				redirect($rurl);
			}
	}
	function tutorial_delete($id){
			$table="tutorials";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'tutorial deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/tutorials";
				redirect($rurl);
	}
	function deleteMultipletutorial(){
			$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="tutorials";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'tutorials deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/tutorials";
				redirect($rurl);
	}
	public function tutorial_videos($id){
				$table='tutorials_videos';
				$con=array('tutorial_id'=>$id);
				$data['pid']=$id;
				$data['projects']=$this->Admin_model->get_databycon($con,$table);
				//print_r($data['projects']);die;
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/tutorial_videos',$data);
				$this->load->view('admin/footer');
	}
	public function add_tvideoprocess(){
		
				$c_id = $this->input->post('c_id');
				$title = $this->input->post('title');
				$desc = $this->input->post('desc');
				$s_video=$this->input->post('userfileVideo');
				//print_r($_FILES);
					$config['upload_path']          = './assets/images/uploads/tutorials_video';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {
					echo "fail";
				echo $error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {
						echo "hi";
                       
					//	echo $error = $this->upload->display_errors();
						$fileData = $this->upload->data();

               	$s_image = $fileData['file_name'];

                 //

                }
				
			
			/*	

			 	$config2['upload_path']          = './assets/images/uploads/tutorials_video';

                $config2['allowed_types']        = 'mp4|3gp|flv|mp3|wmv';

                $config2['max_size']             = 10000000;
				$config2['max_width']            = 2048;

                $config2['max_height']           = 2048;
             



                $this->load->library('upload', $config2);

                $this->upload->initialize($config2);

                if ( ! $this->upload->do_upload('userfileVideo'))

                {
//echo "hi2";
				echo $error2 = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {
//echo "fail2";
                        $fileDatav= $this->upload->data();

               	$s_video = $fileDatav['file_name'];

                 //die;

                }*/
				
				//die;
				
                 $data = array('title'=>$title ,'tutorial_id'=>$c_id,'description'=>$desc,'video' => $s_video,'video_poster'=>$s_image);

				$table="tutorials_videos";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'tutorials videos added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/tutorial_videos/".$c_id;
				redirect($rurl);
			}
	}
	
	function tvideo_delete($id,$c_id){
			$table="tutorials_videos";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'video deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/tutorial_videos/".$c_id;
				redirect($rurl);
	}
	function deleteMultipletvideo(){
			$slider_content = $this->input->post('banner');
			$dp= $this->input->post('dp');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="tutorials_videos";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'videos deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/tutorial_videos/".$dp;
				redirect($rurl);
	}
	//add_tvideoprocess  tvideo_edit  update_tvideo
	public function tvideo_edit($id){
		
			$table='tutorials_videos';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/tvideo_edit',$datas);
			$this->load->view('admin/footer');	
	}
	public function update_tvideo(){
		$b_image='';
		$s_video='';
				$s_id = $this->input->post('s_id');
				$d_id = $this->input->post('d_id');
				$p_head1= $this->input->post('p_head1');
				$p_head2= $this->input->post('p_head2');
				
				$slider_image = $this->input->post('ban_image');
				//$slider_video = $this->input->post('ban_video');
				$s_video=$this->input->post('userfileVideo');
				//$p_order = $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/tutorials_video';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

      $error = $this->upload->display_errors();
echo $error;die;
                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$b_image = $fileData['file_name'];

                 //die;

                }
                if($b_image=="")
                {
                	$b_image=$slider_image;
                }
				
				
				/*
				$config2['upload_path']          = './assets/images/uploads/tutorial_videos';

                $config2['allowed_types']        = 'mp4|3gp|flv|mp3|wmv';

                $config2['max_size']             = 10000000;
				$config2['max_width']            = 2048;

                $config2['max_height']           = 2048;
             



                $this->load->library('upload', $config2);

                $this->upload->initialize($config2);

                if ( ! $this->upload->do_upload('userfileVideo'))

                {
//echo "hi2";
				//echo $error2 = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {
//echo "fail2";
                        $fileDatav= $this->upload->data();

               	$s_video = $fileDatav['file_name'];

                 //die;

                }
				
				
				
				
				 if($s_video=="")
                {
                	$s_video=$slider_video;
                }*/
                 /*$data = array('j_title'=>$slider_title , 'j_details' => $slider_content , 'j_order' => $slider_order ,'j_image'=>$b_image);*/
                $data = array('title'=>$p_head1 ,'description' => $p_head2,'video' => $s_video,'video_poster'=>$b_image);
				$table="tutorials_videos";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'tutorial video updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/tutorial_videos/".$d_id;
				redirect($rurl);
			}
	}
	
	public function resources(){
				$table='resources';
				$data['projects']=$this->Admin_model->get_data($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/resources',$data);
				$this->load->view('admin/footer');
	}
	
	public function Resources_add(){
	
				
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/Resources_add');
				$this->load->view('admin/footer');
	}
	
	public function add_Resources_process(){
				$title = $this->input->post('title');
				$desc = $this->input->post('desc');
				
				
                 $data = array('title'=>$title ,'content'=>$desc);

				$table="resources";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'resources added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/resources";
				redirect($rurl);
			}
	}
	
	
	public function Resources_edit($id){
		
			$table='resources';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/Resources_edit',$datas);
			$this->load->view('admin/footer');	
	}
	function update_Resources(){
				$s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('p_head1');
				$p_head2= $this->input->post('desc');
				
				
				
                $data = array('title'=>$p_head1 ,'content' => $p_head2);
				$table="resources";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'resources updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/resources";
				redirect($rurl);
			}
	}
	function Resources_delete($id){
			$table="resources";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'resources deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/resources";
				redirect($rurl);
	}
	function deleteMultipleResources(){
			$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="resources";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'resources deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/resources";
				redirect($rurl);
	}
	public function modules(){
		$table='modules';
				$data['projects']=$this->Admin_model->get_data($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/modules',$data);
				$this->load->view('admin/footer');
	}
	public function Module_add(){
	
				
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/Module_add');
				$this->load->view('admin/footer');
	}
	
	public function add_Module_process(){
				$title = $this->input->post('title');
				$desc = $this->input->post('desc');
				
				
                 $data = array('title'=>$title ,'content'=>$desc);

				$table="modules";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'modules added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/modules";
				redirect($rurl);
			}
	}
	
	public function Module_edit($id){
		
			$table='modules';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/Module_edit',$datas);
			$this->load->view('admin/footer');	
	}
	function update_Modules(){
				$s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('p_head1');
				$p_head2= $this->input->post('desc');
				
				
				
                $data = array('title'=>$p_head1 ,'content' => $p_head2);
				$table="modules";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'modules updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/modules";
				redirect($rurl);
			}
	}
	public function contact(){
		
			$id=1;
			$table='contact';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/contact',$datas);
			$this->load->view('admin/footer');	
	}
	function update_contact(){
				$s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('p_head1');
				$p_head2= $this->input->post('p_head2');
				$p_head3= $this->input->post('desc');
				
				
				
                $data = array('address'=>$p_head3 ,'phone' => $p_head2,'email' => $p_head1);
				$table="contact";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'contact updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/contact";
				redirect($rurl);
			}
	}
	
	function Module_delete($id){
			$table="modules";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'modules deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/modules";
				redirect($rurl);
	}
	function deleteMultipleModules(){
			$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="modules";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'modules deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/modules";
				redirect($rurl);
	}
	
	public function Excel_function(){
				$table='excel_function';
				$data['projects']=$this->Admin_model->get_data($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/excel_functions',$data);
				$this->load->view('admin/footer');
	}
	
	public function excel_functions_add(){
	
				$table='fun_category';
				$data['cats']=$this->Admin_model->get_data($table);
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/excel_functions_add',$data);
				$this->load->view('admin/footer');
	}
	
	public function add_excel_functions_process(){
				$title = $this->input->post('title');
				$desc = $this->input->post('desc');
				
				$cat_id = $this->input->post('cat_id');
				//die;
				
                 $data = array('title'=>$title ,'content'=>$desc,'category_id' => $cat_id);

				$table="excel_function";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'excel function added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/Excel_function";
				redirect($rurl);
			}
	}
	public function excel_functions_edit($id){
		
			$table='excel_function';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			$table2='fun_category';
			$datas['cats']=$this->Admin_model->get_data($table2);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/excel_function_edit',$datas);
			$this->load->view('admin/footer');	
	}
	function update_ExcelFunction_method(){
				$s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('p_head1');
				$p_head2= $this->input->post('desc');
				
				$slider_image = $this->input->post('cat_id');
				//$slider_video = $this->input->post('ban_video');
				
                $data = array('title'=>$p_head1 ,'content' => $p_head2,'category_id'=>$slider_image);
				$table="excel_function";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'Excel function updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/Excel_function";
				redirect($rurl);
			}
	}
	function excel_functions_delete($id){
			$table="excel_function";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'Excel function deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/Excel_function";
				redirect($rurl);
	}
	function deleteMultipleexcel_functions(){
			$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="excel_function";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'Excel_functions deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/Excel_function";
				redirect($rurl);
	}
	
	
	public function gallery(){
	    	$table='gallery';
				$data['projects']=$this->Admin_model->get_data_byorder($table);

				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/gallery',$data);
				$this->load->view('admin/footer');//tutorial_category.php
	}
    public function add_gallery_process()
    {
       $sort_order= $this->input->post('sort_order'); 
       	$config['upload_path']          = './assets/images/uploads/gallery';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 1000000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

				 $error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	 $s_image = $fileData['file_name'];

                 //die;

                }
                 $data = array('sort_order' => $sort_order,'image'=>$s_image);

				$table="gallery";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'gallery image added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/gallery";
				redirect($rurl);
			}
    }
    public function gallery_delete($id)
    {
        	$table="gallery";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'image deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/gallery";
				redirect($rurl);
    }
        public function deleteMultiplegallery()
    {
        	$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="gallery";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'tutorial category deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/gallery";
				redirect($rurl);
    }
		public function tutorials_catlist()
	{
	    	$table='tutorial_cat';
				$data['projects']=$this->Admin_model->get_data_byorder($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/tutorial_category',$data);
				$this->load->view('admin/footer');//tutorial_category.php
	}
		public function add_tcategory_process(){
		
				$desc = $this->input->post('category');
				
				$sort_order= $this->input->post('sort_order');

                 $data = array('category'=>$desc,'sort_order' => $sort_order);

				$table="tutorial_cat";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'tutorial category added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/tutorials_catlist";
				redirect($rurl);
			}
	}
	
	function tcategory_delete($id){
			$table="tutorial_cat";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'tutorial category deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/tutorials_catlist";
				redirect($rurl);
	}
	function deleteMultipletcategory(){
			$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="tutorial_cat";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'tutorial category deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/tutorials_catlist";
				redirect($rurl);
	}
	
	public function Excel_function_category(){
		$table='fun_category';
				$data['projects']=$this->Admin_model->get_data_byorder($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/fun_category',$data);
				$this->load->view('admin/footer');
	}
	
	public function add_category_process(){
		
				$desc = $this->input->post('category');
				
				$sort_order= $this->input->post('sort_order');

                 $data = array('category'=>$desc,'sort_order' => $sort_order);

				$table="fun_category";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'function category added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/Excel_function_category";
				redirect($rurl);
			}
	}
	function category_delete($id){
			$table="fun_category";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'function category deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/Excel_function_category";
				redirect($rurl);
	}
	function deleteMultiplecategory(){
			$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="fun_category";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'function category deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."index.php/AdminController/Excel_function_category";
				redirect($rurl);
	}
	
	public function training_methods(){
		$table='training_method';
				$data['projects']=$this->Admin_model->get_data_byorder($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/training_methods',$data);
				$this->load->view('admin/footer');
	}
	public function training_methodsadd(){
	
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/training_methods_add');
				$this->load->view('admin/footer');
	}
	
	public function add_Training_Methods_process(){
		$title = $this->input->post('title');
				$desc = $this->input->post('desc');
				
				$sort_order= $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/training_methods';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

				$error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$s_image = $fileData['file_name'];

                 //die;

                }
                 $data = array('title'=>$title ,'content'=>$desc,'sort_order' => $sort_order,'image'=>$s_image);

				$table="training_method";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'training methods added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/training_methods";
				redirect($rurl);
			}
	}
	public function training_methods_edit($id){
		
	$table='training_method';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/edit_training_method',$datas);
			$this->load->view('admin/footer');	
	}
	function update_training_method(){
				$s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('p_head1');
				$p_head2= $this->input->post('p_head2');
				
				$slider_image = $this->input->post('ban_image');
				$p_order = $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/training_methods';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

      $error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$b_image = $fileData['file_name'];

                 //die;

                }
                if($b_image=="")
                {
                	$b_image=$slider_image;
                }
                 /*$data = array('j_title'=>$slider_title , 'j_details' => $slider_content , 'j_order' => $slider_order ,'j_image'=>$b_image);*/
                $data = array('title'=>$p_head1 ,'content' => $p_head2,'sort_order' => $p_order,'image'=>$b_image);
				$table="training_method";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'slider updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/training_methods";
				redirect($rurl);
			}
	}
	function training_methods_delete($id){
			$table="training_method";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'training method deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/training_methods";
				redirect($rurl);
	}
	function deleteMultipletraining_methods(){
			$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="training_method";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'training method deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/training_methods";
				redirect($rurl);
	}
	
	public function home_slider(){
		$table='home_slider';
				$data['projects']=$this->Admin_model->get_data_byorder($table);
				/*$table2='home_scontent';
				$data['home_cont']=$this->Admin_model->get_data($table2);*/
				$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/home_slider',$data);
				$this->load->view('admin/footer');
	}
	public function slider_add(){
		$this->load->view('admin/header');
				$this->load->view('admin/side_header');
				$this->load->view('admin/menu');
				$this->load->view('admin/add_slider');
				$this->load->view('admin/footer');
	}
	public  function add_Slider_process(){
				$title = $this->input->post('title');
				$desc = $this->input->post('desc');
				$link = $this->input->post('link');
				$sort_order= $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/sliders';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

				$error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$s_image = $fileData['file_name'];

                 //die;

                }
                 $data = array('title'=>$title ,'content'=>$desc,'sort_order' => $sort_order,'image'=>$s_image,'link' => $link);

				$table="home_slider";

				$res=$this->Admin_model->insert_data($table,$data);

			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'Slider added','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/home_slider";
				redirect($rurl);
			}
	}
	function sub_banners(){
			$table='sub_banner';
			$data['sub_banners']=$this->Admin_model->get_data($table);

			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/sub_banner',$data);
			$this->load->view('admin/footer');
	}
	function sub_banners_edit($id)
		{
			$table='sub_banner';
			$datas['sub_banners_edit']=$this->Admin_model->get_toedit($id,$table);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/edit_sub_banners',$datas);
			$this->load->view('admin/footer');
	}
	function update_sub_banners(){
				$s_id = $this->input->post('s_id');
				
				$slider_image = $this->input->post('ban_image');
				$page_title = $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/sub_banner';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 1000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

				$error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$b_image = $fileData['file_name'];

                 //die;

                }
                if($b_image=="")
                {
                	$b_image=$slider_image;
                }
                 /*$data = array('j_title'=>$slider_title , 'j_details' => $slider_content , 'j_order' => $slider_order ,'j_image'=>$b_image);*/
                $data = array('title' => $page_title,'image'=>$b_image);

				$table="sub_banner";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'Subbanner updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/sub_banners";
				redirect($rurl);
			}
	}
	function slider_edit($id){
			$table='home_slider';
			$datas['project_edit']=$this->Admin_model->get_toedit($id,$table);
			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/edit_Banners',$datas);
			$this->load->view('admin/footer');	
	}
	function update_slider(){
				$s_id = $this->input->post('s_id');
				$p_head1= $this->input->post('p_head1');
				$p_head2= $this->input->post('p_head2');
				//$p_subhead1= $this->input->post('p_subhead1');
				
				$p_link= $this->input->post('p_link');
				$slider_image = $this->input->post('ban_image');
				$p_order = $this->input->post('sort_order');

			 	$config['upload_path']          = './assets/images/uploads/sliders';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100000;

                $config['max_width']            = 2048;

                $config['max_height']           = 2048;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfileImage'))

                {

      $error = $this->upload->display_errors();

                       $insert_if = "0";

                }

                else

                {

                        $fileData = $this->upload->data();

               	$b_image = $fileData['file_name'];

                 //die;

                }
                if($b_image=="")
                {
                	$b_image=$slider_image;
                }
                 /*$data = array('j_title'=>$slider_title , 'j_details' => $slider_content , 'j_order' => $slider_order ,'j_image'=>$b_image);*/
                $data = array('title'=>$p_head1 ,'content' => $p_head2,'sort_order' => $p_order,'image'=>$b_image,'link'=>$p_link);
				$table="home_slider";

				$cond = array('id'=>$s_id);
			$res=$this->Admin_model->update_data($data,$cond,$table);
			if($res=true)
			{
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'slider updated','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/home_slider";
				redirect($rurl);
			}
	}
	function tiny_uploads(){
            	    // Allowed origins to upload images
           // $accepted_origins = array("http://localhost", "http://107.161.82.130", "http://codexworld.com");
$accepted_origins = array("http://thestrategist.co.in");
            // Images upload path
            $imageFolder = "assets/admin/uploads/";
            
            reset($_FILES);
            $temp = current($_FILES);
            if(is_uploaded_file($temp['tmp_name'])){
                if(isset($_SERVER['HTTP_ORIGIN'])){
                    // Same-origin requests won't set an origin. If the origin is set, it must be valid.
                    if(in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)){
                        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
                    }else{
                        header("HTTP/1.1 403 Origin Denied");
                        return;
                    }
                }
              
                // Sanitize input
                if(preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])){
                    header("HTTP/1.1 400 Invalid file name.");
                    return;
                }
              
                // Verify extension
                if(!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))){
                    header("HTTP/1.1 400 Invalid extension.");
                    return;
                }
              
                // Accept upload if there was no origin, or if it is an accepted origin
                $filetowrite = $imageFolder . $temp['name'];
                move_uploaded_file($temp['tmp_name'], $filetowrite);
              
                // Respond to the successful upload with JSON.
                echo json_encode(array('location' => $filetowrite));
            } else {
                // Notify editor that the upload failed
                header("HTTP/1.1 500 Server Error");
            }
	}
	function slider_delete($id){
			$table="home_slider";
					$cond=array('id'=>$id);
					$res=$this->Admin_model->detete_data($table,$cond);
				
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'slider deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/home_slider";
				redirect($rurl);
	}
	function deleteMultipleslider(){
			$slider_content = $this->input->post('banner');
		//rint_r($slider_content);
			for($i=0;$i<sizeof($slider_content);$i++)
				{
					$table="home_slider";
					$cond=array('id'=>$slider_content[$i]);
					$res=$this->Admin_model->detete_data($table,$cond);
				}
				date_default_timezone_set('Asia/Kolkata');
				$idate=date('Y-m-d H:s:i',strtotime('now'));
				$datad = array('activity'=>'sliders deleted','date'=>$idate);

				$tabled="site_activity";

				$ress=$this->Admin_model->insert_data($tabled,$datad);
				$rurl=base_url()."AdminController/home_slider";
				redirect($rurl);
	}
	function newsletter(){
	    	$table='newsletter';
			$data['projects']=$this->Admin_model->get_data($table);

			$this->load->view('admin/header');
			$this->load->view('admin/side_header');
			$this->load->view('admin/menu');
			$this->load->view('admin/subscribers',$data);
			$this->load->view('admin/footer');
	}
	function logout(){
	    if(!$this->isLoggedIn())
					{
						redirect("AdminController/login");
					}else{
					    	$this->session->unset_userdata("userid");
					    	redirect("AdminController/login");
					}
	}
}