<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Category_model extends MY_Model

{



	public function __construct()

	{

		parent::__construct();

	}

	

	

	public function getcategory($opts=array())

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

			//$opts['condition'].= " AND category_name like '%".$keyword."%'";

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

		$result = $this->findAll('wl_categories as a',$fetch_config);

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

			$result = $this->find('wl_categories',$fetch_config);

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

		$result = $this->findAll('wl_categories',$fetch_config);

		return $result;	

	}

	

 public function get_cat_name($limit='10',$offset='0',$param=array())
	 {		
		$status			    =   @$param['status'];	
		$keyword			=   @$param['keyword'];	
		if($keyword!='')
		{
			$this->db->like('category_name',"$keyword");
		}
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_categories');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}	

	

}

// model end here