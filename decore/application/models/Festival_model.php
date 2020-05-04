<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Festival_model extends CI_Model
 {
	 public function get_festival($param=array())
	 {		
		$status			    =   @$param['status'];	
		$id			        =   @$param['id'];
		$month			        =   @$param['month'];	
		$year			        =   @$param['year'];	
		
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);
			
	    if($status!='')
		{
			$this->db->where("status","$status");
		}
		
		 if($id!='')
		{
			$this->db->where("festival_id","$id");
		}
		
		if($month!='')
		{
			$this->db->where("month","$month");
		}
		
		if($year!='')
		{
			$this->db->where("year","$year");
		}
		
		if($keyword!='')
		{
			$this->db->like('call_package_name',"$keyword");
		}
				
		//$this->db->order_by('sort_order');
	//	$this->db->order_by('dates',"ASC");
		
		//$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_festival');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		//$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
}
?>