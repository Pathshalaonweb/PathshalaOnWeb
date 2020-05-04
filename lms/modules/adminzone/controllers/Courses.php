<?php
class Courses extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('courses/courses_model','department_model'));  
		$this->load->helper(array('category/category','department','courses/courses'));
		$this->config->set_item('menu_highlight','Courses Management');	
		
	}
	
	public  function index()
	{	 
		 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');		 		 				
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;		
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));				 
		 $parent_id              =  (int) $this->uri->segment(4,0);			
	     
		 $keyword = trim($this->input->get_post('keyword',TRUE));		
		 $keyword = $this->db->escape_str($keyword);
	     $condtion = " ";
		 
		if($keyword=='')
		{
		   $condtion = "AND parent_id = '$parent_id'";
		}
												
		$res_array = $this->department_model->get_dept();
		$config['total_rows']	=  $this->department_model->total_rec_found;	
		
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
				
		$data['heading_title']  =  ( $parent_id > 0 ) ? 'Category' :  'Category';
						
		$data['res']            =  $res_array; 	
		
		$data['parent_id']      =  $parent_id; 	
		
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('tbl_department','category_id');			
		}
		if( $this->input->post('update_order')!='')
		{			
			$this->update_displayOrder('tbl_department','sort_order','category_id');			
		}
		$this->load->view('courses/view_department_list',$data);			
	}	
	
	public function add()
	{		
		$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'cat_desc'));		
		$parent_id         =  (int) $this->uri->segment(4,0);
						
		if( $parent_id!='' && $parent_id > 0 )
		{
			$parent_id = applyFilter('NUMERIC_GT_ZERO',$parent_id);
			$data['heading_title'] = 'Add Sub Category';
			if($parent_id<=0)
			{
				redirect("adminzone/category");
			}
			$parentdata	= 	$this->department_model->get_category_by_id($parent_id);
			if(!is_array($parentdata))
			{
				$this->session->set_flashdata('message', lang('invalidRecord'));	
				redirect('adminzone/category', ''); 
			}
			$data['parentData'] = $parentdata; 	
		}
		else
		{
			$data['parentData'] = '';
			$data['heading_title'] = 'Add Category';
		}
		
		if($parent_id > 0)
		{
		 	$this->form_validation->set_rules('category_name','Category Name',"trim|required|max_length[100]|unique[tbl_department.category_name='".$this->input->post('category_name')."' AND status!='2' AND parent_id='".$parent_id."']");
		}
		else
		{
			$this->form_validation->set_rules('category_name','Category Name',"trim|required|max_length[100]|unique[tbl_department.category_name='".$this->input->post('category_name')."' AND status!='2' AND parent_id='0']");
		} 
		 
		$this->form_validation->set_rules('category_description','Description',"max_length[600000]");
		if($this->form_validation->run()===TRUE)
		{
			$uploaded_file = "";	
			$posted_data = array(
								'category_name'=>$this->input->post('category_name'),
								'category_description'=>$this->input->post('category_description'),
								'parent_id' =>$parent_id,
								'friendly_url'=>url_title($this->input->post('category_name')),
								'date_added'=>$this->config->item('config.date.time'),
								'category_image'=>$uploaded_file				
								);
								
		    $this->courses_model->safe_insert('tbl_department',$posted_data,FALSE);	
								
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));				
			$redirect_path= isset($parentdata) && is_array($parentdata) ? 'courses/index/'.$parentdata['category_id'] : 'courses';			
			redirect('adminzone/'.$redirect_path, '');				
		}	
		$data['parent_id'] = $parent_id; 
		$this->load->view('courses/view_department_add',$data);		    
	}
	
	
	public function edit()
	{
		$data['ckeditor'] 	= set_ck_config(array('textarea_id'=>'cat_desc'));	
		$catId 				= (int) $this->uri->segment(4);
		$rowdata			= $this->department_model->get_category_by_id($catId);	
		if(is_array($rowdata) && !empty($rowdata))
		{
			$categoryId 		= $rowdata['category_id'];
			$data['heading_title'] = ($rowdata['parent_id'] > 0 ) ? 'Sub Category' : 'Category';

			$img_allow_size =  $this->config->item('allow.file.size');
			$img_allow_dim  =  $this->config->item('allow.imgage.dimension');
			
			if($rowdata['parent_id'] > 0)
			{
				$this->form_validation->set_rules('category_name','Category Name',"trim|required|max_length[100]");
			}
			else
			{
				$this->form_validation->set_rules('category_name','Category Name',"trim|required|max_length[100]");
			}

			if($this->form_validation->run()==TRUE)
			{										
				$posted_data = array(
									'category_name'=>$this->input->post('category_name'),
									'category_description'=>'',	
									'friendly_url'=>url_title($this->input->post('category_name')),
									'category_image'=>''				
									);
				$where = "category_id = '".$categoryId."'"; 				
				$this->department_model->safe_update('tbl_department',$posted_data,$where,FALSE);	
								
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('successupdate'));								
				$redirect_path= $rowdata['parent_id']>0 ? 'courses/index/'. $rowdata['parent_id'] : 'courses';
									
				redirect('adminzone/'.$redirect_path.'/'.query_string(), ''); 					
			}						
			
			$data['catresult']=$rowdata;		
			$this->load->view('courses/view_department_edit',$data);	
		}
		else
		{
			$this->session->set_flashdata('message', lang('idmissing'));	
			redirect('adminzone/courses', ''); 	
		}
	}
	
	public  function subject($page = NULL)
	{
		$img_allow_size =  $this->config->item('allow.file.size');
		$img_allow_dim  =  $this->config->item('allow.imgage.dimension');
		$condtion               = array();
		$pagesize               =  (int) $this->input->get_post('pagesize');
	    $config['limit']		=  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$category_id            =  (int) $this->uri->segment(4,0);
		$data['category_id']	=  $category_id;
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
		$res_array               =  $this->courses_model->get_courses($config['limit'],$offset,$condtion);	
		$config['total_rows']    =  get_found_rows();	
		$data['heading_title']   =  'Courses';
		$data['res']             =  $res_array; 	
		$data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);	
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('tbl_courses','courses_id');			
		}

		$data['category_result_found'] = "Total ".$config['total_rows']." result(s) found ".strtolower($cat_name)." ";				
		$this->load->view('courses/view_subject_list',$data);		
	}
	
	
	public function subject_add()
	{			
		$data['heading_title'] 	= 'Add Subject';		
		$data['ckeditor']  		=  set_ck_config(array('textarea_id'=>'description'));
		$category_id            =  (int) $this->uri->segment(4,0);
		$this->form_validation->set_rules('courses_name','Courses Name',"trim|required|max_length[200]");
		$this->form_validation->set_rules('courses_code','Courses Code',"trim|required|max_length[65]|unique[tbl_courses.courses_code='".$this->input->post('courses_code')."' AND status!='2']");
		$this->form_validation->set_rules('teacher_id','Teacher',"trim|required");
		$this->form_validation->set_rules('price','price',"trim|required");
		$this->form_validation->set_rules('courses_description','Courses Description',"trim|required");	
			          
	         
		if($this->form_validation->run()===TRUE)
		{	
		 		$uploaded_file = "";	
				if( !empty($_FILES) && $_FILES['courses_image']['name']!='' )
				{			  
					$this->load->library('upload');	
					$uploaded_data =  $this->upload->my_upload('courses_image','courses');
				    if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					}		
				}
			$posted_data = array(
							'category_id'				=>	$category_id,
							'courses_name'				=>	$this->input->post('courses_name',TRUE),
							'courses_friendly_url'		=>	url_title($this->input->post('courses_name')),
							'courses_code'				=>	$this->input->post('courses_code',TRUE),
							'price'						=>	$this->input->post('price',TRUE),
							'image'						=>	$uploaded_file,
							'teacher_id'				=>	$this->input->post('teacher_id',TRUE),	
							'courses_description'		=>	$this->input->post('courses_description',TRUE),
							'str_total_time'            =>  $this->input->post('str_total_time',TRUE),
							'courses_added_date'		=>	$this->config->item('config.date.time')						
							);
							
			$coursesId = $this->courses_model->safe_insert('tbl_courses',$posted_data,FALSE);
			//echo_sql();die;
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));		
			redirect('adminzone/courses/subject/'.$category_id.'', '');		
		}
		$data['category_id']		=	$category_id;
		$this->load->view('courses/view_subject_add',$data);		  
	}
	
	
	public function subject_edit($templateId)
	{			
		$data['heading_title'] = 'Edit Subject';
		$courseId 	= (int) $this->uri->segment(4);		
		//$option 	= array('courses_id'=>$courseId);
		$img_allow_size =  $this->config->item('allow.file.size');
		$img_allow_dim  =  $this->config->item('allow.imgage.dimension');
		$res 		=  $this->courses_model->get_courses_by_id($courseId);	
		//echo "<pre>"; print_r($res); die;		
		//$res		=  $res[0];
		if(is_array($res) && !empty($res))
		{
			$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'description'));	
	
			$this->form_validation->set_rules('courses_name','Courses Name',"trim|required|max_length[200]");
			$this->form_validation->set_rules('courses_code','Courses Code',"trim|required|max_length[65]");
			$this->form_validation->set_rules('teacher_id','Teacher',"trim|required");
			//$this->form_validation->set_rules('str_total_time',' Total Time ',"trim|required");	
			$this->form_validation->set_rules('price','price',"trim|required");
			$this->form_validation->set_rules('courses_description','Courses Description',"trim|required");	
			if($this->form_validation->run()==TRUE)
			{
				$uploaded_file = $res['image'];				 
				$unlink_image = array('source_dir'=>"courses",'source_file'=>$res['image']);
			 	if($this->input->post('cat_img_delete')==='Y')
				 {					
					removeImage($unlink_image);						
					$uploaded_file = NULL;	
				 }				
				 if( !empty($_FILES) && $_FILES['courses_image']['name']!='' )
				 {			  
						$this->load->library('upload');	
						$uploaded_data =  $this->upload->my_upload('courses_image','courses');
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
							$uploaded_file = $uploaded_data['upload_data']['file_name'];
						    removeImage($unlink_image);	
						}
						
				}
				$posted_data = array(
									'courses_name'				=>	$this->input->post('courses_name',TRUE),
									'courses_friendly_url'		=>	url_title($this->input->post('courses_name')),
									'courses_code'				=>	$this->input->post('courses_code',TRUE),
									'image'						=>	$uploaded_file,
									'teacher_id'				=>	$this->input->post('teacher_id',TRUE),
									'price'						=>	$this->input->post('price',TRUE),
									'courses_description'		=>	$this->input->post('courses_description',TRUE),
									'str_total_time'            =>  $this->input->post('str_total_time',TRUE),
									'courses_added_date'		=>	$this->config->item('config.date.time')						
									);
								 
				$where = "courses_id = '".$res['courses_id']."'"; 				
				$this->courses_model->safe_update('tbl_courses',$posted_data,$where,FALSE);
				

				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('successupdate'));		
				redirect('adminzone/courses/subject/'.$res['category_id'].'', '');		
			}
				
		$data['res']=$res;	
		$this->load->view('courses/view_subject_edit',$data);		
		}
		else
		{
			redirect('adminzone/courses', ''); 	
		}
	} 
	
	public function lession()
	{
		$sub_id   	=  (int) $this->uri->segment(4,0);
		$list_sub	= $this->courses_model->get_courses_by_id($sub_id);
		//print_r($list_sub); die;
		if(is_array($list_sub) && !empty($list_sub))
		{
			$condition	=	array('subject_id'=>$sub_id);
			$data['res']=$this->courses_model->fetch_lession_by_id($condition);
			if( $this->input->post('status_action')!='')
			{			
				$this->update_status('tbl_course_lession','lession_id');			
			}
			if( $this->input->post('update_order')!='')
			{		
				$this->update_displayOrder('tbl_course_lession','sort_order','lession_id');			
			}
			$data['sub_id']			= $sub_id;
			$data['heading_title']	= 'Lession';
			
			
			$data['list_sub'] 		= $list_sub;
			$list_dept				= $this->department_model->get_dept_id(array('category_id'=>$list_sub['category_id']));
			$data['list_dept']		= $list_dept;
			//print_r($data['list_dept']); die;
			$this->load->view('courses/view_lession_list',$data);
		}
		else
		{
			redirect('adminzone/courses/');
		}
	}
	
	public function add_lession()
	{
	    $sub_id         =  (int) $this->uri->segment(4,0);
		$list_sub	= $this->courses_model->get_courses_by_id($sub_id);
		if(is_array($list_sub) && !empty($list_sub))
		{
			$this->form_validation->set_rules('lession_name','Lession Name',"trim|required|max_length[200]");
			$this->form_validation->set_rules('courses_description','Description',"trim|required|max_length[100000]");
			
		
			if($this->form_validation->run()===TRUE)
			{
				$hh			=$this->input->post('hh');
				$mm			= $this->input->post('mm');
				$total_time = $hh.':'.$mm;
			 
				$posted_data = array(
									'subject_id' 			=>  $sub_id,
									'lession'	 			=>	$this->input->post('lession_name'),	
									'courses_description'	=>	$this->input->post('courses_description'),	
									'lession_added_date'	=>	$this->config->item('config.date.time')						
									);
				$this->courses_model->safe_insert('tbl_course_lession',$posted_data,FALSE);
				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('success'));		
				redirect('adminzone/courses/lession/'.$sub_id);
			}
			$data['heading_title']='Lession';
			$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'description'));	
			$this->load->view('courses/view_lession_add',$data);
		}
		else
		{
			redirect('adminzone/courses/','');
		}
	}
	
	public function edit_lession($templateId)
	{			
		$data['heading_title'] = 'Edit Lession';
		$subId 		= (int) $this->uri->segment(4);
		$option 	= array('lession_id'=>$subId);
		$res 		= $this->courses_model->fetch_lession_by_id($option);
		$res		= $res[0];
		if(is_array($res) && !empty( $res ))
		{
			$this->form_validation->set_rules('lession_name','Lession Name',"trim|required|max_length[200]");
			$this->form_validation->set_rules('courses_description','Description',"trim|required|max_length[100000]");
			if($this->form_validation->run()==TRUE)
			{	
				$posted_data = array(
									'lession'	 			=>	$this->input->post('lession_name'),	
									'courses_description'	=>	$this->input->post('courses_description'),	
									);	
				
				$where = "lession_id = '".$res['lession_id']."'"; 				
				$this->courses_model->safe_update('tbl_course_lession',$posted_data,$where,FALSE);
				
				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('successupdate'));		
				redirect('adminzone/courses/lession/'.$res['subject_id'], '');						
			}	
			$data['res']=$res;	
			$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'description'));	
			$this->load->view('courses/view_lession_edit',$data);		
		}
		else
		{
			redirect('adminzone/courses', ''); 	
		}
	}
}
// End of controller