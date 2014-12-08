<?php
class register_model extends CI_Model {
	public function register_user($data) {
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email',$data['email']);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{
			$this->db->set('fname',$data['fname']);
			$this->db->set('lname',$data['lname']);
			$this->db->set('password',md5($data['password']));
			$this->db->set('email',$data['email']);
			$this->db->set('resume',$data['resume']);
			$this->db->set('cover',$data['cover']);
			$this->db->set('role_id',2);
			$this->db->insert('users');
		}
		
	
	}
}
?>