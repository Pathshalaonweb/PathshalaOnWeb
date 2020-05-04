<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search_model extends MY_Model
 {

		 
	function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('wl_teacher');
        //filter data by searched keywords
        if(!empty($params['search']['keywords'])){
            $this->db->like('product_name',$params['search']['keywords']);
        }
		if(!empty($params['search']['keywords'])){
            $this->db->like('product_name',$params['search']['keywords']);
        }
        //sort data by ascending or desceding order
        if(!empty($params['search']['sortBy'])){
            $this->db->order_by('product_name',$params['search']['sortBy']);
        }else{
            $this->db->order_by('products_id','desc');
        }
		//search by price
		if(!empty($params['search']['sprice']) && !empty($params['search']['eprice'])){
			$this->db->where("b.fee BETWEEN ".$params['search']['sprice']." AND ".$params['search']['eprice']."");
		}
		if(!empty($params['search']['brand'])){
			$branddata =implode("','",$params['search']['brand']);
		            $this->db->where("brand in('$branddata')");
		}
		
        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        //get records
        $query = $this->db->get();
		//echo_sql();die;
        //return fetched data
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }	
	 
	 
	 
	 
	 public function get_teacher_row($params=array()) {
		
		//echo "<pre>";
		//print_r($params['search']);
		//echo $params['search']['location'];die;
		if(!empty($params['search']['state'])){
			$this->db->where('b.state_id',$params['search']['state']);
        }
		if(!empty($params['search']['city'])){
			$this->db->where('b.city_id',$params['search']['city']);
        }
		if(!empty($params['search']['classes'])){
			$this->db->where('b.class',$params['search']['classes']);
        }
		if(!empty($params['search']['subject'])){
			$this->db->where('b.subject',$params['search']['subject']);
        }
		//search by price
		if(!empty($params['search']['sprice']) && !empty($params['search']['eprice'])){
			$this->db->where("b.fee BETWEEN ".$params['search']['sprice']." AND ".$params['search']['eprice']."");
		}
		//$this->db->where('a.email_verify','1');
		//$this->db->where('a.is_verified','1');
		//$this->db->where('a.status','1');
		//set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from('wl_teacher a');
		$this->db->join('wl_teacher_profile b', 'b.teacher_id=a.teacher_id', 'inner');
		//$this->db->distinct('b.teacher_id'); 
		$query = $this->db->group_by('b.teacher_id'); 
		$this->db->order_by('b.teacher_id','asc');
		$q=$this->db->get(); 
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;	
	
	}
	
	
}