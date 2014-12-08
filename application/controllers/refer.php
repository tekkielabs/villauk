<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Refer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Refer_model');	
	}
	public function index()
	{
		$data['siteTitle'] = '';
		$this->load->view('header',$data);
		$this->load->view('banner',$data);
		$this->load->view('home',$data);
		$this->load->view('right-panel',$data);
		$this->load->view('footer',$data);
	}
}
