<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Astrologer extends  REST_Controller {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('astrologer_model'));
	    
	}
public function test_input($data) {
  $data = trim(strip_tags($data));
  return $data;
}
	public function list_post()
	{	
 		
		 $param 				 =  array('status'=>'1');
		 $res_array              =  $this->astrologer_model->get_astrologer($param);	
		 
		 if(is_array($res_array) && !empty($res_array)){	
		
foreach($res_array as $val){
			
			if($val['astrologer_image']==""){
			 $image_url=0;
			}else{
			   $image_url = "https://www.astropatrika.com/uploaded_files/astrologer/".$val['astrologer_image'];
			}
		$tax_res    =  get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
		
		$fee=$tax_res['tax_rate']*$val['call_rate']/100;	
	
		$arr[] =array(
		
			'astrologer_id'=>$val['astrologer_id'],
			'astrologer_name'=>$val['astrologer_name'],
			'astrologer_experience'=>$val['astrologer_experience'],
			'astrologer_expertise'=>$this->test_input($val['astrologer_expertise']),
			'astrologer_details'=>$this->test_input($val['astrologer_details']),
			'astrologer_image'=>$image_url,
			'likes'			=>$val['likes'],
			'call_rate'     =>$val['call_rate'],
			'tax_rate'      => $tax_res['tax_rate'],
			'astro_fee'           => $fee+$val['call_rate']
		);	
			
		}
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
	
	public function profile_post(){
		
		$id = $this->uri->segment(4);
		$param     = array('status'=>'1','id'=>$id );	
		$res       = $this->astrologer_model->get_astrologer($param);	
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