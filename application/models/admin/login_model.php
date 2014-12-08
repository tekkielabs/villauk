<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class login_model extends CI_Model {
	function login($data)
	{
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('email',$data['email']);
	$this->db->where('password',md5($data['pass']));
	$this->db->where('role_id','1');
	$this->db->where('status','1');
	$qry=$this->db->get();
	if($qry->num_rows()>0)
		{
			return $qry->result_array();
		}
	else
		{
			return false;
		}
	}
}
?>