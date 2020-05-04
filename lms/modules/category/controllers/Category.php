<?php
class Category extends Public_Controller
{
	
	public function __construct()
	{
		parent::__construct();  
		$this->load->helper(array('category/category'));	 
		$this->load->model(array('category/category_model'));
		
	}
	
	public function index()
	{
		
		
		 $data['title'] = "Category";
		
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 
		 $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		  
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 	
		 $page_segment           = find_paging_segment();
		
		 						
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 
		 $parent_id              = ( $this->uri->segment(3) > 0 ) ?  $this->uri->segment(3) : '0';	
		
		
		$condtion_array = array(
		'field' =>"*,( SELECT COUNT(category_id) FROM tbl_categories AS b
		WHERE b.parent_id=a.category_id ) AS total_subcategories",
		'condition'=>"AND parent_id = '$parent_id' AND status='1' ",
		'limit'=>$config['limit'],
		'offset'=>$offset	,
		'debug'=>FALSE
		);	
		
		
		$res_array              =  $this->category_model->getcategory($condtion_array);						
		$config['total_rows']	=  $this->category_model->total_rec_found;
		$data['page_links']     = pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);
		
		
		$data['heading_title'] = 'Category Lists';
		$data['res'] = $res_array; 	
		
		$data['parentres']=isset($parentdata) && is_object($parentdata) ? $parentdata : "";
		
		$data['unq_section'] = isset($parentdata) && is_object($parentdata) ? "Subcategory" : "Category";	
				
		$this->load->view('category/view_category',$data);
		
		
	}
	
	
	
}
/* End of file member.php */
/* Location: .application/modules/products/controllers/products.php */
