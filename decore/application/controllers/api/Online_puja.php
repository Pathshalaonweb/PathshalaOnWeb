<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Online_puja extends  REST_Controller {


	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('online_puja_model'));
	    
	}
	
	public function test_input($data) {
  	 $data = trim(strip_tags($data));
	 $data = str_replace("&nbsp;", "", $data);
	 $data = str_replace("\n", "", $data);
	 $data = str_replace("\t", "", $data);
	 $data = str_replace('/', '', $data);
	 
    return $data;
   }	
		
		public function categorypuja_post(){
		
		 
		 $Id 				 = $this->uri->segment(4);
		 if(!empty($Id)){
		 $Ids            	 = $this->db->escape_str($Id);
		
		
		 $condition=array();
		 $condition['id']=$Ids;
		 $res_array              =    $this->online_puja_model->get_online_puja($condition);
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
			
			$tax_res    =  get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
			//$tax_amount=$tax_res['tax_rate']*$res_array['price']/100;
			
			$arr[]=array(
					'pages_id'=>$val['pages_id'],'pages_name'=>$val['pages_name'],
					'pages_image'=>$image_url,'pages_image'=>$image_url,'pages_image1'=>$image_url1,
					'description'=>$this->test_input($val['description']),'price'=>$val['price'],
					'price_doller'=>$val['price_doller'],'taxRate'=>$tax_res['tax_rate'],
					'totalAmount'=>$tax_amount=$tax_res['tax_rate']*$val['price']/100+$val['price'],
					
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

	public function lists()
	{	
 		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $page_segment           = find_paging_segment();
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 
		 $Id 				 = trim($this->uri->segment(3));
		 if(!empty($Id)){
		 $Ids            	 = $this->db->escape_str($Id);
		 $condition=array();
		 $condition['friendly_url']=$Ids;
		 $res_array              =    $this->category_model->getcategory($condition);
		 $parent_id =$res_array[0]['category_id'];
		 }else{
			$parent_id ='0'; 
		 }
		 
		 
		 
		 $param = array('status'=>'1','subcategory_id'=>$parent_id);
		 $res_array               = $this->online_puja_model->get_online_puja($config['limit'],$offset,$param);	
				
		 $config['total_rows']	 = get_found_rows();			
	     $data['page_links']      = pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);		
	     $data['title'] = "online_puja's";
		 $data['res'] = $res_array; 					
		 $this->load->view('online_puja/view_puja_listing',$data);
		
	}
	
	
	public function details(){
		 
		 $Id 				 = trim($this->uri->segment(2));
		 $Id            	 = $this->db->escape_str($Id);
		 $condition=array();
		 $condition['friendly_url']=$Id;
		 $res_array              =    $this->online_puja_model->get_online_puja(1,0,$condition);
		
		 if(is_array($res_array) && !empty($res_array)){ 	
		 $data['res'] = $res_array; 					
		 $this->load->view('online_puja/view_online_puja_detail',$data);
		 }else{
		 	redirect('online_puja', ''); 		 
		 }
		}
}
?>