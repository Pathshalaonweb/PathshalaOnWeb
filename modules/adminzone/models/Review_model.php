<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Review_model extends MY_Model
 {
	 public function get_review($limit='10',$offset='0',$param=array())
	 {		
		$status			    =   @$param['status'];	
		$id			        =   @$param['id'];	
		$customer_id		=   @$param['customer_id'];	
		$entity_id			=   @$param['entity_id'];	
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);
		if($id!='')
		{
			$this->db->where("rate_id","$id");
		}
		if($customer_id!='')
		{
			$this->db->where("customer_id","$customer_id");
		}
		if($entity_id!='')
		{
			$this->db->where("entity_id","$entity_id");
		}
		if($status!='')
		{
			$this->db->where("status","$status");
		}
		$this->db->order_by('rate_id',"DESC");
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_rating');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
}
?>