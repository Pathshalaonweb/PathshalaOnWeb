<?php
class Subject extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('subject_model'));  
		$this->load->helper('category/category');
		$this->config->set_item('menu_highlight','Courses Management');	
		
	}
	
	public  function index($page = NULL)
	{
		 $condtion               = array();
		 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $category_id            =  (int) $this->uri->segment(4,0);
		$status			        =   $this->input->get_post('status',TRUE);	
		
	
		
		if($status!='')
		{
			$condtion['status'] = $status;
		}
		
		$res_array               =  $this->subject_model->get_subject_list();	
	
		$config['total_rows']    =  get_found_rows();	
		$data['heading_title']   =  'Subject Lists';
		$data['res']             =  $res_array; 	
		$data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);	
		
		
		if( $this->input->post('status_action')!='')
		{	
			$this->update_status('tbl_subject_list','subject_id');			
		}
		
	
		
						
		$this->load->view('courses/view_subject_list',$data);	
		
			
	}
	
	
	public function add()
	{			
		$data['heading_title'] = 'Add Courses';	
		$this->form_validation->set_rules('subject_name','Subject Name',"trim|required");
		if($this->form_validation->run()===TRUE)
		{
			$posted_data = array(
			'subject_name'				=>	$this->input->post('subject_name'),
			'subject_added_date'		=>	$this->config->item('config.date.time')						
			);

			$this->subject_model->safe_insert('tbl_subject_list',$posted_data,FALSE);
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));		
			redirect('adminzone/subject', '');
		}
		
		$this->load->view('courses/view_subject_add',$data);		  
		
	}
	
	
	public function edit($templateId)
	{			
		$data['heading_title'] = 'Edit Course';
		$courseId = (int) $this->uri->segment(4);		
		$option = array('subject_id'=>$courseId);
		$res =  $this->subject_model->get_subject_by_id($option);	
		
		$res=$res[0];
	
		
		$this->form_validation->set_rules('subject_name','Subject Name',"trim|required");
		
		if( is_array( $res ) && !empty( $res ))
		{
			if($this->form_validation->run()==TRUE)
			{
				
				
			$posted_data = array(
			'subject_name'				=>	$this->input->post('subject_name',TRUE),
			'subject_added_date'		=>	$this->config->item('config.date.time')						
			);
								
				$where = "subject_id = '".$res['subject_id']."'"; 				
				$this->subject_model->safe_update('tbl_subject_list',$posted_data,$where,FALSE);
				

				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('successupdate'));		
				redirect('adminzone/subject/'.query_string(), '');		
			}
				
		$data['res']=$res;	
	
				
		$this->load->view('courses/view_subject_edit',$data);		
		}
		else
		{
			redirect('adminzone/subject', ''); 	
		}
	}
	
	
		
}
// End of controller