<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('pages_model');
		$this->load->library('form_validation');	
	}
	public function index()
	{
		$data['siteTitle'] = 'Register -'. SITE_TITLE;
		$data['main_menus'] = $this->pages_model->get_main_menus();
		$data['footer_menus'] = $this->pages_model->get_footer_menus();
		
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[3]|max_length[45]|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[20]|matches[cpassword]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('cover', 'Cover', 'trim|required|min_length[3]|max_length[500]');
			if ($this->form_validation->run() == TRUE)
			{
				$data['fname'] = $this->input->post('fname');
				$data['lname'] = $this->input->post('lname');
				$data['email'] = $this->input->post('email');
				$data['password'] = $this->input->post('password');
				$data['cpassword'] = $this->input->post('cpassword');
				$data['cover'] = $this->input->post('cover');
				
				$config['upload_path'] = './uploads/resume/';
				$config['allowed_types'] = 'doc|pdf|docx';
				$config['max_size']	= '500';
		
				$this->load->library('upload', $config);
				//echo $this->upload->do_upload(); die;
				if ( ! $this->upload->do_upload('resume'))
				{
					$data['errorMessage'] = $this->upload->display_errors();
				}
				else
				{
					$image_data = array('upload_data' => $this->upload->data());
					$data['resume'] = $image_data['upload_data']['file_name'];
					
					$register = $this->register_model->register_user($data);
					//$data['successMessage'] = REGISTER_SUCCESS;
					
					$this->session->set_flashdata('success',REGISTER_SUCCESS);
					redirect(base_url().'index.php/register/');
				}
			}
		}
		$this->load->view('header',$data);
		$this->load->view('register',$data);
		$this->load->view('footer',$data);
	}
}
