<?php
class Files extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('files/files_model'));  
		$this->load->helper('category/category');
		$this->config->set_item('menu_highlight','files Management');	
		$this->form_validation->set_error_delimiters("<div class='required'>","</div>");
		
	}
	
	public  function index($page = NULL)
	{
		 $condtion               = array();
		 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $category_id            =  (int) $this->uri->segment(4,0);
		$status			        =   $this->input->get_post('status',TRUE);	
		
		$cat_name               = '';	
			
		if($category_id > 0 )
		{
			$condtion['category_id'] = $category_id;
			$cat_name       = 'in ';	
			$cat_name .= get_db_field_value('tbl_categories','category_name'," AND category_id='$category_id'");
		}
		
		if($status!='')
		{
			$condtion['status'] = $status;
		}
		
		$res_array               =  $this->files_model->get_files($config['limit'],$offset,$condtion);	
		//echo_sql();
		$config['total_rows']    =  get_found_rows();	
		$data['heading_title']   =  'Grammar Chapters Lists';
		$data['res']             =  $res_array; 	
		$data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);	
		
		
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('tbl_files','files_id');			
		}
		
		/* Product set as a */
		if( $this->input->post('set_as')!='' )
		{	
		    $set_as    = $this->input->post('set_as',TRUE);			
			$this->set_as('tbl_files','files_id',array($set_as=>'1'));			
		}
		
		if( $this->input->post('unset_as')!='' )
		{	
		    $unset_as   = $this->input->post('unset_as',TRUE);		
			$this->set_as('tbl_files','files_id',array($unset_as=>'0'));			
		}
		/* End product set as a */
		
		$data['category_result_found'] = "Total ".$config['total_rows']." result(s) found ".strtolower($cat_name)." ";				
		$this->load->view('files/view_files_list',$data);	
		
			
	}
	
	
	public function add()
	{			
		$data['heading_title'] = 'Add Details';		
		//$categoryposted=$this->input->post('catid');		
		//$data['categoryposted']=$categoryposted;		
		//$categoryposted=$this->input->post('catid');		
		$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'description'));
		
		$this->form_validation->set_rules('category_id','Category',"trim|required");
		$this->form_validation->set_rules('files_name','Files Name',"trim|required|max_length[200]");
		$this->form_validation->set_rules('file_image','Upload Files',"required|file_allowed_type[pdf]");
		
	 
		if($this->form_validation->run()===TRUE)
		{	
				$uploaded_file = "";	
				
			    if( !empty($_FILES) && $_FILES['file_image']['name']!='' )
				{			  
					$this->load->library('upload');	
						
					$uploaded_data =  $this->upload->my_upload('file_image','file');
				
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					
					}		
					
				}
		
		    $category_links = get_parent_categories($this->input->post('category_id'),"AND status='1'","category_id,parent_id");		
			$category_links = array_keys($category_links);
			$category_links = implode(",",$category_links);		
			
			
			$posted_data = array(
			'category_id'				=>	$this->input->post('category_id'),
			'category_links'			=>	$category_links,
			'files_name'				=>	$this->input->post('files_name',TRUE),
			'files_friendly_url'		=>	url_title($this->input->post('files_name')),
			'files_img'				    =>	$uploaded_file,
			'files_added_date'			=>	$this->config->item('config.date.time')						
			);
			
			$this->files_model->safe_insert('tbl_files',$posted_data,FALSE);
				
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));		
			redirect('adminzone/files', '');		
									
		}
		
		$this->load->view('files/view_files_add',$data);		  
		
	}
	
	
	public function edit($templateId)
	{			
		$data['heading_title'] = 'Edit File';
		$courseId = (int) $this->uri->segment(4);		
		$option = array('files_id'=>$courseId);
		
		$res =  $this->files_model->get_files($option);		
		$res=$res[0];
		//print_r($res); die;
		$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'description'));	
		
		
		$this->form_validation->set_rules('category_id','Category Name',"trim|required");
		$this->form_validation->set_rules('files_name','Files Name',"trim|required|max_length[200]");
		$this->form_validation->set_rules('file_image','Upload Files',"required|file_allowed_type[pdf]");

	 
		if( is_array( $res ) && !empty( $res ))
		{
			if($this->form_validation->run()==TRUE)
			{
				$category_links = get_parent_categories($this->input->post('category_id'),"AND status='1'","category_id,parent_id");		
				$category_links = array_keys($category_links);
				$category_links = implode(",",$category_links);	
				
				
				$uploaded_file = $res['files_img'];				 
					$unlink_image = array('source_dir'=>"file",'source_file'=>$res['files_img']);
													
					if( !empty($_FILES) && $_FILES['file_image']['name']!='' )
					{			  
						  $this->load->library('upload');					
						  $uploaded_data =  $this->upload->my_upload('file_image','file');
						
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
						   $uploaded_file = $uploaded_data['upload_data']['file_name'];
						   removeImage($unlink_image);	
						}
					
				    }	
			$posted_data = array(
				'category_id'			=>	$this->input->post('category_id'),
			'category_links'			=>	$category_links,
			'files_name'				=>	$this->input->post('files_name',TRUE),
			'files_friendly_url'		=>	url_title($this->input->post('files_name')),
			'files_img'				    =>	$uploaded_file,
			'files_updated_date'		=>	$this->config->item('config.date.time')		
								
			);
								
				$where = "files_id = '".$res['files_id']."'"; 				
				$this->files_model->safe_update('tbl_files',$posted_data,$where,FALSE);
				

				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('successupdate'));		
				redirect('adminzone/files/'.query_string(), '');		
			}
				
		$data['res']=$res;	
	
				
		$this->load->view('files/view_files_edit',$data);		
		}
		else
		{
			redirect('adminzone/files', ''); 	
		}
	}
	
	
}
// End of controller