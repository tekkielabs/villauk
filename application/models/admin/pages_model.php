<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends CI_Model {
	
	
	function list_pages()
	{
		//GET ALL PAGES FROM MENU
		$this->db->select('*');
		$this->db->from('pages');
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
	
	function get_page($id)
	{
		$this->db->select('*');
		$this->db->from('pages');
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
	
	function edit_page($title,$desc,$id)
	{
		//CHECK PAGE NAME EXISTS
		$this->db->select('title');
		$this->db->from('pages');
		$this->db->where('title',$title);
		$this->db->where('id !=',$id);
		$query = $this->db->get();
		if(!$query->num_rows())
		{
			// EDIT CATEGORY
			$this->db->set('title',$title);
			$this->db->set('desc',$desc);
			$this->db->set('modified_at','NOW()',false);
			$this->db->where('id',$id);
			$this->db->update('pages');
			return $id;
		}
		else
		{
			return FALSE;
		}
	}
	
	function delete_menu($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('menu');
		return TRUE;
		
	}
	
}
?>



