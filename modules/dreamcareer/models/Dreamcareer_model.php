<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dreamcareer_model extends MY_Model
 {

	public function get_teacher_row($params=array()) {
		
		//echo "<pre>";
		//print_r($params['dreamcareer']);
		//echo $params['dreamcareer']['location'];die;
		if(!empty($params['dreamcareer']['state'])){
			$this->db->where('b.state_id',$params['dreamcareer']['state']);
        }
		if(!empty($params['dreamcareer']['city'])){
			$this->db->where('b.city_id',$params['dreamcareer']['city']);
        }
		
		if(!empty($params['dreamcareer']['pincode'])){
			$this->db->where('b.pincode',$params['dreamcareer']['pincode']);
        }
		if(!empty($params['dreamcareer']['classes'])){
			$this->db->where('b.class',$params['dreamcareer']['classes']);
        }
		if(!empty($params['dreamcareer']['subject'])){
			$this->db->where('b.subject',$params['dreamcareer']['subject']);
        }
		if(!empty($params['dreamcareer']['category'])){
			$this->db->where('b.category',$params['dreamcareer']['category']);
        }
		if(!empty($params['dreamcareer']['bath_time'])){
			
			$this->db->where('b.bath_time',$params['dreamcareer']['bath_time']);
        }
		if(!empty($params['dreamcareer']['list'])){
			
			$this->db->where('list',$params['dreamcareer']['list']);
        }
		if(!empty($params['dreamcareer']['loc'])){
			
			$this->db->where('loc',$params['dreamcareer']['loc']);
        }
		//dreamcareer by price
		if(!empty($params['dreamcareer']['sprice']) && !empty($params['dreamcareer']['eprice'])){
			$this->db->where("b.fee BETWEEN ".$params['dreamcareer']['sprice']." AND ".$params['dreamcareer']['eprice']."");
		}
		//$this->db->where('a.email_verify','1');
		//$this->db->where('a.is_verified','1');
		$this->db->where('a.status','1');
		$this->db->where('a.account_approved','1');
		//set start and limit
         //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
          //  echo $params['limit'];
        //    echo "<br>";
         //   echo $params['start'];
            $this->db->limit($params['limit'],$params['start']);
            
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
           // die('test');
        }
		//$this->db->order_by("b.id", "asc");
		//$this->db->limit($limit,$offset);
		//$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		//$this->db->from('wl_dc_colleges');
		//$this->db->join('wl_teacher_profile b', 'b.teacher_id=a.teacher_id', 'inner');
		//$this->db->distinct('b.teacher_id'); 
		//$query = $this->db->group_by('b.teacher_id'); 
		//$this->db->order_by('b.teacher_id','asc');
		//$query =$this->db->get(); 
		//echo_sql();
		//$result = $q->result_array();	
		//$result = ($limit=='1') ? $result[0]: $result;	
		//return $result;

		$sql2 = "SELECT distinct(programme_name) FROM `wl_dc_colleges`";
            $que = $this->db->query($sql2);
            foreach ($que->result_array() as $vall2) : {

                    //echo "<h2>" . $vall2['programme_name'] . "</h2><br>";
                    $rs = $vall2['programme_name'];

                    $sql3 = "SELECT distinct(location_name) FROM `wl_dc_colleges` where `programme_name`='$rs' ";
                    $quee = $this->db->query($sql3);
                    foreach ($quee->result_array() as $vall3) : {

                           // echo "<h2>" . $vall3['location_name'] . "</h2><br>";
                            $rs2 = $vall3['location_name'];
							$sqll = "SELECT * FROM `wl_dc_colleges` where `programme_name`='$rs' and `location_name`= '$rs2'";
                                    $qu = $this->db->query($sqll);
									return ($qu->num_rows() > 0)?$qu->result_array():FALSE;

		 
					}
				endforeach;
			}
		endforeach;
		
	}
	
	
	
	function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('wl_teacher');
        //filter data by dreamcareered keywords
        if(!empty($params['dreamcareer']['keywords'])){
            $this->db->like('product_name',$params['dreamcareer']['keywords']);
        }
		if(!empty($params['dreamcareer']['keywords'])){
            $this->db->like('product_name',$params['dreamcareer']['keywords']);
        }
        //sort data by ascending or desceding order
        if(!empty($params['dreamcareer']['sortBy'])){
            $this->db->order_by('product_name',$params['dreamcareer']['sortBy']);
        }else{
            $this->db->order_by('products_id','desc');
        }
		//dreamcareer by price
		if(!empty($params['dreamcareer']['sprice']) && !empty($params['dreamcareer']['eprice'])){
			$this->db->where("b.fee BETWEEN ".$params['dreamcareer']['sprice']." AND ".$params['dreamcareer']['eprice']."");
		}
		if(!empty($params['dreamcareer']['brand'])){
			$branddata =implode("','",$params['dreamcareer']['brand']);
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
		echo_sql();//die;
        //return fetched data
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
}