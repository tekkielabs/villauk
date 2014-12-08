<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class location_model extends CI_Model {
	
	function add_location($loc_name)
	{
		//CHECK LOCATION NAME EXISTS
		$this->db->select('name');
		$this->db->from('location');
		$this->db->where('name',$loc_name);
		$query = $this->db->get();
		if(!$query->num_rows())
		{
			// ADD NEW LOCATION
			$this->db->set('name',$loc_name);
			$this->db->set('created_at','NOW()',false);
			$this->db->set('modified_at','NOW()',false);
			$this->db->insert('location');
			$id = $this->db->insert_id();
			return $id;
		}
		else
		{
			return FALSE;
		}
	}
	
	function list_location()
	{
		//CHECK LOCATION NAME EXISTS
		$this->db->select('*');
		$this->db->from('location');
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
	
	function get_location($id)
	{
		//CHECK LOCATION NAME EXISTS
		$this->db->select('*');
		$this->db->from('location');
		$this->db->where('id',$id);
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
	
	function edit_location($loc_name,$id)
	{
		//CHECK LOCATION NAME EXISTS
		$this->db->select('name');
		$this->db->from('location');
		$this->db->where('name',$loc_name);
		$this->db->where('id !=',$id);
		$query = $this->db->get();
		if(!$query->num_rows())
		{
			// EDIT LOCATION
			$this->db->set('name',$loc_name);
			$this->db->set('modified_at','NOW()',false);
			$this->db->where('id',$id);
			$this->db->update('location');
			return $id;
		}
		else
		{
			return FALSE;
		}
	}
	
	function delete_location($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('location');
		return TRUE;
		
	}
	
}
?>



