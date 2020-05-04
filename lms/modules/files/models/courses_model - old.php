<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Courses_model extends MY_Model
 {

public function get_subject_list()
	{
		$data=array('status'=>'1');
		$que = $this->db->get_where('tbl_subject',$data);
		return $que->result_array(); 
		
	}
		public function question_list($courseId)
		{
			$res=$this->db->get_where('tbl_question',$courseId);
			return $res->result_array();
		}
	 public function get_question_list()
		{ 
			$this->db->where('status !=','2');
			$res=$this->db->get('tbl_question');
			return $res->result_array();
		}
	 
	 public function get_question_by_id($questionId)
		{
			$res=$this->db->get_where('tbl_question',$questionId);
			
			$result = $res->result_array();
			return $res=$result[0];
		}
	 public function get_courses($limit='10',$offset='0',$param=array())
	 {
		
		$category_id		=   @$param['category_id'];
		$status			    =   @$param['status'];	
		$coursesid			=   @$param['productid'];
		$orderby			=	@$param['orderby'];	
		$where			    =	@$param['where'];	
		$keyword			=   trim($this->input->get_post('keyword',TRUE));						
		$keyword			=   $this->db->escape_str($keyword);
		
		
		
		if($category_id!='')
		{
			$this->db->where("wlp.category_id ","$category_id");
		}
		
		if($coursesid!='')
		{
			$this->db->where("wlp.courses_id  ","$coursesid");
		}
		
		if($status!='')
		{
			$this->db->where("wlp.status","$status");
		}
		
		if($where!='')
		{
			$this->db->where($where);
			
		}
		if($keyword!='')
		{
			$this->db->where("(wlp.courses_name LIKE '%".$keyword."%' OR wlp.courses_code LIKE '%".$keyword."%' )");
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
		$this->db->from('tbl_courses as wlp');
		$this->db->where('wlp.status !=','2');
		$this->db->join('tbl_courses_media AS wlpm','wlp.courses_id=wlpm.courses_id','left');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
				
	}
	
	public function get_courses_by_id($id)
	{
		$data= array('courses_id'=>$id);
		$query =	$this->db->get_where('tbl_courses',$data);
		$result= $query->result_array();
		return $result = $result[0];
	} 
		  
	public function get_courses_media($limit='4',$offset='0',$param=array())
    {		  
		
		 $default			    =   @$param['default'];	
		 $coursesid				=   @$param['productid'];
		 $media_type			=   @$param['media_type'];
		 		
		 if( is_array($param) && !empty($param) )
		 {			
			$this->db->select('SQL_CALC_FOUND_ROWS *',FALSE);
			$this->db->limit($limit,$offset);
			$this->db->from('tbl_courses_media');
			$this->db->where('courses_id',$templateid);	
			
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


	 
	 
	 
	 /*---------Color Image-------------*/
	
	public function get_color_image($offset=FALSE,$per_page=FALSE)
	{
		$keyword = $this->db->escape_str(trim($this->input->get_post('keyword',TRUE)));		
		$condtion = ($keyword!='') ? "media_status !='2' AND template_id='".$this->uri->segment(4)."' ":"media_status !='2' AND template_id='".$this->uri->segment(4)."'";
		
		$fetch_config = array(
		'condition'=>$condtion,
		'order'=>"id DESC",
		'limit'=>$per_page,
		'start'=>$offset,							 
		'debug'=>FALSE,
		'return_type'=>"array"							  
		);		
		$result = $this->findAll('tbl_template_media',$fetch_config);
		return $result;	
	}
	public function get_color_images($offset=FALSE,$per_page=FALSE)
	{
		$keyword = $this->db->escape_str(trim($this->input->get_post('keyword',TRUE)));		
		$condtion = ($keyword!='') ? "status !='2' AND template_id='".$this->uri->segment(4)."' ":"status !='2' AND template_id='".$this->uri->segment(4)."'";
		
		$fetch_config = array(
		'condition'=>$condtion,
		'order'=>"id DESC",
		'limit'=>$per_page,
		'start'=>$offset,							 
		'debug'=>FALSE,
		'return_type'=>"array"							  
		);		
		$result = $this->findAll('tbl_templates',$fetch_config);
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
			$result = $this->find('tbl_template_media',$fetch_config);
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
				$query = $this->db->query("UPDATE tbl_template_media   
				                           SET media_status='1' 
										   WHERE id in ($str_ids)");
										   
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('activate'));	 
			}
			
			if($this->input->post('status_action')=='Deactivate')
			{
				$query = $this->db->query("UPDATE tbl_template_media  
				                           SET media_status='0' 
										   WHERE id in ($str_ids)");
										   
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('deactivate'));	 
				
			}
			
			if($this->input->post('status_action')=='Delete')
			{
				$query = $this->db->query("DELETE FROM tbl_template_media 
				                           WHERE id in ($str_ids)");
										   
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('deleted'));	 
			}
		}
	}
	
	/*---------End Color Image-------------*/
	  
}