<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Exam_model extends MY_Model{
	public function get_cat()
	{
		$data=array('status'=>1);
		$que=$this->db->get_where('tbl_categories',array('status'=>'1'));
		return $que->result_array();
	}
	
	public function getexamlist() 
	{
		$this->db->select('tbl_categories.category_name,tbl_courses.courses_name');
		$this->db->join('tbl_categories','tbl_categories.category_id=tbl_courses.category_id','left');
		$this->db->where('tbl_courses.status','1');
        $q = $this->db->get('tbl_courses');
		return $q->result_array();
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
	public function get_question_list($id) 
	{
		$que=$this->db->get_where('tbl_mock_question',$id);
		return $que->result_array();
    }
	public function fetch_test_by_subject_id($id) 
	{
		$data=array('subject_id'=>$id);
		$que=$this->db->get_where('tbl_mock_subject',$data);
		$res= $que->result_array();
		return $res=$res[0];
     
    }
	
	public function fetch_test_by_mock_id($id) 
	{
		$data=array('mock_id'=>$id);
		$que=$this->db->get_where('tbl_mock',$data);
		$res= $que->result_array();
		return $res=$res[0];
     
    }

	
	public function get_exam_result($id) 
	{
		$this->db->select('ex.exam_id, ex.exam_date,lsn.lession,sub.subject_name'); 
		$this->db->from('tbl_exam ex');
		$this->db->join('tbl_lession lsn','lsn.lession_id = ex.lession_id','left');
		$this->db->join('tbl_subject sub','sub.subject_id = lsn.subject_id','left');
		$this->db->where('ex.userId',$id);
		$query = $this->db->get();
		return $query->result_array();		
	}
	
	public function fetch_mock_result($id) 
	{	
		$this->db->select('mex.exam_id,mex.t_que,mex.exam_date,moc.mock_title,moc.mock_id,sub.subject_id,sub.subject_name'); 
	    //$this->db->order_by('exam_date','desc');
		$this->db->from('tbl_mock_exam mex');
		$this->db->join('tbl_mock moc','moc.mock_id = mex.mock_id','left');
		$this->db->join('tbl_mock_subject sub','sub.subject_id = mex.subject_id','left');
		$this->db->where('mex.userId',$id);
		$que=$this->db->get();
	    return $que->result_array();	
	}
	
	public function fetch_exam_result_by_id($id) 
	{
		$data=array('exam_id'=>$id); 
		$que=$this->db->get_where('tbl_result',$data);
	    return $que->result_array();	
	}
	
	public function fetch_mock_result_by_id($id) 
	{
		$data=array('exam_id'=>$id);
		$que=$this->db->get_where('tbl_mock_result',$data);
	    return $que->result_array();
	}
	
}
