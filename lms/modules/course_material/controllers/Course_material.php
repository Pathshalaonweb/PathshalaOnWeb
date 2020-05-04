<?php
class Course_material extends Public_Controller
{

	public function __construct()
	{
		parent::__construct();				
		$this->load->model('course_material/course_material_model');
		if($this->session->userdata('user_id')!='')
		{

		}else{
			redirect('users/login');
		}
	}

	public function index()
	{
	    $data['crs_mat_res']=$this->course_material_model->get_course_material();
		//echo_sql();
		$data['active'] ="crs_mat";
		$this->load->view('course_material',$data);	
	}

	public function view_course_material()
	{
		$data['crs_mat']=$this->course_material_model->get_crs_mat_id();
		$data['active'] ="crs_mat";
		$this->load->view('course_material_detail',$data);	

	}



}