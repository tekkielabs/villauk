<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->model('admin/login_model');
		}
	
	
	public function index()
	{
		if($this->session->userdata('user_id'))
			{
				redirect(base_url()."index.php/admin/dashboard");
			}
			
		$data['invalid']="";
		if($this->input->post('submit'))
			{
				$data['email']=$this->input->post('login_email');
				$data['pass']=$this->input->post('login_pass');
				$login=$this->login_model->login($data);
				if($login)
					{
						//echo $login[0]['id']; die;
						$login_session=array('user_id'=>$login[0]['id']);
						$this->session->set_userdata($login_session);
						redirect(base_url()."index.php/admin/dashboard");
					}
				else
					{
						$data['invalid']=LOGIN_FAILED;
					}
			}
		$data['siteTitle'] = SITE_TITLE. " - Login";
		$this->load->view('admin/login',$data);
	}
	
	
	public function logout()
		{
			session_unset();
			$this->session->sess_destroy();
			redirect(base_url()."index.php/admin/login");
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */