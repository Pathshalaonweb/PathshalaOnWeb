<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subject_model extends MY_Model
 {

	public function get_subject_list()
	{
		$que=$this->db->get('tbl_subject_list');
		return $que->result_array();
	}
	 public function get_subject_by_id($id)
	 {
		 $que=$this->db->get_where('tbl_subject_list',$id);
		return $que->result_array();
	 }
}