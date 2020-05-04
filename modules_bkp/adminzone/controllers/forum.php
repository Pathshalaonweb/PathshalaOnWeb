<?php
class Forum extends Admin_Controller
{

	public function __construct()
	{
		     parent::__construct(); 				
			$this->load->model(array('forum_model'));  			
			$this->config->set_item('menu_highlight','manage forum');	
	}

	public  function index($page = NULL)
	{		
		$pagesize               =  (int) $this->input->get_post('pagesize');		
		$config['limit']		=  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');			
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
				
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));				
		$res_array              =  $this->forum_model->get_forum($offset,$config['limit']);			
		$config['base_url']     =  base_url().'adminzone/banners/pages/'; 		
		$config['total_rows']	=  $this->forum_model->total_rec_found;	
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);				
		$data['heading_title'] = 'Forum Lists';
		$data['res'] = $res_array; 		
		
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_forum_topics','topicID');			
		}
			
		$this->load->view('forum/view_forum_list',$data);	
			
	} 

	

	public function add()
	{		  
		$data['heading_title'] = 'Add Forum';	
		
		 $this->form_validation->set_rules('topicTitle','Topic Title',"trim|required|max_length[100]");		 
		 $this->form_validation->set_rules('blog_image','Image',"required|file_allowed_type[image]");
		 $this->form_validation->set_rules('topicDesc','Description',"trim|required|strip_required");
		 
		 $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'topicDesc'));
		 		
		if($this->form_validation->run()==TRUE)
		{
			    $uploaded_file = "";	
				
			    if( !empty($_FILES) && $_FILES['blog_image']['name']!='' )
				{			  
					$this->load->library('upload');	
						
					$uploaded_data =  $this->upload->my_upload('blog_image','forum_img');
				
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					
					}		
				}
			
				$posted_data = array(
				'topicTitle'=>$this->input->post('topicTitle'),
				'recv_date'=>$this->config->item('config.date.time'),
				'blog_image'=>$uploaded_file,
				'topicDesc'=>$this->input->post('topicDesc')				
				);
								
		    $this->forum_model->safe_insert('wl_forum_topics',$posted_data,FALSE);									
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));			
			redirect('adminzone/forum', '');
		}
		
		$this->load->view('forum/view_forum_add',$data);		  
	}

	public function edit()
	{
		$Id = (int) $this->uri->segment(4);		   
		$data['heading_title'] = 'Update Forum';			
		$rowdata=$this->forum_model->get_forum_by_id($Id);
				 
		if( is_object($rowdata) )
		{
				
			$this->form_validation->set_rules('topicTitle','Topic Title',"trim|required|max_length[100]");
			$this->form_validation->set_rules('blog_image','Image',"file_allowed_type[image]");
			$this->form_validation->set_rules('topicDesc','Description',"trim|required|strip_required");
			
			$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'topicDesc'));
		 
				if($this->form_validation->run()==TRUE)
				{
					 					 
					$uploaded_file = $rowdata->blog_image;				 
					$unlink_image = array('source_dir'=>"banner",'source_file'=>$rowdata->blog_image);
													
					if( !empty($_FILES) && $_FILES['blog_image']['name']!='' )
					{			  
						  $this->load->library('upload');					
						  $uploaded_data =  $this->upload->my_upload('blog_image','forum_img');
						
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
						   $uploaded_file = $uploaded_data['upload_data']['file_name'];
						   removeImage($unlink_image);	
						}
					
				    }	
					
					$posted_data = array(
					'topicTitle'=>$this->input->post('topicTitle'),
					'blog_image'=>$uploaded_file,
					'topicDesc'=>$this->input->post('topicDesc'),				
					);
					
					$where = "topicID = '".$rowdata->topicID."'"; 				
					$this->forum_model->safe_update('wl_forum_topics',$posted_data,$where,FALSE);						
					$this->session->set_userdata(array('msg_type'=>'success'));				
				    $this->session->set_flashdata('success',lang('successupdate'));	
					redirect('adminzone/forum/'.query_string(), ''); 
					 
				}
				$data['res']=$rowdata;
				$this->load->view('forum/view_forum_edit',$data);
				
			
		}
		else
		{
			redirect('adminzone/forum', ''); 	 
		}
		
	}
	
	
	// forum topic comment section

  public function blogcomments(){
  
		$this->input->post('selected');
		
		if($this->uri->segment(4)!='' && $this->uri->segment(4)!='pages')
		{
			$config['base_url'] =     base_url().'adminzone/forum/blogcomments/'.$this->uri->segment(4).'/pages/'; 		
			$config['total_rows']	= $this->forum_model->getForumcommentCount($this->uri->segment(4));	
			$config['uri_segment']	= 6;	
			$offset=$this->uri->segment(6,0);	
			$id = $this->uri->segment(4,0);
			
		}else
		{
			
			$config['base_url'] =     base_url().'adminzone/forum/blogcomments/pages/'; 		
			$config['total_rows']	= $this->forum_model->getForumcommentCount();	
			$config['uri_segment']	= 5;
			$offset=$this->uri->segment(5,0);
			$id='';
		}
		
		
		$config['per_page']		= $this->config->item('per_page');
		$config['num_links']	= 10;		
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['additional_param']  = 'serialize_form()';
		$config['table'] = '#my_data';
		$config['cur_tag_open'] = '<b>';
		$config['cur_tag_close'] = '</b>';	
		
		$this->jquery_pagination->initialize($config);
		$data['page_links'] = $this->jquery_pagination->create_links();
		
		$page_array = $this->forum_model->getForumcomment($config['per_page'],$offset,$id);	
		
		$data['heading_title'] = 'View Topic Comments';
		$data['pagelist'] = $page_array; 
		
		
		
		$this->load->view('forum/view_forumcomment_list',$data);
        
		//$this->output->enable_profiler(TRUE);
  }	  
  
  public function change_commentstatus(){
       
	    $pagered="adminzone/forum/blogcomments/".$this->uri->segment(4)."/";
		$this->forum_model->change_commentstatus();
		redirect($pagered, '');
		exit; 
	
  } 
  
  
  
  
  public function displaycomment(){
	   
		 $res = $this->forum_model->getForumcomment_by_id($this->uri->segment(4)); 
		
		 $data['heading_title']  = 'View Blog Comment Details';
		 $data['page_title']     = 'View Blog Comment Details';
		 $data['pageresult']=$res;
		
		 $this->load->view('forum/view_forumcomment_detail',$data);
		 
	   }
	   
	   // End forum topic comment section
	
	
}
// End of controller