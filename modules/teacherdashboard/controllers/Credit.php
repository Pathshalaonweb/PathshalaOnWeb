<?php
class Credit extends Teacher_Controller
{

	
	public function __construct() {
		parent::__construct();  		
		$this->load->model(array('teacherdashboard/credit_model','teacher/teacher_model'));	
	}

	public function index(){
		 
		 
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 $config['limit']		 =  ($pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		 $offset                 =  ($this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $page_segment           =  find_paging_segment();
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $teacher_id			 =	$this->session->userdata('teacher_id');	
		 $condtion               =  array('teacher_id'=>$teacher_id);	
		 $res_array              =  $this->credit_model->get_credit($config['limit'],$offset,$condtion);		
		 //echo_sql();
		 $config['total_rows']   =  get_found_rows();			
		 $data['page_links']     =  pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);
		 $data['sno']            =  ($this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page')+1 : 1;	 						
		 $data['heading_title']  =  $page_title;
		 $data['res']            =  $res_array; 	
		 $this->load->view('teacherdashboard/credit/view_credit_listing',$data);
	}
	
	public function history(){
		 
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 $config['limit']		 =  ($pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		 $offset                 =  ($this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $page_segment           =  find_paging_segment();
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $teacher_id			 =	$this->session->userdata('teacher_id');	
		 $condtion               =  array('teacher_id'=>$teacher_id);	
		 $res_array              =  $this->credit_model->get_plan_credit($config['limit'],$offset,$condtion);		
		 //echo_sql();
		 $config['total_rows']   =  get_found_rows();			
		 $data['page_links']     =  pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);
		 $data['sno']            =  ($this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page')+1 : 1;	 						
		 $data['heading_title']  =  $page_title;
		 $data['res']            =  $res_array; 
		 $this->load->view('teacherdashboard/credit/view_credit_history_listing',$data);
		 
		}
	
	}
?>