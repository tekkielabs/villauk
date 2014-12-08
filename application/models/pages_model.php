<?php
class pages_model extends CI_Model {
	function get_content($slug) {
		$this->db->select(array('pages.*'));
		$this->db->from('pages');
		$this->db->join('menu','menu.id = pages.menu_id');
		$this->db->where('menu.menu_slug',$slug);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			return $row['0'];
		}
	}
	function recent_jobs()
	{
		$this->db->select('*');
		$this->db->from('jobs');
		$this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$this->db->limit(3,0);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	function jobs_location()
	{
		$this->db->select(array('location.*'));
		$this->db->from('location');
		$this->db->order_by('name','ASC');
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	function jobs_category()
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->order_by('name','ASC');
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	
	function get_main_menus()
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('main_menu','1');
		$this->db->order_by('prior','ASC');
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	function get_sub_menus($id)
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('parent_id',$id);
		$this->db->where('main_menu','1');
		$this->db->order_by('prior','ASC');
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	function get_footer_menus()
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('footer','1');
		$this->db->order_by('prior','ASC');
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
}
?>