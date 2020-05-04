<?php
class Members extends Public_Controller
{
	private $mId;
	public function __construct()
	{
		parent::__construct(); 		
		$this->load->model(array('members/members_model','adminzone/student_model'));
		///	$this->load->helper(array('cart/cart'));		 
		$this->load->library(array('Dmailer'));	
	}
	public function index()
	{	
		redirect('members/myaccount', '');
	}

	public function myaccount()
	{ 	
		$db2 = $this->load->database('database2', TRUE);
		$res=$this->members_model->get_mem($this->session->userdata('user_id'));
		if(is_array($res) && !empty($res))
		{
			if($this->input->post('sub')!='')
			{
				$this->form_validation->set_rules('first_name', 'First Name','trim|required|max_length[80]');
				$this->form_validation->set_rules('last_name', 'Last Name','trim|required|max_length[80]');
				$this->form_validation->set_rules('gender', 'Gender','required');
				$this->form_validation->set_rules('birth_date', 'Birthday','required');
				$this->form_validation->set_rules('email', 'Email ID','trim|required|valid_email|max_length[80]');
				$this->form_validation->set_rules('email','Email ID',"trim|required|max_length[100]|unique[tbl_customers.user_name='".$this->input->post('email')."' AND status!='2' AND customers_id !=".$res[0]['customers_id']."]");
				$this->form_validation->set_rules('phone_number', 'Mobile No','trim|numeric|required');
				$this->form_validation->set_rules('state', 'State','trim|required|max_length[80]');
				$this->form_validation->set_rules('city', 'City','trim|required');
				if ($this->form_validation->run() == TRUE)
				{
					$userId=$this->session->userdata('user_id');
					$posted_data=array(
										'first_name'   			=>$this->input->post('first_name',TRUE),
										'last_name'   			=>$this->input->post('last_name',TRUE),
										'gender'   				=>$this->input->post('gender',TRUE),
										'birth_date'   			=>$this->input->post('birth_date',TRUE),
										'user_name'   			=>$this->input->post('email',TRUE),
										'phone_number'  		=>$this->input->post('phone_number',TRUE),
										'state'   				=>$this->input->post('state',TRUE),
										'city'   				=>$this->input->post('city',TRUE),
										);
					$where       = "customers_id = '".$userId."'"; 
					$db2->update('wl_customers',$posted_data,$where,FALSE);
					$message = 'myaccount_update';
					$message = str_replace('<site_name>',$this->config->item('site_name'),$message);
					$this->session->set_userdata(array('msg_type'=>'success'));
					$this->session->set_flashdata('success',$message);
					$this->session->set_userdata(array('msg_type'=>'success'));
					$this->session->set_flashdata('success','Your Record');						 
					redirect('members/', '');
				}			
			}
		}
	    $data['res']=$res[0];
		$data['active']='profile';
		$this->load->view('view_member_myaccount',$data);
	}
	
	public function change_image()
	{	
		$db2 = $this->load->database('database2', TRUE);
		$res=$this->members_model->get_mem($this->session->userdata('user_id'));
		$res=$res[0];
		if($res !='')
		{
			$this->form_validation->set_rules('img','Image','required|file_allowed_type[image]');
			if($this->form_validation->run() == TRUE)
			{
				$userId			=	$this->session->userdata('user_id');
				$uploaded_file 	= 	$rowdata->banner_image;				 
				$unlink_image	= 	array('source_dir'=>"custumer_profile",'source_file'=>$res['customer_photo']);
				if( !empty($_FILES) && $_FILES['img']['name']!='' )
				{			  
					$this->load->library('upload');					
					$uploaded_data =  $this->upload->my_upload('img','custumer_profile');
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
					   $uploaded_file = $uploaded_data['upload_data']['file_name'];
					   removeImage($unlink_image);	
					}
				}	
				$posted_data=array('customer_photo' =>$uploaded_file );
				$where       = "customers_id = '".$userId."'"; 
				$db2->update('wl_customers',$posted_data,$where,FALSE);
			    $this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',$this->config->item('myaccount_update'));						 
				redirect('members', '');
			}
		} else {
			rediect('members');
		}
	}
}