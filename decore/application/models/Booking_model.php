<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Booking_model extends MY_Model {

     public function get_booking($param=array())
	 {		
		$status			    =   @$param['status'];	
		$id			        =   @$param['id'];
		$customer_id		=   @$param['customer_id'];	//astrologer_id
		$astrologer_id		=   @$param['astrologer_id'];
		$diverted_to		=   @$param['diverted_to'];
		$samecall		    =   @$param['samecall'];
		$diverted		    =   @$param['diverted'];
		$divertedcall		=   @$param['divertedcall'];//
		
		$booking_status		    =   @$param['booking_status'];
		
		
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);
		
		
		$fromDate = @$param['fromDate'];
		$toDate   = @$param['toDate'];
	//	$reference = $this->db->escape_str(trim($this->input->get_post('refrance',TRUE)));
		
		if($fromDate!='' ||  $toDate!=''){
			$this->db->where('order_received_date BETWEEN "'. date('Y-m-d', strtotime($fromDate)). '" and "'. date('Y-m-d', strtotime($toDate)).'"');
		}
		
		if($astrologer_id!='')
		{
			$this->db->where("astrologer_id","$astrologer_id");
		}
		
		if($booking_status!='')
		{
			$this->db->where("booking_status","$booking_status");
		}
		
		if($divertedcall!='')
		{
			$this->db->where("diverted_to!=",$astrologer_id);
		}
		
		
		if($diverted_to!='')
		{
			$this->db->where("diverted_to!= ","$diverted_to",FALSE);
		}
		
		if($samecall!='')
		{
			$this->db->where("diverted_to","$samecall");
		}
		
		if($customer_id!=''){
			$this->db->where("customer_id","$customer_id");
		}
		
		if($astrologer_id!=''){
			$this->db->where("astrologer_id","$astrologer_id");
		}		
		//$this->db->order_by('sort_order');
		$this->db->order_by('booking_id',"DESC");
		
		//$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_astro_booking');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		//$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
	
	 public function get_orders_booking($condition=''){
	   
		 $keyword   = $this->db->escape_str(trim($this->input->post('keyword',TRUE)));
		 $from_date = $this->db->escape_str(trim($this->input->post('fromDate',TRUE)));
		 $to_date   = $this->db->escape_str(trim($this->input->post('toDate',TRUE)));
		 
	     $condition=" 1 $condition ";
		
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
			$condition.=" AND ( invoice_id LIKE '%".$keyword."%' OR    email LIKE '%".$keyword."%'  OR  phone LIKE '".$keyword."%' OR  booking_status LIKE '".$keyword."%' ) ";
		}
		$fetch_config = array(
							  'condition'=>$condition,
							  'order'=>'booking_id DESC',
							  //'limit'=>$per_page,
							 // 'start'=>$offset,							 
							  'debug'=>FALSE,
							  'return_type'=>"array"							  
							  );	
							  
					  
		$result = $this->findAll('wl_astro_booking',$fetch_config);
		//	echo_sql();die;	
		return $result;	
	}

}