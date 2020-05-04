<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Student_model extends MY_Model
 {
		function __construct()
		{
			parent::__construct();
			$db2 = $this->load->database('database2', TRUE);
		}

		public function get_lectureId($id)
		{  
			$data=array('orders_id'=>$id); 
			$this->db->select('products_id');
			$query=$this->db->get_where('tbl_orders_products',$data);
			
		$q=$query->result_array();
			$ord_id=$q[0]['products_id'];
			return $ord_id;
			
		}
	/* public function get_students($limit='10',$offset='0',$param=array())
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
		$this->db->from('tbl_customers');
		$this->db->where('status !=','2');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
				
	}
	*/
	
	/* public function get_students($limit='10',$offset='0',$param=array())
	 {	$db2 = $this->load->database('database2', TRUE);	
		$status			    =   @$param['status'];	
		$id			        =   @$param['pid'];	
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);
	 	if($id!='')
		{
			$this->db2->where("customers_id","$id");
		}
	    if($status!='')
		{
			$this->db2->where("status","$status");
		}
		if($keyword!='')
		{
			$this->db2->like('user_name',"$keyword");
		}
		//$this->db->order_by('sort_order');
		$db2->order_by('customers_id',"DESC");
		$db2->limit($limit,$offset);
		$db2->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$db2->from('wl_customers');
		$q=$db2->get();
//		echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
}*/
	public function get_students()
	{		
		
		$db2 = $this->load->database('database2', TRUE);
     	$db2->order_by('customers_id','desc');	
		$db2->select("SQL_CALC_FOUND_ROWS *,CONCAT_WS(' ',first_name) AS name ",FALSE);
		$db2->from('wl_customers');
		$q=$db2->get();
		$result = $q->result_array();	
		return $result;
	}
	public function get_student_row($id,$condtion='')
	{
		$db2 = $this->load->database('database2', TRUE); 
		$id = (int) $id;
		
		if($id!='' && is_numeric($id))
		{
			$condtion = "status !='2' AND customers_id=$id $condtion ";
			$fetch_config = array(
			  'condition'=>$condtion,							 					 
			  'debug'=>FALSE,
			  'return_type'=>"array"							  
			);
			
		$db2->where('status','1');
		$db2->where('customers_id',$id);
		$db2->from('wl_customers');
		$q=$db2->get();
		$result = $q->result_array();	
			
			//$result = $db2->select('wl_customers',$fetch_config);
			return $result;		
		}
	
	}
	
	public function get_student($limit='10',$offset='0',$param=array())
	{	
		$db2 = $this->load->database('database2', TRUE); 	
		$status			    =   @$param['status'];
		$email			    =   @$param['email'];		
		$id			        =   @$param['id'];	
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);
	 	if($id!='')
		{
			$db2->where("customers_id","$id");
		}
	    if($status!='')
		{
			$db2->where("status","$status");
		}
		if($email!='')
		{
			$db2->where("user_name","$email");
		}
		
		//$this->db->order_by('sort_order');
		$db2->order_by('customers_id',"DESC");
		$db2->limit($limit,$offset);
		$db2->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$db2->from('wl_customers');
		$q=$db2->get();
		//echo $db2->last_query();	die('test1');
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
	
	
	public function get_student_address_book($customer_id,$address_type='',$default_status='Y')
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
			
			$result = $this->findAll('tbl_customers_address_book',$fetch_config);
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
			'fromcond'=>'tbl_products AS wp',
			'selectcond'=>'wp.*,wis.wishlists_date_added,wis.wishlists_id',
			'joins'=>array(array('tblname'=>'tbl_wishlists AS wis','jclause'=>'wis.product_id=wp.products_id'))	
			);	
			return $this->myCustomJoin($opts);
	}
	
	
	
	public function getimage($id)
	{
		$this->db->select('customer_photo');
		$query=$this->db->get_where('tbl_customers',array('user_name'=>$id,'status'=>'1'));
		return $query->result_array();
	}
	
	/*public function get_state()
	{
		$sel_q ="SELECT * FROM `tbl_city` where parent_id='0'";
		$city_res=$this->db->query($sel_q);
		if($city_res->num_rows() > 0)
		{
			return $city_res->result_array();
		}
	}
	*/
	public  function get_state($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{
			$result =  $this->db->get_where('tbl_city',$page)->result_array();
			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}
	}
	 
}