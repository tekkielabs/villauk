<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('application/controllers/common.php');
class jobs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/Category_model');
		$this->load->model('admin/Location_model');
		//$this->load->model('Subcategory_model');
		$this->load->model('admin/Jobs_model');
	}
	
	
	// ADD JOB
	public function add_job()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Add JOB -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('category', 'Category Name', 'required');
			$this->form_validation->set_rules('location', 'Location Name', 'required');
			$this->form_validation->set_rules('min_sal', 'Min. Salary', 'required');
			$this->form_validation->set_rules('max_sal', 'Max. Salary', 'required');
			$this->form_validation->set_rules('min_exp', 'Min. Experience', 'required');
			$this->form_validation->set_rules('max_exp', 'Max. Experience', 'required');
			$this->form_validation->set_rules('jobtype', 'Job Type', 'required');
			$this->form_validation->set_rules('jobcode', 'Job Code', 'required');
			$this->form_validation->set_rules('desc', 'Description', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$errorMessage = validation_errors();
			}
			else
			{
				$data['title'] = $this->input->post('title');
				$data['cat_id'] = $this->input->post('category');
				$data['loc_id'] = $this->input->post('location');
				$data['min_sal'] = $this->input->post('min_sal');
				$data['max_sal'] = $this->input->post('max_sal');
				$data['min_exp'] = $this->input->post('min_exp');
				$data['max_exp'] = $this->input->post('max_exp');
				$data['jobtype'] = $this->input->post('jobtype');
				$data['jobcode'] = $this->input->post('jobcode');
				$data['desc'] = $this->input->post('desc');
				$data['email'] = $this->input->post('email');
				
				$jobs = $this->Jobs_model->add_job($data);
				if($jobs)
				{
					$successMessage = JOB_ADDED_SUCCESS;
				}
				else
				{
					$errorMessage = JOB_DUPLICATE;
				}
			}
		}
		
		$categories = $this->Category_model->list_category();
		$locations = $this->Location_model->list_location();
		//echo '<pre>'; print_r($categories); die;
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'errorMessage'		=>	$errorMessage,
				'successMessage'	=>	$successMessage,
				'categories'		=>	$categories,
				'locations'			=>	$locations
		);
		
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/jobs/add',$data);
		$this->load->view('admin/footer.php');
	}
	
	// CATEGORIES LIST
	public function joblist()
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Jobs List -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		
		$jobs = $this->Jobs_model->list_jobs();
		
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'jobs'				=>	$jobs
		);
		
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/jobs/list',$data);
		$this->load->view('admin/footer.php');
	}
	
	public function edit($id)
	{
		$errorMessage = '';
		$successMessage = '';
		$siteTitle = "Edit Job -".SITE_TITLE;
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);

		
		
		
		if($this->input->post('submit'))
		{
			
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('category', 'Category Name', 'required');
			$this->form_validation->set_rules('location', 'Location Name', 'required');
			$this->form_validation->set_rules('min_sal', 'Min. Salary', 'required');
			$this->form_validation->set_rules('max_sal', 'Min. Salary', 'required');
			$this->form_validation->set_rules('min_exp', 'Min. Experience', 'required');
			$this->form_validation->set_rules('max_exp', 'Min. Experience', 'required');
			$this->form_validation->set_rules('jobtype', 'Job Type', 'required');
			$this->form_validation->set_rules('jobcode', 'Job Code', 'required');
			$this->form_validation->set_rules('desc', 'Description', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$errorMessage = validation_errors();
			}
			else
			{
				$data['title'] = $this->input->post('title');
				$data['cat_id'] = $this->input->post('category');
				$data['loc_id'] = $this->input->post('location');
				$data['min_sal'] = $this->input->post('min_sal');
				$data['max_sal'] = $this->input->post('max_sal');
				$data['min_exp'] = $this->input->post('min_exp');
				$data['max_exp'] = $this->input->post('max_exp');
				$data['jobtype'] = $this->input->post('jobtype');
				$data['jobcode'] = $this->input->post('jobcode');
				$data['desc'] = $this->input->post('desc');
				$data['email'] = $this->input->post('email');
				
				$jobs = $this->Jobs_model->edit_job($data);
				if($jobs)
				{
					$successMessage = JOB_EDITED_SUCCESS;
				}
				else
				{
					$errorMessage = JOB_DUPLICATE;
				}
			}
		}
		
		$categories = $this->Category_model->list_category();
		$locations = $this->Location_model->list_location();
		$job_info = $this->Jobs_model->get_job($id);
		//echo '<pre>'; print_r($job_info); die;
		$data = array(
				'siteTitle'			=>	$siteTitle,
				'uri1'				=>	$uri1,
				'uri2'				=>	$uri2,
				'errorMessage'		=>	$errorMessage,
				'successMessage'	=>	$successMessage,
				'categories'		=>	$categories,
				'locations'			=>	$locations,
				'job_info'			=> $job_info[0]
		);
		$this->load->view('admin/header.php', $data);
		$this->load->view('admin/jobs/edit',$data);
		$this->load->view('admin/footer.php');
	}
	
	public function delete($id)
	{
		$delete = $this->Jobs_model->delete_job($id);
		if($delete)
		{
			redirect(base_url().'index.php/admin/jobs/joblist/', 'refresh');
		}
	}

}

/* End of file category.php */
/* Location: ./application/controllers/Category.php */