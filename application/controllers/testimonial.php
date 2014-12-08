<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class testimonial extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Testimonial_model');	
	}
	public function index()
	{
		$data['siteTitle'] = '';
		$this->load->view('header',$data);
		$this->load->view('banner',$data);
		$this->load->view('index',$data);
		$this->load->view('footer',$data);
	}
}
