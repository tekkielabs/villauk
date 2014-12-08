<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs_model extends CI_Model {
	
	function add_job($data)
	{
		//CHECK JOB CODE EXISTS
		$this->db->select('id');
		$this->db->from('jobs');
		$this->db->where('code',$data['jobcode']);
		$query = $this->db->get();
		if(!$query->num_rows())
		{
			// ADD NEW JOB
			$this->db->set('title',$data['title']);
			$this->db->set('cat_id',$data['cat_id']);
			$this->db->set('min_sal',$data['min_sal']);
			$this->db->set('max_sal',$data['max_sal']);
			$this->db->set('min_exp',$data['min_exp']);
			$this->db->set('max_exp',$data['max_exp']);
			$this->db->set('location',$data['loc_id']);
			$this->db->set('job_type',$data['jobtype']);
			$this->db->set('code',$data['jobcode']);
			$this->db->set('desc',$data['desc']);
			$this->db->set('email',$data['email']);
			$this->db->set('created_at','NOW()',false);
			$this->db->set('modified_at','NOW()',false);
			$this->db->insert('jobs');
			$id = $this->db->insert_id();
			return $id;
		}
		else
		{
			return FALSE;
		}
	}
	
	function list_jobs()
	{
		//LIST ALL JOBS
		$this->db->select('*');
		$this->db->from('jobs');
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
	
	function get_category_name($cat_id)
	{
		//GET CATEGORY NAME
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('id',$cat_id);
		$query = $this->db->get();
		if($query->num_rows())
		{
			$row = $query->result_array();
			return $row[0]['name'];
		}
		else
		{
			return "Not found";
		}
	}
	
	function get_location_name($loc_id)
	{
		//GET LOCATION NAME
		$this->db->select('*');
		$this->db->from('location');
		$this->db->where('id',$loc_id);
		$query = $this->db->get();
		if($query->num_rows())
		{
			$row = $query->result_array();
			return $row[0]['name'];
		}
		else
		{
			return "Not found";
		}
	}
	
	function get_job($job_id)
	{
		//GET JOB NAME
		$this->db->select('*');
		$this->db->from('jobs');
		$this->db->where('id',$job_id);
		$query = $this->db->get();
		if($query->num_rows())
		{
			$row = $query->result_array();
			return $row;
		}
	}
	
	function edit_job($data)
	{
		//CHECK JOB CODE EXISTS
		$this->db->select('id');
		$this->db->from('jobs');
		$this->db->where('code',$data['jobcode']);
		$this->db->where('id !=',$this->uri->segment(4));
		$query = $this->db->get();
		if(!$query->num_rows())
		{
			// ADD NEW JOB
			$this->db->set('title',$data['title']);
			$this->db->set('cat_id',$data['cat_id']);
			$this->db->set('min_sal',$data['min_sal']);
			$this->db->set('max_sal',$data['max_sal']);
			$this->db->set('min_exp',$data['min_exp']);
			$this->db->set('max_exp',$data['max_exp']);
			$this->db->set('location',$data['loc_id']);
			$this->db->set('job_type',$data['jobtype']);
			$this->db->set('code',$data['jobcode']);
			$this->db->set('desc',$data['desc']);
			$this->db->set('email',$data['email']);
			$this->db->set('created_at','NOW()',false);
			$this->db->set('modified_at','NOW()',false);
			$this->db->where('id',$this->uri->segment(4));
			$this->db->update('jobs');
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function delete_job($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('jobs');
		return TRUE;
		
	}
	
}
?>



