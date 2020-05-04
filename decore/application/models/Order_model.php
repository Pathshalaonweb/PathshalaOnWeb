<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order_model extends MY_Model
 {
	 
	 
    public function get_orders($condition=''){
	   
		 $keyword   = $this->db->escape_str(trim($this->input->get_post('keyword',TRUE)));
		 $from_date = $this->db->escape_str(trim($this->input->post('fromDate',TRUE)));
		 $to_date   = $this->db->escape_str(trim($this->input->post('toDate',TRUE)));
		 
		 $condition="order_status !='Deleted' $condition ";
		$condition= "AND payment_type='0'";
		 if($from_date!='' ||  $to_date!=''){
			
			    $condition_date=array();
				$condition.=" AND (";
				if($from_date!=''){
					$condition_date[] = "DATE(order_received_date)>='$from_date'";
				}if($to_date!=''){
					 $condition_date[] ="DATE(order_received_date)<='$to_date'";
				}
				$condition.=implode(" AND ",$condition_date)." )";
		}
			
		if($keyword!=''){
			$condition.=" AND ( invoice_number LIKE '%".$keyword."%' OR  CONCAT_WS(' ',first_name,last_name) LIKE '%".$keyword."%' OR  email LIKE '%".$keyword."%'  OR  payment_status LIKE '".$keyword."%' OR  order_status LIKE '".$keyword."%' ) ";
		}
		$fetch_config = array(
							  'condition'=>$condition,
							  'order'=>'order_id DESC',
							  //'limit'=>$per_page,
							  //'start'=>$offset,							 
							  'debug'=>FALSE,
							  'return_type'=>"array"							  
							  );		
		$result = $this->findAll('wl_order',$fetch_config);
		return $result;	
	}
	
	public function get_recharge($condition=''){
	   
		 $keyword   = $this->db->escape_str(trim($this->input->get_post('keyword',TRUE)));
		 $from_date = $this->db->escape_str(trim($this->input->post('fromDate',TRUE)));
		 $to_date   = $this->db->escape_str(trim($this->input->post('toDate',TRUE)));
		 
		 $condition="order_status !='Deleted' $condition ";
		$condition= " AND payment_type='1'";
		 if($from_date!='' ||  $to_date!=''){
			
			    $condition_date=array();
				$condition.=" AND (";
				if($from_date!=''){
					$condition_date[] = "DATE(order_received_date)>='$from_date'";
				}if($to_date!=''){
					 $condition_date[] ="DATE(order_received_date)<='$to_date'";
				}
				$condition.=implode(" AND ",$condition_date)." )";
		}
			
		if($keyword!=''){
			$condition.=" AND ( invoice_number LIKE '%".$keyword."%' OR  CONCAT_WS(' ',first_name,last_name) LIKE '%".$keyword."%' OR  email LIKE '%".$keyword."%'  OR  payment_status LIKE '".$keyword."%' OR  order_status LIKE '".$keyword."%' ) ";
		}
		$fetch_config = array(
							  'condition'=>$condition,
							  'order'=>'order_id DESC',
							  //'limit'=>$per_page,
							  //'start'=>$offset,							 
							  'debug'=>FALSE,
							  'return_type'=>"array"							  
							  );		
		$result = $this->findAll('wl_order',$fetch_config);
		return $result;	
	}
	
	public function get_order_master($ordId)
		{		
			$id = (int) $ordId;
			if($id!='' && is_numeric($id))
			{
				$condtion = "order_id =$id";
				$fetch_config = array(
				'condition'=>$condtion,							 					 
				'debug'=>FALSE,
				'return_type'=>"array"							  
				);
				
				$result = $this->find('wl_order',$fetch_config);
				return $result;		
			}
		}


  public function get_order($param=array())
	 {		
		$status			    =   @$param['status'];	
		$id			        =   @$param['id'];
		$customer_id		=   @$param['customer_id'];	//astrologer_id//
		$order_status		=   @$param['order_status'];
	    $payment_type	    =   @$param['payment_type'];
	    $astrologer_id	    =   @$param['astrologer_id'];
	    
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);
		
		$fromDate           = @$param['fromDate'];
		$toDate             = @$param['toDate'];

		if($fromDate!='' ||  $toDate!=''){
			$this->db->where('order_received_date BETWEEN "'. date('Y-m-d', strtotime($fromDate)). '" and "'. date('Y-m-d', strtotime($toDate)).'"');
		}
		
		if($astrologer_id!='')
		{
			$this->db->where("astrologer_id","$astrologer_id");
		}
		if($payment_type!='')
		{
			$this->db->where("payment_type","$payment_type");
		}
		if($order_status!='')
		{
			$this->db->where("order_status","$order_status");
		}
		
		if($customer_id!=''){
			$this->db->where("customers_id","$customer_id");
		}
		
		if($id!=''){
			$this->db->where("order_id","$id");
		}		
	
		$this->db->order_by('order_id',"DESC");
		
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_order');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		//$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}



		public function get_order_detail($ordno)
		{
			$condtion = "orders_id ='$ordno' ";
			$fetch_config = array(
				'condition'=>$condtion,
				'order'=>'NULL',
				'limit'=>'NULL',
				'start'=>'NULL',							 
				'debug'=>FALSE,
				'return_type'=>"array"							  
			);	
				
			$result = $this->findAll('wl_orders_products',$fetch_config);
			return $result;	
		}
		
		 
	
	 
 }