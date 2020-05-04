<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

class Payment extends Private_Controller{
	
	private $mId;

	public function __construct()
	{
		parent::__construct(); 		
		$this->load->model(array('members/members_model','payment/payment_model'));
		 $this->load->helper(array('payment/paytm'));	 
		$this->load->library(array('Dmailer'));	
	}
	
	
	public function index(){
		
			if ( $this->input->post()!='') {
				//echo "<pre>";print_r($_REQUEST);
			if ($this->input->post('pay_method') == "paytm" ) {
					$studentId            = $this->session->userdata('user_id');
					$invoice_number    	  = "Wl_".get_auto_increment('wl_student_credit_record');
					$amount			  	  =$this->input->post('amount');
					$tax_res    		  =  get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
					$tax_amount			  =$tax_res['tax_rate']*$this->input->post('amount')/100;
					
					//$tax_amount=$this->input->post('tax_amount');	
					$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$this->session->userdata('user_id')."'");	 
					$totalAmount 			=  $amount+$tax_amount;
					//$product_info = $this->input->post('url');
					$customer_name 		= $mem_info['first_name'];
					$customer_emial 	= $mem_info['user_name'];
					$customer_mobile 	= $mem_info['phone_number'];
					$customer_address 	= $mem_info['address'];
			
					//$working_order_id =  $this->session->userdata('working_order_id');
					//$order_res = $this->order_model->get_order_master($working_order_id);
					$data_order = 
					   array(
							'student_id'          => $studentId,
							'plan_id'        	  => $this->input->post('plan_id'),
							'invoice_number'      => $invoice_number,					
							'first_name'          => $mem_info['first_name'],
							'last_name'           => $mem_info['last_name'],
							'phone'				  => $mem_info['phone_number'],
							'email'               => $mem_info['user_name'],
							'address'			  => $this->input->post('address'),
							'tax_amount'     	  => $tax_amount,
							'tax_type'     		  => $tax_res['tax_type'],
							'credit_amount'		  => $this->input->post('amount'),
							//'currency_code'	  	  => $this->session->userdata('currency_code'),
							'coupon_id'		      => $this->session->userdata('coupon_id'),
							'coupon_code'		  => $this->session->userdata('coupon_code'),
							'discount_amount'	  => $this->input->post('discount_amount'),
							'total_amount'        => $totalAmount,
							'order_received_date' => $this->config->item('config.date.time'),
							'payment_method'      => $this->input->post('pay_method'),
							'payment_status'      => 'Unpaid',
							
					);
					$orderId = $this->payment_model->safe_insert('wl_student_credit_record',$data_order,FALSE);	
					//echo_sql();die; 
					$this->session->set_userdata( array('working_order_id'=>$orderId) );	
				    $working_order_id =  $this->session->userdata('working_order_id');
				    $order_res = $this->members_model->get_payment_master($working_order_id);
					//echo"<pre>";print_r($order_res);die;
					$data = array(
							'ORDER_ID' 			=> 	$invoice_number,
							'CUST_ID' 			=> 	$studentId,
							'email'             =>  $mem_info['user_name'],
							'INDUSTRY_TYPE_ID' 	=> 	"Retail",
							'CHANNEL_ID' 		=> 	"WEB",
							'WEBSITE'			=>	"WEBSTAGING",
							'TXN_AMOUNT' 		=> 	$amount,
							'mobile'			=>  $mem_info['phone_number'],
							'return_url'	    =>  base_url() . 'members/payment/payment_status_paytm',
					);
	       			// error_reporting(E_ALL);
	      			//echo"<pre>";print_r($data);print_r($data);die;
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
		$this->session->unset_userdata('coupon_id');
		$this->session->unset_userdata('coupon_discount');
		$this->session->unset_userdata('coupon_code');
		$this->session->unset_userdata('discount_code');
		$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
		//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
		$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
		if($isValidChecksum == "TRUE") {
		//	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
		//print_r($_REQUEST);die;
		//print_r($_REQUEST);
		if ($_POST["STATUS"] == "TXN_SUCCESS") {
			//echo "<b>Transaction status is success</b>" . "<br/>";
			//Process your transaction here as success transaction.
			//Verify amount & order id received from Payment gateway with your application's order id and amount.
			
			$mem_info  =  get_db_single_row($fld='wl_customers','*',$Condwherw="WHERE customers_id=".$this->session->userdata('user_id')."");
			$custId=$this->session->userdata('user_id');
			$ordId=$this->session->userdata('working_order_id');
						$data  = array(
							'transaction_id'    =>	$_POST['TXNID'] ,
							'payment_method'    =>	"paytm",
							'payment_status'    =>	'Paid',
							'previous_amount'	=>	$mem_info['credit_point'],
							'bank_ref_num'      => 	$this->input->post('BANKTXNID') ,
							'bankcode'          => 	$this->input->post('BANKNAME') ,
							'payment_received_date'=>$this->config->item('config.date.time'),
							'ip_address'		=>	$this->input->ip_address(),
						);	
				$where = "order_id = '$ordId' ";
				$this->payment_model->safe_update('wl_student_credit_record',$data,$where,FALSE);
				//echo_sql();
				$ordmaster = $this->members_model->get_payment_master($this->session->userdata('working_order_id'));
				//$sql="UPDATE table_name SET column1 = value1, column2 = value2, WHERE condition;";
				//$this->student_credit_update($ordmaster);
				$totalCredit=$mem_info['credit_point']+$ordmaster['credit_amount'];	
				$creditData=array(
							'credit_point' => $totalCredit,
							);
				$customerwhere = "customers_id = '$custId' ";
				$this->payment_model->safe_update('wl_customers',$creditData,$customerwhere,FALSE);
				
				
				
				
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
			 $this->load->view('members/credit/success', $data); 
			  
		} else {
			//echo "<b>Transaction status is failure</b>" . "<br/>";
			$ordId=$this->session->userdata('working_order_id');
				 $data  = array(
						'transaction_id'    => $_POST['ORDERID'] ,
						'payment_method'    => "paytm",
						'payment_status'    => 'UnPaid',
						'bank_ref_num'      => $this->input->post('BANKTXNID') ,
						'bankcode'          => $this->input->post('BANKNAME') ,
						'payment_received_date'=>$this->config->item('config.date.time'),
						'ip_address'		=>$this->input->ip_address(),
					);			 	 
				 $where = "order_id = '$ordId' ";
				 $this->payment_model->safe_update('wl_student_credit_record',$data,$where,FALSE);
				/// echo_sql();
				 $ordmaster = $this->members_model->get_payment_master( $this->session->userdata('working_order_id') );
				  //$plan_res    =  get_db_single_row($fld='wl_plan','*',$Condwherw="WHERE plan_id=".$ordmaster['plan_id']."");
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
				$this->load->view('members/credit/failure', $data); 
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