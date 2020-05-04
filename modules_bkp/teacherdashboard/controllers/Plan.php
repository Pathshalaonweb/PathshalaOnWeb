<?php
class Plan extends Teacher_Controller
{

	
	public function __construct() {
		parent::__construct();  		
		$this->load->model(array('plan/plan_model','courses/courses_model'));	
		$this->load->helper(array('category/category'));
	}

	public function index(){
		 
		 
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $page_segment           =  find_paging_segment();
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $condtion               = array();	
		 $category_id            = $this->uri->segment(3);
		 $teacher_id=$this->session->userdata('teacher_id');	
		 	
		 $res_array               =  $this->plan_model->get_plan(3,$offset,$condtion);		
		 $config['total_rows']    =  get_found_rows();			
		 $data['page_links']    	 = pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);	 						
		 $data['heading_title'] 	 = $page_title;
		 $data['res']           	 = $res_array; 	
		 $this->load->view('teacherdashboard/plan/view_plan_listing',$data);
	}
	
	public function buynow(){
		
		$id=trim($this->uri->segment(4));
		$newdata = array(
			'planId'  	=> $id,
			'plan_in' => TRUE
		);
		$this->session->set_userdata($newdata);
		redirect('teacherdashboard/plan/paynow', '');
		}
		
	public function paynow(){
		 $planId=$this->session->userdata('planId');
		 $plan_in=$this->session->userdata('plan_in');
		 if(isset($plan_in)){
			  $condtion 	=  array('pid'=>$planId);
			  $res_array    =  $this->plan_model->get_plan(1,0,$condtion);
			  $data['res']           	 = $res_array;
			  $this->load->view('teacherdashboard/plan/view_plan_paynow',$data); 		
		 }else{
			redirect('teacherdashboard/plan', '');
		 }
	}
	
		
}
?>