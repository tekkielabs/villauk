<?php
class login_model extends CI_Model {
	public function login($data) {
		$this->db->select(array('id','fname','lname'));
		$this->db->from('users');
		$this->db->where('email',$data['email']);
		$this->db->where('password',md5($data['password']));
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			return $row[0];
		}
	}
}
?>