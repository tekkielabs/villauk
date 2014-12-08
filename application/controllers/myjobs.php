<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class myjobs extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('myjobs_model');
		$this->load->library('pagination');
		$this->load->model('pages_model');
		$this->load->model('jobs_model');
    }
	function index()
	{
		$page = $this->uri->segment(3);
		
		$data['siteTitle'] = 'My Jobs - '.SITE_TITLE;
		$data['main_menus'] = $this->pages_model->get_main_menus();
		$data['footer_menus'] = $this->pages_model->get_footer_menus();	
			
		$total_rows = $this->myjobs_model->total_myjobs();
		$config['base_url'] = base_url()."index.php/myjobs/";
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 7;
		$config['first_link'] = '';
		$config['last_link'] = '';
		$config['full_tag_open'] = '<div class="paginglist"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['next_link'] = '<img src="'.base_url().'assets/images/paging_next.gif">';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<img src="'.base_url().'assets/images/paging_prev.gif">';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="#" class="selected">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		
		
		$data['jobs'] = $this->myjobs_model->all_myjobs($config['per_page'],$page);
		$data['recent_jobs'] = $this->jobs_model->recent_jobs();
		$this->pagination->initialize($config);

		$this->load->view('header',$data);
		$this->load->view('myjobs',$data);
		$this->load->view('footer',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */