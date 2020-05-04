<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payment_model extends MY_Model
 {
	 public function get_payment()
	 {		
	
		$q=$this->db->get('tbl_payment_setting');
	
		$result = $q->result_array();	
			
		return $result;
	}
	
}
?>