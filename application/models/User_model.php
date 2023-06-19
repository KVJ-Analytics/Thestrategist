<?php
class User_model extends CI_Model {

	
	function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
	function get_data_byorder($table)
		{
			$this->db->order_by('sort_order');
			$q=$this->db->get($table);
			return $q->result();
		}
	function get_tutorials($limit,$start)
		{
		$this->db->limit($limit,$start);
		$this->db->order_by('sort_order');
		//$this->db->where('LEFT(slug,1)',$letter);
		$q=$this->db->get('tutorials');
		return $q->result();
		}
	function get_data_latest($table)
		{
			$this->db->order_by('id','DESC');
			$q=$this->db->get($table);
			return $q->result();
		}
	function get_data_byordercon($table3)
    	{
    	   $this->db->where('type','top');
    	   $this->db->order_by('sort_order');
			$q=$this->db->get($table3);
			return $q->result();
    	    
    	}
	function get_data($table)
		{
			$q=$this->db->get($table);
			return $q->result();
		}

	function dis_visits($tabss,$ip)
		{
			$this->db->where('ip_address',$ip);
			$q=$this->db->get($tabss);
			return $q->result();
		}
	function ins_visites($tabss,$pr)
		{
			$this->db->insert($tabss,$pr);
			return true;
		}
	function get_toedit($id,$table)
		{
			$this->db->where('id',$id);
			$q=$this->db->get($table);
			return $q->result();
		}
	function get_others($id,$cat,$table)
		{
			$this->db->where('cat_id',$cat);
			$this->db->where('id!=',$id);
			$q=$this->db->get($table);
			return $q->result();
		}
	function get_databypid($id,$table)
		{
			$this->db->where('p_id',$id);
			$q=$this->db->get($table);
			return $q->result();
		}
	function get_databycond($cond,$table)
		{
			$q=$this->db->get_where($table,$cond);
			return $q->result();
		}
	function get_databycond_order($cond,$table)
		{
			$q=$this->db->get_where($table,$cond);
			$this->db->order_by('sort_order');
			return $q->result();
		}
			function insert_user($cond,$table)
		{
			$q=$this->db->insert($table,$cond);
			
			$insert_id = $this->db->insert_id();

   return  $insert_id;
		}
}