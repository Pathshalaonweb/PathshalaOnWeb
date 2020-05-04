<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class online_puja_model extends MY_Model
 {
	 
	 public function get_online_puja($param=array()){		
		$status			    =   @$param['status'];	
		$id			        =   @$param['id'];
		$subcategory_id		=   @$param['subcategory_id'];
		$friendly_url		=   @$param['friendly_url'];
		$popular_pages		=   @$param['popular_pages'];
		$where			    =	@$param['where'];	
		
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);
			
	    if($status!='')
		{
			$this->db->where("status","$status");
		}
		
		if($id!=''){
			$this->db->where("pages_id","$id");
		}
		
		if($subcategory_id!=''){
			$this->db->where("subcategory_id","$subcategory_id");
		}
		
		if($where!=''){
			$this->db->where($where);
		}
		
		if($popular_pages!=''){
			$this->db->where("popular_pages","$popular_pages");
		}
		
		if($friendly_url!=''){
			$this->db->where("friendly_url","$friendly_url");
		}
		
		
		if($keyword!='')
		{
			$this->db->like('pages_name',"$keyword");
		}
		
		$this->db->where("page_type","2");		
		$this->db->order_by('sort_order');
		$this->db->order_by('pages_id',"DESC");
		
	//	$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_pages');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		//$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
	
	
	
	
	public function getpuja($opts=array()){
		$keyword = trim($this->input->get_post('keyword',TRUE));		
		$keyword = $this->db->escape_str($keyword);
		$status = $this->db->escape_str($this->input->get_post('status',TRUE));
		
		
		
		if(!array_key_exists('condition',$opts) || $opts['condition']=='')
		{
			$opts['condition']= "status !='2'  And page_type ='2'  ";
			
		}else{
			$opts['condition']= "status !='2'  And page_type ='2' ".$opts['condition'];
		}
		
		if($keyword!='')
		{
			$opts['condition'].= " AND pages_name like '%".$keyword."%'";
		}
		
		if($status!=''){
			$opts['condition'].= " AND status='$status' ";
		}
				
		//$opts['condition']=" page_type= '0'";
		
	    $opts['order']= "sort_order ASC";		
		$opts['type']= "";
		$opts['condition'].= " ";
		
			$fetch_config = array('condition'=>$opts['condition'],
								'order'=>$opts['order'],
								//'type' => $opts['type'],								
								'return_type'=>"array" );	
								
		if(array_key_exists('debug',$opts) )
		{			
			$fetch_config['debug']=$opts['debug'];
		}
		
		
		if(array_key_exists('field',$opts) && $opts['field']!='' )
		{			
			$fetch_config['field']=$opts['field'];
		}
												
		if(array_key_exists('limit',$opts) && applyFilter('NUMERIC_GT_ZERO',$opts['limit'])>0)
		{
			
			$fetch_config['limit']=$opts['limit'];
		}	
		if(array_key_exists('offset',$opts) && applyFilter('NUMERIC_WT_ZERO',$opts['offset'])!=-1)
		{
			$fetch_config['start']=$opts['offset'];
		}		
		$result = $this->findAll('wl_pages as a',$fetch_config);
		return $result;
	}
	
	public function get_puja_by_id($id)
	{
		$id = applyFilter('NUMERIC_GT_ZERO',$id);
		
		if($id>0)
		{
			$condtion = "status !='2' AND pages_id=$id";
			$fetch_config = array(
														'condition'=>$condtion,							 					 
														'debug'=>FALSE,
														'return_type'=>"array"							  
													 );
			$result = $this->find('wl_pages',$fetch_config);
			return $result;
		}
	}
	
}
?>