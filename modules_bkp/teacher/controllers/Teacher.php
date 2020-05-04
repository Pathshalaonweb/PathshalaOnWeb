<?php
class Teacher extends Public_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('date','language','string','cookie','file', 'url'));	 
		$this->load->model(array('teacher/teacher_model'));	
		$this->load->library(array('Auth','Dmailer','session'));	
		$this->form_validation->set_error_delimiters("<div class='required'>","</div>");
		$rf_session = $this->session->userdata('ref');
		if( $rf_session=='' && $this->input->get('ref')!="")
		{			 
		   $this->session->set_userdata( array('ref'=>$this->input->get('ref') ) );		   
		 }
		 
		
	}


	public function index()
	{	 
		if ( $this->auth->is_teacher_logged_in() )
		{
			redirect('teacherdashboard/', '');
		} 
		$data['heading_title'] = "Teacher login";	
		$data['unq_section'] = "Teacher login";		
		$this->load->view('teacher_login',$data);	
	}


	public function forgotten_password()
	{	
		
		if ( $this->input->post('forgotme')!="")
		{
			
			$email = $this->input->post('email',TRUE);
			$this->form_validation->set_rules('email', ' Email ID', 'required|valid_email');	
			//$this->form_validation->set_rules('verification_code','Verification code','trim|required|valid_captcha_code');
			if ($this->form_validation->run() == TRUE)
			{
			$condtion = array('field'=>"user_name,password,first_name,last_name",'condition'=>"user_name ='$email' AND status ='1' ");
				$res = $this->users_model->find('wl_teacher',$condtion);
				if( is_array($res) && !empty($res)) {
					
						$first_name  = $res['first_name'];
						$last_name   = $res['last_name'];	
						$username    = $res['user_name'];	
						$password    = $res['password'];
						$password = $this->safe_encrypt->decode($password);					
						/* Send  mail to user */
						$content    =  get_content('wl_auto_respond_mails','2');		
						$subject    =  $content->email_subject;						
						$body       =  $content->email_content;	
						$verify_url = "<a href=".base_url()."teacher/login>Click here </a>";				
												
						$name = $first_name;
											
						$body			=	str_replace('{mem_name}',$name,$body);
						$body			=	str_replace('{username}',$username,$body);
						$body			=	str_replace('{password}',$password,$body);
						$body			=	str_replace('{admin_email}',$this->admin_info->admin_email,$body);
						$body			=	str_replace('{site_name}',$this->config->item('site_name'),$body);
						$body			=	str_replace('{url}',base_url(),$body);
						$body			=	str_replace('{link}',$verify_url,$body);
						
						$mail_conf =  array(
						'subject'=>$subject,
						'to_email'=>$username,
						'from_email'=>$this->admin_info->admin_email,
						'from_name'=> $this->config->item('site_name'),
						'body_part'=>$body
						);	
							
					$this->dmailer->mail_notify($mail_conf);
					$this->session->set_userdata(array('msg_type'=>'success'));
					$this->session->set_flashdata('success',$this->config->item('forgot_password_success'));	
					redirect('teacher/forgotten_password', '');						
					
				}else				
				{					
					$this->session->set_userdata(array('msg_type'=>'error'));
			        $this->session->set_flashdata('error',$this->config->item('email_not_exist'));
			        redirect('teacher/forgotten_password', '');
					
				}
				
			}			
						 
		}
		
		$data['heading_title'] = "Forgot Password";			
		$this->load->view('teacher_forgot_password',$data);		
	}
	
	
	

	public function login()
	{ 
		if ( $this->input->post('action') )
		{		
			$this->form_validation->set_rules('user_name', 'Username','required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			
			if ($this->form_validation->run() == TRUE)
			{
				
				$username  =  $this->input->post('user_name');
				$password  =  $this->input->post('password');				
				$rember    =  ($this->input->post('remember')!="") ? TRUE : FALSE;
				
				 if( $this->input->post('remember')=="Y" )
				 {
						set_cookie('userName',$this->input->post('user_name'), time()+60*60*24*30 );
						set_cookie('pwd',$this->input->post('password'), time()+60*60*24*30 );
				  }
				  else
				  {						 
					  	delete_cookie('userName');
					  	delete_cookie('pwd');
				  }		
				
				$this->auth->verify_teacher($username,$password);	
				
				if( $this->auth->is_teacher_logged_in() )
				{
				 	redirect('teacherdashboard/myaccount',''); 
				} else {
					//
					$this->session->unset_userdata(array("ref"=>'0'));
					$this->session->set_userdata(array('msg_type'=>'error'));
					$this->session->set_flashdata('error',$this->config->item('login_invalid'));		
					redirect('teacher/login', '');
				}
				
			}
			else
			{
				$data['heading_title'] = "Login";			
				$this->load->view('teacher_login',$data); 
			}				
		}
		else
		{
			$data['heading_title'] = "Login";			
			$this->load->view('teacher_login',$data); 	
		}
	} 

	
	public function logout()
	{	//echo "d";die;
		$data2 = array(
			'shipping_id' 	 =>0,
			'coupon_id'		 =>0,
			'discount_amount'=>0,
			'teacher_logged_in'		 =>0,
			'teacher_id'	 =>0,
			'login_type'	 =>0,
			'is_blocked'	 =>0,
			'blocked_time'	 =>0,
			'username'	 	 =>0,
			'first_name'	 =>0,
			'last_name'	 	 =>0,
			'blocked_time'	 =>0,
			'msg_type'		 =>0,
		);
		$this->session->unset_userdata($data2);
		$this->session->unset_userdata(array("ref"=>'0'));	
		//$this->cart->destroy();
		$this->auth->teacher_logout();
		//$this->facebook->destroy_session();
        // Remove user data from session
        $this->session->unset_userdata('userData');
		$this->session->sess_destroy();
		
		$this->session->set_userdata(array('msg_type'=>'success'));
		$this->session->set_flashdata('success',$this->config->item('member_logout'));
		echo $this->config->item('member_logout');
		//print_r($this->session->has_userdata('msg_type'));
		//echo $this->session->flashdata('success');
		
		//die;
		redirect('teacher/login', '');
		}	 

	public function thanks()
	{
		$data['heading_title'] = "Thanks";			
		$this->load->view('teacher_thanks',$data);	
	}

	public function register()
	{	
	
	
	   	if (!$this->auth->is_teacher_logged_in() ) {			
		    $this->form_validation->set_rules('user_name', 'Email ID','trim|required|valid_email|max_length[80]|callback_email_check');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[20]|valid_password');
			//$this->form_validation->set_rules('confirm_password', 'Confirm passsword', 'required|matches[password]');		 			
			$this->form_validation->set_rules('first_name', 'Name', 'trim|required|alpha|max_length[32]|xss_clean');
			$this->form_validation->set_rules('phone_number', 'Phone','trim|required|max_length[10]|xss_clean');	
			$this->form_validation->set_rules('address', 'Phone','trim|required|max_length[300]|xss_clean');
			$this->form_validation->set_rules('pincode', 'Pincode','trim|required|max_length[6]|xss_clean');
			$this->form_validation->set_rules('description', 'Description','trim|required|max_length[350]|xss_clean');
			//$this->form_validation->set_rules('class', 'class','trim|required|xss_clean');
			//$this->form_validation->set_rules('subject', 'Subject','trim|required|xss_clean');
			//$this->form_validation->set_rules('subject', 'Subject','trim|required|xss_clean');
			if ($this->form_validation->run() == TRUE){
				
				$uploaded_file = "";	
				if ( !empty($_FILES) && $_FILES['userimage']['name']!='') {			  
				$this->load->library('upload');	
				$uploaded_data =  $this->upload->my_upload('userimage','userfiles/images');
				if ( is_array($uploaded_data)  && !empty($uploaded_data) ) { 								
					$uploaded_file = $uploaded_data['upload_data']['file_name'];
				   }		
				}
				//$registerId  = $this->users_model->create_user();
				$date = date('m/d/Y h:i:s a', time()); 
				$actkey= md5($date).md5($this->input->post('user_name',TRUE));
				// $password = $this->safe_encrypt->encode($this->input->post('password',TRUE));
				 $password = $this->input->post('password',TRUE);
		  		 $register_array = array ( 					
					'user_name'         =>  $this->input->post('user_name',TRUE),
					'password'         	=> $password,
					//'title'            => $this->input->post('title',TRUE),
					'first_name'       	=> $this->input->post('first_name',TRUE),
					'last_name'        	=> $this->input->post('last_name',TRUE),
					'customer_photo'	=> $uploaded_file,
					'phone_number'    	=> $this->input->post('phone_number',TRUE),	
					'actkey'           	=> $actkey,
					'account_created_date'=>$this->config->item('config.date.time'),
					'current_login'    	=> $this->config->item('config.date.time'),
					'status'		   	=> '1',
					'is_verified'		=> '1',									
					'ip_address'  		=> $this->input->ip_address(),
					'address'			=> $this->input->post('address',TRUE),
					'description'		=> $this->input->post('description',TRUE),
					'pincode'			=> $this->input->post('pincode',TRUE),
					'class'				=> $this->input->post('class',TRUE),
					'subject'			=> $this->input->post('subject',TRUE),
					'current_credit'	=> '5',
					'plan_expire'		=> date('Y-m-d', strtotime($Date. ' + 30 days')),
				);
				$this->teacher_model->safe_insert('wl_teacher',$register_array,FALSE);
				
				$credit_history=array(
						'teacher_id'  	  => $this->db->insert_id(),
						'plan_id'	  	  => '22',
						'credit_value'	  => '00',
						'validity'	  	  => '30',
						'credit_date'	  => date('Y-m-d', strtotime($Date. ' + 30 days'))
				);
				$this->teacher_model->safe_insert('wl_teacher_plan_history',$credit_history,FALSE);
				
				$first_name  = $this->input->post('first_name',TRUE);	
				$last_name   = $this->input->post('last_name',TRUE);	
				$username    = $this->input->post('user_name',TRUE);	
				$password    = $this->input->post('password',TRUE);
			
			//if($registerId !='') {
						/* Send  mail to user */
						
						$content    =  get_content('wl_auto_respond_mails','16');		
						$subject    =  str_replace('{site_name}',$this->config->item('site_name'),$content->email_subject);						
						$body       =  $content->email_content;	
						$verify_url = "<a href=".base_url()."teacher/verify/".$actkey.">Click here </a>";				
						$name = $first_name." ".$last_name;
						$body			=	str_replace('{mem_name}',$name,$body);
						//$body			=	str_replace('{username}',$username,$body);
						//$body			=	str_replace('{password}',$password,$body);
						$body			=	str_replace('{admin_email}',$this->admin_info->admin_email,$body);
						$body			=	str_replace('{site_name}',$this->config->item('site_name'),$body);
						$body			=	str_replace('{url}',base_url(),$body);
						$body			=	str_replace('{link}',$verify_url,$body);
						
						$mail_conf =  array(
						'subject'=>$subject,
						'to_email'=>$this->input->post('user_name'),
						'from_email'=>$this->admin_info->admin_email,
						'from_name'=> $this->config->item('site_name'),
						'body_part'=>$body
						);						
						$this->dmailer->mail_notify($mail_conf);
						/* End send  mail to user */	
					//}
					
			     $this->auth->verify_teacher($username,$password);		
				 
				 $message = $this->config->item('register_thanks');			
			     $message = str_replace('<site_name>',$this->config->item('site_name'),$message);
				 $this->session->set_userdata(array('msg_type'=>'success'));
				 $this->session->set_flashdata('success',$message);
				 redirect('teacherdashboard/myaccount','');
				
				
				
			}
	
			$data['heading_title'] = "Register";		
			$data['unq_section'] = "Register";				
			$this->load->view('teacher_register',$data);	
		}else
		{
			redirect('teacherdashboard/', 'refresh');			
		}		
	}	

	public function email_check()
	{
		$email = $this->input->post('user_name');
		if ($this->teacher_model->is_email_exits(array('user_name' => $email)))
		{
			$this->form_validation->set_message('email_check', $this->config->item('exists_user_id'));
			return FALSE;
		}else
		{
			return TRUE;
		}
	}


	public function valid_captcha_code($verification_code)
	{
		if ($this->securimage_library->check($verification_code) == true)
		{
			return TRUE;
		}else
		{			
			$this->form_validation->set_message('valid_captcha_code', 'The Word verification code you have entered is invalid.');			
			return FALSE;
		}
	}



	public function verify()
	{		 
		$actkey=strip_tags(trim($this->uri->segment(3)));
		//$this->teacher_model->activate_account($this->uri->segment(3) );
		$posted_user_data = array(						
						'email_verify'			 	 =>'1'
		);
		$where  = "actkey = '".$actkey."'"; 
		$update=$this->teacher_model->safe_update('wl_teacher',$posted_user_data,$where);
		$mem_info=get_db_single_row('wl_teacher',$fields="*",$condition="WHERE 1 AND email_verify='1' AND actkey='".$$actkey."'");
		/* Send  mail to user */
						
						$content    =  get_content('wl_auto_respond_mails','1');		
						$subject    =  str_replace('{site_name}',$this->config->item('site_name'),$content->email_subject);						
						$body       =  $content->email_content;	
						$verify_url = "<a href=".base_url()."teacher/login/>Click here </a>";				
						$name 		= $mem_info['first_name'];
						$username	= $mem_info['username'];
						$password	= $mem_info['password'];
						$body		=	str_replace('{mem_name}',$name,$body);
						$body		=	str_replace('{username}',$username,$body);
						$body		=	str_replace('{password}',$password,$body);
						$body		=	str_replace('{admin_email}',$this->admin_info->admin_email,$body);
						$body		=	str_replace('{site_name}',$this->config->item('site_name'),$body);
						$body		=	str_replace('{url}',base_url(),$body);
						$body		=	str_replace('{link}',$verify_url,$body);
						$mail_conf  =  array(
							'subject'=>$subject,
							'to_email'=>$this->input->post('user_name'),
							'from_email'=>$this->admin_info->admin_email,
							'from_name'=> $this->config->item('site_name'),
							'body_part'=>$body
						);						
						$this->dmailer->mail_notify($mail_conf);
						/* End send  mail to user */
						$this->session->set_userdata(array('msg_type'=>'success'));
				 		$this->session->set_flashdata('success',"Email verified successfully!");
						redirect('teacher/login', '');				
	}	
	
	




		


}
/* End of file users.php */
/* Location: ./application/modules/users/controller/users.php */