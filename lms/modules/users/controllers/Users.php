<?php
class Users extends Public_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->helper(array('date','language','string','cookie','file'));	 
		$this->load->model(array('users/users_model'));	
		$this->load->library(array('Auth','Dmailer'));	
		$this->form_validation->set_error_delimiters("<div class='required'>","</div>");
		$rf_session = $this->session->userdata('ref');
		if( $rf_session=='' && $this->input->get('ref')!="")
		{			 
			$this->session->set_userdata( array('ref'=>$this->input->get('ref') ) );		   
		}
		$db2 = $this->load->database('database2', TRUE);

	}



	public function index()
	{	 
		if($this->auth->is_user_logged_in() )
		{
			redirect('members/', '');
		} 
		$data['heading_title'] = "Login";	
		$data['unq_section'] = "Login";		
		$this->load->view('users_login',$data);	

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

				$res = $this->users_model->find('tbl_customers',$condtion);

				if( is_array($res) && !empty($res))

				{

					$first_name  = $res['first_name'];

					$last_name   = $res['last_name'];	

					$username    = $res['user_name'];	

					$password    = $res['password'];

					$password = $this->safe_encrypt->decode($password);					

					/* Send  mail to user */

					$content    =  get_content('tbl_auto_respond_mails','2');		

					$subject    =  $content->email_subject;						

					$body       =  $content->email_content;	

					$verify_url = "<a href=".base_url()."users/register>Click here </a>";				

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

					redirect('users/forgotten_password', '');						

				}

				else				

				{					

					$this->session->set_userdata(array('msg_type'=>'error'));

			        $this->session->set_flashdata('error',$this->config->item('email_not_exist'));

			        redirect('users/forgotten_password', '');

				}

			}

		}

		$data['heading_title'] = "Forgot Password";			

		$this->load->view('users_forgot_password',$data);		

	}

	public function login()
	{
	if ( $this->input->post('sub') )
	{		   
		$this->load->library('form_validation');
		//echo $this->input->post('user_name');
		//echo $this->input->post('password');die;
		$this->form_validation->set_rules('user_name', 'Username','required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == TRUE) {
			
			$username  =  $this->input->post('user_name');
			$password  =  $this->input->post('password');				
			$rember    =  ($this->input->post('remember')!="") ? TRUE : FALSE;				
		if( $this->input->post('remember')=="Y" ){
			set_cookie('userName',$this->input->post('user_name'), time()+60*60*24*30 );
			set_cookie('pwd',$this->input->post('password'), time()+60*60*24*30 );
		 } else {		 
			delete_cookie('userName');
			delete_cookie('pwd');
		}					
		$this->auth->verify_user($username,$password);				
		//echo_sql();die;
		if( $this->auth->is_user_logged_in() ) {
		if( $this->session->userdata('ref')!=""  ) {	                     				  					 
				redirect($this->session->userdata('ref'),'');												
		 } else {
			redirect('');
			// redirect('members/myaccount',''); 						 
				//redirect($_SERVER['HTTP_REFERER']);
		 }		
		 } else {				
				$this->session->unset_userdata(array("ref"=>'0'));
				$this->session->set_userdata(array('msg_type'=>'errors'));
				$this->session->set_flashdata('errors',$this->config->item('login_invalid'));		
				redirect($_SERVER['HTTP_REFERER']);

					//redirect('users/login', '');
				}
			} else {

				$this->session->set_userdata(array('msg_type'=>'errors'));
				$this->session->set_flashdata('errors',$this->config->item('login_invalid'));	
				$this->session->set_userdata('regis','on');

				$data['heading_title'] = "Login";			

                redirect($_SERVER['HTTP_REFERER']);

				//$this->load->view('users_login',$data); 

			}		

		}

		else

		{

$data2 = array(

		'shipping_id' =>0,

		'coupon_id'=>0,

		'discount_amount'=>0

		);

		$this->session->unset_userdata($data2);

		$this->session->unset_userdata(array("ref"=>'0'));	

		//$this->cart->destroy();

		$this->auth->logout();

			$data='';		

            //redirect($_SERVER['HTTP_REFERER']);

			$this->load->view('users_login',$data); 	



		}



	} 





		





	public function logout()



	{	

//die('JJJ');

		$data2 = array(

		'shipping_id' =>0,

		'coupon_id'=>0,

		'discount_amount'=>0

		);

		$this->session->unset_userdata($data2);

		$this->session->unset_userdata(array("ref"=>'0'));	

		$this->cart->destroy();

		$this->auth->logout();

		$this->session->set_userdata(array('msg_type'=>'successs'));

		$this->session->set_flashdata('successs',$this->config->item('member_logout'));

		redirect('users/login', '');

		//redirect($_SERVER['HTTP_REFERER']);

	}	 







	public function thanks()



	{



		$data['heading_title'] = "Thanks";			



		$this->load->view('users_thanks',$data);	



	}



	public function register()

	{	

		if (!$this->auth->is_user_logged_in() )

		{		

		   $is_same_bill_ship =   $this->input->post('is_same',TRUE);



		 	$this->form_validation->set_rules('name', 'Name','trim|required|max_length[80]');



			$this->form_validation->set_rules('user_name', 'Email ID','trim|required|valid_email|max_length[80]|callback_email_check');

			$this->form_validation->set_rules('mob_no', 'Mobile No','trim|numeric|required');

			$this->form_validation->set_rules('state', 'State','trim|required');

			$this->form_validation->set_rules('city', 'City','trim|required');

			$this->form_validation->set_rules('lot[]', 'Course','trim|required');

			$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[20]|valid_password');

			$this->form_validation->set_rules('confirm', 'Confirm passsword', 'required|matches[password]');		 



			if ($this->form_validation->run() == TRUE)

			{

				 $registerId  = $this->users_model->create_user();

				 $first_name  = $this->input->post('name',TRUE);	

				 $last_name   = $this->input->post('user_name',TRUE);	

				 $username    = $this->input->post('user_name',TRUE);	

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

					

			     $this->auth->verify_user($username,$password);		

				 

				 $message = $this->config->item('register_thanks');			

			     $message = str_replace('<site_name>',$this->config->item('site_name'),$message);

			

				 $this->session->set_userdata(array('msg_type'=>'successs'));

				 $this->session->set_flashdata('successs',$message);

								  

			   		 // $this->session->set_userdata('regis','on');

				redirect('home');

			          //redirect($_SERVER['HTTP_REFERER']);

				

				

				

				

			}

			/*else{

				

				    $this->session->unset_userdata(array("ref"=>'0'));



					$this->session->set_userdata(array('msg_type'=>'errors'));



					$this->session->set_flashdata('errors','All Fields are required !');	

				    $this->session->set_userdata('regis','on');

			        redirect($_SERVER['HTTP_REFERER']);

				

			} */

			

			$this->load->view('users_register');

		}

		else

		{

			redirect($_SERVER['HTTP_REFERER']);

			//redirect('/', 'refresh');			

		}		

	}



	



	public function email_check()



	{



		$email = $this->input->post('user_name');



		if ($this->users_model->is_email_exits(array('user_name' => $email)))



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



		$this->users_model->activate_account($this->uri->segment(3) );		



	}	







	public function fbLogin()

	{	

      $fbId=$_POST['fbid'];

	  $fbName=$_POST['fbName'];

		$fbemail=$_POST['fbemail'];

	  $user=$this->users_model->verify_user($fbId);

		if(count($user)>0){

			

		

			$data = array(

							'user_id'=>$user[0]['customers_id'],

							'login_type'=>$user[0]['login_type'],

							'username'=>$user[0]['user_name'],							

							'title'=>$user[0]['title'],

							'first_name'=>$user[0]['first_name'],

							'last_name'=>$user[0]['last_name'],							

							'is_blocked'=>$user[0]['is_blocked'],	

							'blocked_time'=>$user[0]['block_time'],	

							'phone_no'=>$user[0]['phone_number'],					

							'logged_in' => TRUE

						);

			///echo "<pre>";print_r($data);die;

			//$login_data = array('current_login'=>$user[0]['current_login']);

			$this->session->unset_userdata('vender_id');

			$this->session->unset_userdata('vender_logged_in');

		

			$this->session->set_userdata($data);			

			$this->update_last_login($login_data);

			echo "0";

			//print_r($data);die;

		}

		else{

			

			$register_array = array

				( 					

					

					'first_name'       => $fbName,

					'user_name'  =>$fbemail,

					'uid'=>$fbId,	

					'actkey'           =>md5($fbId),

					'login_type'       =>'Facebook',

  					'account_created_date'=>$this->config->item('config.date.time'),

					'current_login'    =>$this->config->item('config.date.time'),

					'status'=>'1',

					'is_verified'=>'1',									

					'ip_address'  =>$this->input->ip_address()

					

				);

			 //$insId =  $this->safe_insert('tbl_customers',$register_array,FALSE);

			$insId=$this->users_model->creat_user($register_array);

			

			echo $insId;

		}

	}

				

		

public function update_last_login($login_data)

	{		

		

		$data = array('last_login_date'=>$login_data['current_login'],'current_login'=>$this->ci->config->item('config.date.time') );

		$this->ci->db->where('customers_id', $this->ci->session->userdata('user_id'));

		$this->ci->db->update('tbl_customers', $data);

	}

	

	public function ajaxgettown()

	{

		

		$result = $this->users_model->getTownData();

		

		$option ="<select class='form-control' name='city'> ";

		$option .="<option value='0'> --Select City-- </option>";

		foreach($result as $val)

		{

				$option .="<option value='".$val['category_name']."'>".ucfirst($val['category_name'])."</option>";



		}

		$option .="</select>";

		echo $option;

		

		

	}

	

	

}



/* End of file users.php */



/* Location: ./application/modules/users/controller/users.php */