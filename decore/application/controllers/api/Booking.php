<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Booking extends  REST_Controller 
{
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('booking_model'));
	    
	}


    public function booking_list_all_post(){
        
         $fromDate     = strip_tags($this->post('fromDate'));
         $toDate       = strip_tags($this->post('toDate'));
         
        if(!empty($fromDate) && !empty($toDate)){
            $param = array(
                'fromDate' =>$fromDate,
                'toDate'   =>$toDate  
                );
            $res_array              	= $this->booking_model->get_booking( $param);
           // $ab="ho";
        }else{
            $param = array();
            	$res_array = $this->booking_model->get_booking($param);
            //	$ab="hi";
        }
	//	$sql=echo_sql();die;
        if($res_array){
				//$id=$this->db->insert_id();
				 $this->response([
                    'status' => 1,
                    'message' => 'successfully.',
                    'data' => $res_array,
                   // 'msg' => $ab,
                    
                ], 
				REST_Controller::HTTP_OK);
			}else{
	$this->response([
                    'status' => 0,
                    'message' => "Not .",
                    'data'      =>[]
                    ]
				, REST_Controller::HTTP_OK);
			
		}
    }
    

public function booking_list_confirm_post(){
        
         $fromDate     = strip_tags($this->post('fromDate'));
         $toDate       = strip_tags($this->post('toDate'));
         
        if(!empty($fromDate) && !empty($toDate)){
            $param = array(
                'fromDate' =>$fromDate,
                'toDate'   =>$toDate ,
                'booking_status'=>'conform'
                );
            $res_array              	= $this->booking_model->get_booking( $param);
           // $ab="ho";
        }else{
            $param = array('booking_status'=>'conform');
            	$res_array = $this->booking_model->get_booking($param);
            //	$ab="hi";
        }
	//	$sql=echo_sql();die;
        if($res_array){
				//$id=$this->db->insert_id();
				 $this->response([
                    'status' => 1,
                    'message' => 'successfully.',
                    'data' => $res_array,
                   // 'msg' => $ab,
                    
                ], 
				REST_Controller::HTTP_OK);
			}else{
			   	$this->response([
                    'status' => 0,
                    'message' => "Not .",
                    'data'      =>[]
                    ]
				, REST_Controller::HTTP_OK);
			
		}
    }
    
public function booking_list_done_post(){
        
         $fromDate     = strip_tags($this->post('fromDate'));
         $toDate       = strip_tags($this->post('toDate'));
         
        if(!empty($fromDate) && !empty($toDate)){
            $param = array(
                'fromDate' =>$fromDate,
                'toDate'   =>$toDate ,
                'booking_status'=>'done'
                );
            $res_array              	= $this->booking_model->get_booking( $param);
           // $ab="ho";
        }else{
            $param = array('booking_status'=>'done');
            	$res_array = $this->booking_model->get_booking($param);
           
        }

        if($res_array){
				//$id=$this->db->insert_id();
				 $this->response([
                    'status' => 1,
                    'message' => 'successfully.',
                    'data' => $res_array,
                   // 'msg' => $ab,
                    
                ], 
				REST_Controller::HTTP_OK);
			}else{
			  	$this->response([
                    'status' => 0,
                    'message' => "Not .",
                    'data'      =>[]
                    ]
				, REST_Controller::HTTP_OK);
			
		}
    }
    




 public function booking_divertedcall_list_all_post(){
        
         $fromDate     = strip_tags($this->post('fromDate'));
         $toDate       = strip_tags($this->post('toDate'));
         $astrologer_id = strip_tags($this->post('astrologer_id'));
         
        if(!empty($fromDate) && !empty($toDate)){
            $param = array(
                'fromDate' =>$fromDate,
                'toDate'   =>$toDate,
                'divertedcall'=>$astrologer_id,
                'astrologer_id'=>$astrologer_id
                );
            $res_array              	= $this->booking_model->get_booking( $param);
           // $ab="ho";
        }else{
            $param = array(
                'divertedcall'=>$astrologer_id,
                'astrologer_id'=>$astrologer_id
            );
            	$res_array = $this->booking_model->get_booking($param);
            
        }
	
        if($res_array){
				//$id=$this->db->insert_id();
				 $this->response([
                    'status' => 1,
                    'message' => 'successfully.',
                    'data' => $res_array,
                   // 'msg' => $ab,
                    
                ], 
				REST_Controller::HTTP_OK);
			}else{
			   	$this->response([
                    'status' => 0,
                    'message' => "Not .",
                    'data'      =>[]
                    ]
				, REST_Controller::HTTP_OK);
			
		}
    }

public function booking_samecall_list_all_post(){
        
         $fromDate      = strip_tags($this->post('fromDate'));
         $toDate        = strip_tags($this->post('toDate'));
         $astrologer_id = strip_tags($this->post('astrologer_id'));
         
        if(!empty($fromDate) && !empty($toDate)){
           $param = array(
                'fromDate' =>$fromDate,
                'toDate'   =>$toDate,
                'samecall'=>$astrologer_id
                );
            $res_array              	= $this->booking_model->get_booking( $param);
           // $ab="ho";
        }else{
            $param = array(
                'samecall'=>$astrologer_id
                );
            	$res_array = $this->booking_model->get_booking($param);
            //	$ab="hi";
        }
	//	$sql=echo_sql();die;
        if($res_array){
				//$id=$this->db->insert_id();
				 $this->response([
                    'status' => 1,
                    'message' => 'successfully.',
                    'data' => $res_array,
                   // 'msg' => $ab,
                    
                ], 
				REST_Controller::HTTP_OK);
			}else{
			   	$this->response([
                    'status' => 0,
                    'message' => "Not .",
                    'data'      =>[]
                    ]
				, REST_Controller::HTTP_OK);
			
		}
    }


public function callhistory_list_post(){
        
         $fromDate      = strip_tags($this->post('fromDate'));
         $toDate        = strip_tags($this->post('toDate'));
         $customer_id   = strip_tags($this->post('customer_id'));
         
         if(!empty($fromDate) && !empty($toDate)){
            $param = array(
                'fromDate'    =>$fromDate,
                'toDate'      =>$toDate ,
                'customer_id' => $customer_id,
              
                );
            $res_array              	= $this->booking_model->get_booking( $param);
           
        }else{
            $param = array('customer_id' => $customer_id);
            	$res_array = $this->booking_model->get_booking($param);
           
        }

        if($res_array){
				
				 $this->response([
                    'status' => 1,
                    'message' => 'successfully.',
                    'data' => $res_array,
                   
                    
                ], 
				REST_Controller::HTTP_OK);
			}else{
			    $arr=array('key'=>'12');
			  	$this->response([
                    'status'    => 0,
                    'message'   => "Not .",
                    'data'      =>$arr
                    ]
				, REST_Controller::HTTP_OK);
			
		}
    }
    



public function sms_to_user_ammount($ordmaster,$newbalance,$ammount){
	
	
		$loginID="SEOINDIA";
		$password="123123";
		$coding="0";
		$from='astrop';
		
        $text='Dear user, 
        This is a confirmation regarding your call with Astropatrika. 
        We have deducted an amount of '.$ammount.' from your account. Your remaining Balance is '.$newbalance.'
        We thank you for choosing our services and wish to hear you from you soon!';
		$texts=urlencode($text);
		$data="username=".$loginID."&password=".$password."&from=".$from."&to=".$ordmaster['phone_number']."&text=".$texts."&coding=".$coding;
		$url = "https://49.50.67.32/smsapi/httpapi.jsp?".$data;//die;
		
		$ch = curl_init();
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch,CURLOPT_POST,1);
       // curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        //curl_setopt($ch, CURLOPT_HEADER, 1);
        // grab URL and pass it to the browser
        curl_exec($ch);
        curl_close($ch);
		header("Content-Type: application/json");
		
		
		
		
//	return true;

}



public function save_recharge_and_booking_post(){
    
   
		$astroId             = strip_tags($this->post('astro_id'));
		$userId              = strip_tags($this->post('customers_id'));

		$first_name          = strip_tags($this->post('first_name'));
        $email 		         = strip_tags($this->post('email'));
        $phone 		         = strip_tags($this->post('phone'));
       	$address 	         = strip_tags($this->post('address'));
		$payment_method      = strip_tags($this->post('payment_method'));
		$b_place        = strip_tags($this->post('b_place'));
		$b_time         = strip_tags($this->post('b_time'));
		$p_time 	 	= $this->post('p_time');
		$p_date 	 	= $this->post('p_date');
		$gender 	 	= $this->post('gender');
		
		//print_r($_REQUEST);

		if(!empty($userId) && !empty($astroId)){
		
	    $mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$userId."'");	
		$as_info=get_db_single_row('wl_astrologer',$fields="*",$condition="WHERE 1 AND astrologer_id='".$astroId."'");
	
		$invoice_number    = "ASTRO_".get_auto_increment('wl_astro_booking');
	    $invoice_number1    = "WL_".get_auto_increment('wl_order');
		$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$userId."'");	
		
			
	    //tax calculation
		$tax_res    =  get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
		$tax_amount=$tax_res['tax_rate']*$as_info['call_rate']/100;
		
		$totalAmount=$as_info['call_rate']+$tax_amount;
	
			
		$data_order = 
				   array(
				    'customers_id'        => $userId,
				   // 'call_package_id'     => $call_package_id,
					'invoice_number'      => $invoice_number1,					
					'first_name'          => $first_name,
					'last_name'           => $mem_info['last_name'],
					'phone'				  => $phone,
					'email'               => $email,
					'address'			  => $address,
					'productinfo'		  => 'astrobooking',	
					'tax_amount'     	  => $tax_amount,
					'tax_type'     		  => $tax_res['tax_type'],
					'currency_code'		  => 'INR',
					'total_amount'        => $totalAmount,
					'recharge_ammount'	  => $as_info['call_rate'],
					'order_received_date' => $this->config->item('config.date.time'),
					'payment_method'      => $payment_method,
					'payment_status'      => 'Unpaid',
				//	'page_type'			  => $type,
					'payment_type'		  => '1',
					//payment type 0 for shop
				);
			$insert=$this->db->insert('wl_order',$data_order);
		    $id1=$this->db->insert_id();
			
		$posted_data = array(
				 	'invoice_id' 	=> $invoice_number,
					'customer_id'	=> $userId,
					'name'		 	=> $this->post('name',TRUE),
					'email'		 	=> $this->post('email',TRUE),
					'phone' 	 	=> $this->post('phone',TRUE),
					'astrologer_id' => $astroId,
					'aname'			=> $as_info['astrologer_name'],
					'b_place' 	 	=> $this->post('b_place',TRUE),
					'b_time' 	 	=> $this->post('b_time',TRUE),
					'b_date' 	 	=> $this->post('dob',TRUE),
					'p_time' 	 	=> $this->post('p_time',TRUE),
					'p_date' 	 	=> $this->post('p_date',TRUE),
					
					'payment_method'	 =>  $this->post('payment_method',TRUE),
					'booking_status'	 =>  'conform',
					'payment_status'	 =>  'Unpaid',
					'order_received_date'=> $this->config->item('config.date.time')
				 );
			$insert=$this->db->insert('wl_astro_booking',$posted_data);
            $id=$this->db->insert_id();

            $arr=array(
                'ORDER_ID'=>"$id1",
                'BookingId'=>"$id",
                'CUST_ID'=>"$userId",
                'totalAmount'=>"$totalAmount",
                
                );			
            			
			
			if($insert){
				$id=$this->db->insert_id();
				 $this->response([
                    'status'    => "1",
                    'message'   => 'Insert successfully.',
                    'paytmData'=>$arr
                     
                ], 
				REST_Controller::HTTP_OK);
			}
	
		$ordmaster=get_db_single_row('wl_astro_booking',$fields="*",$condition="WHERE 1 AND booking_id='".$id."'");
		
		}else{
		    $arr=array('key'=>33);
			$this->response([
                    'status' => 0,
                    'message' => "Not .",
                    'paytmData'      =>$arr
                    ]
				, REST_Controller::HTTP_OK);
		}
}


 public function generateChecksum(){

    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");  

//if(!empty($_POST["CUST_ID"])){

$checkSum = "";
// below code snippet is mandatory, so that no one can use your checksumgeneration url for other purpose .
$findme   = 'REFUND';
$findmepipe = '|';
$paramList = array();

$paramList["MID"] = "Astros34437395379305";
$paramList["ORDER_ID"] = "ORDER00870000111";
$paramList["CUST_ID"] = "CUST0009801";
$paramList["INDUSTRY_TYPE_ID"] = "Retail";
$paramList["CHANNEL_ID"] = "WAP";
$paramList["TXN_AMOUNT"] = "1.00";
$paramList["WEBSITE"] = "APPSTAGING";
//@$paramList["MOBILE_NO"] = $_POST["MOBILE_NO"];
//$url="https://securegw-stage.paytm.in/theia/paytmCallback?ORDER_ID=".$invoice_number."";

$paramList["CALLBACK_URL"] ="https://securegw-stage.paytm.in/theia/paytmCallback?ORDER_ID=ORDER00870000111";

//AID
//PKG_ID

foreach($_POST as $key=>$value){  
  $pos = strpos($value, $findme);
  $pospipe = strpos($value, $findmepipe);
  if ($pos === false || $pospipe === false) 
    {
        $paramList[$key] = $value;
    }
  }
$checkSum = getChecksumFromArray($paramList,"G!88Ay78T@Qa1zFE");
//print_r($checkSum);
if($checkSum){
     echo json_encode(array("CHECKSUMHASH" => $checkSum,'TXN_AMOUNT'=>"1.00",
'CALLBACK_URL'=>"https://securegw-stage.paytm.in/theia/paytmCallback?ORDER_ID=ORDER00870000111",'ORDER_ID'=>"ORDER00870000111",'CUST_ID'=>"CUST0009801"),JSON_UNESCAPED_SLASHES);
    }else{
      echo  json_encode(array("CHECKSUMHASH" => $checkSum,'TXN_AMOUNT'=>"1.00",
'CALLBACK_URL'=>"https://securegw-stage.paytm.in/theia/paytmCallback?ORDER_ID=ORDER00870000111",'ORDER_ID'=>"ORDER00870000111",'CUST_ID'=>"CUST0009801"),JSON_UNESCAPED_SLASHES);
    } 
// }
  } 
 

public function update_recharge_and_booking_post(){
    
    $orderId =strip_tags($this->post('ORDERID'));
    $BookingId =strip_tags($this->post('bookingId'));
    $user_id =strip_tags($this->post('CUST_ID'));
    $TXNID =strip_tags($this->post('TXNID'));
    
    
    if(!empty($orderId) && !empty($BookingId)){
      
        $data  = array(
			        'transaction_id'    =>$TXNID ,
			       // 'payment_method'    =>"paytm",
			        'payment_status'    =>'Paid',
			        'bank_ref_num'      => $this->post('BANKTXNID') ,
			        'bankcode'          => $this->post('BANKNAME') ,
			        'payment_received_date'=>$this->config->item('config.date.time'),
			        'ip_address'		=>$this->input->ip_address(),
			        );
			$this->db->set('transaction_id', 'payment_status','bank_ref_num','bankcode','payment_received_date','ip_address','order_id');	
		    //$sql="UPDATE `wl_order` SET `order_id`='".$orderid."'"; 
		    
			$this->db->where('order_id',$orderId);
			$update= $this->db->update('wl_order',$data);
			
			$ordmaster=get_db_single_row('wl_order',$fields="*",$condition="WHERE 1 AND order_id='".$orderId."'");
			
			 $mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$user_id."'");
			
			 $newbalance=$mem_info['ewallet']+$ordmaster['recharge_ammount'];
			 $data_mem = array( 
				'ewallet' => $newbalance-500,
			 );
			 $this->db->set('ewallet');
            $this->db->where('customers_id',$user_id);
			$this->db->update('wl_customers', $data_mem);
			
			
	       $data_booking  = array(
			        'booking_status'    => 'conform' ,
			       // 'payment_method'  => "paytm",
			        'payment_status'    => 'Paid',
			       );
			$this->db->set('booking_status', 'payment_status','bank_ref_num','bankcode','payment_received_date','ip_address');	
		//	$sql="UPDATE `wl_order` SET `order_id`='".$orderid."'"; 
			$this->db->where('booking_id',$BookingId);
			$update= $this->db->update('wl_astro_booking',$data_booking);		
			if($update){
			$this->response([
                    'status'    => "1",
                    'message'   => 'Insert successfully.',
                    
                ], 
				REST_Controller::HTTP_OK);
			}else{
			    
			   $this->response([
                    'status'    => "0",
                    'message'   => 'NOT.',
                    
                ], 
				REST_Controller::HTTP_OK); 
			}
    }
    
}




 public function add_ewallet_booking_post(){
		
		$userId     = strip_tags($this->post('customers_id'));
		$astroId    = strip_tags($this->post('astro_id'));
		$b_place    = strip_tags($this->post('b_place'));
		$b_time    = strip_tags($this->post('b_time'));
		$p_time 	 	= $this->post('p_time');
		$p_date 	 	= $this->post('p_date');
		$gender 	 	= $this->post('gender');
		
		$response = array();
		
		
		if(!empty($userId) && !empty($astroId)){
		
    		$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$userId."'");	
    		$as_info=get_db_single_row('wl_astrologer',$fields="*",$condition="WHERE 1 AND astrologer_id='".$astroId."'");
    		$invoice_number    = "ASTRO_".get_auto_increment('wl_astro_booking');	
			
		    $posted_data = array(
				 	'invoice_id' 	=> $invoice_number,
					'customer_id'	=> $userId,
					'name'		 	=> $mem_info['first_name'],
					'email'		 	=> $mem_info['user_name'],
					'phone' 	 	=> $mem_info['phone_number'],
					'gender'        => $this->post('gender',TRUE),
					'astrologer_id' => $astroId,
					'aname'			=> $as_info['astrologer_name'],
					'b_place' 	 	=> $this->post('b_place',TRUE),
					'b_time' 	 	=> $this->post('b_time',TRUE),
					'b_date' 	 	=> $this->post('dob',TRUE),
					'p_time' 	 	=> $this->post('p_time',TRUE),
					'p_date' 	 	=> $this->post('p_date',TRUE),
					'payment_method'	 =>  'Ewallet',
					'booking_status'	 =>  'conform',
					'payment_status'	 =>  'paid',
					'order_received_date'=> $this->config->item('config.date.time')
				 );
			$insert=$this->db->insert('wl_astro_booking',$posted_data);
			$id=$this->db->insert_id();
			//ewallet ammount ------
			        $ammount='500';
        			$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$userId."'");
        			$newbalance=$mem_info['ewallet']-$ammount;
        			$data_mem = array( 
        				'ewallet' => $newbalance,
        			 );
                    $this->db->where('customers_id',$userId);
        			$this->db->update('wl_customers', $data_mem);
			    
			
			
			if($insert){
				
				$ordmaster=get_db_single_row('wl_astro_booking',$fields="*",$condition="WHERE 1 AND booking_id='".$id."'");
	            //	print_r($ordmaster);die;
	        	$arr = array(
				        'status'             => "1",
                        'message'            => 'Insert successfully.',
                        'BookingId'          => "$id",
                        'ewallet'            =>"$newbalance",
                 );
			}
		
		echo json_encode($arr);
		
	//	$sms=	$this->sms_to_user($ordmaster);
	//	$this->sms_to_astrologer($as_info,$mem_info,$invoice_number,$ordmaster);
		
		}else{
			$this->response([
                    'status' => "0",
                    'message' => "Not .",
                    'data'      =>[]
                    ]
				, REST_Controller::HTTP_OK);
		}
		
		
	}
	

public function diverted_to_post(){
    
    $bookingId     = strip_tags($this->post('bookingId'));
    $astroId       = strip_tags($this->post('astroId'));
    $customerId    = strip_tags($this->post('customerId'));
    $ammount       = strip_tags($this->post('Ammount'));
    header("Content-Type: application/json");
    
    if(!empty($bookingId) && !empty($astroId)){
        
         $astro_info=get_db_single_row('wl_astrologer',$fields="*",$condition="WHERE 1 AND astrologer_id='".$astroId."'");
        
                $posted_data = array(
			    	'diverted_to'   =>$astroId,
			    	'booking_status'=>'done',
			    	'handleBy'      => $astro_info['astrologer_name'],
				);
				
			$where = "booking_id = '".$bookingId."'"; 						
			$update=$this->booking_model->safe_update('wl_astro_booking',$posted_data,$where,FALSE);
			
		/*	$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$customerId."'");
			$newbalance=$mem_info['ewallet']-$ammount;
			$data_mem = array( 
				'ewallet' => $newbalance,
			 );
            $this->db->where('customers_id',$customerId);
			$this->db->update('wl_customers', $data_mem);*/
			
		   $data= $this->sms_to_user_thanku($bookingId);
		  // $response="";
		    header("Content-Type: application/json");
		    	$this->response([
                    'status' => "1",
                    'message' => "We have deducted amount",
                   // 'sms'    => $data,
                     'data'      => $bookingId,
                    
                    ]
				, REST_Controller::HTTP_OK);
			
	        }else{
				$this->response([
                    'status' => 0,
                    'message' => "Not .",
                    'data'      =>'0'
                    ]
				, REST_Controller::HTTP_OK);
			
		}
			
    }

public function sms_to_user_thanku($booking_id){

	$mem_info=get_db_single_row('wl_astro_booking',$fields="*",$condition="WHERE 1 AND booking_id='".$booking_id."'");
	
		$loginID="SEOINDIA";
		$password="123123";
		$coding="0";
		$from='astrop';
		
		//$text='Hello '.$first_name.',Please Use this '.$otp.' OTP for verifying your mobile number with Astropatrika';
		$text='We hoop that our consultation will yield better benefits in life and thank you for offering us a chance to serve you';
		
		$texts=urlencode($text);
		$data="username=".$loginID."&password=".$password."&from=".$from."&to=".$mem_info['phone']."&text=".$texts."&coding=".$coding;
		$url = "http://49.50.67.32/smsapi/httpapi.jsp?".$data;//die;
		
		$ch = curl_init();
		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		// grab URL and pass it to the browser
		curl_exec($ch);
		curl_close($ch);

}
	
	
	
	public function send_booking_sms_post(){
	   $BookingId     = strip_tags($this->post('BookingId')); 
	   $ordmaster=get_db_single_row('wl_astro_booking',$fields="*",$condition="WHERE 1 AND booking_id='".$BookingId."'");
	   $sms=	$this->sms_to_user($ordmaster);
	  
	   $invoice_number  =   $ordmaster['invoice_id'];
	   $astrologer_id   =   $ordmaster['astrologer_id'];
	   $customerId      =   $ordmaster['customer_id'];
	   
	   $as_info=get_db_single_row('wl_astrologer',$fields="*",$condition="WHERE 1 AND astrologer_id='".$astrologer_id."'");
	   $mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$customerId."'");
	   $this->sms_to_user_recharge($ordmaster);
	   $this->sms_to_astrologer($as_info,$mem_info,$invoice_number);
	   
	   
	   
	   // echo $BookingId;
	}
	
	public function send_recharge_and_booking_sms_post(){
	  // print_r($_REQUEST); 
	     $BookingId     = $this->input->post('BookingId'); 
	     $orderId           = strip_tags($this->post('orderId')); 
	  
	  $bookingmaster=get_db_single_row('wl_astro_booking',$fields="*",$condition="WHERE 1 AND booking_id='".$BookingId."'");
	 // print_r($bookingmaster);//die;
	  $ordmaster=get_db_single_row('wl_order',$fields="*",$condition="WHERE 1 AND order_id='".$orderId."'");
	  
	  $sms=	$this->sms_to_user($bookingmaster);
	   
	 $this->sms_to_user_recharge($bookingmaster);
	   $invoice_number  =   $ordmaster['invoice_id'];
	   $astrologer_id   =   $ordmaster['astrologer_id'];
	   $customerId      =   $ordmaster['customer_id'];
	   
	   $as_info=get_db_single_row('wl_astrologer',$fields="*",$condition="WHERE 1 AND astrologer_id='".$astrologer_id."'");
	   $mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$customerId."'");
	 $this->sms_to_astrologer($as_info,$mem_info,$invoice_number);
	    
	    
	}
	
	public function update_order_post(){
		 
		$orderid     = strip_tags($this->post('order_id')); 
		$TXNID       = strip_tags($this->post('TXNID'));
		
		if(!empty($orderid)){
		
		 		$data  = array(
			        'transaction_id'    => $TXNID ,
			        'payment_method'    => "paytm",
			        'payment_status'    => 'Paid',
			        'bank_ref_num'      => $this->post('BANKTXNID') ,
			        'bankcode'          => $this->post('BANKNAME') ,
			        'payment_received_date'=>$this->config->item('config.date.time'),
			        'ip_address'		=>$this->input->ip_address(),
			        );
				
			 
			 $this->db->where('order_id',$orderid);
			 $update= $this->db->update('wl_order',$data);
			 
			 
			 if($update){
				 $ordmaster=get_db_single_row('wl_order',$fields="*",$condition="WHERE 1 AND order_id='".$orderid."'");
				 $this->sms_for_services($ordmaster);
			 $this->response([
                    'status' => 1,
                    'message' => 'Updated successfully.',
                ], REST_Controller::HTTP_OK);
			 }
			 
		}else{
			
		$this->response([
                    'status' => 0,
                    'message' => "Not .",
                    'data'      =>[]
                    ]
				, REST_Controller::HTTP_OK);
			
		}
					
					
	}
	



	
	
public function sms_to_user($ordmaster){
	
		$loginID="SEOINDIA";
		$password="123123";
		$coding="0";
		$from='astrop';
		
		//$text='Hello '.$first_name.',Please Use this '.$otp.' OTP for verifying your mobile number with Astropatrika';
		$text='Dear User, 
Thus is a confirmation regarding your call booking confirmation. You will be able to connect with the astrologer very soon. Your Invoice id is '.$ordmaster['invoice_id'].'.
We hope that our service is of immense pleasure for you!
';
		$texts=urlencode($text);
		$data="username=".$loginID."&password=".$password."&from=".$from."&to=".$ordmaster['phone']."&text=".$texts."&coding=".$coding;
		$url = "http://49.50.67.32/smsapi/httpapi.jsp?".$data;
		$ch = curl_init();
		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		// grab URL and pass it to the browser
		curl_exec($ch);
	    curl_close($ch);
	    
return true;
}

public function sms_to_user_recharge($ordmaster){
	$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$ordmaster['customer_id']."'");
	
		$loginID="SEOINDIA";
		$password="123123";
		$coding="0";
		$from='astrop';
		
		//$text='Hello '.$first_name.',Please Use this '.$otp.' OTP for verifying your mobile number with Astropatrika';
		$text='Dear user, 
This is a confirmation regarding your call with Astropatrika. 
We have debited the recharge amount Rs. 500  from your account. Your Remaning 
Balance is Rs. '.$mem_info['ewallet'].' 
We thank you for choosing our services and wish to hear you from you soon! 
';
		
		$texts=urlencode($text);
		$data="username=".$loginID."&password=".$password."&from=".$from."&to=".$ordmaster['phone']."&text=".$texts."&coding=".$coding;
		$url = "http://49.50.67.32/smsapi/httpapi.jsp?".$data;//die;
		
		$ch = curl_init();
		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		// grab URL and pass it to the browser
		curl_exec($ch);
		curl_close($ch);

}

public function sms_to_recharge($ordmaster,$newbalance){
	
		$loginID="SEOINDIA";
		$password="123123";
		$coding="0";
		$from='astrop';
		//$text='Hello '.$first_name.',Please Use this '.$otp.' OTP for verifying your mobile number with Astropatrika';
		$text='Dear user, 
This is a confirmation regarding your call with Astropatrika. 
We have credited the recharge amount from your account. Your total Balance is '.$newbalance.'
We thank you for choosing our services and wish to hear you from you soon! 
';
		
		$texts=urlencode($text);
		$data="username=".$loginID."&password=".$password."&from=".$from."&to=".$ordmaster['phone']."&text=".$texts."&coding=".$coding;
		$url = "http://49.50.67.32/smsapi/httpapi.jsp?".$data;//die;
		
		$ch = curl_init();
		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		// grab URL and pass it to the browser
		curl_exec($ch);
		curl_close($ch);

}


public function sms_to_astrologer($as_info,$mem_info,$invoice_number){
	
		$loginID="SEOINDIA";
		$password="123123";
		$coding="0";
		$from='astrop';
		
		$text='Dear Astrologer '.$as_info['astrologer_name'].',
Thus is a confirmation regarding the call booking for user '.$mem_info['first_name'].'. The user will soon get in touch with you mobile number is '.$mem_info['phone_number'].' and invoice number is '.$invoice_number.'.    
';
		$texts=urlencode($text);
		$data="username=".$loginID."&password=".$password."&from=".$from."&to=".$as_info['astro_phone']."&text=".$texts."&coding=".$coding;
		$url = "http://49.50.67.32/smsapi/httpapi.jsp?".$data;//die;
		
		$ch = curl_init();
		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		// grab URL and pass it to the browser
		curl_exec($ch);
		curl_close($ch);
		
		//google notification
		define( 'API_ACCESS_KEY', 'AAAAlg6tEcs:APA91bFupx0C6k5JtQ7ST1RHcR4qteZMbAYesycTEV9S0xzwjWx0VldXmxr-vvNVczmpREupIUXysC-8Hb0ukjp_z0kdYm_Dtph-8_zeP88RTKyalz4wMtf4Doq1xMDkQVribPV6JjF9');
		  $msg = array
          (
			'body' 	=>  $text,
			'title'	=> 'New Booking',
          );
          $fields = array
			(
				'to'		=> 'coWfoxwxyZI:APA91bGuf7tWskEd1ZyWpAvvV0XF3o51kOmoy--1P6ajqyrXh45klzfnkAr8mT1VHF985gpxNeKQ-D--7dWktZHcqDV-LibFjPiP8F9iO6vtgj77rd3VryF3a8oMnoSEFITvM_ept6FB',
				'notification'	=> $msg
			);
		 $headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
			
		#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		echo $result;
		curl_close( $ch );	
	
					
}
  
	
}
?>