<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategory_model extends CI_Model {
	
	function add_subcategory($cat_id , $subcat_name)
	{
		//CHECK SUB CATEGORY NAME EXISTS
		$this->db->select('name');
		$this->db->from('sub_category');
		$this->db->where('name',$subcat_name);
		$this->db->where('cat_id',$cat_id);
		$query = $this->db->get();
		if(!$query->num_rows())
		{
			// ADD NEW SUB CATEGORY
			$this->db->set('name',$subcat_name);
			$this->db->set('cat_id',$cat_id);
			$this->db->set('created_on','NOW()',false);
			$this->db->set('modified_on','NOW()',false);
			$this->db->insert('sub_category');
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
		$this->db->select('SC.name as name1, SC.cat_id as cat_id, SC.id as id, C.name as name2');
		$this->db->from('sub_category as SC');
		$this->db->join('category as C','C.id=SC.cat_id');
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		if($query->num_rows())
		{
			//print_r($query->result_array); die;
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
		$this->db->from('sub_category');
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
		$this->db->from('sub_category');
		$this->db->where('name',$cat_name);
		$this->db->where('id !=',$id);
		$query = $this->db->get();
		if(!$query->num_rows())
		{
			// EDIT CATEGORY
			$this->db->set('name',$cat_name);
			$this->db->set('modified_on','NOW()',false);
			$this->db->where('id',$id);
			$this->db->update('sub_category');
			return $id;
		}
		else
		{
			return FALSE;
		}
	}
	
	function delete_subcategory($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('sub_category');
		return TRUE;
		
	}
	
}
?>



