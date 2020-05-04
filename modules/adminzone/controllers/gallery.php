<?php
class Gallery extends Admin_Controller
{

	public function __construct()
	{
		     parent::__construct(); 				
			$this->load->model(array('gallery_model'));  			
			$this->config->set_item('menu_highlight','manage forum');	
	}

	public  function index($page = NULL)
	{		
		$pagesize               =  (int) $this->input->get_post('pagesize');		
		$config['limit']		=  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');			
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
				
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));				
		$res_array              =  $this->gallery_model->get_gallery($offset,$config['limit']);			
		$config['base_url']     =  base_url().'adminzone/gallery/pages/'; 		
		$config['total_rows']	=  $this->gallery_model->total_rec_found;	
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);				
		$data['heading_title']  = 'Gallery Lists';
		$data['res'] = $res_array; 		
		
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_gallery','gallery_id');			
		}
			
		$this->load->view('gallery/view_gallery_list',$data);	
			
	} 

	

	public function add()
	{		  
		$data['heading_title'] = 'Add Gallery';	
		
		 $this->form_validation->set_rules('gallery_title','Gallery Title',"required|max_length[99]|unique[wl_gallery.gallery_title='".$this->input->post('gallery_title')."' AND wl_gallery.status!='2']");
		 $this->form_validation->set_rules('gallery_image','Gallery Image',"required|file_allowed_type[image]");
		 		
		if($this->form_validation->run()==TRUE)
		{
			
			    $uploaded_file = "";	
				
			    if( !empty($_FILES) && $_FILES['gallery_image']['name']!='' )
				{			  
					$this->load->library('upload');	
						
					$uploaded_data =  $this->upload->my_upload('gallery_image','gallery');
				
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					}		
				}
				$posted_data = array(
				'gallery_title'	=>	$this->input->post('gallery_title'),					
				'post_date'		=>	$this->config->item('config.date.time'),
				'gallery_image'	=>	$uploaded_file				
				);
								
		    $this->gallery_model->safe_insert('wl_gallery',$posted_data,FALSE);									
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));			
			redirect('adminzone/gallery', '');
		}
		$this->load->view('gallery/view_gallery_add',$data);		  
	}

	public function edit()
	{
		$Id = (int) $this->uri->segment(4);		   
		$data['heading_title'] = 'Update Gallery';			
		$rowdata=$this->gallery_model->get_gallery_by_id($Id);
				 
		if( is_object($rowdata) )
		{
				$this->form_validation->set_rules('gallery_title','Gallery Title',"required|max_length[99]|unique[wl_gallery.gallery_title='".$this->input->post('gallery_title')."' AND wl_gallery.gallery_id!='".$rowdata->gallery_id."' AND wl_gallery.status!='2']");
				$this->form_validation->set_rules('gallery_image','Gallery Image',"file_allowed_type[image]");
				
				if($this->form_validation->run()==TRUE)
				{
					$uploaded_file = $rowdata->banner_image;				 
					$unlink_image = array('source_dir'=>"gallery",'source_file'=>$rowdata->gallery_image);
													
					if( !empty($_FILES) && $_FILES['gallery_image']['name']!='' )
					{			  
						  $this->load->library('upload');					
						  $uploaded_data =  $this->upload->my_upload('gallery_image','gallery');
						
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
						   $uploaded_file = $uploaded_data['upload_data']['file_name'];
						   removeImage($unlink_image);	
						}
					
				    }
					else
					{
						 $uploaded_file = $rowdata->gallery_image;
					}
					
					$posted_data = array(
					'gallery_title'	=>	$this->input->post('gallery_title'),
					'gallery_image'	=>	$uploaded_file				
					);
					
					$where = "gallery_id = '".$rowdata->gallery_id."'"; 				
					$this->gallery_model->safe_update('wl_gallery',$posted_data,$where,FALSE);						
					$this->session->set_userdata(array('msg_type'=>'success'));				
				    $this->session->set_flashdata('success',lang('successupdate'));	
					redirect('adminzone/gallery/'.query_string(), ''); 
					 
				}
				$data['res']=$rowdata;
				$this->load->view('gallery/view_gallery_edit',$data);
				
			
		}else
		{
			redirect('adminzone/gallery', ''); 	 
		}
		
	}
	
}
// End of controller