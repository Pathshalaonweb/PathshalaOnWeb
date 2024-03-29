<?php
class Courses extends Public_Controller
{
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('courses/courses_model','payment/payment_model','order/order_model'));
	    $this->load->library('Ajax_pagination');
		$this->load->helper(array('payment/paytm'));
		$this->perPage = 30;
	}
	
	public function index()
	{	

 		$data = array();
        //total rows count
        $totalRec = count($this->courses_model->get_course_row());
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'courses/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        //get the posts data
        $data['res'] = $this->courses_model->get_course_row(array('limit'=>$this->perPage));
        $data['totalRec']=$totalRec;
        //load the view
		$data['heading_title'] = "Advanced Search";						
		 $this->load->view('courses/view_courses',$data);
	}
	
	public function detail(){
		$id=$this->uri->segment('3');
		$param=array('courses_friendly_url'=>$id);
		$res = $this->courses_model->get_courses(1,0,$param);
		$data['res']=$res;
		$this->load->view('courses/view_course_detail',$data);
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
        $totalRec = count($this->courses_model->get_course_row($conditions));
		// echo $db2->last_query();die;
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'courses/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get posts data
        $data['res'] = $this->courses_model->get_course_row($conditions);
        //echo_sql();
        //load the view
        $this->load->view('courses/view_search_courses', $data, false);
		}
		
		public function getcourses(){
			$db2 = $this->load->database('database2', TRUE);
			$id=$_POST['category_id'];
			$sql="SELECT * FROM `tbl_courses`  where category_id='$id'  ORDER BY courses_id DESC";  //updated 04072020
			$query=$db2->query($sql);
			if($query->num_rows()>0){
			foreach($query->result_array() as $val):
				echo "<option value='".$val['courses_id']."'>".$val['courses_name']."</option>";
			endforeach;
			}else{
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
			redirect('courses/enroll', 'refresh');
		}
		
		public function enrollDetailStoreCredit(){
			$id=$this->uri->segment('3');
			$newdata = array( 
			   'course_id'    => $id, 
			   'courseEnroll' => TRUE
			);  
			$this->session->set_userdata($newdata);	
			redirect('courses/enrollStoreCredit', 'refresh');
		}
		
		public function enrollStoreCredit(){
			$course_id 		= $this->session->userdata('course_id');
			 $param 			= array('status'=>'1','course_id'=>$course_id);	
			 $res_array			=$this->courses_model->get_courses(1,0,$param);
			// print_r($res_array);
			 $data['res'] 		= $res_array;
			 $this->load->view('courses/view_course_enroll_StoreCredit', $data, false);	
		}
		
		
		public function enroll(){
			 $course_id 		= $this->session->userdata('course_id');
			 $param 			= array('status'=>'1','course_id'=>$course_id);	
			 $res_array			=$this->courses_model->get_courses(1,0,$param);
			// print_r($res_array);
			 $data['res'] 		= $res_array;
			 $this->load->view('courses/view_course_enroll', $data, false);	
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
							'payment_mode'		  => 'free',
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
		
		
		public function paymentStoreCredit(){
			if ( $this->input->post()!='') {
				if ($this->input->post('pay_method') == "StoreCredit" ) {
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
							'total_amount'        => $this->input->post('ammount'),
							'order_received_date' => $this->config->item('config.date.time'),
							'payment_method'      => $this->input->post('payment_method'),
							'payment_status'      => 'paid',
							'type'				  => '1',
							'payment_mode'		  => 'credit',
							
					);
					$orderId = $this->order_model->safe_insert('wl_order',$data_order,FALSE);
				
				//$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$this->session->userdata('user_id')."'");	 
				 $userId            = $this->session->userdata('user_id');
				 
				 $currentCredit=$mem_info['credit_point'];
				 $newCrediitPoint=$mem_info['credit_point']-$this->input->post('ammount');
				 
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
					"credit_point"=>$newCrediitPoint
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
							'return_url'	    =>  base_url() . 'courses/payment_status_paytm',
								 
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



}
?>