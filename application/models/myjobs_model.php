<?php
class myjobs_model extends CI_Model {
	public function total_myjobs() {
		$this->db->select(array('jobs.*','location.name as location'));
		$this->db->from('jobs');
		$this->db->join('applications','applications.job_id = jobs.id');
		$this->db->join('location','location.id = jobs.location');
		$this->db->where('applications.user_id',$this->session->userdata('user_id'));
		$this->db->order_by('featured','DESC');
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			//$row = $query->result_array();
			return $query->num_rows();
		}
	}
	public function all_myjobs($limit,$start) {
		$this->db->select(array('jobs.*','location.name as location'));
		$this->db->from('jobs');
		$this->db->join('applications','applications.job_id = jobs.id');
		$this->db->join('location','location.id = jobs.location');
		$this->db->where('applications.user_id',$this->session->userdata('user_id'));
		$this->db->order_by('featured','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			return $row;
		}
	}
}
?>