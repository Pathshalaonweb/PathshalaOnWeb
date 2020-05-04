<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mock_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_test_by_id($id)
	{
		$data= array('mock_id'=>$id);
		$query =	$this->db->get_where('tbl_mock',$data);
		$result= $query->result_array();
		return $result = $result[0];	
	}
	
	public function get_test($id)
	{
	    $data=array('department_id'=>$id);
		$que=$this->db->get_where('tbl_mock',$data);
		return $que->result_array();
	}
	public function question_list($id)
	{  
		$que=$this->db->get_where('tbl_mock_question',$id);
		return $que->result_array();
	}
	
	public function  get_question_by_id($option)
	{
		$que=$this->db->get_where('tbl_mock_question',$option);
		return $que->result_array();
		
	}
	
	public function get_dept()
	{
		$this->db->order_by("sort_order","asc");
		$this->db->where('status !=','2');
		$que=$this->db->get('tbl_department');
		return $que->result_array();
	}
	public function fetch_subject_by_testId($id)
	{
		$que=$this->db->get_where('tbl_mock_subject',$id);
		return $que->result_array();
	}
	public function fetch_lession_by_dept($id)
	{
		$que=$this->db->get_where('tbl_lession',$id);
		return $que->result_array();
	}
	
	public function get_category($opts=array())
	{
		$keyword = trim($this->input->get_post('keyword',TRUE));		
		$keyword = $this->db->escape_str($keyword);
		$status = $this->db->escape_str($this->input->get_post('status',TRUE));
		
		if(!array_key_exists('condition',$opts) || $opts['condition']=='')
		{
			$opts['condition']= "status !='2' ";
			
		}else
		{
			$opts['condition']= "status !='2' ".$opts['condition'];
		}
		
		if($keyword!='')
		{
			$opts['condition'].= " AND category_name like '%".$keyword."%'";
		}
		
		if($status!='')
		{
			$opts['condition'].= " AND status='$status' ";
		}
				
		
	    $opts['order']= "sort_order ASC ";		
		
		$opts['condition'].= " ";
		
			$fetch_config = array('condition'=>$opts['condition'],
								'order'=>$opts['order'],								
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
		$result = $this->findAll('tbl_department as a',$fetch_config);
		return $result;
	}

	public function get_category_by_id($id)
	{
		$id = applyFilter('NUMERIC_GT_ZERO',$id);
		
		if($id>0)
		{
			$condtion = "status !='2' AND category_id=$id";
			$fetch_config = array(
														'condition'=>$condtion,							 					 
														'debug'=>FALSE,
														'return_type'=>"array"							  
													 );
			$result = $this->find('tbl_department',$fetch_config);
			return $result;
		}
	}
}
// model end here