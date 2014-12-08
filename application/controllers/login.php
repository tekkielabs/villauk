<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('form_validation');	
	}
	public function index()
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE)
			{
				$data['email'] = $this->input->post('email');
				$data['password'] = $this->input->post('password');
				
				$login = $this->login_model->login($data);
				if(!empty($login))
				{
					$userdata = array(  'user_id'=>$login['id'],
										'fname'=>$login['fname'],
										'lname'=>$login['lname']
								);
					$this->session->set_userdata($userdata);
					redirect(base_url());
				}
				else
				{
					$this->session->set_flashdata('failed',LOGIN_FAILED);
					redirect(base_url());
				}
			}
			else
			{
				$this->session->set_flashdata('failed',validation_errors());
				redirect(base_url());
			}
		}
	}
	
	public function logout()
	{
		$userdata = array('user_id' => '', 'fname' => '', 'lname' => '');
		$this->session->unset_userdata($userdata);
		redirect(base_url());
	}
}