<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pages extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pages_model');	
		$this->load->library('form_validation');
	}
	public function content()
	{
		$data['main_menus'] = $this->pages_model->get_main_menus();
		$data['footer_menus'] = $this->pages_model->get_footer_menus();
		//echo '<pre>'; print_r($main_menus); die;
		$slug = $this->uri->segment(3);
		if($slug=='') 
		{
			$data['siteTitle'] = 'Home - VillaUK';
			$data['recent_jobs'] = $this->pages_model->recent_jobs();
			$data['jobs_location'] = $this->pages_model->jobs_location();
			$data['jobs_category'] = $this->pages_model->jobs_category();
		}
		else 
		{ 
			$data['content'] = $this->pages_model->get_content($slug);
			$data['siteTitle'] = $data['content']['title'];
		} 
		
		
		$this->load->view('header',$data);
		
		if(isset($data['recent_jobs']))
		{
			$this->load->view('banner',$data);
			$this->load->view('home',$data);
		}
		elseif($slug=='Contact_Us')
		{
			$this->load->view('contact_us',$data);
		}
		else
		{
			$this->load->view('other',$data);
		}
		$this->load->view('footer',$data);
	}
}