<?php
class Result extends Admin_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->library('pagination');   
		$this->load->model(array('result_model','adminzone/department_model'));
		//$this->load->library(array('safe_encrypt'));
		$this->config->set_item('menu_highlight','students management');	
	}

	public function exam_result()
	{  
		$condtion               = array();		
    	$pagesize               = (int) $this->input->get_post('pagesize');	
	    $config['limit']		= ($pagesize > 0) ? $pagesize : $this->config->item('pagesize'); 				
		$offset                 = ($this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               = current_url_query_string(array('filter'=>'result'),array('per_page'));		
		$status			        = $this->input->get_post('status',TRUE);	    
		$res_array              = $this->result_model->get_exam_result();//echo_sql();
		$total_record           = get_found_rows();			
		$data['page_links']     = admin_pagination($base_url,$total_record,$config['limit'],$offset);
		//echo "<pre>"; print_r($res_array); die;
		$data['pagelist']       = $res_array; 	
		$data['total_rec']      = $total_record  ;
        $data['heading_title'] 	= "Exam Result";	
		$data['exam_res']		= $res_array;
		$this->load->view('result/view_student_result',$data);
	}

	public function mock_result()
	{
		$config['base_url'] = base_url().'adminzone/result/mock_result/';        
        $config['total_rows'] = $this->result_model->count_all_users();        
        $config['per_page'] = 20;        
        $config['uri_segment'] = 4;        
        $config['full_tag_open'] = '<ul class="pagination">';        
        $config['full_tag_close'] = '</ul>';        
        $config['first_link'] = 'First';        
        $config['last_link'] = 'Last';        
        $config['first_tag_open'] = '<li>';        
        $config['first_tag_close'] = '</li>';        
        $config['prev_link'] = '&laquo';        
        $config['prev_tag_open'] = '<li class="prev">';        
        $config['prev_tag_close'] = '</li>';        
        $config['next_link'] = '&raquo';        
        $config['next_tag_open'] = '<li>';        
        $config['next_tag_close'] = '</li>';        
        $config['last_tag_open'] = '<li>';        
        $config['last_tag_close'] = '</li>';        
        $config['cur_tag_open'] = '<li class="active"><a href="#">';        
        $config['cur_tag_close'] = '</a></li>';        
        $config['num_tag_open'] = '<li>';        
        $config['num_tag_close'] = '</li>';
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);        
        $data['links'] = $this->pagination->create_links();        
        $data['exam_res'] = $this->result_model->fetch_mock_result($config["per_page"], $page); 
		
		if($page == 0)
		{
			$data['start_page'] = '1';
		} else {
			$data['start_page'] = $page;
		}
		$data['heading_title'] = "Mock Result";	
		$this->load->view('result/view_student_mock_result',$data);	

	}

}