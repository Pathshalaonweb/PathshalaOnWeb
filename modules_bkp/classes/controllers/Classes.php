<?php
class Faq extends Public_Controller
{
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('classes/classes_model'));
	    $this->form_validation->set_error_delimiters("<div class='required'>","</div>");
	}

	public function index()
	{	
 		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $page_segment           = find_paging_segment();
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $param = array('status'=>'1');
		 $res_array               = $this->classes_model->get_classes($config['limit'],$offset,$param);	
				
		 $config['total_rows']	 = get_found_rows();			
	     $data['page_links']      = pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);		
	     $data['title'] = "Classes";
		 $data['res'] = $res_array; 					
		 $this->load->view('classes/view_classes',$data);
	}
}
?>