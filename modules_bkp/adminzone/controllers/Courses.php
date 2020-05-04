<?php
class Courses extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('courses/courses_model'));  
		$this->load->helper('category/category');
		$this->config->set_item('menu_highlight','course management');	
		
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
			$cat_name .= get_db_field_value('wl_categories','category_name'," AND category_id='$category_id'");
		}
		
		if($status!='')
		{
			$condtion['status'] = $status;
		}
		
		$res_array               =  $this->courses_model->get_courses($config['limit'],$offset,$condtion);	
		//echo_sql();
		$config['total_rows']    =  get_found_rows();	
		$data['heading_title']   =  'Courses Lists';
		$data['res']             =  $res_array; 	
		$data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);	
		
		
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_courses','courses_id');			
		}
		
		/* Product set as a */
		if( $this->input->post('set_as')!='' )
		{	
		    $set_as    = $this->input->post('set_as',TRUE);			
			$this->set_as('wl_courses','courses_id',array($set_as=>'1'));			
		}
		
		if( $this->input->post('unset_as')!='' )
		{	
		    $unset_as   = $this->input->post('unset_as',TRUE);		
			$this->set_as('wl_courses','courses_id',array($unset_as=>'0'));			
		}
		/* End course set as a */
		
		$data['category_result_found'] = "Total ".$config['total_rows']." result(s) found ".strtolower($cat_name)." ";				
		$this->load->view('courses/view_course_list',$data);	
		
			
	}
	
	
	public function add()
	{			
		$data['heading_title'] = 'Add Course';		
		$categoryposted=$this->input->post('catid');		
		$data['categoryposted']=$categoryposted;		
		$categoryposted=$this->input->post('catid');		
		$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'description'));
		$img_allow_size =  $this->config->item('allow.file.size');
		$img_allow_dim  =  $this->config->item('allow.imgage.dimension');	
		//$this->form_validation->set_rules('category_id','Category Name',"trim|required");
		$this->form_validation->set_rules('course_name','Product Name',"trim|required|max_length[200]");
		$this->form_validation->set_rules('course_code','Product Code',"trim|required|max_length[65]|unique[wl_courses.course_code='".$this->input->post('course_code')."' AND status!='2']");
		$this->form_validation->set_rules('courses_description','Description',"max_length[8500]");			
		$this->form_validation->set_rules('course_price','Price',"trim|required|is_valid_amount");			
		$this->form_validation->set_rules('course_discounted_price','Discount Price',"trim|is_valid_amount|callback_check_price");
		$this->form_validation->set_rules('course_images1','Image1',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
		$this->form_validation->set_rules('course_images2','Image2',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
		$this->form_validation->set_rules('course_images3','Image3',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
		$this->form_validation->set_rules('course_images4','Image4',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");			 
			
		if ($this->form_validation->run()===TRUE) {	
		
		   // $category_links = get_parent_categories($this->input->post('category_id'),"AND status='1'","category_id,parent_id");		
			//$category_links = array_keys($category_links);
			//$category_links = implode(",",$category_links);
			$discounted_price = $this->input->post('course_discounted_price',TRUE);			
			$discounted_price = ($discounted_price=='') ? "0.0000" : $discounted_price;
			
			$posted_data = array(
				//'category_id'				=>	$this->input->post('category_id'),
				//'category_links'			=>	$category_links,
				'course_name'				=>	$this->input->post('course_name',TRUE),
				'course_friendly_url'		=>	url_title($this->input->post('course_name')),
				'course_code'				=>	$this->input->post('course_code',TRUE),
				'courses_description'		=>	$this->input->post('courses_description'),
				'course_price'				=>	$this->input->post('course_price',TRUE),
				'course_discounted_price'	=>	$discounted_price,
				'course_added_date'		=>	$this->config->item('config.date.time')						
			);
			$courseId = $this->courses_model->safe_insert('wl_courses',$posted_data,FALSE);
			//echo_sql();die;
			$this->add_course_media($courseId);
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));		
			redirect('adminzone/courses', '');		
			}
		$this->load->view('courses/view_course_add',$data);		  
	}
	
	
	public function edit($courseId)
	{			
		
		$data['heading_title'] = 'Edit Course';
		$courseId = (int) $this->uri->segment(4);		
		$option = array('courseid'=>$courseId);
		$res =  $this->courses_model->get_courses(1,0, $option);		
		$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'description'));	
		
		$img_allow_size =  $this->config->item('allow.file.size');
		$img_allow_dim  =  $this->config->item('allow.imgage.dimension');
				
		//$this->form_validation->set_rules('category_id','Category Name',"trim|required");
		$this->form_validation->set_rules('course_name','Product Name',"trim|required|max_length[200]");
		
		$this->form_validation->set_rules('course_code','Product Code',"trim|required|max_length[65]|unique[wl_courses.course_code='".$this->input->post('course_code')."' AND courses_id!='".$res['courses_id']."' AND status!='2']");
		
		$this->form_validation->set_rules('courses_description','Description',"max_length[8500]");			
		$this->form_validation->set_rules('course_price','Price',"trim|required|is_valid_amount");			
		$this->form_validation->set_rules('course_discounted_price','Discount Price',"trim|is_valid_amount|callback_check_price");
		
		//$this->form_validation->set_rules('brand', 'Product Brand', 'trim|required|xss_clean');
		
		$this->form_validation->set_rules('course_images1','Image1',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
		$this->form_validation->set_rules('course_images2','Image2',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
		$this->form_validation->set_rules('course_images3','Image3',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
		$this->form_validation->set_rules('course_images4','Image4',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");	
		
		
		if( is_array( $res ) && !empty( $res ))
		{
			if($this->form_validation->run()==TRUE)
			{
				 //$category_links = get_parent_categories($this->input->post('category_id'),"AND status='1'","category_id,parent_id");		
			    // $category_links = array_keys($category_links);
			    // $category_links = implode(",",$category_links);
				
				 $discounted_price = $this->input->post('course_discounted_price',TRUE);			
		    	 $discounted_price = ($discounted_price=='') ? "0.0000" : $discounted_price;
				
				$posted_data = array(
					//'category_id'				=>	$this->input->post('category_id'),
					//'category_links'			=>	$category_links,
					'course_name'				=>	$this->input->post('course_name',TRUE),
					'course_friendly_url'		=>	url_title($this->input->post('course_name')),
					'course_code'				=>	$this->input->post('course_code',TRUE),
					'courses_description'		=>	$this->input->post('courses_description'),
					'course_price'				=>	$this->input->post('course_price',TRUE),
					'course_discounted_price'	=>	$discounted_price,
					'course_added_date'			=>	$this->config->item('config.date.time')						
				);
								
				$where = "courses_id = '".$res['courses_id']."'"; 				
				$this->courses_model->safe_update('wl_courses',$posted_data,$where,FALSE);
				$this->edit_course_media($res['courses_id']);
				//echo_sql();die;
				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('successupdate'));		
				redirect('adminzone/courses/'.query_string(), '');		
			}
				
			$data['res']=$res;	
			$media_option = array('courseid'=>$res['courses_id']);
			$res_photo_media = $this->courses_model->get_course_media(4,0, $media_option);	
			$data['res_photo_media']=$res_photo_media;	
			$this->load->view('courses/view_course_edit',$data);		
		} else{
			redirect('adminzone/courses', ''); 	
		}
	}
	
	
		
	public function add_course_media($courseId)
	{
		if( !empty($_FILES) && ( $courseId > 0 ) )
		{
			$defalut_image = 'Y';
			
			foreach($_FILES as $key=>$val)
			{
				$imgfld=$key;
				
				if(array_key_exists($imgfld,$_FILES))
				{
					$this->load->library('upload');									
					$data_upload_sugg = $this->upload->my_upload($imgfld,"courses");
					
					if( is_array($data_upload_sugg)  && !empty($data_upload_sugg) )
					{ 
						$add_data = array(
						'courses_id'=>$courseId,
						'media_type'=>'photo',
						'is_default'=>$defalut_image,									
						'media'=>$data_upload_sugg['upload_data']['file_name'],
						'media_date_added' => $this->config->item('config.date.time')
						);															
						$this->course_model->safe_insert('wl_courses_media', $add_data ,FALSE );
					
					}
						
					$defalut_image = 'N';
				}
			}
		
		}
	
  }	
   
	
	public function edit_course_media($courseId)
	{
		//Current Media Files resultset
		$media_option = array('courseid'=>$courseId);
		$res_photo_media = $this->courses_model->get_course_media(4,0, $media_option);			
		$res_photo_media = !is_array($res_photo_media ) ? array() : $res_photo_media ;
		
		$delete_media_files = $this->input->post('course_img_delete'); //checkbox items given for image deletion
		
		$arr_delete_items = array(); //holding our deleted ids for later use
		
		/* Tracking delete media ids coming from checkboxes */
		
		if(is_array($delete_media_files) && !empty($delete_media_files))
		{
		
			foreach($res_photo_media as $key=>$val)
			{
				$media_id = $val['id'];
				if(array_key_exists($media_id,$delete_media_files))
				{
					 $media_file = $res_photo_media[$key]['media'];
					 $unlink_image = array('source_dir'=>"courses",'source_file'=>$media_file);
					 removeImage($unlink_image);	
					 array_push($arr_delete_items,$media_id);
				}
			}
		}
		
		/* Tracking Ends */
		
		/* Iterating Form Files */
		
		if( !empty($_FILES) && ( $courseId > 0 ) )
		{
			$sx = 0;
			foreach($_FILES as $key=>$val)
			{
				$imgfld=$key;
				
				if(array_key_exists($imgfld,$_FILES))
				{
					$this->load->library('upload');									
					$data_upload_sugg = $this->upload->my_upload($imgfld,"courses");
					
					if( is_array($data_upload_sugg)  && !empty($data_upload_sugg) )
					{
						/*  uploading successful  */
						$add_data = array(
						'courses_id'=>$courseId,
						'media_type'=>'photo',													
						'media'=>$data_upload_sugg['upload_data']['file_name'],
						'media_date_added' => $this->config->item('config.date.time')
						);	
						if(array_key_exists($sx,$res_photo_media))
						{							      
						       $media_id  = $res_photo_media[$sx]['id'];
							   $media_file = $res_photo_media[$sx]['media'];
						       $where = "id = '".$media_id."'"; 				
				               $this->courses_model->safe_update('wl_courses_media',$add_data,$where,FALSE);				   								$unlink_image = array('source_dir'=>"courses",'source_file'=>$media_file);
							   removeImage($unlink_image);
							   
							   /* New File has been browsed and delete checkbox also checked for this file */
							   /* This  media id cannot be removed as it been browsed and updated */
							   if(in_array($media_id,$arr_delete_items))
							   {
									$media_del_index = array_search($media_id,$arr_delete_items);
									unset($arr_delete_items[$media_del_index]);  
							   }
							   										
						  
						}else
						{
							$this->courses_model->safe_insert('wl_courses_media', $add_data ,FALSE );
							
						}
						
					}
						
					
				}
				$sx++;
			}
		
		}
		
		if(!empty($arr_delete_items))
		{
			$del_ids = implode(',',$arr_delete_items);
			$where = " id IN(".$del_ids.") ";
			$this->course_model->delete_in('wl_courses_media',$where,FALSE);
		}
	
  }	
  
  public function related()
	{
		$productId =  (int) $this->uri->segment(4);		
		$option = array('courseid'=>$courseId);
		$res =  $this->courses_model->get_courses(1,0, $option);		
			
			
		if( is_array($res) )
		{
			$data['heading_title'] = "Add Related course";
			$fetch_related_courses  = $this->courses_model->related_courses_added($res['courses_id']);
			
			if(empty($fetch_related_courses)) {
				$fetch_not_ids = array($res['courses_id']);
			}else{
				$fetch_not_ids=array_values($fetch_related_courses);
				array_push($fetch_not_ids,$res['courses_id']);
			}
			$res_array  = $this->courses_model->get_related_courses($fetch_not_ids);
			//echo_sql();die;
			$data['res'] = $res_array; 	
			/* Add related courses */
			if($this->input->post('add_related')=='Add related course') {
				$this->add_related_courses($res['courses_id']);
				$this->session->set_flashdata('message',"Related courses has been added successfully." ); 
				redirect('adminzone/courses/related/'.$courseId, '');	
			}
			/* End of  related courses */
			$this->load->view('courses/view_add_related_courses',$data);
		} 
	}
	
	
	public function add_related_courses($course_id)
	{
		$arr_ids = $this->input->post('arr_ids');	
		
		 if( is_array($arr_ids))
		 {
					
				foreach($arr_ids as $val )
				{
					$rec_exits = $this->courses_model->is_record_exits('wl_courses_related',
				       array('condition'=>"related_id =".$val." AND course_id =".$course_id." ")	);
				
					if( !$rec_exits )
					{
						$posted_data = array(
						'course_id'=>$course_id,
						'related_id'=>$val,
						'related_date_added'=>$this->config->item('config.date.time')							
						);
						$this->courses_model->safe_insert('wl_courses_related',$posted_data,FALSE);
					}
				}
		    }
	  }
	
	
	
	public function remove_related_courses($courseId)
	{
		$arr_ids = $this->input->post('arr_ids');
		if( is_array($arr_ids) )
		{
			if($this->input->post('remove_related')=='Remove course')
			{		
				foreach($arr_ids as $val )
				{
					$data = array('id'=>$val );
					$this->courses_model->safe_delete('wl_courses_related',$data,FALSE);				   
				}
				
			} 
		}
		
	}
	
	public function view_related()
	{		
		$courseId =  (int) $this->uri->segment(4);	
		$option = array('courseid'=>$courseId);
		$res =  $this->courses_model->get_courses(1,0, $option);
				
		if( is_array($res) ) 
		{
			$data['heading_title'] = "View Related Courses";
			$res_array  = $this->courses_model->related_courses($res['courses_id']);	
			$data['res'] = $res_array; 	
			
			/* Remove related courses */
				
				if($this->input->post('remove_related')=='Remove course')
				{					
					$this->remove_related_courses($res['courses_id']);
					$this->session->set_flashdata('message',"Related course has been removed successfully." ); 
				    redirect('adminzone/courses/view_related/'.$courseId, '');
					
				}
				
			/* End of  remove related courses */
					
			$this->load->view('courses/view_related_courses',$data);
			
			
		} 			
		
	}	
	
	public function check_price(){
			$disc_price = floatval($this->input->post('course_discounted_price'));
			$price      = floatval($this->input->post('course_price'));
			if($disc_price>=$price){
				$this->form_validation->set_message('check_price', 'Discount price must be less than actual price.');
			    return FALSE;
								
			}else{
				 return TRUE;
			}
	}
	
	

	
}
// End of controller