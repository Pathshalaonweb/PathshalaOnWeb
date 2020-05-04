<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Coupons_model extends MY_Model
{

   public function __construct(){
   
     parent::__construct();
	 
   }
	
	public function get_discount_coupon($offset=FALSE,$per_page=FALSE)
	{
	   
	    $keyword = $this->db->escape_str(trim($this->input->get_post('keyword',TRUE)));
	  
		$condtion = "status !='2' AND discount_type='1' ";
		
		if($keyword!=''){
			
			$condtion.="  AND (coupon_code like '%".$keyword."%') ";
		}
		
		$condtion = ($keyword!='')?"status !='2' AND ( coupon_code like '%".$keyword."%') ":"status !='2'  ";
				
		$fetch_config = array(
							  'condition'=>$condtion,
							  'order'=>"coupon_id DESC",
							  'limit'=>$per_page,
							  'start'=>$offset,							 
							  'debug'=>FALSE,
							  'return_type'=>"array"							  
							  );		
		$result = $this->findAll('wl_coupons',$fetch_config);
		return $result;	
		
	}
	
	
	public function get_coupon_by_id($id)
	{
		$id = applyFilter('NUMERIC_GT_ZERO',$id);
		if($id>0)
		{
			$condtion = "status !='2' AND coupon_id=$id";
			$fetch_config = array(
									'condition'=>$condtion,							 					 
									'debug'=>FALSE,
									'return_type'=>"object"							  
								 );
			$result = $this->find('wl_coupons',$fetch_config);
			return $result;
		}
	}
	
	
	
	public function send_discount_coupon($couponID)
	{
		
		$mid = $this->input->post('mid');
		
		if(is_array($mid) && count($mid) > 0 )
		{
		   
		   foreach($mid as $v)
		   {
			   
				$sql="SELECT coupon_id  FROM  wl_coupon_customers  
				WHERE coupon_id='$couponID' AND customer_id='$v' AND status='0' ";
				
				$query=$this->db->query($sql);	
				
				if($query->num_rows() == 0 )
				{
				
					$res_coupon  = get_db_single_row("wl_coupons","*","coupon_id='".$couponID."' ");
					
					$res_cuustmer = get_db_single_row("wl_customers",
							"CONCAT_WS(' ',first_name,last_name) AS name,user_name","customers_id ='".$v."' ");
					
					$data = array(
					'customer_id'        =>  $v,
					'coupon_id'          =>  $couponID,
					'name'               =>  $res_cuustmer['name'],
					'email'               =>  $res_cuustmer['user_name'],
					'receive_on'         => $this->config->item('config.date.time')
					);
					
					$recId =  $this->safe_insert('wl_coupon_customers',$data,FALSE);
					
					// { Send mail  to the customers }	
					
				
				}
			   
		   }
		   
			
	 }
		
 }
	
// Maximum purchase amount	
	public function getPurchaseorderslot($offset=FALSE,$per_page=FALSE){
		
		$condtion = "status !='2'  ";
				
		$fetch_config = array(
							  'condition'=>$condtion,
							  'order'=>"maximum_purchase ASC",
							  'limit'=>$per_page,
							  'start'=>$offset,							 
							  'debug'=>FALSE,
							  'return_type'=>"array"							  
							  );		
		$result = $this->findAll('tbl_discountgift_slot',$fetch_config);
		return $result;	
		
	}
	
	public function get_purchasecoupon_by_id($id)
	{
		$id = applyFilter('NUMERIC_GT_ZERO',$id);
		if($id>0)
		{
			$condtion = "status !='2' AND id=$id";
			$fetch_config = array(
									'condition'=>$condtion,							 					 
									'debug'=>FALSE,
									'return_type'=>"object"							  
								);
								
			$result = $this->find('tbl_discountgift_slot',$fetch_config);
			return $result;
		}
	}
	
	
	
	public function editdiscountslot($id){
		
		$sel="SELECT *
		      FROM tbl_discountgift_slot
			  WHERE maximum_purchase='".$this->security->xss_clean($this->input->post('maximum_purchase'))."'
			  AND id!='$id'";
		$query=$this->db->query($sel);	
		if($query->num_rows() == 0){  
		    
			$gift_id    =  $this->security->xss_clean($this->input->post('gift_id'));
		    $coupon_id  =  $this->security->xss_clean($this->input->post('coupon_id'));
		    if($gift_id!=''){
				
				$gftID=$gift_id;
				$discount_type='1';
				
			}else{
				
				$gftID=$coupon_id;
				$discount_type='2';
			}
			$data = array(						  
						  'maximum_purchase'   =>  $this->security->xss_clean($this->input->post('maximum_purchase')),
						  'discount_type'      =>  $discount_type,
						  'gift_id'            =>  $gftID
						);
				
				$where = "id = '".$id."'"; 
				$this->safe_update('tbl_discountgift_slot',$data,$where,FALSE);	
			
		}
	}
	
	
	
}