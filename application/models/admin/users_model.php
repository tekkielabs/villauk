<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
	
	
	
	function list_users()
	{
		//LIST ALL JOBS
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('role_id !=','1');
		$query = $this->db->get();
		if($query->num_rows())
		{
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}

	
	function delete_user($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('users');
		return TRUE;
		
	}
	
}
?>



