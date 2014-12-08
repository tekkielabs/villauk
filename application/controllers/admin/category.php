<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('application/controllers/common.php');
class category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/Category_model');
	}
	
	
	// ADD CATEGORY
	public function add()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Add Category -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		if($this->input->post('submit'))
		{
			
			$this->form_validation->set_rules('category_name', 'Category Name', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$errorMessage = ENTER_CATEGORY;
			}
			else
			{
				$cat_name = $this->input->post('category_name');
				$category = $this->Category_model->add_category($cat_name);
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
		
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'errorMessage'		=>	$errorMessage,
				'successMessage'	=>	$successMessage
		);
		
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/category/add',$data);
		$this->load->view('admin/footer.php');
	}
	
	// CATEGORIES LIST
	public function catlist()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Categories List -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		$categories = $this->Category_model->list_category();
		
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'categories'		=>	$categories
		);
		
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/category/list',$data);
		$this->load->view('admin/footer.php');
	}
	
	public function edit()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Edit Category -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		$id = $this->uri->segment(4);
		//echo $id; die;
		
		
		if($this->input->post('submit'))
		{
			
			$this->form_validation->set_rules('category_name', 'Category Name', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$errorMessage = ENTER_CATEGORY;
			}
			else
			{
				$cat_name = $this->input->post('category_name');
				$category = $this->Category_model->edit_category($cat_name,$id);
				if($category)
				{
					$successMessage = CATEGORY_EDITED_SUCCESS;
				}
				else
				{
					$errorMessage = CATEGORY_DUPLICATE;
				}
			}
		}
		
		$category_info = $this->Category_model->get_category($id);
		
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'errorMessage'		=>	$errorMessage,
				'successMessage'	=>	$successMessage,
				'category_info'		=> $category_info[0]
		);
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/category/edit',$data);
		$this->load->view('admin/footer.php');
	}
	
	public function delete($string)
	{
		$id = $this->uri->segment(4);
		$delete = $this->Category_model->delete_category($id);
		if($delete)
		{
			redirect(base_url().'index.php/admin/category/catlist/', 'refresh');
		}
	}

}

/* End of file category.php */
/* Location: ./application/controllers/Category.php */