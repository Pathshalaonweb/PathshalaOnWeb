<?php
class Brand extends Admin_Controller
{

	public function __construct(){
	
			parent::__construct();
			
		    $this->config->set_item('menu_highlight','product management');	
			$this->load->model(array('brand_model')); 	
	
	}
	
	   public  function index()
	   {		 
			$pagesize               =  (int) $this->input->get_post('pagesize');
			
			$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
			
			$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
			
			$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
										
			$res_array              =  $this->brand_model->get_brand($offset,$config['limit']);
			
			$config['total_rows']	= $this->brand_model->total_rec_found;	
			
			$data['page_links']     =  admin_pagination("$base_url",$config['total_rows'],$config['limit'],$offset);
			
			$data['heading_title']  =   'Manage Brand';
			
			$data['res']            =  $res_array; 
			
			
			if($this->input->post('status_action')!='')
			{
			
			$this->update_status('wl_brands','brand_id');
			
			}		
			
			$this->load->view('brand/view_brand_list',$data);	
		      
			
		
	    }
		
		
		public function add(){				
			$data['heading_title'] = 'Add Brand';			
			$this->form_validation->set_rules('brand_name','Brand Name',"trim|required|max_length[50]|xss_clean|unique[wl_brands.brand_name='".$this->db->escape_str($this->input->post('brand_name'))."' AND status!='2']");
			 $this->form_validation->set_rules('brand_image','Brand Image',"file_allowed_type[image]");
			
			if($this->form_validation->run()==TRUE)
			{
				
				$uploaded_file = "";	
				
			    if( !empty($_FILES) && $_FILES['brand_image']['name']!='' )
				{			  
					$this->load->library('upload');	
						
					$uploaded_data =  $this->upload->my_upload('brand_image','brand');
				    if(is_array($uploaded_data)  && !empty($uploaded_data) ){ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					}		
					
				}
			
				
				$posted_data = array( 'brand_name'		=>	$this->input->post('brand_name',TRUE),
									  'brand_image'		=>	$uploaded_file,
				                      'added_date'   	=>	$this->config->item('config.date.time')
				                      );
				
				$this->brand_model->safe_insert('wl_brands',$posted_data,FALSE);
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));		
				redirect('adminzone/brand', '');
			}
							   
			$this->load->view('brand/view_brand_add',$data);		
	   
	   }
	   
	  
	   
	   public function edit()
	   {
		    $data['heading_title'] = 'Edit Brand';
			$Id = (int) $this->uri->segment(4);
			$rowdata=$this->brand_model->get_brand_by_id($Id);
			
		  if( is_object($rowdata) )
		  { 
				$this->form_validation->set_rules('brand_name','Brand Name',"trim|required|xss_clean|max_length[50]|unique[wl_brands.brand_name='".$this->db->escape_str($this->input->post('brand_name'))."' AND status!='2' AND brand_id!='".$Id."']");
				
				$this->form_validation->set_rules('brand_image','Brand Image',"file_allowed_type[image]");
				
				if($this->form_validation->run()==TRUE)
				{
					
					$uploaded_file = $rowdata->brand_image;				 
					$unlink_image = array('source_dir'=>"brand",'source_file'=>$rowdata->brand_image);
													
					if( !empty($_FILES) && $_FILES['brand_image']['name']!='' )
					{			  
						  $this->load->library('upload');					
						  $uploaded_data =  $this->upload->my_upload('brand_image','brand');
						
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
						   $uploaded_file = $uploaded_data['upload_data']['file_name'];
						   removeImage($unlink_image);	
						}
					
				    }	
				
					$posted_data = array( 'brand_name'=>$this->input->post('brand_name',TRUE),
										  'brand_image'=>$uploaded_file
				                      
				                      );
						
						$where = "brand_id = '".$rowdata->brand_id."'"; 						
						$this->brand_model->safe_update('wl_brands',$posted_data,$where,FALSE);	
						$this->session->set_userdata(array('msg_type'=>'success'));
						$this->session->set_flashdata('success',lang('successupdate'));		
						redirect('adminzone/brand/'.query_string(), ''); 	
				
				}
								
			    $data['res']=$rowdata;
			    $this->load->view('brand/view_brand_edit',$data);
				
		   }else{
			   
			  redirect('adminzone/brand', ''); 	 
			   
		   }
		   
	   }

}
//controllet end