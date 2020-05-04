<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile_model extends MY_Model
{
	public function get_profile($limit='10',$offset='0',$param=array())
	{		

		$status			    =   @$param['status'];	
		$teacher_id			=   @$param['teacher_id'];
		$id			        =   @$param['id'];
		$location		    =   @$param['location'];		
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);
		
		if($teacher_id!='')
		{
			$this->db->where("teacher_id","$teacher_id");
		}
		if($id!='')
		{
			$this->db->where("id","$id");
		}
		if($location!='')
		{
			$this->db->where("location","$location");
		}
		if($subject!='')
		{
			$this->db->where("subject","$subject");
		}
		if($class!='')
		{
			$this->db->where("class","$class");
		}
	    if($status!='')
		{
			$this->db->where("status","$status");
		}
		
		//$this->db->order_by('sort_order');
		$this->db->order_by('id',"DESC");
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_teacher_profile');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
	
	public function did_delete_row($id){
		$this->db->where('teacher_id', $id);
		$this->db-> delete('wl_teacher_profile');
	}
}
?>