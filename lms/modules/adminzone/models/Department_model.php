<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Department_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_exam_type($lession_id)
	{
		$data  = array('lession_id'=>$lession_id);
		$query = $this->db->get_where('tbl_lession',$data);
		$res   = $query->result_array();
		if(is_array($res) && !empty($res))
		{
			$result = $res[0]['exam_type'];
			return $result;
		}
		else
		{
			return 2;
		}
	}
	
	
	public function get_level_by_questionid($question_id)
	{
		$data  = array('question_id'=>$question_id);
		$query = $this->db->get_where('tbl_question',$data);
		$res   = $query->result_array();
		$result = $res[0]['lession_id'];
		return $result;
	}
	
	public  function question_list($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{			
			$result =  $this->db->get_where('tbl_question',$page)->result_array();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}		
	}
	
	public function  get_question_by_id($option)
	{
		$que=$this->db->get_where('tbl_question',$option);
		return $que->result_array();
		
	}
	
	public function get_dept()
	{
		$this->db->order_by("sort_order","asc");
		$this->db->where('status !=','2');
		$que=$this->db->get('tbl_department');
		return $que->result_array();
	}
	public function get_dept_id($page=array())
	{
		if( is_array($page) && !empty($page) )
		{			
			$result =  $this->db->get_where('tbl_department',$page)->result_array();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}		
		
	}
	public function fetch_subject_by_dept($id)
	{
		$que=$this->db->get_where('tbl_subject',$id);
		return $que->result_array();
	}
	
	public function fetch_lession_by_dept($id)
	{
		$this->db->order_by("lession_id","asc");
		$this->db->where('subject_id',$id);
		$que=$this->db->get('tbl_lession');
		return $que->result_array();
	}
	
	public  function fetch_subject($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{			
			$result =  $this->db->get_where('tbl_subject',$page)->result_array();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
		}	
	}
	
	public  function fetch_lession_by_id($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{			
			$result =  $this->db->get_where('tbl_lession',$page)->result_array();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
			
		}	
			
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
		
	public function get_featured_category($parent_id,$limit)
	{		
		$condtion = "status = '1'  AND  parent_id='".$parent_id."'";
		$fetch_config = array(
		                      'fields'=>'cat_name,cat_id',
													'condition'=>$condtion,
													'order'=>"display_order ASC ",
													'limit'=>$limit,
													'start'=>'0',							 
													'debug'=>FALSE,
													'return_type'=>"array"							  
												);		
		$result = $this->findAll('tbl_department',$fetch_config);
		return $result;	
	}
}
// model end here