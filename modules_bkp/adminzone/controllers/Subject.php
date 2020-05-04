<?php
class Subject extends Admin_Controller
{
	public function __construct()
	{		
		parent::__construct(); 				
		$this->load->model(array('subject/subject_model'));  
		$this->load->helper('subject/subject');
		$this->config->set_item('menu_highlight','subject management');				
	}
	 
	public  function index(){
		
		 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');		 		 				
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;		
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));				 
		 $parent_id              =   (int) $this->uri->segment(4,0);			
	     
		 $keyword = trim($this->input->get_post('keyword',TRUE));		
		 $keyword = $this->db->escape_str($keyword);
	     $condtion = " ";
		 
		if($keyword=='')
		{
		   $condtion = "AND parent_id = '$parent_id'";
		   
		}
									
		$condtion_array = array(
		                'field' =>"*,( SELECT COUNT(subject_id) FROM wl_categories AS b
						              WHERE b.parent_id=a.subject_id ) AS total_subcategories",
						 'condition'=>$condtion,
						 'limit'=>$config['limit'],
						  'offset'=>$offset	,
						  'debug'=>FALSE
						 );							 						 	
		$res_array              =  $this->subject_model->getsubject($condtion_array);
		$config['total_rows']	=  $this->subject_model->total_rec_found;	
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
		$data['heading_title']  =  ( $parent_id > 0 ) ? 'Subsubject' :  'Category';
		$data['res']            =  $res_array; 	
		$data['parent_id']      =  $parent_id; 	
		
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_categories','subject_id');			
		}
		if( $this->input->post('update_order')!='')
		{			
			$this->update_displayOrder('wl_subject','sort_order','subject_id');			
		}
						
		$this->load->view('subject/view_subject_list',$data);		
		
		
	}	
	
	public function add()
	{
				
		 $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'cat_desc'));		
		 $parent_id         =  (int) $this->uri->segment(4,0);
		 
		 $img_allow_size =  $this->config->item('allow.file.size');
		 $img_allow_dim  =  $this->config->item('allow.imgage.dimension');
		
		
							
		if( $parent_id!='' && $parent_id > 0 )
		{
			$parent_id = applyFilter('NUMERIC_GT_ZERO',$parent_id);
			
			$data['heading_title'] = 'Add Sub Category';
			
			if($parent_id<=0)
			{
				redirect("adminzone/subject");
			}
			
			$parentdata=$this->subject_model->get_subject_by_id($parent_id);
			
			if(!is_array($parentdata))
			{
				$this->session->set_flashdata('message', lang('invalidRecord'));
					
				redirect('adminzone/subject', ''); 	
				
			}
			
			$data['parentData'] = $parentdata; 
			
				
		}else
		{
			$data['parentData'] = '';
			$data['heading_title'] = 'Add Category';
		}
		
		if($parent_id > 0)
		{
		 	$this->form_validation->set_rules('subject_name','Category Name',"trim|required|max_length[100]|xss_clean|unique[wl_categories.subject_name='".$this->input->post('subject_name')."' AND status!='2' AND parent_id='".$parent_id."']");
		}
		else
		{
			$this->form_validation->set_rules('subject_name','Category Name',"trim|required|max_length[100]|xss_clean|unique[wl_categories.subject_name='".$this->input->post('subject_name')."' AND status!='2' AND parent_id='0']");
		}
		 
		 $this->form_validation->set_rules('subject_description','Description',"max_length[6000]");
		 $this->form_validation->set_rules('subject_image','Image',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
		 
		if($this->form_validation->run()===TRUE)
		{
			    $uploaded_file = "";	
				
			    if( !empty($_FILES) && $_FILES['subject_image']['name']!='' )
				{			  
					$this->load->library('upload');	
						
					$uploaded_data =  $this->upload->my_upload('subject_image','subject');
				
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					
					}		
					
				}
				
			  	$posted_data = array(
					'subject_name'=>$this->input->post('subject_name'),
					'subject_description'=>$this->input->post('subject_description'),
					'parent_id' =>$parent_id,
					'friendly_url'=>url_title($this->input->post('subject_name')),
					'date_added'=>$this->config->item('config.date.time'),
					'subject_image'=>$uploaded_file				
				 );
								
		    $this->subject_model->safe_insert('wl_categories',$posted_data,FALSE);	
								
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));				
			$redirect_path= isset($parentdata) && is_array($parentdata) ? 'subject/index/'.$parentdata['subject_id'] : 'subject';			
			redirect('adminzone/'.$redirect_path, '');		
					
		}	
		$data['parent_id'] = $parent_id; 
		$this->load->view('catalog/view_subject_add',$data);		  
		  
	}
	
	
	public function edit()
	{
		
		$data['ckeditor'] = set_ck_config(array('textarea_id'=>'cat_desc'));
			
		$catId = (int) $this->uri->segment(4);
		
		$rowdata=$this->subject_model->get_subject_by_id($catId);
				
		$subjectId = $rowdata['subject_id'];
		
		$data['heading_title'] = ($rowdata['parent_id'] > 0 ) ? 'Sub Category' : 'Category';
		
		$img_allow_size =  $this->config->item('allow.file.size');
		$img_allow_dim  =  $this->config->item('allow.imgage.dimension');
		
		
		if( !is_array($rowdata) )
		{
			$this->session->set_flashdata('message', lang('idmissing'));	
			redirect('adminzone/subject', ''); 	
		}
			
			if($rowdata['parent_id'] > 0)
			{
				$this->form_validation->set_rules('subject_name','Category Name',"trim|required|max_length[100]|xss_clean|unique[wl_categories.subject_name='".$this->input->post('subject_name')."' AND status!='2' AND subject_id!='".$rowdata['subject_id']."' AND parent_id='".$rowdata['parent_id']."']");
			}
			else
			{
				$this->form_validation->set_rules('subject_name','Category Name',"trim|required|max_length[100]|xss_clean|unique[wl_categories.subject_name='".$this->input->post('subject_name')."' AND status!='2' AND subject_id!='".$rowdata['subject_id']."'  AND parent_id='0']");
			}
			 $this->form_validation->set_rules('subject_description','Description',"max_length[6000]");
			 $this->form_validation->set_rules('subject_image','Image',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");		 		
			
			if($this->form_validation->run()==TRUE)
			{	
						
				$uploaded_file = $rowdata['subject_image'];				 
				$unlink_image = array('source_dir'=>"subject",'source_file'=>$rowdata['subject_image']);
			 	if($this->input->post('cat_img_delete')==='Y')
				 {					
					removeImage($unlink_image);						
					$uploaded_file = NULL;	
								
				 }				
				 if( !empty($_FILES) && $_FILES['subject_image']['name']!='' )
				 {			  
						$this->load->library('upload');	
							
						$uploaded_data =  $this->upload->my_upload('subject_image','subject');
					
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
							$uploaded_file = $uploaded_data['upload_data']['file_name'];
						    removeImage($unlink_image);	
						}
						
				}				
														
				$posted_data = array(
					'subject_name'=>$this->input->post('subject_name'),
					'subject_description'=>$this->input->post('subject_description'),	
					'friendly_url'=>url_title($this->input->post('subject_name')),
					'subject_image'=>$uploaded_file				
				 );
				 
			 	$where = "subject_id = '".$subjectId."'"; 				
				$this->subject_model->safe_update('wl_categories',$posted_data,$where,FALSE);	
					
							
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('successupdate'));	
				
											
				$redirect_path= $rowdata['parent_id']>0 ? 'subject/index/'. $rowdata['parent_id'] : 'subject';
				
								
				redirect('adminzone/'.$redirect_path.'/'.query_string(), ''); 	
							
			}						
			
		$data['catresult']=$rowdata;		
		$this->load->view('catalog/view_subject_edit',$data);				
		
	}
	
	
}
// End of controller