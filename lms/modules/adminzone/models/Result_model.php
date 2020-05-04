<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Result_model extends MY_Model
{
	public function get_exam_result() 
	{
	    $this->db->order_by('exam_date','desc');
		$que=$this->db->get('tbl_exam');
	    return $que->result_array();
	}
	 
	private function _get_users_data()
	{ 
		$this->db->select('*'); 
        $this->db->from('tbl_mock_exam'); 
    }
	 
	public function fetch_mock_result($limit, $start)
	{ 
        $this->_get_users_data(); 
		$this->db->order_by('exam_date','desc');
        $this->db->limit($limit, $start); 
        $query = $this->db->get(); 
        return $query->result_array(); 
    }
    
    public function count_all_users()
	{ 
        $this->_get_users_data(); 
		$this->db->order_by('exam_date','desc');
        $query = $this->db->count_all_results(); 
        return $query; 
    }
}