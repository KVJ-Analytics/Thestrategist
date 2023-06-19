<?php
class Admin_model extends CI_Model {

	
	function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
	function check_admin($det)
		{
			$this->db->select('id');
			$q=$this->db->get_where('admin_login',$det);
			 return $res=$q->result();
		}
	function get_data_byorder($table)
		{
			$this->db->order_by('sort_order');
			$q=$this->db->get($table);
			return $q->result();
		}
	function get_data($table)
		{
			$q=$this->db->get($table);
			return $q->result();
		}
	function get_databycon($id,$table)
		{
			
			$q=$this->db->get_where($table,$id);
			return $q->result();
		}
	function update_data($data,$cond,$table)
		{
			$this->db->update($table,$data,$cond);
			return true;
		}
	function insert_data($table,$data)
		{
			$this->db->insert($table,$data);
				return true;
		}	
	function detete_data($table,$cond)
		{

			$this->db->delete($table,$cond);
			return true;
		}
	function get_toedit($id,$table)
		{
			$this->db->where('id',$id);
			$q=$this->db->get($table);
			return $q->result();
		}
}