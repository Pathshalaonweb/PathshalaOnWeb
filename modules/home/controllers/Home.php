<?php
class Home extends Public_Controller
{

	public function __construct(){
		
		parent::__construct();	
		$this->load->model(array('home/home_model','blog/blog_model','teacher/teacher_model'));
		//$this->load->helper(array('category/category','products/product'));	 
	
	}
	public function index(){
		$data['page_title']            = "";
		$data['page_keyword']          = "";
		$data['page_description']      = "";
		$param = array(
				'status'=>'1',
				'where'=>"display_home ='1'"
			);
		$getTeacher=$this->teacher_model->get_teacher(5,0,$param);
		$data['total_display_home_teacher'] = get_found_rows();
		//print_r($getTeacher);die;
		$param1 = array(
				'status'=>'1',
				'where'=>"display_home ='1'"
			);
		$getBlog=$this->blog_model->get_blog(4,0,$param1);
		$data['total_display_home_teacher'] = get_found_rows();
		$data['teacher']=$getTeacher;
		$data['blog']	=$getBlog;
		$this->load->view('home',$data);	
	}
	
	public function home_new(){
		$data['page_title']            = "";
		$data['page_keyword']          = "";
		$data['page_description']      = "";
		$param = array(
				'status'=>'1',
				'where'=>"display_home ='1'"
			);
		$getTeacher=$this->teacher_model->get_teacher(5,0,$param);
		$data['total_display_home_teacher'] = get_found_rows();
		//print_r($getTeacher);die;
		$param1 = array(
				'status'=>'1',
				'where'=>"display_home ='1'"
			);
		$getBlog=$this->blog_model->get_blog(4,0,$param1);
		$data['total_display_home_teacher'] = get_found_rows();
		$data['teacher']=$getTeacher;
		$data['blog']	=$getBlog;
		$this->load->view('home_new',$data);	
	}
	
	
}