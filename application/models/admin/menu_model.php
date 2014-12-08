<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu_model extends CI_Model {
	
	function add_menu($data)
	{
		//CHECK MENU NAME EXISTS
		$this->db->select('menu_name');
		$this->db->from('menu');
		$this->db->where('menu_name',$data['menu_name']);
		$query = $this->db->get();
		if(!$query->num_rows())
		{
			$slug=str_replace(" ","_",$data['menu_name']);
			// ADD NEW MENU
			$this->db->set('menu_name',$data['menu_name']);
			$this->db->set('menu_slug',$slug);
			$this->db->set('parent_id',$data['menu_cat']);
			$this->db->set('created_at','NOW()',false);
			$this->db->set('modified_at','NOW()',false);
			$this->db->insert('menu');
			$id = $this->db->insert_id();
			
			$this->db->set('title',$data['menu_name']);
			$this->db->set('desc','');
			$this->db->set('menu_id',$id);
			$this->db->set('created_at','NOW()',false);
			$this->db->set('modified_at','NOW()',false);
			$this->db->insert('pages');
			
			
			return $id;
		}
		else
		{
			return FALSE;
		}
	}
	
	function list_menu()
	{
		//CHECK CATEGORY NAME EXISTS
		$this->db->select('*');
		$this->db->from('menu');
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
	
	function get_menu($id)
	{
		//CHECK CATEGORY NAME EXISTS
		$this->db->select('*');
		$this->db->from('menu');
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
	
	function edit_menu($menu_name,$id,$menu_main)
	{
		//CHECK MENU NAME EXISTS
		$this->db->select('menu_name');
		$this->db->from('menu');
		$this->db->where('menu_name',$menu_name);
		$this->db->where('id !=',$id);
		$query = $this->db->get();
		if(!$query->num_rows())
		{
			// EDIT MENU
			$this->db->set('menu_name',$menu_name);
			$this->db->set('parent_id',$menu_main);
			$this->db->set('modified_at','NOW()',false);
			$this->db->where('id',$id);
			$this->db->update('menu');
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
		
		$this->db->where('menu_id',$id);
		$this->db->delete('pages');
		
		return TRUE;
		
	}
	
	function change_mainmenu_status($id,$status)
	{
		$this->db->set('main_menu',$status);
		$this->db->where('id',$id);
		$this->db->update('menu');
		return TRUE;	
	}
	
	function change_footer_status($id,$status)
	{
		$this->db->set('footer',$status);
		$this->db->where('id',$id);
		$this->db->update('menu');
		return TRUE;	
	}
}
?>