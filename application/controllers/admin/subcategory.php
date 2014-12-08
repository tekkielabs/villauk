<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('application/controllers/common.php');
class subcategory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Category_model');
		$this->load->model('Subcategory_model');
	}
	
	
	// ADD Sub CATEGORY
	public function add()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Add Sub Category -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		if($this->input->post('submit'))
		{
			
			$this->form_validation->set_rules('category_id', 'Category Name', 'required');
			$this->form_validation->set_rules('subcategory_name', 'Sub Category Name', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$errorMessage = ENTER_CATEGORY;
			}
			else
			{
				$cat_id = $this->input->post('category_id');
				$subcat_name = $this->input->post('subcategory_name');
				$subcategory = $this->Subcategory_model->add_subcategory($cat_id ,  $subcat_name);
				if($subcategory)
				{
					$successMessage = CATEGORY_ADDED_SUCCESS;
				}
				else
				{
					$errorMessage = CATEGORY_DUPLICATE;
				}
			}
		}
		
		$categories = $this->Category_model->list_category();
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'errorMessage'		=>	$errorMessage,
				'successMessage'	=>	$successMessage,
				'categories'		=>	$categories
		);
		
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/subcategory/add',$data);
		$this->load->view('admin/footer.php');
	}
	
	// CATEGORIES LIST
	public function subcatlist()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Sub Categories List -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		$categories = $this->Subcategory_model->list_category();
		
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'categories'		=>	$categories
		);
		
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/subcategory/list',$data);
		$this->load->view('admin/footer.php');
	}
	
	public function edit($string)
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Edit Sub Category -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		$id = encrypt_decrypt('decrypt',$string);
		
		
		
		if($this->input->post('submit'))
		{
			
			$this->form_validation->set_rules('subcategory_name', 'Sub Category Name', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$errorMessage = ENTER_CATEGORY;
			}
			else
			{
				$cat_name = $this->input->post('subcategory_name');
				$category = $this->Subcategory_model->edit_category($cat_name,$id);
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
		
		$category_info = $this->Subcategory_model->get_category($id);
		
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'errorMessage'		=>	$errorMessage,
				'successMessage'	=>	$successMessage,
				'category_info'		=> $category_info[0]
		);
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/subcategory/edit',$data);
		$this->load->view('admin/footer.php');
	}
	
	public function delete($string)
	{
		$id = encrypt_decrypt('decrypt',$string);
		$delete = $this->Subcategory_model->delete_subcategory($id);
		if($delete)
		{
			redirect(base_url().'subcategory/subcatlist/', 'refresh');
		}
	}

}

/* End of file category.php */
/* Location: ./application/controllers/Category.php */