<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('application/controllers/common.php');
class menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/menu_model');
	}
	
	
	// ADD CATEGORY
	public function add()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Add Menu -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		if($this->input->post('submit_menu'))
		{
			
			$this->form_validation->set_rules('menu_name', 'Menu Name', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$errorMessage = ENTER_MENU;
			}
			else
			{
				$data['menu_cat'] = $this->input->post('menu_cat');
				$data['menu_name'] = $this->input->post('menu_name');
				$category = $this->menu_model->add_menu($data);
				if($category)
				{
					$successMessage = CATEGORY_ADDED_SUCCESS;
				}
				else
				{
					$errorMessage = CATEGORY_DUPLICATE;
				}
			}
		}
		$menu_list=$this->menu_model->list_menu();
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'errorMessage'		=>	$errorMessage,
				'successMessage'	=>	$successMessage,
				'lmenu'				=>  $menu_list
		);
		
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/menu/add',$data);
		$this->load->view('admin/footer.php');
	}
	
	// CATEGORIES LIST
	public function menulist()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Menu List -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		$categories = $this->menu_model->list_menu();
		
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'categories'		=>	$categories
		);
		
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/menu/list',$data);
		$this->load->view('admin/footer.php');
	}
	
	public function edit($string)
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Edit Menu -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		$id = $this->uri->segment(4);
		//$menu_id = $this->menu_model->list_menu();
		
		if($this->input->post('submit'))
		{
			
			$this->form_validation->set_rules('menu_name', 'Menu Name', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$errorMessage = ENTER_CATEGORY;
			} 
			else
			{
				$cat_name = $this->input->post('menu_name');
				$menu_main = $this->input->post('menu_cat');
				$menu = $this->menu_model->edit_menu($cat_name,$id,$menu_main);
				if($menu)
				{
					$successMessage = MENU_EDITED_SUCCESS;
				}
				else
				{
					$errorMessage = CATEGORY_DUPLICATE;
				}
			}
		}
		
		$category_info = $this->menu_model->get_menu($id);
		$menu_edit=$this->menu_model->list_menu();
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'errorMessage'		=>	$errorMessage,
				'successMessage'	=>	$successMessage,
				'category_info'		=> $category_info[0],
				'lmenu'				=>  $menu_edit
		);
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/menu/edit',$data);
		$this->load->view('admin/footer.php');
	}
	
	public function delete($string)
	{
		$id = $this->uri->segment(4);
		$delete = $this->menu_model->delete_menu($id);
		if($delete)
		{
			redirect(base_url().'index.php/admin/menu/menulist/', 'refresh');
		}
	}
	
	public function main_menu_display()
	{
		$id = $this->uri->segment(4);
		$status = $this->uri->segment(5);
		
		$change_status = $this->menu_model->change_mainmenu_status($id,$status);
		if($change_status)
		{
			redirect(base_url()."index.php/admin/menu/menulist");
		}
	}
	
	public function footer_display()
	{
		$id = $this->uri->segment(4);
		$status = $this->uri->segment(5);
		
		$change_status = $this->menu_model->change_footer_status($id,$status);
		if($change_status)
		{
			redirect(base_url()."index.php/admin/menu/menulist");
		}
	}

}

/* End of file category.php */
/* Location: ./application/controllers/Category.php */