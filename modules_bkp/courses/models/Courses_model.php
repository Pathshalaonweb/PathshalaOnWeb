<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Courses_model extends MY_Model{

		 
	 public function get_courses($limit='10',$offset='0',$param=array()){
		
		$category_id		=   @$param['category_id'];
		
		$courseid			=   @$param['courseid'];
		
		$pid				=   @$param['pid'];
		
		$orderby			=	@$param['orderby'];	
		
		$status			    =   @$param['status'];	
		$where			    =	@$param['where'];	
		
		
		$keyword			=   trim($this->input->get_post('keyword',TRUE));						
		$keyword			=   $this->db->escape_str($keyword);
		
		
		if($pid!='')
		{
			$this->db->where("wlp.courses_id  ","$pid");
		}
		if($courseid!='')
		{
			$this->db->where("wlp.courses_id  ","$courseid");
		}
		if($status!=''){
			$this->db->where("wlp.status","$status");
		}
		
		
		if($where!=''){
			$this->db->where($where);
		}
		
		
		
		if($category_id!='')
		{
			$this->db->where("wlp.category_id ","$category_id");
		}
		
		
		if($keyword!='')
		{
			$this->db->where("(wlp.course_name LIKE '%".$keyword."%' OR wlp.course_code LIKE '%".$keyword."%' )");
		}
		
		if($orderby!='')
		{		
			$this->db->order_by($orderby);
			
		}
		else
		{
			$this->db->order_by('wlp.courses_id ','desc');
		}
		
	    $this->db->group_by("wlp.courses_id"); 	
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS wlp.*,wlpm.media,wlpm.media_type,wlpm.is_default',FALSE);
		$this->db->from('wl_courses as wlp');
		
		$this->db->where('wlp.status !=','2');
		$this->db->join('wl_courses_media AS wlpm','wlp.courses_id=wlpm.courses_id','left');
		$q=$this->db->get();
		//echo_sql();die('testing');
		$result = $q->result_array();	
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
				
	}
		  
	public function get_course_media($limit='4',$offset='0',$param=array())
    {		  
		
		 $default			    =   @$param['default'];	
		 $courseid			    =   @$param['courseid'];
		 $media_type			=   @$param['media_type'];
		 		
		 if( is_array($param) && !empty($param) )
		 {			
			$this->db->select('SQL_CALC_FOUND_ROWS *',FALSE);
			$this->db->limit($limit,$offset);
			$this->db->from('wl_courses_media');
			$this->db->where('courses_id',$courseid);	
			
			if($default!='')
			{
				$this->db->where('is_default',$default);	
			}
			if($media_type!='')
			{
				$this->db->where('media_type',$media_type);	
			}
							
			$q=$this->db->get();
			$result = $q->result_array();	
			$result = ($limit=='1') ? $result[0]: $result;	
			return $result;	
			
		 }				
		
	}
		
	public function related_courses_added($courseId,$limit='NULL',$start='NULL')
	{
		$res_data =  array();
		$condtion = ($courseId!='') ? "status ='1' AND course_id = '$courseId' ":"status ='1'";
		$fetch_config = array(
													'condition'=>$condtion,
													'order'=>"id DESC",
													'limit'=>$limit,
													'start'=>$start,							 
													'debug'=>FALSE,
													'return_type'=>"array"							  
												 );		
		$result = $this->findAll('wl_courses_related',$fetch_config);
		if( is_array($result) && !empty($result) )
		{
			foreach ($result as $val )
			{ 
				$res_data[$val['id']] =$val['related_id'];
			}
		}
		return $res_data;		
	}
	
	
	
	public function get_related_courses($couserId)
	{
		$condtion = (!empty($couserId)) ? "status !='2'  AND courses_id NOT IN(".implode(",",$couserId). ")" :"status !='2'";
		$fetch_config = array(
													'condition'=>$condtion,
													'order'=>"courses_id DESC",
													'limit'=>'NULL',
													'start'=>'NULL',							 
													'debug'=>FALSE,
													'return_type'=>"array"							  
												 );		
		$result = $this->findAll('wl_courses',$fetch_config);
		
		return $result;	
	}
	
	
	
	public function related_courses($courseId,$limit='NULL',$start='NULL')
	{
		$res_data =  array();
		$condtion = ($courseId!='') ? "status ='1' AND course_id = '$courseId' ":"status ='1'";
		$fetch_config = array(
													'condition'=>$condtion,
													'order'=>"id DESC",
													'limit'=>$limit,
													'start'=>$start,							 
													'debug'=>FALSE,
													'return_type'=>"array"							  
												 );		
		$result = $this->findAll('wl_courses_related',$fetch_config);
		if( is_array($result) && !empty($result) )
		{
			foreach ($result as $val )
			{ 
			
				$res_data[$val['id']] = $this->get_courses(1,0, array('courseid'=>$val['related_id']));
				
				
			}
		}
		
		$res_data = array_filter($res_data);
		return $res_data;		
	}
	

	 
	 
	 
	 /*---------Color Image-------------*/
	
	public function get_color_image($offset=FALSE,$per_page=FALSE)
	{
		$keyword = $this->db->escape_str(trim($this->input->get_post('keyword',TRUE)));		
		$condtion = ($keyword!='') ? "media_status !='2' AND courses_id='".$this->uri->segment(4)."' ":"media_status !='2' AND courses_id='".$this->uri->segment(4)."'";
		
		$fetch_config = array(
		'condition'=>$condtion,
		'order'=>"id DESC",
		'limit'=>$per_page,
		'start'=>$offset,							 
		'debug'=>FALSE,
		'return_type'=>"array"							  
		);		
		$result = $this->findAll('wl_courses_media',$fetch_config);
		return $result;	
	}
	
	public function get_color_by_id($id){
		
		$id = applyFilter('NUMERIC_GT_ZERO',$id);
		
		if($id>0)
		{
			$condtion = "media_status !='2' AND id=$id";
			$fetch_config = array(
			'condition'=>$condtion,							 					 
			'debug'=>FALSE,
			'return_type'=>"object"							  
			);
			$result = $this->find('wl_courses_media',$fetch_config);
			return $result;		
		}
	}
	
	public function change_media_status()
	{
	    $arr_ids = $_REQUEST['arr_ids'];
		
		if(is_array($arr_ids)){
		
			$str_ids = implode(',', $arr_ids);
			
			if($this->input->post('status_action')=='Activate')
			{
				$query = $this->db->query("UPDATE wl_courses_media   
				                           SET media_status='1' 
										   WHERE id in ($str_ids)");
										   
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('activate'));	 
			}
			
			if($this->input->post('status_action')=='Deactivate')
			{
				$query = $this->db->query("UPDATE wl_courses_media  
				                           SET media_status='0' 
										   WHERE id in ($str_ids)");
										   
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('deactivate'));	 
				
			}
			
			if($this->input->post('status_action')=='Delete')
			{
				$query = $this->db->query("DELETE FROM wl_courses_media 
				                           WHERE id in ($str_ids)");
										   
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('deleted'));	 
			}
		}
	}
	
	/*---------End Color Image-------------*/
	

	 

	  
}