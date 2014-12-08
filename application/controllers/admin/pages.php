<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('application/controllers/common.php');
class pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/Pages_model');
	}
	
	// CATEGORIES LIST
	public function pagelist()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Pages -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		$pages = $this->Pages_model->list_pages();
		
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'pages'		=>	$pages
		);
		
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/pages/list',$data);
		$this->load->view('admin/footer.php');
	}
	
	public function edit($id)
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Edit Page -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		
		
		
		if($this->input->post('submit'))
		{
			
			$this->form_validation->set_rules('title', 'Page Title', 'required');
			$this->form_validation->set_rules('desc', 'Page Description', '');
			
			if ($this->form_validation->run() == FALSE)
			{
				$errorMessage = ENTER_TITLE;
			}
			else
			{
				$title = $this->input->post('title');
				$desc = $this->input->post('desc');
				$page = $this->Pages_model->edit_page($title,$desc,$id);
				if($page)
				{
					$successMessage = PAGE_EDITED_SUCCESS;
				}
				else
				{
					$errorMessage = PAGE_DUPLICATE;
				}
			}
		}
		
		$page_info = $this->Pages_model->get_page($id);
		
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'errorMessage'		=>	$errorMessage,
				'successMessage'	=>	$successMessage,
				'page_info'			=> $page_info[0]
		);
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/pages/edit',$data);
		$this->load->view('admin/footer.php');
	}
	
	public function delete($string)
	{
		$id = encrypt_decrypt('decrypt',$string);
		$delete = $this->Category_model->delete_category($id);
		if($delete)
		{
			redirect(base_url().'category/catlist/', 'refresh');
		}
	}

}

/* End of file category.php */
/* Location: ./application/controllers/Category.php */