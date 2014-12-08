<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('application/controllers/common.php');
class Location extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/location_model');
	}
	
	
	// ADD location
	public function add()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Add Location -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		if($this->input->post('submit'))
		{
			
			$this->form_validation->set_rules('location_name', 'Location Name', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$errorMessage = ENTER_LOCATION;
			}
			else
			{
				$loc_name = $this->input->post('location_name');
				$location = $this->location_model->add_location($loc_name);
				if($location)
				{
					$successMessage = LOCATION_ADDED_SUCCESS;
				}
				else
				{
					$errorMessage = LOCATION_DUPLICATE;
				}
			}
		}
		
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'errorMessage'		=>	$errorMessage,
				'successMessage'	=>	$successMessage
		);
		
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/location/add',$data);
		$this->load->view('admin/footer.php');
	}
	
	// LOCATIONS LIST
	public function loclist()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Locations List -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		$locations = $this->location_model->list_location();
		
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'locations'		=>	$locations
		);
		
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/location/list',$data);
		$this->load->view('admin/footer.php');
	}
	
	public function edit()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Edit Location -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		$id = $this->uri->segment(4);
		//echo $id; die;
		
		
		if($this->input->post('submit'))
		{
			
			$this->form_validation->set_rules('location_name', 'Location Name', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$errorMessage = ENTER_LOCATION;
			}
			else
			{
				$loc_name = $this->input->post('location_name');
				$location = $this->location_model->edit_location($loc_name,$id);
				if($location)
				{
					$successMessage = LOCATION_EDITED_SUCCESS;
				}
				else
				{
					$errorMessage = LOCATION_DUPLICATE;
				}
			}
		}
		
		$location_info = $this->location_model->get_location($id);
		
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'errorMessage'		=>	$errorMessage,
				'successMessage'	=>	$successMessage,
				'location_info'		=> $location_info[0]
		);
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/location/edit',$data);
		$this->load->view('admin/footer.php');
	}
	
	public function delete($string)
	{
		$id = $this->uri->segment(4);
		//echo $id; die;
		$delete = $this->location_model->delete_location($id);
		if($delete)
		{
			redirect(base_url().'index.php/admin/location/loclist/', 'refresh');
		}
	}

}

/* End of file location.php */
/* Location: ./application/controllers/location.php */