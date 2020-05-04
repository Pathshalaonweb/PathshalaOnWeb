<?php
class Home extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');				
		$this->page_section_ct = 'home';
		$this->load->model('home/home_model');
		if($this->session->userdata('user_id')!='')
		{
			
		}
		else
		{
			redirect('users/login');
		}
	}
	
	public function index()
	{
		$data['page_title']            = "";
		$data['page_keyword']          = "";
		$data['page_description']      = "";
			
		$data['exam'] = $this->home_model->get_cat();
		$data['active']='dashboard';
		$data['content'] = $this->home_model->getcontentListing();		
		$this->load->view('home',$data);	
	}
	
	public function online_exam()
	{	
		$data['page_title']            = "";
		$data['page_keyword']          = "";
		$data['page_description']      = "";
			
	    $data['exam'] = $this->home_model->get_cat();
		$data['active']='dashboard';
	    $data['content'] = $this->home_model->getcontentListing();		
		$this->load->view('online_exam',$data);	
	}

}