<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jobs extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('jobs_model');
		$this->load->library('pagination');
		$this->load->model('pages_model');
    }
	function lists()
	{
		$page = $this->uri->segment(3);
		
		$data['siteTitle'] = 'Jobs - '.SITE_TITLE;
		$data['main_menus'] = $this->pages_model->get_main_menus();
		$data['footer_menus'] = $this->pages_model->get_footer_menus();	
		$data['heading'] = 'Jobs';
			
		$total_rows = $this->jobs_model->total_jobs();
		$config['base_url'] = base_url()."index.php/jobs/lists/";
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
		
		
		$data['jobs'] = $this->jobs_model->all_jobs($config['per_page'],$page);
		$data['recent_jobs'] = $this->jobs_model->recent_jobs();
		$this->pagination->initialize($config);

		$this->load->view('header',$data);
		$this->load->view('jobs',$data);
		$this->load->view('footer',$data);
	}
	function location()
	{
		$loc_name_slug = $this->uri->segment(3);
		$loc_name = str_replace('-',' ',$loc_name_slug);
		$page = $this->uri->segment(4);
		$data['siteTitle'] = 'Jobs - '.SITE_TITLE;
		$data['main_menus'] = $this->pages_model->get_main_menus();
		$data['footer_menus'] = $this->pages_model->get_footer_menus();
		$data['heading'] = 'Jobs - '.str_replace('-',' ',$loc_name_slug);
	
		$total_rows = $this->jobs_model->total_loc_jobs($loc_name);
		//echo $total_rows; die;
		$config['base_url'] = base_url()."index.php/jobs/location/".$loc_name_slug."/";
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 7;
		$config['uri_segment'] = 4;
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
		
		
		$data['jobs'] = $this->jobs_model->loc_jobs($loc_name,$config['per_page'],$page);
		$data['recent_jobs'] = $this->jobs_model->recent_jobs();
		$this->pagination->initialize($config);
		
		$this->load->view('header',$data);
		$this->load->view('jobs',$data);
		$this->load->view('footer',$data);
	}
	function category()
	{
		$cat_name_slug = $this->uri->segment(3);
		$cat_name = str_replace('-',' ',$cat_name_slug);
		$page = $this->uri->segment(4);
		$data['siteTitle'] = 'Jobs - '.SITE_TITLE;
		$data['main_menus'] = $this->pages_model->get_main_menus();
		$data['footer_menus'] = $this->pages_model->get_footer_menus();
		$data['heading'] = 'Jobs - '.str_replace('-',' ',$cat_name_slug);
	
		$total_rows = $this->jobs_model->total_cat_jobs($cat_name);
		//echo $total_rows; die;
		$config['base_url'] = base_url()."index.php/jobs/category/".$cat_name_slug."/";
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 7;
		$config['uri_segment'] = 4;
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
		
		$data['jobs'] = $this->jobs_model->cat_jobs($cat_name,$config['per_page'],$page);
		$data['recent_jobs'] = $this->jobs_model->recent_jobs();
		$this->pagination->initialize($config);
		//echo '<pre>'; print_r($data); die;
		$this->load->view('header',$data);
		$this->load->view('jobs',$data);
		$this->load->view('footer',$data);
	}
	
	function view()
	{
		$job_name_slug = $this->uri->segment(3);
		$job_name = str_replace('-',' ',$job_name_slug);
		$data['siteTitle'] = 'Jobs - '.SITE_TITLE;
		$data['main_menus'] = $this->pages_model->get_main_menus();
		$data['footer_menus'] = $this->pages_model->get_footer_menus();
		
		$data['job'] = $this->jobs_model->view_job($job_name);
		$data['recent_jobs'] = $this->jobs_model->recent_jobs();
		
		$this->load->view('header',$data);
		$this->load->view('job_view',$data);
		$this->load->view('footer',$data);
	}
	
	function myjobview()
	{
		$job_name_slug = $this->uri->segment(3);
		$job_name = str_replace('-',' ',$job_name_slug);
		$data['siteTitle'] = 'Jobs - '.SITE_TITLE;
		$data['main_menus'] = $this->pages_model->get_main_menus();
		$data['footer_menus'] = $this->pages_model->get_footer_menus();
		
		$data['job'] = $this->jobs_model->view_job($job_name);
		$data['recent_jobs'] = $this->jobs_model->recent_jobs();
		
		$this->load->view('header',$data);
		$this->load->view('myjob_view',$data);
		$this->load->view('footer',$data);
	}
	
	function apply()
	{
		$data['job_id'] = $this->uri->segment(3);
		$data['user_id'] = $this->session->userdata('user_id');
		$apply = $this->jobs_model->apply_job($data);
		if($apply)
		{
			$this->session->set_flashdata('applied',JOB_APPLY_SUCCESS);
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			$this->session->set_flashdata('failed',JOB_APPLY_FAILED);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */