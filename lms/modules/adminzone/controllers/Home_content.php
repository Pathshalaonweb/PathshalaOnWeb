<?php
class Home_content extends Admin_Controller
{

	public function __construct()
	{
		     parent::__construct(); 				
			$this->load->model(array('home_content_model'));  			
			$this->config->set_item('menu_highlight','other management');	
	}

	public  function index($page = NULL)
	{		
		$pagesize               =  (int) $this->input->get_post('pagesize');		
		$config['limit']		=  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');			
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
				
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));				
		$res_array              =  $this->home_content_model->get_content($offset,$config['limit']);			
		$config['base_url']     =  base_url().'adminzone/banners/pages/'; 		
		$config['total_rows']	=  $this->home_content_model->total_rec_found;	
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);				
		$data['heading_title'] = 'Home Content Lists';
		$data['res'] = $res_array; 		
		
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('tbl_home_contents','content_id');			
		}
			
		$this->load->view('home_content/view_home_content_list',$data);	
			
	} 

	

	public function add()
	{		  
		$data['heading_title'] = 'Add Content';	
		
		 $this->form_validation->set_rules('content_title','Content Title',"trim|required|max_length[200]");	
		  $this->form_validation->set_rules('sort_description','Sort Description',"trim|required|max_length[200]");	
		 	 
		 $this->form_validation->set_rules('image1','Image',"required|file_allowed_type[image]");
		 		
		if($this->form_validation->run()==TRUE)
		{
			 $uploaded_file = "";	
          //  $news_image = $this->input->post('news_image');
            if( !empty($_FILES) && $_FILES['image1']['name']!='' ){			  
                $this->load->library('upload');	
                make_missing_folder('content'); 
                $config['upload_path'] = UPLOAD_DIR.'/content/';    
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->upload->initialize($config);
                $uploaded_data =  $this->upload->do_upload('image1');
                if(is_array($uploaded_data) && !empty($uploaded_data) ){ 								
                    $uploaded_file = $uploaded_data['upload_data']['file_name'];
                }	
            }
			    	
				
			
				$posted_data = array(
				'content_title'=>$this->input->post('content_title'),
				'sub_title'=>$this->input->post('sort_description'),
				'content_added_date'=>$this->config->item('config.date.time'),
				'content_image'=>$uploaded_file				
				);
								
		    $this->home_content_model->safe_insert('tbl_home_contents',$posted_data,FALSE);									
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));			
			redirect('adminzone/home_content', '');
			
						
		}
		
		$this->load->view('home_content/view_home_content_add',$data);		  
			   
	}

	public function edit()
	{
		$Id = (int) $this->uri->segment(4);		   
		$data['heading_title'] = 'Update Home Content';			
		$rowdata=$this->home_content_model->get_content_by_id($Id);
		
		if( is_object($rowdata) )
		{
				
			$this->form_validation->set_rules('content_title','Content Title',"trim|required|max_length[200]");	
			$this->form_validation->set_rules('sort_description','Sort Title',"trim|required|max_length[200]");	 
			$this->form_validation->set_rules('image1','Image',"file_allowed_type[image]");
			
		 
				if($this->form_validation->run()==TRUE)
				{
					 					 
				$uploaded_file = $rowdata->content_image;				 
                $unlink_image = array('source_dir'=>"content",'source_file'=>$rowdata->content_image);
                                
                if( !empty($_FILES) && $_FILES['image1']['name']!='' ){
                    $this->load->library('upload');		
                    make_missing_folder('content');
                    $config['upload_path'] = UPLOAD_DIR.'/content/';    
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $this->upload->initialize($config);
                    $uploaded_data =  $this->upload->do_upload('image1');
                    if( is_array($uploaded_data)  && !empty($uploaded_data) ){ 								
                       $uploaded_file = $uploaded_data['upload_data']['file_name'];
                       removeImage($unlink_image);	
                    }					
                }	
					
					$posted_data = array(
					'content_title'=>$this->input->post('content_title'),
					'sub_title'=>$this->input->post('sort_description'),
					'content_image'=>$uploaded_file				
					);
					
					$where = "content_id = '".$rowdata->content_id."'"; 				
					$this->home_content_model->safe_update('tbl_home_contents',$posted_data,$where,FALSE);						
					$this->session->set_userdata(array('msg_type'=>'success'));				
				    $this->session->set_flashdata('success',lang('successupdate'));	
					redirect('adminzone/home_content/'.query_string(), ''); 
					 
				}
				$data['res']=$rowdata;
	
				$this->load->view('home_content/view_home_content_edit',$data);
				
			
		}else
		{
			redirect('adminzone/home_content', ''); 	 
		}
		
	}
	
}
// End of controller