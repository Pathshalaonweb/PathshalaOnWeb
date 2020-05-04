<?php
class Teacherdashboard extends Teacher_Controller{

	private $mId;
	public function __construct()
	{
		parent::__construct();
		 		
			$this->load->model(array('teacher/teacher_model','members/members_model','Teacherdashboard/teacherdashboard_model'));
			$this->load->library(array('Dmailer'));	
		}

	public function index()
	{	
		redirect('teacherdashboard/myaccount', '');
	}

	public function myaccount()
	{
		
		$data['unq_section'] = "Myaccount";	
		$data['title'] = "My Account";
		if($this->mres['edit_setting']==0){
			redirect('teacherdashboard/edit_account','');
		}
		if($this->mres['profile_edit']==0){
			redirect('teacherdashboard/profile','');
		}else{
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $page_segment           =  find_paging_segment();
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $param = array('teacher_id'=>$this->mres['teacher_id']);
		 $res_array              = $this->teacherdashboard_model->teacher_notified($config['limit'],$offset,$param);
		 $data['sno']            =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page')+1 : 1;
		 $data['res']			 = $res_array;
		 $config['total_rows']	 = get_found_rows();			
	     $data['page_links']     = pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);
		 $data['currentCredit']=$this->mres['current_credit'];		
		 $this->load->view('view_teacher_myaccount',$data);
		}
	}


	public function edit_account()
	{	
	
		$data['unq_section'] = "Myaccount";
		$data['title'] = "My Account";
		$mres = $this->teacher_model->get_teacher_row( $this->session->userdata('teacher_id') );	
	    if ( is_array($mres) && !empty($mres)) {
			
			$this->form_validation->set_rules('first_name', 'Name', 'trim|required|alpha|xss_clean');
			$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|xss_clean');	
			$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean|max_length[300]');
			$this->form_validation->set_rules('pincode', 'Pincode', 'trim|required|xss_clean|max_length[6]|min_length[6]');
			$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean|max_length[300]');
			//$this->form_validation->set_rules('class', 'Class', 'trim|required|xss_clean');
			//$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
			if ($this->form_validation->run() == TRUE) {
				$uploaded_file = $mres['userimage'];				 
				$unlink_image = array('source_dir'=>"userfiles",'source_file'=>$mres['userimage']);
			 	if ($this->input->post('cat_img_delete')==='Y') {					
					removeImage($unlink_image);						
					$uploaded_file = NULL;	
				}				
				if (!empty($_FILES) && $_FILES['userimage']['name']!='') {			  
						$this->load->library('upload');	
						$uploaded_data =  $this->upload->my_upload('userimage','userfiles/images');
						if( is_array($uploaded_data)  && !empty($uploaded_data) ) { 								
							$uploaded_file = $uploaded_data['upload_data']['file_name'];
						    removeImage($unlink_image);	
						}
				}
				$posted_user_data = array(						
						'title'               	 =>$this->input->post('title'),
						'first_name'         	 =>$this->input->post('first_name'),
						'phone_number'           =>$this->input->post('phone_number'),
						'picture'				 =>$uploaded_file,
						'address'				 =>$this->input->post('address'),
						'pincode'				 =>$this->input->post('pincode'),
						'description'			 =>$this->input->post('description'),
						'edit_setting'			 =>'1'
					
				);
				
					$where  = "teacher_id = '".$mres['teacher_id']."'"; 
					$this->teacher_model->safe_update('wl_teacher',$posted_user_data,$where,FALSE);	
					
					//echo_sql();die;			 
					$this->session->set_userdata(array('msg_type'=>'success'));
					$this->session->set_flashdata('success',"Account Information Updated successfully!");						 
					redirect('teacherdashboard', '');
			    } } else {
					redirect('teacherdashboard', '');
				}
					$data['mres'] = $mres;		   
					$this->load->view('view_teacher_edit_account',$data);
				}
	
	
	
	

	public function change_password()
	{		 
					  
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|valid_password');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');
			
			
			if ($this->form_validation->run() == TRUE)
			{
				
				    $password_old   =  $this->input->post('old_password',TRUE);	
				    $mres           =  $this->teacher_model->get_teacher_row($this->userId," AND password='$password_old' ");
					
					if( is_array($mres) && !empty($mres) )
					{						
						//$password = $this->safe_encrypt->encode($this->input->post('new_password',TRUE));	
						$password=$this->input->post('new_password',TRUE);			
						$data = array('password'=>$password);			
						$where = "teacher_id=".$this->session->userdata('teacher_id')." ";
						$this->teacher_model->safe_update('wl_teacher',$data,$where,FALSE);					
						$this->session->set_userdata(array('msg_type'=>'success'));
						$this->session->set_flashdata('success',"Password has been changed successfully.");	
					}else{						
						$this->session->set_userdata(array('msg_type'=>'warning'));
						$this->session->set_flashdata('warning',$this->config->item('myaccount_password_not_match'));
						
					}
				 redirect('teacherdashboard/change_password','');
				 
			}
		
		/* End  member change password  */  	  
		
		$data['unq_section'] = "Myaccount";
		$data['heading_title'] = "Account Settings";
		$this->load->view('teacherdashboard/view_teacher_change_password',$data);	
	} 


	public function wishlist()
	{	
	    $config['per_page']		=   $this->config->item('per_page');
		$offset                 =   $this->uri->segment(3,0);	
		$limit				    =	$config['per_page'];	
		$next				    = 	$offset+$limit;			
					
		$res_array                      = $this->teacher_model->get_wislists($offset,$config['per_page']);	
		$config['total_rows']	        = $this->teacher_model->total_rec_found;					
		$more_paging['start_tag']       ='<div class="mt10 b" style="text-align:center">';
		$more_paging['text']            ='View More';
		$more_paging['end_tag']         ='</div>';		
		$more_paging['more_container']  = 'more_data';		
		$data['more_link']           =    more_paging("teacher/wishlist/$next",$config['total_rows'],$limit,$next,$more_paging);
		
		$data['res']                 = 	$res_array;	
		$data['title']               = "My Wish List";	
		$data['unq_section']         = "Myaccount";	 
		$this->load->view('teacher/view_member_wishlists',$data);			
		
	}

   public function remove_wislist($wishlists_id)
   {
	    if( $wishlists_id!='' )
		{
			$where = array('wishlists_id'=>$wishlists_id,'customer_id'=>$this->userId);
			$this->teacher_model->safe_delete('wl_wishlists', $where,FALSE);			
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success',$this->config->item('wish_list_delete'));		
			redirect('teacher/wishlist','');
		}	
		
	   
   }


	public function orders_history()
	{
		$this->load->model(array('order/order_model'));
		
	    $config['per_page']		=   $this->config->item('per_page');
		$offset                 =   $this->uri->segment(3,0);	
		$limit				    =	$config['per_page'];	
		$next				    = 	$offset+$limit;			
		
		$data['unq_section'] = "Myaccount";  
		  	
		$condtion = "AND customers_id = '$this->userId' ";		   
		$res_array   = $this->order_model->get_orders($offset,$config['per_page'],$condtion);			
			   
		$config['total_rows']	        = $this->order_model->total_rec_found;					
		$more_paging['start_tag']       ='<div class="mt10 b" style="text-align:center">';
		$more_paging['text']            ='View More';
		$more_paging['end_tag']         ='</div>';		
		$more_paging['more_container']  = 'more_data';		
		$data['more_link']           =    more_paging("teacher/orders_history/$next",$config['total_rows'],$limit,$next,$more_paging);
		
		$data['res']                 = 	$res_array;		 
		
		$this->load->view('view_member_orders',$data);
		
	}	
	
	
	public function print_invoice()
	{
		    $this->load->model(array('order/order_model'));
			$ordId              = (int) $this->uri->segment(3);
			$order_res          = $this->order_model->get_order_master( $ordId );
			$order_details_res  = $this->order_model->get_order_detail($order_res['order_id']);			
			$data['orddetail']  = $order_details_res;
			$data['ordmaster']  = $order_res;			
			$this->load->view('view_invoice_print',$data);
	}
	
	public function studentList(){
		
		$sql="SELECT * FROM `wl_teacher_notified` where status='1'";
		$query=$this->db->query($sql);
		//echo $query->num_rows();
		foreach($query->result_array() as $val){
			echo $message .=$val['student_id']."<br>";
		}
		//return $message;
		}
		
	public function studentdetail(){
		 $studentId	=(int) $this->uri->segment('3');
		 $notifiedId=(int)$this->uri->segment('4');
		 $param=array('status'=>1,'customer_id'=>$studentId);
		 $res_array=$this->members_model->get_members(1,0,$param);
		 $data['res']=$res_array;
		 
		 $data['currentCredit']=$this->mres['current_credit'];
		 $data['title']="view student Detail";
		 $view=$this->viewUpdate($this->session->userdata('teacher_id'),$studentId,$notifiedId);
		 if($view===true){
			 $this->session->set_userdata(array('msg_type'=>'success'));
			 $this->session->set_flashdata('success',"Your account balance updted");
		 }
		 $this->load->view('teacherdashboard/view_studentdetail',$data);
	}
	
	
	 public function viewUpdate($teacherId,$studentId,$notifiedId){
		 
		  $sql="SELECT * FROM `wl_teacher_cradit_recode` where student_id=".$studentId." AND  notified_id=".$notifiedId." AND teacher_id=".$teacherId."";
			$row=$this->db->query($sql)->result_array();
			if(empty($row)){
			$currentCredit=$this->mres['current_credit'];
			if(!empty($notifiedId)){
				$data_array=array(
					'teacher_id' =>  $teacherId,
					'student_id' =>  $studentId,
					'notified_id'=>  $notifiedId,
					'value'		 =>  $currentCredit-1,
					'view'		 =>  1, 
					'comment'	 =>  "view profile",
					'created_at' =>  date('Y-m-d H:i:s')
				);
				$insert=$this->db->insert('wl_teacher_cradit_recode',$data_array,true);
				$data=array('current_credit'	=>$currentCredit-1);
				$this->db->set('current_credit');
				$this->db->where('teacher_id',$teacherId);
				$this->db->update('wl_teacher',$data);
				return true;
			
			}
			
			return false;
			}
		}	
	
	
}
/* End of file member.php */
/* Location: .application/modules/member/member.php */