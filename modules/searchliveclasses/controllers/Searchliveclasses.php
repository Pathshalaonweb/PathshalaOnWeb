<?php
class Searchliveclasses extends Public_Controller
{
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('searchliveclasses/searchliveclasses_model','payment/payment_model','order/order_model'));
	    $this->load->library('Ajax_pagination');
		$this->load->helper(array('payment/paytm'));
		$this->perPage = 100;
	}
	
	public function index()
	{	

 		$data = array();
		//total rows count
		$db1 = $this->load->database('default', TRUE);
		$sqll = "SELECT * FROM `wl_addclass` ORDER BY Id DESC";  //updated 04072020
		$queryy=$db1->query($sqll);
		$totalRec = $queryy->num_rows();
        //$totalRec = count($this->liveclasses_model->get_course_row());
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'searchliveclasses/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        //get the posts data
        $data['res'] = $this->searchliveclasses_model->get_course_row(array('limit'=>$this->perPage));
        $data['totalRec']=$totalRec;
        //load the view
		$data['heading_title'] = "Advanced Search";						
		 $this->load->view('searchliveclasses/view_searchliveclasses',$data);
	}
	
	public function detail(){
		$id=$this->uri->segment('3');
		$param=array('courses_friendly_url'=>$id);
		$res = $this->searchliveclasses_model->getliveclasses(1,0,$param);
		$data['res']=$res;
		$this->load->view('liveclasses/view_course_detail',$data);
	}
	
	
	
	public  function ajaxPaginationData(){
		//$db2 = $this->load->database('database2', TRUE);
		$conditions = array();
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
		@$category = $this->input->post('category');
        if(!empty($category)){
             $conditions['search']['category'] = $category;
        }
		@$category = $this->input->post('category');
        if(!empty($category)){
             $conditions['search']['category'] = $category;
        }
		@$cat = $this->input->post('cat');
        if(!empty($category)){
             $conditions['search']['category'] = $category;
        }
		//total rows count
		$db1 = $this->load->database('default', TRUE);
		$sqll = "SELECT * FROM `wl_addclass`";
		$queryy=$db1->query($sqll);
		$totalRec = $queryy->num_rows();
		// echo $db2->last_query();die;
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'searchliveclasses/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get posts data
        $data['res'] = $this->searchliveclasses_model->get_course_row($conditions);
        //echo_sql();
        //load the view
        $this->load->view('searchliveclasses/view_searchliveclasses', $data, false);
		}
		
		// public function getcourses(){
		// 	$db2 = $this->load->database('database2', TRUE);
		// 	$id=$_POST['category_id'];
		// 	$sql="SELECT * FROM `tbl_courses`  where category_id='$id'  ORDER BY courses_name";
		// 	$query=$db2->query($sql);
		// 	if($query->num_rows()>0){
		// 	foreach($query->result_array() as $val):
		// 		echo "<option value='".$val['courses_id']."'>".$val['courses_name']."</option>";
		// 	endforeach;
		// 	}else{
		// 		echo "<option value=''>NO recode </option>";	
		// 	}
		// }
		public function getliveclasses()
		{
			$db2 = $this->load->database('default', TRUE);
        	$sql="SELECT * FROM `wl_teacher`  where liveplan=1";
			$id=$_POST['category_id'];
			$query=$db2->query($sql);
			if($query->num_rows()>0){
			foreach($query->result_array() as $val):
				echo "<option value='".$val['courses_id']."'>".$val['courses_name']."</option>";
			endforeach;
			}
			else
			{
				echo "<option value=''>NO recode </option>";	
			}
		}
		
		public function enrollDetail(){
			$id=$this->uri->segment('3');
			$newdata = array( 
			   'course_id'    => $id, 
			   'courseEnroll' => TRUE
			);  
			$this->session->set_userdata($newdata);	
			redirect('liveclasses/enroll', 'refresh');
		}
		
		public function enroll(){
			 $course_id 		= $this->session->userdata('course_id');
			 $param 			= array('status'=>'1','course_id'=>$course_id);	
			 $res_array			=$this->liveclasses_model->get_courses(1,0,$param);
			// print_r($res_array);
			 $data['res'] 		= $res_array;
			 $this->load->view('liveclasses/view_course_enroll', $data, false);	
		}
		
		public function freepayment(){
			if ( $this->input->post()!='') {
				if ($this->input->post('pay_method') == "free" ) {
					$userId            = $this->session->userdata('user_id');
					$invoice_number    = "Wl_".get_auto_increment('wl_order');
					$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$this->session->userdata('user_id')."'");	
					$data_order = 
					   array(
							'customers_id'        => $userId,
							'courses_id'          => $this->input->post('courses_id'),
							'invoice_number'      => $invoice_number,					
							'first_name'          => $mem_info['first_name'],
							'last_name'           => $mem_info['last_name'],
							'phone'				  => $mem_info['phone_number'],
							'email'               => $mem_info['user_name'],
							'address'			  => $this->input->post('address'),
							'tax_amount'     	  => '00:00',
							'tax_type'     		  => '00:00',
							'discount_amount'	  => '00:00',
							'total_amount'        => '00:00',
							'order_received_date' => $this->config->item('config.date.time'),
							'payment_method'      => $this->input->post('payment_method'),
							'payment_status'      => 'paid',
							'type'				  => '1',
					);
					$orderId = $this->order_model->safe_insert('wl_order',$data_order,FALSE);
				
				$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$this->session->userdata('user_id')."'");	 
				 $userId            = $this->session->userdata('user_id');
				 /*insert couser lot*/
				$abc=$mem_info['lot'];
				if(!empty($abc)){
					$course=  explode(",",$abc) ;
				}else{
					$course=array();
				}
				$course=  explode(",",$abc) ;
				$original_array =$course; 
				//value of new item 
				$inserted_value = $this->session->userdata('course_id'); 
				//value of position at which insertion is to be done
				$position = count($original_array); 
				//array_splice() function  
				array_splice($original_array,$position, 0,$inserted_value);  
				$newLot=implode(",",$original_array);
				$customerData=array(
				 	"lot"=>$newLot,
				 );
				 $where = "customers_id = '$userId' ";
				 $this->payment_model->safe_update('wl_customers',$customerData,$where,FALSE);
				// echo_sql();die;
				 $ordmaster = $this->order_model->get_order_master($orderId);
				 redirect('/lms/course_material', 'refresh');
				}
			}
		}
		
		
		
		
		
		
		
		public function payment(){
			
			if ( $this->input->post()!='') {
				
			if ($this->input->post('pay_method') == "paytm" ) {
					$userId            = $this->session->userdata('user_id');
					$invoice_number    = "Wl_".get_auto_increment('wl_order');
					$ammount=$this->input->post('ammount');
					$tax_res    =  get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
					//$tax_amount=$tax_res['tax_rate']*$this->input->post('ammount')/100;
					$tax_amount=$this->input->post('tax_amount');	
					$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$this->session->userdata('user_id')."'");	 
					$amount =  $ammount+$tax_amount;
					//$product_info = $this->input->post('url');
					$customer_name = $mem_info['first_name'];
					$customer_emial = $mem_info['user_name'];
					$customer_mobile = $mem_info['phone_number'];
					$customer_address = $mem_info['address'];
			
					$working_order_id =  $this->session->userdata('working_order_id');
					$order_res = $this->order_model->get_order_master($working_order_id);
					$data_order = 
					   array(
							'customers_id'        => $userId,
							'plan_id'        	  => $this->input->post('plan_id'),
							'invoice_number'      => $invoice_number,					
							'first_name'          => $mem_info['first_name'],
							'last_name'           => $mem_info['last_name'],
							'phone'				  => $mem_info['phone_number'],
							'email'               => $mem_info['user_name'],
							'address'			  => $this->input->post('address'),
							'tax_amount'     	  => $tax_amount,
							'tax_type'     		  => $tax_res['tax_type'],
							'currency_code'		  => $this->session->userdata('currency_code',true),
							'coupon_id'		  	  => $this->session->userdata('coupon_id',true),
							'coupon_code'		  => $this->session->userdata('coupon_code',true),
							'discount_amount'	  => $this->input->post('discount_amount',true),
							'total_amount'        => $ammount,
							'order_received_date' => $this->config->item('config.date.time'),
							'payment_method'      => $this->input->post('payment_method'),
							'payment_status'      => 'Unpaid',
							'type'				  => '1',
							
					);
					$orderId = $this->order_model->safe_insert('wl_order',$data_order,FALSE);	
					//echo_sql();die; 
					
					$this->session->set_userdata( array('working_order_id'=>$orderId) );	
				    $working_order_id =  $this->session->userdata('working_order_id');
				    $order_res = $this->order_model->get_order_master($working_order_id);
			
					$data = array(
							'ORDER_ID' 			=> 	$invoice_number,
							'CUST_ID' 			=> 	$userId,
							'email'             =>  $mem_info['user_name'],
							'INDUSTRY_TYPE_ID' 	=> 	"Retail",
							'CHANNEL_ID' 		=> 	"WEB",
							'WEBSITE'			=>	"WEBSTAGING",
							'TXN_AMOUNT' 		=> 	$ammount,
							'mobile'			=>  $mem_info['phone_number'],
							'return_url'	    =>  base_url() . 'liveclasses/payment_status_paytm',
								 
					);
	       // error_reporting(E_ALL);
	      // echo"<pre>";print_r($data);print_r($data);die;
					paytm($order_res,$data);//die;
				}
/*payment gateway paytm integration END*/	
			}  

		}
	
	public function payment_status_paytm(){
		$paytmChecksum = "";
		$paramList = array();
		$isValidChecksum = "FALSE";
		$paramList = $_POST;
		$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; 
		$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); 
		if($isValidChecksum == "TRUE") {
		
		if ($_POST["STATUS"] == "TXN_SUCCESS") {
			//echo "<b>Transaction status is success</b>" . "<br/>";
			//Process your transaction here as success transaction.
			//Verify amount & order id received from Payment gateway with your application's order id and amount.
			
				 $ordId=$this->session->userdata('working_order_id');
						$data  = array(
							'transaction_id'    =>$_POST['TXNID'] ,
							'payment_method'    =>"paytm",
							'payment_status'    =>'Paid',
							'bank_ref_num'      => $this->input->post('BANKTXNID') ,
							'bankcode'          => $this->input->post('BANKNAME') ,
							'payment_received_date'=>$this->config->item('config.date.time'),
							'ip_address'		=>$this->input->ip_address(),
						);	
				 $where = "order_id = '$ordId' ";
				 $this->payment_model->safe_update('wl_order',$data,$where,FALSE);
				 
				 $mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$this->session->userdata('user_id')."'");	 
				 $userId            = $this->session->userdata('user_id');
				 /*insert couser lot*/
				$abc=$mem_info['lot'];
				if(!empty($abc)){
					$course=  explode(",",$abc) ;
				}else{
					$course=array();
				}
				$course=  explode(",",$abc) ;
				$original_array =$course; 
				//value of new item 
				$inserted_value = $this->session->userdata('course_id'); 
				//value of position at which insertion is to be done
				$position = count($original_array); 
				//array_splice() function  
				array_splice($original_array,$position, 0,$inserted_value);  
				//echo "<br>"; 
				 //print_r($original_array);
				 $newLot=implode(",",$original_array);
				 $customerData=array(
				 	"lot"=>$newLot,
				 );
				 $where = "customers_id = '$userId' ";
				 $this->payment_model->safe_update('wl_customers',$customerData,$where,FALSE);
				 //echo_sql();
				 $ordmaster = $this->order_model->get_order_master( $this->session->userdata('working_order_id') );
				 $this->teacher_plan_update($ordmaster);
				 $plan_res    =  get_db_single_row($fld='wl_plan','*',$Condwherw="WHERE plan_id=".$ordmaster['plan_id']."");
				 if( is_array( $ordmaster )  && !empty( $ordmaster ) ) {
					   /***** Send Invoice mail */
					   $content    =  get_content('wl_auto_respond_mails','17');		
						$subject    =  $content->email_subject;						
						$body       =  $content->email_content;					
					
						$body			=	str_replace('{mem_name}',$ordmaster['first_name'],$body);
						$body			=	str_replace('{email}',$ordmaster['email'],$body);
						$body			=	str_replace('{phone}',$ordmaster['phone'],$body);
						$body			=	str_replace('{order_no}',$ordmaster['invoice_number'],$body);
						$body			=	str_replace('{transaction_id}',$ordmaster['transaction_id'],$body);
						$body			=	str_replace('{payment_received_date}',$ordmaster['order_received_date'],$body);
						$body			=	str_replace('{first_name}',$ordmaster['first_name'],$body);
						$body			=	str_replace('{address}',$ordmaster['address'],$body);
						$body			=	str_replace('{ip_address}',$ordmaster['ip_address'],$body);
						$body			=	str_replace('{bankcode}',$ordmaster['bankcode'],$body);
						$body			=	str_replace('{bank_ref_num}',$ordmaster['bank_ref_num'],$body);
						$body			=	str_replace('{recharge_ammount}',$ordmaster['total_amount']-$ordmaster['tax_amount'],$body);
						$body			=	str_replace('{paymentinfo}',$ordmaster['payment_status'],$body);
						$body			=	str_replace('{tax_amount}',$ordmaster['tax_amount'],$body);
						$body			=	str_replace('{productinfo}',$plan_res['name'],$body);
						$body			=	str_replace('{total_amount}',$ordmaster['total_amount'],$body);
						$body			=	str_replace('{admin_email}',$this->admin_info->admin_email,$body);
						//$body			=	str_replace('{admin_phone}',$this->admin_info->phone,$body);
						$body			=	str_replace('{site_name}',$this->config->item('site_name'),$body);
					
					$mail_conf =  array(
							'subject'=>$subject,
							'to_email'=>$ordmaster['email'],
							'from_email'=>$this->admin_info->admin_email,
							'from_name'=> $this->config->item('site_name'),
							'body_part'=>$body
							);	
					$this->dmailer->mail_notify($mail_conf);				
					/******* End Invoice  mail */		 
				 }
			 
			 $data['res']=$ordmaster;
			 $this->load->view('payment/success', $data); 
			  
		} else {
			
			//echo "<b>Transaction status is failure</b>" . "<br/>";
			
			$ordId=$this->session->userdata('working_order_id');
				 $data  = array(
						'transaction_id'    =>$_POST['ORDERID'] ,
						'payment_method'    =>"paytm",
						'payment_status'    =>'UnPaid',
						'bank_ref_num'      => $this->input->post('BANKTXNID') ,
						'bankcode'          => $this->input->post('BANKNAME') ,
						'payment_received_date'=>$this->config->item('config.date.time'),
						'ip_address'		=>$this->input->ip_address(),
						
						);			 	 
				 $where = "order_id = '$ordId' ";
				 $this->payment_model->safe_update('wl_order',$data,$where,FALSE);
				/// echo_sql();
				 $ordmaster = $this->order_model->get_order_master( $this->session->userdata('working_order_id') );
				  $plan_res    =  get_db_single_row($fld='wl_plan','*',$Condwherw="WHERE plan_id=".$ordmaster['plan_id']."");
			//	 $this->sms_for_services($ordmaster);
				
				 if( is_array( $ordmaster )  && !empty( $ordmaster ) ) {
					  
					   /***** Send Invoice mail */
					   $content    =  get_content('wl_auto_respond_mails','17');		
						$subject    =  $content->email_subject;						
						$body       =  $content->email_content;					
					
							$body			=	str_replace('{mem_name}',$ordmaster['first_name'],$body);
						$body			=	str_replace('{email}',$ordmaster['email'],$body);
						$body			=	str_replace('{phone}',$ordmaster['phone'],$body);
						$body			=	str_replace('{order_no}',$ordmaster['invoice_number'],$body);
						$body			=	str_replace('{transaction_id}',$ordmaster['transaction_id'],$body);
						$body			=	str_replace('{payment_received_date}',$ordmaster['order_received_date'],$body);
						$body			=	str_replace('{first_name}',$ordmaster['first_name'],$body);
						$body			=	str_replace('{address}',$ordmaster['address'],$body);
						$body			=	str_replace('{ip_address}',$ordmaster['ip_address'],$body);
						$body			=	str_replace('{bankcode}',$ordmaster['bankcode'],$body);
						$body			=	str_replace('{bank_ref_num}',$ordmaster['bank_ref_num'],$body);
						$body			=	str_replace('{recharge_ammount}',$ordmaster['total_amount']-$ordmaster['tax_amount'],$body);
						$body			=	str_replace('{paymentinfo}',$ordmaster['payment_status'],$body);
						$body			=	str_replace('{tax_amount}',$ordmaster['tax_amount'],$body);
						$body			=	str_replace('{productinfo}',$plan_res['name'],$body);
						$body			=	str_replace('{total_amount}',$ordmaster['total_amount'],$body);
						$body			=	str_replace('{admin_email}',$this->admin_info->admin_email,$body);
						//$body			=	str_replace('{admin_phone}',$this->admin_info->phone,$body);
						$body			=	str_replace('{site_name}',$this->config->item('site_name'),$body);
					
					$mail_conf =  array(
								'subject'=>$subject,
								'to_email'=>$ordmaster['email'],
								'from_email'=>$this->admin_info->admin_email,
								'from_name'=> $this->config->item('site_name'),
								'body_part'=>$body
							);	
					$this->dmailer->mail_notify($mail_conf);				
				}
				$data['res']=$ordmaster;
				$this->load->view('payment/failure', $data); 
			}
	
		/*if (isset($_POST) && count($_POST)>0 )
		{ 
			foreach($_POST as $paramName => $paramValue) {
					echo "<br/>" . $paramName . " = " . $paramValue;
			}
		}*/
	} else {
		echo "<b>Checksum mismatched.</b>";
		//Process transaction as suspicious.
	}
 }
	 public function usercredits()
	 {
		if($this->uri->segment(3)=='pathshala5572')
		{
			if($this->uri->segment(4))
			{
				$email = urldecode($this->uri->segment(4));
				//echo $email;
				$dbe = $this->load->database('default', TRUE);
				$sqs = "SELECT credit_point,first_name FROM `wl_customers` WHERE user_name='".$email."'";
				$qus=$dbe->query($sqs);
				$values= $qus->result_array();
				if($values[0]['first_name'])
				{
					if($values[0]['credit_point'] =="" || $values[0]['credit_point'] == "0")
					{
						$response->status = "0";
						$response->message = 'Low Credits';
						$response->credits = false;
						//$response->ip = $_SERVER['REMOTE_ADDR'];
						$jsonResponse = json_encode($response);
						echo $jsonResponse;

					}
					else
					{
						$sq ="UPDATE `wl_customers` SET credit_point=credit_point-1 WHERE user_name='".$email."'";
						$ip=$_SERVER['REMOTE_ADDR'];
						$sqq = "INSERT INTO `usercredits_log` (`ip`, `email`) values ('".$ip."', '".$email."')";
						$que = $dbe->query($sq); 
						$que = $dbe->query($sqq); 
						$response->status = "1";
						$response->message = 'Success';
						$response->credits = true;
						$jsonResponse = json_encode($response);
						echo $jsonResponse;
					}
				}
				else
				{
					$response->status = "-1";
					$response->message = 'Email Not found.';
					$response->credits = false;
					$jsonResponse = json_encode($response);
					echo $jsonResponse;

				}
				
			}
			else
			{
				$response->status = "-2";
				$response->message = 'Invalid URL';
				$response->credits = false;
				$jsonResponse = json_encode($response);
				echo $jsonResponse;
			}
			
		}
		else
		{
			$response->status = "-2";
			$response->message = 'Invalid URL';
			$response->credits = false;
			$jsonResponse = json_encode($response);
			echo $jsonResponse;
		}


	 }  
	 public function register()
	 {
		$this->load->view('liveclasses/view_liveclasses_register');

	 } 
	 public function liveclassRegister()
	 {
		 $classes = $this->input->post('classes',TRUE);
		 $class_str = implode(",",$classes);
		//  print_r($classes);
		$password = $this->input->post('password',TRUE);
		$email = $this->input->post('user_name',TRUE);
		$name = $this->input->post('first_name',TRUE);
		$phone = $this->input->post('phone_number',TRUE);
		$ch = curl_init();  
		$url = "https://www.pathshala.co/decore/new/api.php?action=TeacherLogin&userName=".$email."&pass=nullpass";
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$output=curl_exec($ch);
		curl_close($ch);
		$jsonOutput = json_decode($output,true);
		//var_dump($jsonOutput);
		if($jsonOutput['message'] == "Invalid user")
		{
			// New User ***** Call SignUP API
			$chh = curl_init();  
			$nameUrl = str_replace(" ", "%20", $name);
			$urll = "https://www.pathshala.co/decore/new/api.php?action=TeacherRegistration&email=".$email."&pass=".$password."&name=".$nameUrl."&phone=".$phone;
			curl_setopt($chh,CURLOPT_URL,$urll);
			curl_setopt($chh,CURLOPT_RETURNTRANSFER,true);
			$outputt=curl_exec($chh);
			curl_close($chh);
			//echo $outputt;
			$jsonSignup = json_decode($outputt, true);

			//var_dump($jsonSignup); 
			if($jsonSignup['Result']['msg'] == "Item has been added")
			{
				$dbe = $this->load->database('default', TRUE);
				$ip=$_SERVER['REMOTE_ADDR'];
				for($i=0;$i<count($classes);$i++)
				{
				$sqq = "INSERT INTO `wl_liveclass` (`emailid`, `class_dropdown`, `ip`, `user_type`) values ('".$email."','".$classes[$i]."','".$ip."', '1')";
				$que = $dbe->query($sqq); 
				}
				echo "<script>alert('Registered Successfully, Proceed With Login.'); window.location = '".base_url()."teacher/login'</script>";
			}
			else
			{
				echo "<script>alert('Error Occured. Please Try Again'); window.location = '".base_url()."liveclasses'</script>";

			}


		}
		else if($jsonOutput['message'] == "Invalid password")
		{
			// Old User
			$dbe = $this->load->database('default', TRUE);
			$ip=$_SERVER['REMOTE_ADDR'];
			for($i=0;$i<count($classes);$i++)
			{
			$sqq = "INSERT INTO `wl_liveclass` (`emailid`, `class_dropdown`, `ip`) values ('".$email."','".$classes[$i]."','".$ip."')";
			$que = $dbe->query($sqq); 
			}
			echo "<script>alert('Registered Successfully. Proceed With Login'); window.location = '".base_url()."teacher/login'</script>";

		}
	 }
	 public function getSubcat(){
		$id=$_POST['category_id'];
		$sql="SELECT * FROM `wl_categories`  where parent_id='$id'  ORDER BY sort_order";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
		foreach($query->result_array() as $val):
			if($val['category_id']=='377' || $val['category_id']=='373' || $val['category_id']=='374' || $val['category_id']=='375' || $val['category_id']=='530' || $val['category_id']=='432' || $val['category_id']=='376' || $val['category_id']=='526')
			{

			}
			else
			echo "<option value='".$val['category_id']."'>".$val['category_name']."</option>";
		endforeach;
		}else{
			echo "<option value=''>NO recode </option>";	
		}
	}
	public function getSecondDropDown()
	{
		$id=$this->uri->segment(3);
		$sql="SELECT * FROM `wl_categories`  where parent_id='$id'  ORDER BY sort_order";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			//$arr = array();
		foreach($query->result_array() as $val):
			$arr['Result'][] = array(
					"value"=>       $val['category_id'],
					"name"=>        $val['category_name'],
			);
		endforeach;
		//print_r($arr);
		echo json_encode($arr);
		}else{
			echo"{ <item value=''>NO recode </item>}";	
		}

	}

}
?>
