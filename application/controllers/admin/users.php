<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('application/controllers/common.php');
class users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->model('admin/Category_model');
		//$this->load->model('admin/Location_model');
		//$this->load->model('Subcategory_model');
		$this->load->model('admin/Users_model');
	}
	
	
	
	// USERS LIST
	public function userlist()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Users List -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		$users = $this->Users_model->list_users();
		
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'users'				=>	$users
		);
		
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/users/list',$data);
		$this->load->view('admin/footer.php');
	}
	
	public function delete($id)
	{
		$delete = $this->Users_model->delete_user($id);
		if($delete)
		{
			redirect(base_url().'index.php/admin/users/userlist/', 'refresh');
		}
	}

}

/* End of file category.php */
/* Location: ./application/controllers/Category.php */