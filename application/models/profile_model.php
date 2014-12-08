<?php
class profile_model extends CI_Model {
	
	public function edit_profile($user_id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$user_id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			return $row[0];
		}
	}
	public function editprofile_user($data) {
			$this->db->set('fname',$data['fname']);
			$this->db->set('lname',$data['lname']);
			$this->db->set('resume',$data['resume']);
			$this->db->set('cover',$data['cover']);
			$this->db->where('id',$data['user_id']);
			$this->db->update('users');
		}
}
?>