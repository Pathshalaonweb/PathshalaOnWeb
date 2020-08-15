<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Listclass_model extends MY_Model
{
	public function get_profile($limit='10',$offset='0',$param=array())
	{		

		
		$teacher_id			=   @$param['teacher_id'];
		$id			        =   @$param['id'];
		$class_title	    =   @$param['class_title'];		
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
		if($class_title!='')
		{
			$this->db->where("class_title","$class_title");
		}
		if($class!='')
		{
			$this->db->where("class","$class");
		}
		if($class_schedule_time!='')
		{
			$this->db->where("class_schedule_time","$class_schedule_time");
		}
		if($class_duration!='')
		{
			$this->db->where("class_duration","$class_duration");
		}
	    if($class_date!='')
		{
			$this->db->where("class_date","$class_date");
		}
		 if($class_credit_amount!='')
		{
			$this->db->where("class_credit_amount","$class_credit_amount");
		}
	
		
		//$this->db->order_by('sort_order');
		$this->db->order_by('id',"DESC");
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_addclass');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
	
	public function did_delete_row($id){
		$this->db->where('teacher_id', $id);
		$this->db-> delete('wl_addclass');
	}
}
?>