<?php
class Members extends Private_Controller{

	private $mId;

	public function __construct()
	{
		parent::__construct(); 		
		$this->load->model(array('members/members_model','studentplan/studentplan_model'));
		//$this->load->helper(array('cart/cart'));		 
		$this->load->library(array('Dmailer'));	
		
	}

	public function index()
	{	
		// if ($this->mres['profile_edit']==0) {
		// 	redirect('members/edit_account','');
		// } else {
			redirect('members/myaccount', '');
		// }
	}

	public function myaccount()
	{
		
		// if ($this->mres['profile_edit']==0) {
		// 	redirect('members/edit_account','');
		// }
	
		$data['unq_section'] = "Myaccount";	
		$data['title'] = "My Account";
		$this->load->view('view_member_myaccount',$data);
	}


	public function edit_account()
	{	
	
		$data['unq_section'] = "Myaccount";
		$data['title'] = "My Account";
		$mres = $this->members_model->get_member_row( $this->session->userdata('user_id') );	
	    if ( is_array($mres) && !empty($mres)) {
			$mres_address = $this->members_model->get_member_address_book($mres['customers_id']);
			
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
						//'class'			 		 =>$this->input->post('class'),
						//'subject'			 	 =>$this->input->post('subject')
						'profile_edit'			 => '1',
						'class_dropdown'         => $this->input->post('classes')
						
				);
				$where  = "customers_id = '".$mres['customers_id']."'"; 
				$this->members_model->safe_update('wl_customers',$posted_user_data,$where,FALSE);				 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',$this->config->item('myaccount_update'));						 
				redirect('members/edit_account', '');
			 }	
			} else {
				redirect('members', '');
			}
				$data['mres'] = $mres;		   
				$this->load->view('view_member_edit_account',$data);
			}
	
	public function change_password() {		 
					  
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|valid_password');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');
			
			if ($this->form_validation->run() == TRUE) {
				
				    //$password_old   =  $this->safe_encrypt->encode($this->input->post('old_password',TRUE));
				    $password_old   =  $this->input->post('old_password',TRUE);
				    $mres           =  $this->members_model->get_member_row($this->userId," AND password='$password_old' ");
					
					if( is_array($mres) && !empty($mres) )
					{						
					//	$password = $this->safe_encrypt->encode($this->input->post('new_password',TRUE));
						$password = $this->input->post('new_password',TRUE);
						$data = array('password'=>$password);			
						$where = "customers_id=".$this->session->userdata('user_id')." ";
						$this->members_model->safe_update('wl_customers',$data,$where,FALSE);					
						$this->session->set_userdata(array('msg_type'=>'success'));
						$this->session->set_flashdata('success',$this->config->item('myaccount_password_changed'));	
				
						
					}else
					{						
						$this->session->set_userdata(array('msg_type'=>'warning'));
						$this->session->set_flashdata('warning',$this->config->item('myaccount_password_not_match'));
						
					}
					
					
				 redirect('members/change_password','');
				 
			}
		
		/* End  member change password  */  	  
		
		$data['unq_section'] = "Myaccount";
		$data['heading_title'] = "Account Settings";
		$this->load->view('members/view_member_change_password',$data);	
	} 


	public function wishlist()
	{	
	    $config['per_page']		=   $this->config->item('per_page');
		$offset                 =   $this->uri->segment(3,0);	
		$limit				    =	$config['per_page'];	
		$next				    = 	$offset+$limit;			
					
		$res_array                      = $this->members_model->get_wislists($offset,$config['per_page']);	
		$config['total_rows']	        = $this->members_model->total_rec_found;					
		$more_paging['start_tag']       ='<div class="mt10 b" style="text-align:center">';
		$more_paging['text']            ='View More';
		$more_paging['end_tag']         ='</div>';		
		$more_paging['more_container']  = 'more_data';		
		$data['more_link']           =    more_paging("members/wishlist/$next",$config['total_rows'],$limit,$next,$more_paging);
		
		$data['res']                 = 	$res_array;	
		$data['title']               = "My Wish List";	
		$data['unq_section']         = "Myaccount";	 
		$this->load->view('members/view_member_wishlists',$data);			
		
	}

   public function remove_wislist($wishlists_id)
   {
	    if( $wishlists_id!='' )
		{
			$where = array('wishlists_id'=>$wishlists_id,'customer_id'=>$this->userId);
			$this->members_model->safe_delete('wl_wishlists', $where,FALSE);			
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success',$this->config->item('wish_list_delete'));		
			redirect('members/wishlist','');
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
		$data['more_link']           =    more_paging("members/orders_history/$next",$config['total_rows'],$limit,$next,$more_paging);
		
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
	
	
	public function credit(){
		
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $page_segment           =  find_paging_segment();
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $condtion               =  array();	
		 $category_id            =  $this->uri->segment(3);
		 $teacher_id			 =  $this->session->userdata('teacher_id');	
		 $res_array              =  $this->studentplan_model->get_studentplan(3,$offset,$condtion);		
		 $config['total_rows']   =  get_found_rows();			
		 $data['page_links']     =  pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);	 						
		 $data['heading_title']  =  $page_title;
		 $data['res']            =  $res_array; 	
		 $this->load->view('members/credit/view_all_credit',$data);
		 
		//$data['title']="Student Credit";	
		//$this->load->view('credit/view_add_credit',$data);
	}
	
	
	public function buynow(){
		
		$id=trim($this->uri->segment(3));
		$newdata = array(
			'planId'  	=> $id,
			'plan_in' => TRUE
		);
		$this->session->set_userdata($newdata);
		redirect('members/paynow','');
		
	}
	
	public function paynow(){
		 $planId=$this->session->userdata('planId');
		 $plan_in=$this->session->userdata('plan_in');
		 if(isset($plan_in)){
			  $condtion 		 =  array('pid'=>$planId);
			  $res_array    	 =  $this->studentplan_model->get_studentplan(1,0,$condtion);
			  $data['res']       =  $res_array;
			  $this->load->view('members/credit/view_add_credit',$data); 		
		 }else{
			redirect('members/credit', '');
		 }
	}
	
	
	public function credit_list(){
		 
		 
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $page_segment           = find_paging_segment();
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));

		 $param				 	 =  array('student_id'=>$this->session->userdata('user_id'));	
		 $res_array              =  $this->members_model->get_credit($config['limit'],$offset,$param);		
		 $config['total_rows']   =  get_found_rows();			
		 $data['page_links']     =  pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);	 						
		 $data['heading_title']  =  $page_title;
		 $data['res']            =  $res_array; 	
		 $this->load->view('members/credit/view_list_credit',$data);
	}
	public function liveclass()
	{	
		$id = $this->session->userdata('user_id');
		$dbe = $this->load->database('default', TRUE);
		$sqs = "SELECT * FROM `wl_customers` WHERE customers_id='".$id."'";
		$qus=$dbe->query($sqs);
		$values= $qus->result_array();
		if($values[0]['class_dropdown'] == "")
		{
			echo "<script>alert('Please choose a course.'); window.location = '".base_url()."members/edit_account'</script>";
		}
		else
		{
			$sqls = "SELECT batch_id FROM `wl_batchid` WHERE category='".$values[0]['class_dropdown']."'";
			$quer=$dbe->query($sqls);
			$v= $quer->result_array();
		$ch = curl_init();  
		$url = "LiveApi.Scobotic.com/api/Registration?frAppId=pathshala&frAppPass=pathshala5572&emailId=".$values[0]['user_name']."&password=pathshala5572&userName=".$values[0]['user_name']."&city=delhi&mobile=7895187971&parentPhoneNumber=7895187971&stateId=22&streamId=024&classId=1&subjectIds=1&batchIds=".$v[0]['batch_id'];
		//echo $url;
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$output=curl_exec($ch);
		curl_close($ch);
		$jsonOutput = json_decode($output,true);
		if($jsonOutput['Token']=="" && $jsonOutput['Status']=="0")
		{
			if($jsonOutput['Message']== "EmailId already registered")
			{
				//Proceed with Login API
				$loginURL = "LiveApi.Scobotic.com/api/Login?frAppId=pathshala&frAppPass=pathshala5572&emailId=".$values[0]['user_name'];
				$loginCh = curl_init();
				curl_setopt($loginCh,CURLOPT_URL,$loginURL);
				curl_setopt($loginCh,CURLOPT_RETURNTRANSFER,true);
				$loginOutput=curl_exec($loginCh);
				//print_r($loginOutput);
				curl_close($loginCh);
				$loginArr = json_decode($loginOutput,true);
				if($loginArr['Token'] != "")
				{
					redirect("https://".$loginArr['Url'], '');
				}
				else
				{
					echo "<script>alert('Error Occured! Please try Again.');</script>";
				}

			}
		}
		elseif($jsonOutput['Token'] != "")
		{
			redirect("https://".$jsonOutput['Url'], '');
		}
	 }
	}
	
}
/* End of file member.php */
/* Location: .application/modules/member/member.php */