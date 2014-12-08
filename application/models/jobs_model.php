<?php
class jobs_model extends CI_Model {
	public function total_jobs() {
		$this->db->select(array('jobs.*','location.name as location','category.name as category'));
		$this->db->from('jobs');
		$this->db->join('location','location.id = jobs.location');
		$this->db->join('category','category.id = jobs.cat_id');
		$this->db->where('jobs.status','1');
		$this->db->order_by('featured','DESC');
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			//$row = $query->result_array();
			return $query->num_rows();
		}
	}
	public function all_jobs($limit,$start) {
		$this->db->select(array('jobs.*','location.name as location','category.name as category'));
		$this->db->from('jobs');
		$this->db->join('location','location.id = jobs.location');
		$this->db->join('category','category.id = jobs.cat_id');
		$this->db->order_by('featured','DESC');
		$this->db->where('jobs.status','1');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			return $row;
		}
	}
	
	public function total_loc_jobs($loc_name) {
		$this->db->select(array('jobs.*','location.name as location','category.name as category'));
		$this->db->from('jobs');
		$this->db->join('location','location.id = jobs.location');
		$this->db->join('category','category.id = jobs.cat_id');
		$this->db->order_by('featured','DESC');
		$this->db->where('jobs.status','1');
		$this->db->where('location.name',$loc_name);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
	}
	
	
	public function loc_jobs($loc_name,$limit,$start) {
		$this->db->select(array('jobs.*','location.name as location','category.name as category'));
		$this->db->from('jobs');
		$this->db->join('location','location.id = jobs.location');
		$this->db->join('category','category.id = jobs.cat_id');
		$this->db->order_by('featured','DESC');
		$this->db->where('jobs.status','1');
		$this->db->where('location.name',$loc_name);
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			return $row;
		}
	}
	
	
	public function total_cat_jobs($cat_name) {
		$this->db->select(array('jobs.*','location.name as location','category.name as category'));
		$this->db->from('jobs');
		$this->db->join('location','location.id = jobs.location');
		$this->db->join('category','category.id = jobs.cat_id');
		$this->db->where('jobs.status','1');
		$this->db->where('category.name',$cat_name);
		$this->db->order_by('featured','DESC');
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
	}
	
	
	public function cat_jobs($cat_name,$limit,$start) {
		$this->db->select(array('jobs.*','location.name as location','category.name as category'));
		$this->db->from('jobs');
		$this->db->join('location','location.id = jobs.location');
		$this->db->join('category','category.id = jobs.cat_id');
		$this->db->where('jobs.status','1');
		$this->db->where('category.name',$cat_name);
		$this->db->order_by('featured','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			return $row;
		}
	}
	
	public function view_job($job_name) {
		$this->db->select(array('jobs.*','location.name as location','category.name as category'));
		$this->db->from('jobs');
		$this->db->join('location','location.id = jobs.location');
		$this->db->join('category','category.id = jobs.cat_id');
		$this->db->where('jobs.title',$job_name);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			return $row[0];
		}
	}
	
	public function apply_job($data)
	{
		$this->db->select('id');
		$this->db->from('applications');
		$this->db->where('user_id',$data['user_id']);
		$this->db->where('job_id',$data['job_id']);
		$query = $this->db->get();
		if($query->num_rows==0)
		{
			$this->db->set('job_id',$data['job_id']);
			$this->db->set('user_id',$data['user_id']);
			$this->db->set('created_at',date('Y-m-d H:i:s'));
			$this->db->insert('applications');
			$id = $this->db->insert_id();
			return $id;
		}
	}
	
	public function recent_jobs() {
		$this->db->select(array('jobs.*','location.name as location','category.name as category'));
		$this->db->from('jobs');
		$this->db->join('location','location.id = jobs.location');
		$this->db->join('category','category.id = jobs.cat_id');
		$this->db->order_by('id','DESC');
		$this->db->where('jobs.status','1');
		$this->db->limit(5,0);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			return $row;
		}
	}
}
?>