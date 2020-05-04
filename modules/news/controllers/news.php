<?php
class News extends Public_Controller
{

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('news/news_model'));
		$this->load->model(array('pages/pages_model'));
	    $this->form_validation->set_error_delimiters("<div class='required'>","</div>");
		//$this->load->library('calendar');
		
	}

	public function index()
	{
		 
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 
		 $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		  
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 	
		 $page_segment           = find_paging_segment();
		 
		 						
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
				
		$param = array('status'=>'1');	
		$res_array              	= $this->news_model->get_news($config['limit'],$offset,$param);		
		$config['total_rows']		= get_found_rows();	
	    $data['page_links']      	= pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);				
		$data['title'] 				= 'News';
		$data['res'] = $res_array; 	
		
		
		 $condition       = array('friendly_url'=>'news','status'=>'1');			 
		 $content         =  $this->pages_model->get_cms_page( $condition );				 
		 $data['content'] = $content;
		
				
		$this->load->view('news/view_news',$data);
		
	}		

	public function post()
	{			
					
		//$this->form_validation->set_rules('testimonial_title','Title','trim|required|xss_clean|max_length[150]');
		$this->form_validation->set_rules('news_title','News Title','trim|required|xss_clean|max_length[80]');
		$this->form_validation->set_rules('news_description','Description','trim|required|xss_clean|max_length[8500]');		
		
		if($this->form_validation->run()==TRUE)
		{
						
			$posted_data=array(				
			//'testimonial_title'      	=> $this->input->post('testimonial_title',TRUE),
			'news_title'             	=> $this->input->post('news_title'),
			'news_description' 			=> $this->input->post('news_description'),						
			'recv_date'            		=> $this->config->item('config.date.time')
			);			
			$this->news_model->safe_insert('wl_testimonial',$posted_data,FALSE); 
			
			
			$message = $this->config->item('testimonial_post_success');			
			$message = str_replace('<site_name>',$this->config->item('site_name'),$message);
									
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success',$message);
			redirect('news/post', ''); 
			
		}		
		$data['heading_title'] = "Post News";	
		$this->load->view('view_post_news',$data);	
		
		
	}
	
	public function details()
	{
		$id = (int) $this->uri->segment(3);		
		$param     = array('status'=>'1','where'=>"news_id ='$id' ");	
		$res       = $this->news_model->get_news(1,0,$param);	
		
		if(is_array($res) && !empty($res))
		{			
			$data['title'] = 'Testimonials';
		    $data['res'] = $res; 			
		    $this->load->view('news/news_details_view',$data);
		
			
		}else
		{
			redirect('news', ''); 
			
		}
		
	}
	
	
}


/* End of file pages.php */

?>
