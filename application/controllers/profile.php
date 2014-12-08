<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
		$this->load->model('pages_model');
		$this->load->library('form_validation');	
	}
	public function edit_profile()
	{
		$data['siteTitle'] = 'Profile -'. SITE_TITLE;
		$data['main_menus'] = $this->pages_model->get_main_menus();
		$data['footer_menus'] = $this->pages_model->get_footer_menus();
		$data['user_id'] = $this->session->userdata('user_id');
		
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('cover', 'Cover', 'trim|required|min_length[3]|max_length[500]');
			if ($this->form_validation->run() == TRUE)
			{
				$data['fname'] = $this->input->post('fname');
				$data['lname'] = $this->input->post('lname');
				$data['cover'] = $this->input->post('cover');
				
				$config['upload_path'] = './uploads/resume/';
				$config['allowed_types'] = 'doc|pdf|docx';
				$config['max_size']	= '500';
		
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('resume'))
				{
					$data['errorMessage'] = $this->upload->display_errors();
				}
				else
				{
					$image_data = array('upload_data' => $this->upload->data());
					$data['resume'] = $image_data['upload_data']['file_name'];
				}
				
				if($_FILES['resume']['name']=='')
				{
					$register = $this->profile_model->editprofile_user($data);	
					$this->session->set_flashdata('success',UPDATE_PROFILE_SUCCESS);
					redirect(base_url().'index.php/profile/edit_profile');
				}
				elseif($_FILES['resume']['name']!='' && !$data['errorMessage'])
				{
					$register = $this->profile_model->editprofile_user($data);	
					$this->session->set_flashdata('success',UPDATE_PROFILE_SUCCESS);
					redirect(base_url().'index.php/profile/edit_profile');
				}
			}
		}
		
		$data['profile_info'] = $this->profile_model->edit_profile($data['user_id']);
		
		$this->load->view('header',$data);
		$this->load->view('edit_profile',$data);
		$this->load->view('footer',$data);
	}
}
