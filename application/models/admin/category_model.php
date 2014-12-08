<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {
	
	function add_category($cat_name)
	{
		//CHECK CATEGORY NAME EXISTS
		$this->db->select('name');
		$this->db->from('category');
		$this->db->where('name',$cat_name);
		$query = $this->db->get();
		if(!$query->num_rows())
		{
			// ADD NEW CATEGORY
			$this->db->set('name',$cat_name);
			$this->db->set('created_at','NOW()',false);
			$this->db->set('modified_at','NOW()',false);
			$this->db->insert('category');
			$id = $this->db->insert_id();
			return $id;
		}
		else
		{
			return FALSE;
		}
	}
	
	function list_category()
	{
		//CHECK CATEGORY NAME EXISTS
		$this->db->select('*');
		$this->db->from('category');
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
	
	function get_category($id)
	{
		//CHECK CATEGORY NAME EXISTS
		$this->db->select('*');
		$this->db->from('category');
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
	
	function edit_category($cat_name,$id)
	{
		//CHECK CATEGORY NAME EXISTS
		$this->db->select('name');
		$this->db->from('category');
		$this->db->where('name',$cat_name);
		$this->db->where('id !=',$id);
		$query = $this->db->get();
		if(!$query->num_rows())
		{
			// EDIT CATEGORY
			$this->db->set('name',$cat_name);
			$this->db->set('modified_at','NOW()',false);
			$this->db->where('id',$id);
			$this->db->update('category');
			return $id;
		}
		else
		{
			return FALSE;
		}
	}
	
	function delete_category($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('category');
		return TRUE;
		
	}
	
}
?>



