<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Teacherdashboard_model extends MY_Model
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
	
	
	public function get_notified($limit='10',$offset='0',$param=array())
	 {		
		$status			    =   @$param['status'];	
		$id			        =   @$param['id'];
		$teacher_id		    =   @$param['teacher_id'];
		$student_id		    =   @$param['student_id'];			
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);
		if($id!='')
		{
			$this->db->where("id","$id");
		}
		if($teacher_id!='')
		{
			$this->db->where("teacher_id","$teacher_id");
		}
		if($student_id!='')
		{
			$this->db->where("student_id","$student_id");
		}
		if($status!='')
		{
			$this->db->where("status","$status");
		}
		//$this->db->order_by('sort_order');
		$this->db->order_by('id',"DESC");
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_teacher_notified');
		$q=$this->db->get();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
	
	public function teacher_notified($limit='10',$offset='0',$param=array())
	{
		$status			    =   @$param['status'];	
		$student_id			=   @$param['student_id'];
		$teacher_id			=   @$param['teacher_id'];	
		if($status!='')
		{
			$this->db->where("a.status","$status");
		}
		if($student_id!='')
		{
			$this->db->where("a.student_id","$student_id");
		}
		if($teacher_id!='')
		{
			$this->db->where("a.teacher_id","$teacher_id");
		}
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_teacher_notified a');
		$this->db->join('wl_customers c', 'c.customers_id=a.student_id', 'full');
		$this->db->order_by('a.id','asc');         
		$q=$this->db->get(); 
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;	
			
	}
	
	
	
	
	
	
	
	
	
	
	
	
	public function customjoinnew($id)
	{
    	$this->db->select('*');
		$this->db->from('wl_teacher_notified a');
		//$this->db->join('wl_teacher b', 'b.teacher_id=a.teacher_id', 'full');
		$this->db->join('wl_customers c', 'c.customers_id=a.student_id', 'full');
		$this->db->where('a.teacher_id',$id);
	   // $this->db->order_by('c.track_title','asc');         
		$query = $this->db->get(); 
		//echo_sql();
		if($query->num_rows() != 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		
		}
}
}