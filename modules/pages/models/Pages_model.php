<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages_model extends MY_Model
{

	public  function get_cms_page($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{			
			$result =  $this->db->get_where('wl_cms_pages',$page)->row_array();
			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}	
	}

	public function get_all_cms_page($offset='0',$limit='10')
	{
		$keyword = $this->db->escape_str($this->input->get_post('keyword'));
		$condtion = ($keyword!='') ? "status !='2' AND page_name LIKE '%".$keyword."%'" :
		"status !='2' ";
		$fetch_config = array(

							  'condition'=>$condtion,

							  'order'=>"page_name DESC",

							  'limit'=>$limit,

							  'start'=>$offset,							 

							  'debug'=>FALSE,

							  'return_type'=>"array"							  

							  );		

		$result = $this->findAll('wl_cms_pages',$fetch_config);

		return $result;	

	

	}

 public function get_cms_page_admin($limit='10',$offset='0',$param=array())
	 {		
		$status			    =   @$param['status'];	
		
		$id			        =   @$param['pid'];	
		
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);
		
		
		 if($id!='')
		{
			$this->db->where("page_id","$id");
		}
			
	    if($status!='')
		{
			$this->db->where("status","$status");
		}
		
		
		
		
		if($keyword!='')
		{
			$this->db->like('page_name',"$keyword");
		}
				
		//$this->db->order_by('sort_order');
		$this->db->order_by('page_id',"DESC");
		
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_cms_pages');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}

	

	

		

}