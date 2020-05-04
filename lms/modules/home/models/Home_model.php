<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends MY_Model{
	public function get_cat()
	{
		$que=$this->db->get_where('tbl_categories',array('status'=>'1'));
		return $que->result_array();
	}
	
	public function getexamlist() 
	{
		$this->db->select('tbl_categories.category_name,tbl_courses.courses_name');
		$this->db->join('tbl_categories','tbl_categories.category_id=tbl_courses.category_id','left');
		$this->db->where('tbl_courses.status','1');
        $q = $this->db->get('tbl_courses');
		return $q->result_array();
    }
	public function getcontentListing() {
		
       // $query = $this->db->get('tbl_home_contents');
       // return $query->result_array();
    }
	
	public function get_enqueryuserdetail($id)
	{
		$this->db->select('*');
		$this->db->from('tb_enquery');
		$this->db->where('inquery_id',$id);
		$info=$this->db->get()->result_array();
	    return $info;
	}
}
