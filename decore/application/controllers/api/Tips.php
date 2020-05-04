<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Tips extends  REST_Controller {


	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('tips_model'));
	    
	}
	
	public function test_input($data) {
  	 $data = trim(strip_tags($data));
	 $data = str_replace("&nbsp;", "", $data);
	 $data = str_replace("\n", "", $data);
	 $data = str_replace("\t", "", $data);
	 $data = str_replace('/', '', $data);
	 
    return $data;
   }	
   
   
   public function list_post()
	{	
 	
		 $param = array('status'=>'1');
		 $res_array               = $this->tips_model->get_tips($param);	
		
		//$arr['Result'] = array("success"=>1,"code"=>0);
		
		foreach($res_array as $val){
			
		$arr[] =array(
			'tips_id'=>$val['tips_id'],'name'=>$val['name']
		);	
			
		}
		
		
		if(is_array($res_array) && !empty($res_array)){	
		
			$this->response([
                    'status' => 1,
                    'message' => 'successful.',
					'data' => $res_array
                ], REST_Controller::HTTP_OK);
		
		}else{
			$this->response([
			
					'status' => 0,
                    'message' => 'Provide Detail not valid.',
			], REST_Controller::HTTP_BAD_REQUEST);
			
		}
	}
   
   
   
   
   
		
		public function festivallist_post(){
		
		 
		$Id 				 = $this->uri->segment(4);
		 if(!empty($Id)){
		 $Ids            	 = $this->db->escape_str($Id);
		 $condition=array();
		 $condition['id']=$Ids;
		 $res_array              =    $this->festival_model->get_festival($condition);
		 //echo_sql();die;		
		 //print_r($res_array);
		$parent_id =$res_array[0]['pages_id'];//die;
		 }else{
			$parent_id ='0'; 
		 }
		
		$condtion_array = array(
			'field' =>"*,( SELECT COUNT(pages_id) FROM wl_pages AS b
			WHERE b.parent_id=a.pages_id ) AS total_subcategories",
			'condition'=>"AND parent_id = '$parent_id' AND status='1' ",
			'debug'=>FALSE
		);	
		
		$res_array              =  $this->online_puja_model->getpuja($condtion_array);
		
		foreach($res_array as $val){
			
			if($val['pages_image']==""){
			 $image_url=0;
			}else{
			   $image_url = "https://www.astropatrika.com/uploaded_files/puja/".$val['pages_image'];
			}
			
			if($val['pages_image1']==""){
			 $image_url1="0";
			}else{
			   $image_url1 = "https://www.astropatrika.com/uploaded_files/puja/".$val['pages_image1'];
			}
			
			$arr[]=array(
					'pages_id'=>$val['pages_id'],'pages_name'=>$val['pages_name'],
					'pages_image'=>$image_url,'pages_image'=>$image_url,'pages_image1'=>$image_url1,
					'description'=>$this->test_input($val['description']),'price'=>$val['price'],
					'price_doller'=>$val['price_doller']
					
					);
			
		}
	
		if(is_array($arr) && !empty($arr)){
			
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
		
		
		
		/*if($parent_id ==0){						
		$this->load->view('online_puja/view_online_puja_cat_listing',$data);
		}else{
			//view_puja_subcat_listing
			$this->load->view('online_puja/view_puja_listing',$data);
		}
		*/
		
	}

	
}
?>