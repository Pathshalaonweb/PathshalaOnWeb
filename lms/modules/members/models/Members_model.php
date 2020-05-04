<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Members_model extends MY_Model
{

	public function get_mem($id)
	{
		$db2 = $this->load->database('database2', TRUE);
		$con=array('customers_id'=>$id);
		$res=$db2->get_where('wl_customers',$con);
		return 	$res->result_array();
	}

	public function get_members($limit='10',$offset='0',$param=array())
	{		
		$db2 = $this->load->database('database2', TRUE);
		$status			    =   @$param['status'];	
		$customer_id		=   @$param['customer_id'];		
		$keyword			=   trim($this->input->get_post('keyword',TRUE));		
		$keyword			=   $this->db->escape_str($keyword);
		if($customer_id!='')
		{
			$db2->where("customers_id","$customer_id");
		}		
		if($status!='')
		{
			$db2->where("status","$status");
		}
		if($keyword!='')
		{
			$db2->where("(user_name LIKE '%".$keyword."%' OR CONCAT_WS(' ',first_name,last_name) LIKE '%".$keyword."%' OR gender LIKE '%".$keyword."%' )");
		}
     	$db2->order_by('customers_id','desc');	
		$db2->limit($limit,$offset);
		$db2->select("SQL_CALC_FOUND_ROWS *,CONCAT_WS(' ',first_name) AS name ",FALSE);
		$db2->from('tbl_customers');
		$db2->where('status !=','2');
		$q=$db2->get();
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
								  'condition'	=>$condtion,							 					 
								  'debug'		=>FALSE,
								  'return_type'	=>"array"							  
								);
			$result = $this->find('tbl_customers',$fetch_config);
			return $result;		
		}
	}

}