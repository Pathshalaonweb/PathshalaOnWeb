<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class location_model extends MY_Model{

 public function get_location($limit='10',$offset='0',$param=array()){		
		
		$status			    =   @$param['status'];
		$orderby		    =   @$param['id'];	
		$where		        =   @$param['where'];	
		$keyword = $this->db->escape_str($this->input->get_post('keyword',TRUE));
	    if($where!=''){
			$this->db->where($where);
		}
		
		if($keyword!=''){
			$this->db->where("(name LIKE '%".$keyword."%' )");
		}
		/*if($orderby!=''){
			 $this->db->order_by($orderby);
		}else{
		  $this->db->order_by('sort_order','desc');
		}*/
		$this->db->order_by('sort_order',"ASC");
		//$this->db->order_by('id',"DESC");
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from(' tbl_cities');
		$q=$this->db->get();
		//echo_sql();die;
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
	
	
public function get_locations($limit='10',$offset='0',$param=array()){
		$status			    =   @$param['status'];
		$orderby		    =   @$param['id'];	
		$where		        =   @$param['where'];	
		$keyword = $this->db->escape_str($this->input->get_post('keyword',TRUE));
	    if($where!=''){
			$this->db->where($where);
		}
		
		if($keyword!=''){
			$this->db->where("(name LIKE '%".$keyword."%' )");
		}
		
		$this->db->where("state_id IN(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41)");
		
		
		/*if($orderby!=''){
			 $this->db->order_by($orderby);
		}else{
		  $this->db->order_by('id','desc');
		}*/
		$this->db->order_by('sort_order',"DESC");
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from(' tbl_cities');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
			
		}
	
	 
}
?>