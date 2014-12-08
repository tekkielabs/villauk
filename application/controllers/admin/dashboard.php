<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function index()
	{
		//echo $this->session->userdata('user_id');die;
		if(!$this->session->userdata('user_id'))
			{
				redirect(base_url()."index.php/admin/login");
			}
		$data['siteTitle'] = SITE_TITLE. " - Dashboard";
		$data['uri1'] = $this->uri->segment(1);
		$data['uri2'] = $this->uri->segment(2);
		$this->load->view('admin/header.php', $data);
		//$this->load->view('admin/sidebar.php');
		//$this->load->view('admin/dashboard/index',$data);
		$this->load->view('admin/footer.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */