<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tips_model extends CI_Model
 {
	 public function get_tips($param=array())
	 {		
		$status			    =   @$param['status'];	
		$id			        =   @$param['id'];	
		
		
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);
			
	    if($status!='')
		{
			$this->db->where("status","$status");
		}
		
		 if($id!='')
		{
			$this->db->where("tips_id","$id");
		}
		
			
		$this->db->order_by('sort_order');
		$this->db->order_by('tips_id',"DESC");
		
		//$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_tips');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		//$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
}
?>