<?php
class Products extends Public_Controller
{

	
	public function __construct()
	{
		parent::__construct();  		
		$this->load->model(array('category/category_model','courses/courses_model'));	
		$this->load->helper(array('courses/courses','category/category'));
	}

public function index(){
		 /*  $category_id   Segment used for category_id,featured,new arrival hot product 
		    echo_sql();
		 */	
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $page_segment           =  find_paging_segment();
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $condtion               = array();	
			
		 $category_id            = $this->uri->segment(3);	
		 $condtion['status']     = '1';
		 $page_title             = "Courses Lists";
		if($category_id=='new-arrival'){
			$condtion['where']        = "new_arrival ='1'";
			$page_title               = "Latest Products";
		}
		if($category_id=='hot-courses'){
			$condtion['where']     = "hot_product ='1'";
			$page_title               = "Hot Products";
			  
		}
		
		if($category_id=='featured-courses')
		{
						
			  $condtion['where']        = "featured_product ='1'";
			  $page_title               = "Featured Products";
			  
		}
		
		if( $category_id > 0 )
		{
		
			$condtion['category_id'] = $category_id;			
			$page_title = get_db_field_value('wl_categories','category_name',"1 AND category_id='$category_id'");
		}		
		
		$res_array               =  $this->courses_model->get_courses($config['limit'],$offset,$condtion);		
		$config['total_rows']    =  get_found_rows();			
		
	    $data['page_links']    = pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);	 						
		$data['heading_title'] = $page_title;
		$data['res']           = $res_array; 			
		$this->load->view('courses/view_courses_listing',$data);
		
		
	}
	
	
public function detail(){
		global $meta_array; 
		$data['unq_section'] = "Product";		
		$productId = (int) $this->uri->segment(3);	
			
		$option = array(
			'pid'=>$productId,
			//'status'=>'1',
		);
		
		$res =  $this->product_model->get_courses(1,0, $option);
		
		if(is_array($res)){
			$data['title'] = "courses";
			$data['res']       = $res;				
			$media_res         = $this->courses_model->get_courses_media(4,0,array('productid'=>$res['courses_id']));
			$data['media_res'] = $media_res; 
			$data['meta_array'] =  array(
				"meta_title"=>$res['course_name'],			
				"meta_description"=>character_limiter(strip_tags($res['product_name']),330),
				"meta_keyword"=>$res['course_name']
			); 
			
			$related_courses         = $this->courses_model->related_courses($res['courses_id'],0,4);
			$data['related_courses'] = $related_courses; 
			$this->load->view('courses/view_courses_details',$data);
			}else{
			redirect('category', ''); 	
		}
	}		
}
?>