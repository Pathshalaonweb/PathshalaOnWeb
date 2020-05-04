<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Credit_model extends MY_Model
{
	public function get_credit($limit='10',$offset='0',$param=array())
	{		

		$status			    =   @$param['status'];	
		$teacher_id			=   @$param['teacher_id'];
		$id			        =   @$param['id'];
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
		if($status!='')
		{
			$this->db->where("status","$status");
		}
		
		//$this->db->order_by('sort_order');
		$this->db->order_by('id',"DESC");
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_teacher_cradit_recode');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
	
	public function get_plan_credit($limit='10',$offset='0',$param=array())
	{		

		$status			    =   @$param['status'];	
		$teacher_id			=   @$param['teacher_id'];
		$plan_id			=   @$param['plan_id'];
		$id			        =   @$param['id'];
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
		if($plan_id!='')
		{
			$this->db->where("plan_id","$plan_id");
		}
		if($status!='')
		{
			$this->db->where("payment_status","$status");
		}
		//$this->db->order_by('sort_order');
		$this->db->order_by('id',"DESC");
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_teacher_plan_history');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
}
?>