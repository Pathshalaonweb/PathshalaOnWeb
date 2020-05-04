<?php
class Testimonials extends Public_Controller
{

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('testimonials/testimonial_model'));
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
		$res_array              = $this->testimonial_model->get_testimonial($config['limit'],$offset,$param);		
		$config['total_rows']	= get_found_rows();	
	    $data['page_links']     = pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);				
		$data['title'] 			= 'Testimonials';
		$data['res'] 			= $res_array; 			
		$this->load->view('testimonials/view_testimonials',$data);
		
	}		

	public function post()
	{			
					
		//$this->form_validation->set_rules('testimonial_title','Title','trim|required|xss_clean|max_length[150]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[80]');
		$this->form_validation->set_rules('poster_name','Name','trim|required|alpha|xss_clean|max_length[30]');
		$this->form_validation->set_rules('testimonial_description','Comment','trim|required|xss_clean|max_length[8500]');
		$this->form_validation->set_rules('verification_code','Verification code','trim|required|valid_captcha_code');
		
		
		if($this->form_validation->run()==TRUE)
		{
						
			$posted_data=array(				
			//'testimonial_title'      	=> $this->input->post('testimonial_title',TRUE),
			'poster_name'             	=> $this->input->post('poster_name'),
			'email'                   	=> $this->input->post('email'),
			'testimonial_description' 	=> $this->input->post('testimonial_description'),						
			'posted_date'            	=> $this->config->item('config.date.time')
			);			
			$this->testimonial_model->safe_insert('wl_testimonial',$posted_data,FALSE); 
			
			
			$message = $this->config->item('testimonial_post_success');			
			$message = str_replace('<site_name>',$this->config->item('site_name'),$message);
									
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success',$message);
			redirect('testimonials/post', ''); 
			
		}		
		$data['heading_title'] = "Post Testimonial";	
		$this->load->view('view_post_testimonials',$data);	
		
		
	}
	
	public function details()
	{
		$id = (int) $this->uri->segment(3);		
		$param     = array('status'=>'1','where'=>"testimonial_id ='$id' ");	
		$res       = $this->testimonial_model->get_testimonial(1,0,$param);	
		
		if(is_array($res) && !empty($res))
		{			
			$data['title'] = 'Testimonials';
		    $data['res'] = $res; 			
		    $this->load->view('testimonials/testimonials_details_view',$data);
		
			
		}else
		{
			redirect('testimonials', ''); 
			
		}
		
	}
	
	
}


/* End of file pages.php */

?>
