<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_Controller extends MY_Controller
{
	
	public $userId;
	public $userphoto;
	public $friend_count;
	public $country_res = array();
	public $my_friends = array();
	
	
	 public function __construct()
	 {
		 ob_start();
		 parent::__construct();	 
		    
		 $this->load->library(array('Auth'));		 
         $this->auth->is_auth_teacher();
		 $this->userId = (int) $this->session->userdata('teacher_id');	
		 $this->load->model(array('teacher/teacher_model')); 			 
		 $mres = $this->teacher_model->get_teacher_row( $this->userId );
		 $this->title =  $mres ['title'];
		 $this->fname =  $mres ['first_name']; 
		 $this->lname 	=  $mres ['last_name'];
		 $this->last_login =  $mres ['last_login_date'];
		 $this->mres=$mres;		 		
	
	 }
	 
	  
	 
}