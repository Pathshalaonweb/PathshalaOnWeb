<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Members_model extends MY_Model
 {

		 
	 public function get_members($limit='10',$offset='0',$param=array())
	 {		
		
		$status			    =   @$param['status'];	
		$customer_id		=   @$param['customer_id'];		
		$keyword			=   trim($this->input->get_post('keyword',TRUE));		
		$keyword			=   $this->db->escape_str($keyword);
		
		if($customer_id!='')
		{
			$this->db->where("customers_id","$customer_id");
		}		
		if($status!='')
		{
			$this->db->where("status","$status");
		}
		
		if($keyword!='')
		{
			
			$this->db->where("(user_name LIKE '%".$keyword."%' OR CONCAT_WS(' ',first_name,last_name) LIKE '%".$keyword."%' OR gender LIKE '%".$keyword."%' )");
			
		}
		
     	$this->db->order_by('customers_id','desc');	
		$this->db->limit($limit,$offset);
		$this->db->select("SQL_CALC_FOUND_ROWS *,CONCAT_WS(' ',first_name) AS name ",FALSE);
		$this->db->from('wl_customers');
		$this->db->where('status !=','2');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
				
	}
	
	public function get_member_row($id,$condtion='')
	{
		$id = (int) $id;
		
		if($id!='' && is_numeric($id))
		{
			$condtion = "status !='2' AND customers_id=$id $condtion ";
			
			$fetch_config = array(
			  'condition'=>$condtion,							 					 
			  'debug'=>FALSE,
			  'return_type'=>"array"							  
			);
			
			$result = $this->find('wl_customers',$fetch_config);
			return $result;		
		}
	
	}
	
	
	
	public function get_member_address_book($customer_id,$address_type='',$default_status='Y')
	{
		$customer_id = (int) $customer_id;
		
		if($customer_id!='' )
		{
			$condtion = "customer_id =$customer_id AND default_status='$default_status'  ";
			
			if( $address_type!='')
			{
				
				$condtion .= "AND address_type ='$address_type'";
			}
			
			$fetch_config = array(
			  'condition'=>$condtion,							 					 
			  'debug'=>FALSE,
			  'return_type'=>"array"							  
			);
			
			$result = $this->findAll('wl_customers_address_book',$fetch_config);
			return $result;		
		}
	
	}
	
	
	public function get_wislists($offset=FALSE,$per_page=FALSE)
	{
		
			$keyword = trim($this->db->escape_str($this->input->post('keyword')));
			
			$from_date = $this->input->post('from_date');
			$to_date   = $this->input->post('to_date');
			
			$condition="wp.status ='1' AND wis.customer_id = ".$this->session->userdata('user_id');
			
			if($keyword!='')
			{
			    $condition.=" AND ( wp.product_name LIKE '%".$keyword."%' OR wp.product_code LIKE '%".$keyword."%' ) ";
			}
			if($from_date!='' ||  $to_date!='')
			{
				$condition_date=array();
				$condtion.=" AND (";
				if($from_date!='')
				{
				   $condition_date[]="wis.wishlists_date_added>='$from_date'";
				}
				else
				{
				   $condition_date[]="wis.wishlists_date_added<='$to_date'";
				}
				  $condtion.=implode(" AND ",$condition_date)." )";
			}
			$opts=array(
			'condition'=>$condition,
			'limit'=>$per_page,
			'offset'=>$offset,
			'fromcond'=>'wl_products AS wp',
			'selectcond'=>'wp.*,wis.wishlists_date_added,wis.wishlists_id',
			'joins'=>array(array('tblname'=>'wl_wishlists AS wis','jclause'=>'wis.product_id=wp.products_id'))	
			);	
			return $this->myCustomJoin($opts);
	}
	
	
	
	public function get_payment_master($ordId)
	{		
		$id = (int) $ordId;
		if($id!='' && is_numeric($id))
			{
				$condtion = "id =$id";
				$fetch_config = array(
					'condition'=>$condtion,							 					 
					'debug'=>FALSE,
					'return_type'=>"array"							  
				);
				$result = $this->find('wl_student_credit_record',$fetch_config);
				return $result;		
			}
		}

	
	
	
	 public function get_credit($offset='0',$per_page='10',$param=array()){
	
		$status			    =   @$param['status'];	
		$id			        =   @$param['pid'];	
		$student_id			=   @$param['student_id'];	
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);
		if($id!='')
		{
			$this->db->where("id","$id");
		}
		if($student_id!='')
		{
			$this->db->where("student_id","$student_id");
		}
	    if($status!='')
		{
			$this->db->where("status","$status");
		}
		if($keyword!='')
		{
			$this->db->like('name',"$keyword");
		}
		//$this->db->order_by('sort_order');
		$this->db->order_by('id',"DESC");
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_student_credit_record');
		$q=$this->db->get();
		echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
	 
}