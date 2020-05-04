<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Order extends  REST_Controller 
{
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('order_model'));
	    
	}


    public function order_listing_post(){
        
         $fromDate     = strip_tags($this->post('fromDate'));
         $toDate       = strip_tags($this->post('toDate'));
         $customer_id  = strip_tags($this->post('customer_id'));
         
       if(!empty($fromDate) && !empty($toDate)){
            $condition=array(
                'fromDate' =>$fromDate,
                'toDate'   =>$toDate,
                "customer_id"=>$customer_id,
                'payment_type'=>'0'
                );
          $res_array              	= $this->order_model->get_order($condition);
          
          }else{
           $condition=array(
               "customer_id"=>$customer_id,
               'payment_type'=>'0'
               );
            $res_array              	= $this->order_model->get_order($condition);
          }
	
        if($res_array){
			
				 $this->response([
                    'status' => "1",
                    'message' => 'successfully.',
                    'data' => $res_array,
                   // 'msg' => $ab,
                ], 
				REST_Controller::HTTP_OK);
			}else{
			    $this->response([
                    'status' => "0",
                    'message' => "Not .",
                    ]
				, REST_Controller::HTTP_OK);
			
		}
    }


 public function recharge_history_post(){
        
         $fromDate     = strip_tags($this->post('fromDate'));
         $toDate       = strip_tags($this->post('toDate'));
         $customer_id  = strip_tags($this->post('customer_id'));
         
         if(!empty($fromDate) && !empty($toDate)){
            $condition=array(
                'fromDate' =>$fromDate,
                'toDate'   =>$toDate,
                "customer_id"=>$customer_id,
                'payment_type'=>'1'
                );
            
            $res_array              	= $this->order_model->get_order($condition);
          }else{
           $condition=array(
               "customer_id"=>$customer_id,
               'payment_type'=>'1'
               );
            $res_array              	= $this->order_model->get_order($condition);
          }
          
        if($res_array){
			
				 $this->response([
                    'status' => "1",
                    'message' => 'successfully.',
                    'data' => $res_array,
               ], 
				REST_Controller::HTTP_OK);
			}else{
			    $this->response([
                    'status' => "0",
                    'message' => "Not.",
                    ]
				,REST_Controller::HTTP_OK);
			
		}
    }







	public function add_order_post(){
		
		$userId     = strip_tags($this->post('customers_id'));
		$pagesId     = strip_tags($this->post('pages_id'));
		$payment_method = strip_tags($this->post('payment_method'));
		
		$address 	= strip_tags($this->post('address'));
		//$type 			= strip_tags($this->post('type'));
	  //$first_name = strip_tags($this->post('first_name'));
     // $email 		= strip_tags($this->post('email'));
    //  $phone 		= strip_tags($this->post('phone'));
		
		
	//	$taxRate 	    = strip_tags($this->post('taxRate'));
   //	$totalAmount 	= strip_tags($this->post('totalAmount'));
  //	$price 			= strip_tags($this->post('price'));
		
	
		//$productname 	= strip_tags($this->post('name'));
		
		
		if(!empty($pagesId) && !empty($userId)){
		
    		$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$userId."'");
    		$page_info=get_db_single_row('wl_pages',$fields="*",$condition="WHERE 1 AND pages_id='".$pagesId."'");
    		
    		$invoice_number    = "Wl_".get_auto_increment('wl_order');	
    		$tax_res    =  get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
    		$tax_amount=$tax_res['tax_rate']*$page_info['price']/100;
		    
		    $totalAmount=$page_info['price']+$tax_amount;
			
			//	echo_sql();die;
			
		$data_order = 
				   array(
				    'customers_id'        => $userId,
				    'pages_id'            => $pagesId,
					'invoice_number'      => $invoice_number,					
					'first_name'          => $mem_info['first_name'],
					'last_name'           => $mem_info['last_name'],
					'phone'				  => $mem_info['phone_number'],
					'email'               => $mem_info['user_name'],
					'address'			  => $address,
					'productinfo'		  => $page_info['friendly_url'],	
					'tax_amount'     	  => $tax_amount,
					'tax_type'     		  => $tax_res['tax_type'],
					'currency_code'		  => 'INR',
					'total_amount'        => $totalAmount,
					'recharge_ammount'	  => $page_info['price'],
					'order_received_date' => $this->config->item('config.date.time'),
					'payment_method'      => $payment_method,
					'payment_status'      => 'Unpaid',
					'page_type'			  => $page_info['page_type'],
					'payment_type'		  => '0',
					//payment type 0 for shop
				);
			$insert=$this->db->insert('wl_order',$data_order);
			if($insert){
			    $id1=$this->db->insert_id();
			    
			    $arr=array(
                    'ORDER_ID'=>"$id1",
                    //'BookingId'=>"$id",
                    'CUST_ID'=>"$userId",
                    'totalAmount'=>"$totalAmount",
                 );
			    
				 $this->response([
                    'status' => "1",
                    'message' => 'Insert successfully.',
                    'paytmData'=> $arr
                    
                ], REST_Controller::HTTP_OK);
			}
		
		}else{
		    $arr=array('key'=>"22");
			$this->response([
                    'status' => "0",
                    'message' => "Not inserted.",
                    'paytmData'=> $arr
                    ]
				, REST_Controller::HTTP_OK);
		}
		
	}
	
	
	public function update_order_post(){
		 
		$orderid     = strip_tags($this->post('ORDERID')); 
		$TXNID     = strip_tags($this->post('TXNID'));
		
		if(!empty($orderid)){
		
		 		$data  = array(
			        'transaction_id'    =>$TXNID ,
			       // 'payment_method'    =>"paytm",
			        'payment_status'    =>'Paid',
			        'bank_ref_num'      => $this->post('BANKTXNID') ,
			        'bankcode'          => $this->post('BANKNAME') ,
			        'payment_received_date'=>$this->config->item('config.date.time'),
			        'ip_address'		=>$this->input->ip_address(),
			        );
				
			 
			 $this->db->where('order_id',$orderid);
			$update= $this->db->update('wl_order',$data);
			 
			 
			 if($update){
				 $ordmaster=get_db_single_row('wl_order',$fields="*",$condition="WHERE 1 AND order_id='".$orderid."'");
				// $this->sms_for_services($ordmaster);
				$arr=array('orderId'=>$orderid);
			 $this->response([
			     
                    'status' =>   "1",
                    'message' =>  'Updated successfully.',
                    'orderId'    =>  $orderid,
                ], REST_Controller::HTTP_OK);
			 }
			 
		}else{
			$arr=array('orderId'=>$orderid);
			$this->response([
                    'status' => "0",
                    'message' => "Not updated.",
                    'orderId'    =>  $orderid
                    ]
				, REST_Controller::HTTP_OK);
			
		}
					
					
	}
	
	
	public function addEwallet_post(){
	    
	     $userId     = trim(strip_tags($this->post('customers_id')));
	     $amount     = strip_tags(strip_tags($this->post('amount')));
	     
	     if(!empty($userId) && !empty($amount)){
	         
	     $mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$userId."'");
	     $invoice_number    = "Wl_".get_auto_increment('wl_order');
	     
		 $data_order = 
				   array(
				    'customers_id'        => $userId,
					'astrologer_id'		  => '0',
					'invoice_number'      => $invoice_number,					
					'first_name'          => $mem_info['first_name'],
					'last_name'           => $mem_info['last_name'],
					'phone'				  => $mem_info['phone_number'],
					'email'               => $mem_info['user_name'],
					'address'			  => '',
					'productinfo'		  => "Ewallet rechange",	
					'tax_amount'     	  => "0.00",
					'tax_type'     		  => "no",
					//'currency_code'		  => $this->session->userdata('currency_code'),//
					//'currency_value'	  => $this->session->userdata('currency_value'),
					'total_amount'        => $amount,
					'recharge_ammount'	  => $amount,
					'order_received_date' => $this->config->item('config.date.time'),
					'payment_method'      => $this->post('payment_method'),
					'payment_status'      => 'Unpaid',
					'page_type'			  => '',
					'payment_type'		  => '1',
					//payment type 0 for shop
				);
				$orderId = $this->order_model->safe_insert('wl_order',$data_order);
				if($orderId){
				    $ordmaster=get_db_single_row('wl_order',$fields="*",$condition="WHERE 1 AND order_id='".$orderId."'");
				   // $this->sms_for_services($ordmaster);
			 	   $arr=array('orderId'=>$orderId);
			      $this->response([
			        'status' =>   "1",
                    'message' =>  'Insert successfully.',
                    'data'    =>  $ordmaster,
                ], REST_Controller::HTTP_OK);
			 } else{
			     
			      $arr=array('key'=>22);
			      $this->response([
			        'status' =>   "1",
                    'message' =>  'Updated successfully.',
                    'data'    =>  $arr,
                ], REST_Controller::HTTP_OK);
			 }
					
	    }
	    
	}
	
	
	public function updateEwallet_post(){
	    
	    $userId     = trim(strip_tags($this->post('customers_id')));
	   	$orderid    = strip_tags($this->post('ORDERID')); 
		$TXNID      = strip_tags($this->post('TXNID'));
		
		if(!empty($orderid)){
		
		 		$data  = array(
			        'transaction_id'    =>$TXNID ,
			       // 'payment_method'    =>"paytm",
			        'payment_status'    =>'Paid',
			        'bank_ref_num'      => $this->post('BANKTXNID') ,
			        'bankcode'          => $this->post('BANKNAME') ,
			        'payment_received_date'=>$this->config->item('config.date.time'),
			        'ip_address'		=>$this->input->ip_address(),
			        );
				
			 
			$this->db->where('order_id',$orderid);
			$update= $this->db->update('wl_order',$data);
			$ordmaster   = $this->order_model->get_order_master($orderid);
			$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$userId."'");
			$add_balance	= $mem_info['ewallet']+$ordmaster['total_amount'];	
			$cust_data=array('ewallet'=>$add_balance);
			$where1 = "customers_id = '$userId' ";
			$this->order_model->safe_update('wl_customers',$cust_data,$where1,FALSE); 
			
		//	echo_sql();
			
			if($update){
				 $ordmaster=get_db_single_row('wl_order',$fields="*",$condition="WHERE 1 AND order_id='".$orderid."'");
				// $this->sms_for_services($ordmaster);
			    $this->response([
			        'status' =>   "1",
                    'message' =>  'Updated successfully.',
                    'data'    =>  $ordmaster,
                ], REST_Controller::HTTP_OK);
			 }
			 
		}else{
			$arr=array('key'=>22);
			$this->response([
                    'status' => "0",
                    'message' => "Not updated.",
                    'orderId'    =>  $arr
                    ]
				, REST_Controller::HTTP_OK);
			
		}
	}
	

public function ewalletSms_post(){
   
   	$orderid     = strip_tags($this->post('ORDERID'));
   	if(!empty($orderid)){
    $ordmaster   = $this->order_model->get_order_master($orderid);
    $userId      = $ordmaster['customers_id'];
	$mem_info=get_db_single_row('wl_customers',$fields="*",$condition="WHERE 1 AND customers_id='".$userId."'");
	
	$loginID="SEOINDIA";
	$password="123123";
	$coding="0";
	$from='astrop';
	
	
	$text='Dear User,    
    Thank you for your E-Wallet recharge  details are as follows your E-wallet is '.$mem_info['ewallet'].' :
    Invoice Id='.$ordmaster['invoice_number'].',
    Transaction Id='.$ordmaster['transaction_id'].',
    Payment Status='.$ordmaster['payment_status'].',
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

   	}

    }



public function sms_for_services_post(){
    $orderid     = strip_tags($this->post('orderId')); 
	$ordmaster=get_db_single_row('wl_order',$fields="*",$condition="WHERE 1 AND order_id='".$orderid."'");
	
	$loginID="SEOINDIA";
	$password="123123";
	$coding="0";
	$from='astrop';
	
	
	$text='Dear User,    
Thank you for your purchase / booking of  '.$ordmaster['productinfo'].' from Astropatrika. We are delighted that you choose us! Your order details are as follows:
Invoice Id='.$ordmaster['invoice_number'].',
Transaction Id='.$ordmaster['transaction_id'].',
Payment Status='.$ordmaster['payment_status'].',
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

//__________________________sms end___________________________
}	
	
}
?>