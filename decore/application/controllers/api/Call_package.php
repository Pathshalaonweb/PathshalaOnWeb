<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Call_package extends  REST_Controller 
{
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('call_package_model'));
	    
	}

	public function list_post()
	{	
 	
		 $param = array('status'=>'1');
		 $res_array               = $this->call_package_model->get_call_package($param);	
		
		//$arr['Result'] = array("success"=>1,"code"=>0);
		
		foreach($res_array as $val){
		    
				$tax_res    =  get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
		        $tax_amount=$tax_res['tax_rate']*$val['call_package_price']/100;
		        $taotal_amount=$val['call_package_price']+$tax_amount;
		$arr[] =array(
			'call_package_id'=>$val['call_package_id'],'call_package_name'=>$val['call_package_name'],
			'call_package_price'=>$val['call_package_price'],'call_package_discount_price'=>$val['call_package_discount_price'],
			'sort_order'=>$val['sort_order'],'status'=>$val['status'],'call_package_date_added'=>$val['call_package_date_added'],
			'tax_rate'=>$tax_res['tax_rate'],
			'tax_amount'=>$tax_amount,'taotal_amount'=>$taotal_amount
		);	
			
		}
		
		
		if(is_array($res_array) && !empty($res_array)){	
		
			$this->response([
                    'status' => 1,
                    'message' => 'successful.',
					//'sql'=>$this->db->last_query(),
					//'id' =>$id,
                    'data' => $arr
                ], REST_Controller::HTTP_OK);
		
		}else{
			$this->response([
			
					'status' => 0,
                    'message' => 'Provide Detail not valid.',
			], REST_Controller::HTTP_BAD_REQUEST);
			
		}
	}
	
	
	public function detail_post(){
		
		$id = $this->uri->segment(4);
		$param     = array('status'=>'1','id'=>$id );	
		$res       = $this->call_package_model->get_call_package($param);	
		if(is_array($res) && !empty($res)){	
		
			$this->response([
                    'status' => 1,
                    'message' => 'successful.',
					//'sql'=>$this->db->last_query(),
					//'id' =>$id,
                    'data' => $res
                ], REST_Controller::HTTP_OK);
		
		}else{
			$this->response([
			
					'status' => 0,
                    'message' => 'Provide Detail not valid.',
			], REST_Controller::HTTP_BAD_REQUEST);
			
		}
		
		
	}
	
	
}
?>