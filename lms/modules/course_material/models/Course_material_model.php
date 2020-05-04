<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Course_material_model extends MY_Model{

    public function get_course_material()
	{
		$que=$this->db->get_where('tbl_courses',array('status'=>'1'));
		$result = $que->result_array();
		return $result ;
	}

	public function get_crs_mat_id()
	{
		$id = $this->uri->segment(3);
		$que=$this->db->get_where('tbl_course_lession',array('status'=>'1','lession_id'=>$id));
		$res = $que->result_array();
		$result = $res[0];
		return $result ;
	}

	public function get_cat()
	{
		///$data=array('status'=>1);
		$que=$this->db->get_where('tbl_categories',array('status'=>'1'));
		return $que->result_array();
	}

	public function getexamlist() {
		$this->db->select('tbl_categories.category_name,tbl_courses.courses_name');
		$this->db->join('tbl_categories','tbl_categories.category_id=tbl_courses.category_id','left');
		$this->db->where('tbl_courses.status','1');
        $q = $this->db->get('tbl_courses');
		return $q->result_array();
    }

	public function fetch_level_by_id($id) {

		$data=array('courses_id'=>$id);
		$que=$this->db->get_where('tbl_level',$data);
		return $que->result_array();

      }

	public function get_question_list($id) {

	

		$que=$this->db->get_where('tbl_mock_question',$id);

		return $que->result_array();

     

    }

		public function fetch_test_by_mockId($id) {

		$data=array('mock_id'=>$id);

		$que=$this->db->get_where('tbl_mock',$data);

		$res= $que->result_array();

		return $res=$res[0];

     

    }

		public function get_exam_result($id) {

		$data=array('userId'=>$id);

	    $this->db->order_by('exam_date','desc');

		$que=$this->db->get_where('tbl_exam',$data);

	    return $que->result_array();

			

	}

	    public function fetch_mock_result($id) {

		$data=array('userId'=>$id);

	    $this->db->order_by('exam_date','desc');

		$que=$this->db->get_where('tbl_mock_exam',$data);

	    return $que->result_array();

			

			}

	 public function fetch_exam_result_by_id($id) {

		$data=array('exam_id'=>$id);

	   

		$que=$this->db->get_where('tbl_result',$data);

	    return $que->result_array();

			

			}

		 public function fetch_mock_result_by_id($id) {

		$data=array('exam_id'=>$id);

	   

		$que=$this->db->get_where('tbl_mock_result',$data);

	    return $que->result_array();

			

			}

	

}

