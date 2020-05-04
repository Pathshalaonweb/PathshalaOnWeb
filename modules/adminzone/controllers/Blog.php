<?php
class Blog extends Admin_Controller
{

	public function __construct()
	{	
			parent::__construct(); 				
			$this->load->model(array('blog/blog_model'));
			$this->load->helper('blogcategory/blogcategory');  			
			$this->config->set_item('menu_highlight','blog management');	
	}
	
	
	 public  function index()
	 {
		
		 $pagesize               =   (int) $this->input->get_post('pagesize');
		 $config['limit']		 =   ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =   ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $base_url               =   current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $res_array              =   $this->blog_model->get_blog($config['limit'],$offset);	
		 $total_record           =   get_found_rows();
		 $config['total_rows']   =   $total_record;
		 $data['total_rec']			 =$total_record;
		 $data['page_links']     =   admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
		 $data['res']            =   $res_array; 
				 
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_blog','blog_id');			
		}
		if( $this->input->post('update_order')!='')
		{
			$this->update_displayOrder('wl_blog','sort_order','blog_id');	
		}
		$data['heading_title'] = 'Manage Blog\'s';
		$data['pagelist']      = $res_array; 			
		$this->load->view('blog/view_blog_list',$data);        
			
		
	    }
	   
		
		public function add() {			
		  $img_allow_size =  $this->config->item('allow.file.size');
		 $img_allow_dim  =  $this->config->item('allow.imgage.dimension');
		  $data['ckeditor']      =  set_ck_config(array('textarea_id'=>'blog_detail'));				
		  $data['heading_title'] = 'Add Blog';
		  $this->form_validation->set_rules('category_id','category','trim|required|xss_clean');			
	      $this->form_validation->set_rules('title','Title',"trim|required|max_length[255]|xss_clean|unique[wl_blog.title='".$this->db->escape_str($this->input->post('title'))."' AND status!='2']");
		  $this->form_validation->set_rules('detail','Detail','trim|required|required_stripped|xss_clean|max_length[8500]');
			
		if($this->form_validation->run()==TRUE)
			{
				
				$uploaded_file = "";	
				
			    if( !empty($_FILES) && $_FILES['blog_image_thumbnail']['name']!='' )
				{			  
					$this->load->library('upload');	
					$uploaded_data =  $this->upload->my_upload('blog_image_thumbnail','blog');
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					}			
				}
				
				$uploaded_file1 = "";
				if( !empty($_FILES) && $_FILES['blog_image']['name']!='' )
				{			  
					$this->load->library('upload');	
					$uploaded_data1 =  $this->upload->my_upload('blog_image','blog');
					if( is_array($uploaded_data1)  && !empty($uploaded_data1) )
					{ 								
						$uploaded_file1 = $uploaded_data1['upload_data']['file_name'];
					}			
				}
				
				
			
			      $posted_data = array(
				  	'category_id' => $this->input->post('category_id',TRUE),
					'title'=>$this->input->post('title',TRUE),
					'blog_image_thumbnail'=>$uploaded_file1,
					'blog_image'=>$uploaded_file11,
					'url'	=>url_title($this->input->post('title')),
					'detail'=>$this->input->post('detail',TRUE),
					'blog_date_added'=>$this->config->item('config.date.time')
				 );
				 				
			    $this->blog_model->safe_insert('wl_blog',$posted_data,FALSE);					 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));			
				redirect('adminzone/blog', '');
				
			
			}
			
			$this->load->view('blog/view_blog_add',$data);				
	   
	   }
	   
	   
	   public function edit()
	   {
	     	$img_allow_size =  $this->config->item('allow.file.size');
			$img_allow_dim  =  $this->config->item('allow.imgage.dimension');
		    $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'blog_detail'));	
					   
		    $data['heading_title'] = 'Edit Blog';
			
			$Id = (int) $this->uri->segment(4);
			$param=array(
					'pid'=>$Id,
					'status'=>'1',
					);
			
			$res = $this->blog_model->get_blog(1,0,$param);
			
			
		 if(is_array($res) && !empty($res)){ 
		   $this->form_validation->set_rules('category_id','category','trim|required|xss_clean');
		    $this->form_validation->set_rules('title','Title',"trim|required|max_length[255]|xss_clean|unique[wl_blog.title='".$this->db->escape_str($this->input->post('title'))."' AND status!='2' AND blog_id!=".$Id."]");
		$this->form_validation->set_rules('detail','Detail','trim|required|required_stripped|xss_clean|max_length[8500]');
			if($this->form_validation->run()==TRUE)
			{	
			
				$uploaded_file = $res['blog_image_thumbnail'];				 
				$unlink_image = array('source_dir'=>"blog",'source_file'=>$rowdata['blog_image_thumbnail']);
			 	if($this->input->post('blog_img_delete')==='Y')
				 {					
					removeImage($unlink_image);						
					$uploaded_file = NULL;	
				}				
				 if( !empty($_FILES) && $_FILES['blog_image_thumbnail']['name']!='' )
				 {			  
						$this->load->library('upload');	
							
						$uploaded_data =  $this->upload->my_upload('blog_image_thumbnail','blog');
					
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
							$uploaded_file = $uploaded_data['upload_data']['file_name'];
						    removeImage($unlink_image);	
						}
						
				}
				
				
				$uploaded_file1 = $res['blog_image'];				 
				$unlink_image1 = array('source_dir'=>"blog",'source_file'=>$res['blog_image']);
			 	if($this->input->post('blog_img_delete')==='Y')
				 {					
					removeImage($unlink_image1);						
					$uploaded_file1 = NULL;	
				 }		
				 if( !empty($_FILES) && $_FILES['blog_image']['name']!='' )
				 {			  
						$this->load->library('upload');	
						$uploaded_data1 =  $this->upload->my_upload('blog_image','blog');
						if( is_array($uploaded_data1)  && !empty($uploaded_data1) )
						{ 								
							$uploaded_file1 = $uploaded_data1['upload_data']['file_name'];
						    removeImage($unlink_image1);	
						}
						
				}					
			//	print_r($_REQUEST);
				$posted_data = array(
					'category_id' => $this->input->post('category_id',TRUE),
					'title'=>$this->input->post('title',TRUE),
					'blog_image_thumbnail'=>$uploaded_file,
					'blog_image'			=>$uploaded_file1,
					'url'	=>url_title($this->input->post('title')),
					'detail'=>$this->input->post('detail',TRUE)
				);
				
				$where = "blog_id = '".$res['blog_id']."'"; 						
				$this->blog_model->safe_update('wl_blog',$posted_data,$where,FALSE);	
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('successupdate'));	
				//echo_sql();die;
				redirect('adminzone/blog/'.query_string(), ''); 	
			}
				
			    $data['res']=$res;
			    $this->load->view('blog/view_blog_edit',$data);
				
		   }else
		   {
			   
			  redirect('adminzone/blog', ''); 	 
			   
		   }
		   
	 }
	   
	   
	
	public function yes(){
		$id=$this->uri->segment('4');
		$posted_data = array(
				'display_home'=>'1',
				);
		
		$where = "blog_id = '".$id."'"; 						
		$this->blog_model->safe_update('wl_blog',$posted_data,$where,FALSE);	
		$this->session->set_userdata(array('msg_type'=>'success'));
		$this->session->set_flashdata('success',lang('successupdate'));	
		
		redirect('adminzone/blog');
		
		}

	public function no(){
		$id=$this->uri->segment('4');
		$posted_data = array(
				'display_home'=>'0',
				);
		
		$where = "blog_id = '".$id."'"; 						
		$this->blog_model->safe_update('wl_blog',$posted_data,$where,FALSE);	
		$this->session->set_userdata(array('msg_type'=>'success'));
		$this->session->set_flashdata('success',lang('successupdate'));	
		
		redirect('adminzone/blog');
		
		}   
	   

}
//controllet end