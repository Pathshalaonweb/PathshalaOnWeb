<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thankyou_model extends MY_Model
{

	 public function get_courses($limit='10',$offset='0',$param=array())
	 {		
		$db2 = $this->load->database('database2', TRUE);
		$status			    =   @$param['status'];	
		$id			        =   @$param['pid'];
		$courses_friendly_url	=   @$param['courses_friendly_url'];
		$course_id			=   @$param['course_id'];		
		$keyword            =	trim($this->input->get_post('keyword',TRUE));	
		$keyword            =   $this->db->escape_str($keyword);

		//$this->db->order_by('sort_order');
		$db2->order_by('courses_id',"DESC");
		$db2->limit($limit,$offset);
		$db2->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$db2->from('tbl_courses');
		$q=$db2->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
	
	public function get_course_row($params=array()) {
		
		$db2 = $this->load->database('default', TRUE);
		if(!empty($params['search']['category'])){
				$db2 ->where('category_id',$params['search']['category']);
		} 
		 if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
         //  echo $params['limit'];
		 //   echo "<br>";
         //   echo $params['start'];
        $db2->limit($params['limit'],$params['start']);
            
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $db2->limit($params['limit']);
           // die('test');
        }
		//$db2->where('liveplan','1');
		// $db2->order_by('teacher_id','asc');
		$db2->order_by('Id','DESC'); //updated 04072020
		$db2->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$db2->from('wl_addclass');
		$query =$db2->get();
		//echo $db2->last_query();
		//echo_sql();
		return ($query->num_rows() > 0)?$query->result_array():FALSE;
	}
}
?>