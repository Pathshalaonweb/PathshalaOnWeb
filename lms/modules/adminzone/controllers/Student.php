<?php
class Student extends Admin_Controller 
{
	public function __construct() 
	{
		parent::__construct();

		$this->load->model(array('student_model','users/users_model'));
		//$this->load->library(array('safe_encrypt'));
		$this->config->set_item('menu_highlight','students management');	
	}
  
	public  function index()
	{	  
   	     $condtion               = array();	
    	 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));		
		 $status			         =   $this->input->get_post('status',TRUE);
		 if($status!='')
		 {
			$condtion['status'] = $status;
		 }
		$res_array              = $this->student_model->get_students();
		//$res_array              = $this->student_model->get_students($config['limit'],$offset,$condtion);		
		//echo_sql();
		$total_record           = get_found_rows();			
		$data['page_links']     =  admin_pagination($base_url,$total_record,$config['limit'],$offset);
		$data['heading_title']  = 'Manage students';
		$data['pagelist']       = $res_array; 	
		$data['total_rec']      = $total_record  ;
		
		/*if( $this->input->post('status_action')!='')
		{			
			$this->update_status('tbl_customers','customers_id');			
		}*/
		//trace($this->input->post());
		$this->load->view('student/student_list_view',$data); 	
				
	}
	
	public function details()
	{
		$students_id   = (int) $this->uri->segment(4);
		$mres           = $this->student_model->get_student_row($students_id);		
		$res_bill       = $this->student_model->get_student_address_book($students_id,'Bill');	
		$res_ship       = $this->student_model->get_student_address_book($students_id,'Ship');
		
		$data['heading_title']  = 'students Details';
		$data['res_bill']  = $res_bill[0];
		$data['res_ship']  = $res_ship[0];
		$data['mres']      = $mres;		
		$this->load->view('student/view_student_detail',$data); 
		
	}
 
	public function add()
	{   
		$this->form_validation->set_rules('name', 'Name','trim|required|max_length[80]');
		$this->form_validation->set_rules('user_name', 'Email ID','trim|required|valid_email|max_length[80]|callback_email_check');
		$this->form_validation->set_rules('mobno', 'Mobile No','trim|numeric|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[20]|valid_password');
		$this->form_validation->set_rules('state', 'State','trim|required');
		$this->form_validation->set_rules('city', 'City','trim|required');
		$this->form_validation->set_rules('lot[]', 'Lot','trim|required');
			 
		if ($this->form_validation->run() == TRUE)
		{
			$registerId  = $this->users_model->create_user();
			$first_name  = $this->input->post('user_name',TRUE);	
			$last_name   = $this->input->post('last_name',TRUE);	
			$username    = $this->input->post('email',TRUE);	
			$password    = $this->input->post('password',TRUE); 
			
					
			if($registerId !='')
			{
				/* Send  mail to user */
	
				$content    =  get_content('tbl_auto_respond_mails','1');		
				$subject    =  str_replace('{site_name}',$this->config->item('site_name'),$content->email_subject);						
				$body       =  $content->email_content;	
									
				$verify_url = "<a href=".base_url()."users/>Click here </a>";				
				$name = $first_name." ".$last_name;
									
				$body			=	str_replace('{mem_name}',$name,$body);
				$body			=	str_replace('{username}',$username,$body);
				$body			=	str_replace('{password}',$password,$body);
				$body			=	str_replace('{admin_email}',$this->admin_info->admin_email,$body);
				$body			=	str_replace('{site_name}',$this->config->item('site_name'),$body);
				$body			=	str_replace('{url}',base_url(),$body);
				$body			=	str_replace('{link}',$verify_url,$body);
				
				$mail_conf =  array(
					'subject'=>$subject,
					'to_email'=>$this->input->post('email'),
					'from_email'=>$this->admin_info->admin_email,
					'from_name'=> $this->config->item('site_name'),
					'body_part'=>$body
				);						
									
				$this->dmailer->mail_notify($mail_conf);
				
				/* End send  mail to user */		
			}
				
		//   $this->session->set_userdata(array('msg_type'=>'success'));			
		//	$this->session->set_flashdata('success',lang('success'));	
				 	
           $message = 'New student has been added successfully';
           $message = str_replace('<site_name>',$this->config->item('site_name'),$message);
           $this->session->set_userdata(array('msg_type'=>'success'));
           $this->session->set_flashdata('success',$message);
           redirect('adminzone/student', ''); 
        }		
        $data['heading_title'] = "Add student";	
		$this->load->view('student/view_add_student',$data);
	}
	public function edit()
	{  
		$students_id   = (int) $this->uri->segment(4);
		$param=array(
					'id'=>$students_id,
					'status'=>'1',
		);
		//$mres           = $this->student_model->get_student_row($students_id);
		$mres = $this->student_model->get_student(1,0,$param);
		//echo_sql();
		//$db2 = $this->load->database('database2', TRUE); 
		//echo $db2->last_query();	die('test');	
		if(is_array($mres) && !empty($mres))
		{   
			$this->form_validation->set_rules('name', 'Name','trim|required|max_length[80]');
			//$this->form_validation->set_rules('user_name', 'Email ID','trim|required|valid_email|max_length[80]');
			$this->form_validation->set_rules('mobno', 'Mobile No','trim|numeric|required');
			//$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[20]|valid_password');
			//$this->form_validation->set_rules('state', 'State','trim|required');
			//$this->form_validation->set_rules('city', 'City','trim|required');
			$this->form_validation->set_rules('lot[]', 'Lot','trim|required');
			 
			if ($this->form_validation->run() == TRUE)
			{	$lot = implode(",",$this->input->post('lot',TRUE));
				
				//$password = $this->safe_encrypt->encode($this->input->post('password',TRUE));
				$posted_data = array(
									//'user_name'              => $this->input->post('user_name',TRUE),
									//'password'               => $password,
									'first_name'             => $this->input->post('name',TRUE),
									//'state'                  => $this->input->post('state',TRUE),
									//'city'                   => $this->input->post('city',TRUE),
									'phone_number'           => $this->input->post('mobno',TRUE),
									'lot'  					 => $lot,
									//'actkey'                 =>md5($this->input->post('user_name',TRUE)),
									//'account_created_date'   =>$this->config->item('config.date.time'),
									//'current_login'          =>$this->config->item('config.date.time'),
									'status'                 =>'1',
									'is_verified'            =>'1',	
									'ip_address'             =>$this->input->ip_address()			
									);
					
				$where = "customers_id = '".$mres['customers_id']."'"; 				
				$this->student_model->safe_update('tbl_customers',$posted_data,$where,FALSE);
				
				$message = 'Student Information has been updated successfully';
				$message = str_replace('<site_name>',$this->config->item('site_name'),$message);
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',$message);
				redirect('adminzone/student', ''); 
			}		
        $data['heading_title'] = "Add student";	
		$data['mres']      = $mres;	
		}
		else
		{
			
		//	redirect('adminzone/student', ''); 
		}
		$this->load->view('student/view_edit_student',$data);
	}
	
	public function email_check()
	{
		$email = $this->input->post('user_name');
		if ($this->users_model->is_email_exits(array('user_name' => $email)))
		{
			$this->form_validation->set_message('email_check', "Email id already exists");
			return FALSE;
		}else
		{
			return TRUE;
		}
	}
}
// End of controller