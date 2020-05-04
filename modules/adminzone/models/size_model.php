<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Size_model extends MY_Model{

   public function __construct(){
   
     parent::__construct();
	 
   }
	

	public function get_size($offset=FALSE,$per_page=FALSE)
	{
	   
	    $keyword = $this->db->escape_str(trim($this->input->get_post('keyword',TRUE)));
	   
		$condtion = ($keyword!='')?"status !='2' AND size_name  like '%".$keyword."%' ":"status !='2'";
				
		$fetch_config = array(
							  'condition'=>$condtion,
							  'order'=>"size_id DESC",
							  'limit'=>$per_page,
							  'start'=>$offset,							 
							  'debug'=>FALSE,
							  'return_type'=>"array"							  
							  );		
		$result = $this->findAll('wl_size',$fetch_config);
		return $result;	
		
	
	}
	
	
	public function get_size_by_id($id)
	{
		
		$id = (int) $id;
	    
		if($id!='' && is_numeric($id))
		{
			
			$condtion = "status !='2' AND size_id=$id";
			
			$fetch_config = array(
							  'condition'=>$condtion,							 					 
							  'debug'=>FALSE,
							  'return_type'=>"object"							  
							  );
			
			$result = $this->find('wl_size',$fetch_config);
			return $result;		
		
		 }
		
	}
	
	
	
}