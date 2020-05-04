<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_model extends MY_Model{

	public function __construct()
	{
		parent::__construct();
	}


	
	
	public function get_gallery($offset=FALSE,$per_page=FALSE)
	{
		
		$keyword = $this->db->escape_str(trim($this->input->get_post('keyword',TRUE)));		
		$condtion = ($keyword!='') ? "status !='2' AND ( gallery_title LIKE '%".$keyword."%') ":"status !='2'";
		
		$fetch_config = array(
		'condition'=>$condtion,
		'order'=>"gallery_id DESC",
		'limit'=>$per_page,
		'start'=>$offset,							 
		'debug'=>FALSE,
		'return_type'=>"array"							  
		);		
		$result = $this->findAll('wl_gallery',$fetch_config);
		return $result;	
		
	}




	
	public function get_gallery_by_id($id)
	{
		
		$id = applyFilter('NUMERIC_GT_ZERO',$id);
		
		if($id>0)
		{
			$condtion = "status !='2' AND gallery_id=$id";
			$fetch_config = array(
			'condition'=>$condtion,							 					 
			'debug'=>FALSE,
			'return_type'=>"object"							  
			);
			$result = $this->find('wl_gallery',$fetch_config);
			return $result;		
		}
		
	}	
	
	
}
// model end here