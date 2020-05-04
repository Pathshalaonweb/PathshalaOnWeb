<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog_model extends MY_Model
 {
	 public function get_blog($limit='10',$offset='0',$param=array())
	 {		
		$status			    =   @$param['status'];	
		$id			        =   @$param['pid'];	
		$url			        =   @$param['url'];	
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);
		
		$category            =	trim($this->input->get_post('category_id',TRUE));	
		$category            =   $this->db->escape_str($category);
		
		if($id!='')
		{
			$this->db->where("blog_id","$id");
		}
		if($url!='')
		{
			$this->db->where("url","$url");
		}
		if($category!='')
		{
			$this->db->where("category_id","$category");
		}
			
			
	    if($status!='')
		{
			$this->db->where("status","$status");
		}
		
		if($keyword!='')
		{
			$this->db->like('title',"$keyword");
		}
				
		$this->db->order_by('sort_order');
		$this->db->order_by('blog_id',"DESC");
		
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_blog');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
}
?>