<?php
class Department extends Admin_Controller
{
	public function __construct()
	{		
		parent::__construct(); 				
		$this->load->model(array('department_model'));  
		$this->load->helper('department');
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
				
		$data['heading_title']  =  ( $parent_id > 0 ) ? 'Department' :  'Department';
						
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
						
		$this->load->view('department/view_department_list',$data);			
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
		 
		$this->form_validation->set_rules('category_description','Description',"max_length[6000]");
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
								
		    $this->department_model->safe_insert('tbl_department',$posted_data,FALSE);	
								
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));				
			$redirect_path= isset($parentdata) && is_array($parentdata) ? 'department/index/'.					            $parentdata['category_id'] : 'department';			
			redirect('adminzone/'.$redirect_path, '');				
		}	
		$data['parent_id'] = $parent_id; 
		$this->load->view('department/view_department_add',$data);		    
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
				$redirect_path= $rowdata['parent_id']>0 ? 'department/index/'. $rowdata['parent_id'] : 'department';
									
				redirect('adminzone/'.$redirect_path.'/'.query_string(), ''); 					
			}						
			
			$data['catresult']=$rowdata;		
			$this->load->view('department/view_department_edit',$data);	
		}
		else
		{
			$this->session->set_flashdata('message', lang('idmissing'));	
			redirect('adminzone/department', ''); 	
		}
	}
	
	public function subject()
	{
		$dept_id   	=  (int) $this->uri->segment(4,0);
		$list_dept				= $this->department_model->get_dept_id(array('category_id'=>$dept_id));
		if(is_array($list_dept) && !empty($list_dept))
		{
			$condition	=	array('department_id'=>$dept_id);
			$data['res']=$this->department_model->fetch_subject_by_dept($condition);
			if( $this->input->post('status_action')!='')
			{			
				$this->update_status('tbl_subject','subject_id');			
			}
			if( $this->input->post('update_order')!='')
			{			
				$this->update_displayOrder('tbl_subject','sort_order','subject_id');			
			}
			$data['heading_title']	='Subject';
			$data['dept_id']		=$dept_id;
			$data['list_dept']		=$list_dept;
			$this->load->view('department/view_subject_list',$data);
		}
		else
		{
			redirect('adminzone/department', ''); 	
		}
	}
	
	public function add_subject()
	{
	    $dept_id         =  (int) $this->uri->segment(4,0);
		$list_dept				= $this->department_model->get_dept_id(array('category_id'=>$dept_id));
		if(is_array($list_dept) && !empty($list_dept))
		{
			$this->form_validation->set_rules('subject_name','Subject Name',"trim|required");
			if($this->form_validation->run()===TRUE)
			{
				$posted_data = array(
				'department_id' => $dept_id,
				'subject_name'				=>	$this->input->post('subject_name'),
				
				'subject_added_date'		=>	$this->config->item('config.date.time')						
				);

				$this->department_model->safe_insert('tbl_subject',$posted_data,FALSE);
				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('success'));		
				redirect('adminzone/department/subject/'.$dept_id);
			}
			$data['heading_title']='Subject';
		    $this->load->view('department/view_subject_add',$data);
		}
		else
		{
			redirect('adminzone/department/','');
		}
	}
	public function edit_subject($subId)
	{			
		$data['heading_title'] = 'Edit Subject';
		$subId 		= (int) $this->uri->segment(4);
		$option 	= array('subject_id'=>$subId);
		$res 		= $this->department_model->fetch_subject($option);
		$res		= $res[0];
		if(is_array($res) && !empty($res))
		{
			$this->form_validation->set_rules('subject_name','Subject Name',"trim|required|max_length[255]");
			if($this->form_validation->run()==TRUE)
			{
				
				$posted_data = array(
									'subject_name'				=>	$this->input->post('subject_name',TRUE),
									'subject_added_date'		=>	$this->config->item('config.date.time')						
									);
								
				$where 		 = "subject_id = '".$res['subject_id']."'"; 				
				$this->department_model->safe_update('tbl_subject',$posted_data,$where,FALSE);
				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('successupdate'));		
				redirect('adminzone/department/subject/'.$res['department_id'], '');		
			}	
			$data['res']=$res;	
			$this->load->view('department/view_subject_edit',$data);		
		}
		else
		{
			redirect('adminzone/department', ''); 	
		}
	}
	
	public function lession()
	{
		$sub_id   	=  (int) $this->uri->segment(4,0);
		$list_sub				= $this->department_model->fetch_subject(array('subject_id'=>$sub_id));
		if(is_array($list_sub) && !empty($list_sub))
		{
			$condition	=	array('subject_id'=>$sub_id);
			$data['res']=$this->department_model->fetch_lession_by_id($condition);
			if( $this->input->post('status_action')!='')
			{			
				$this->update_status('tbl_lession','lession_id');			
			}
			if( $this->input->post('update_order')!='')
			{		
				$this->update_displayOrder('tbl_lession','sort_order','lession_id');			
			}
			$data['sub_id']			= $sub_id;
			$data['heading_title']	= 'Lession';
			
			
			$data['list_sub'] 		= $list_sub;
			$list_dept				= $this->department_model->get_dept_id(array('category_id'=>$list_sub[0]['department_id']));
			$data['list_dept']		= $list_dept;
			//print_r($data['list_dept']); die;
			$this->load->view('department/view_lession_list',$data);
		}
		else
		{
			redirect('adminzone/department/');
		}
	}
	
	public function add_lession()
	{
	    $sub_id         =  (int) $this->uri->segment(4,0);
		$list_sub		= $this->department_model->fetch_subject(array('subject_id'=>$sub_id));
		if(is_array($list_sub) && !empty($list_sub))
		{
			$this->form_validation->set_rules('lession_name','Lession Name',"trim|required|max_length[20]");
			$this->form_validation->set_rules('exam_type','Exam Type',"trim|required|max_length[20]");
			$this->form_validation->set_rules('total_question',' Total Question ',"trim|required|numeric|max_length[2]");
			$this->form_validation->set_rules('str_total_mark','Total Marks',"trim|required|numeric|max_length[2]");	
			$this->form_validation->set_rules('courses_description','Description',"trim|required|max_length[1000]");
			$this->form_validation->set_rules('exam_date','Date of exam',"trim|required|max_length[20]");
			$this->form_validation->set_rules('hh','Hour',"trim|required|max_length[20]");
			$this->form_validation->set_rules('mm','Minute',"trim|required|max_length[20]");
		
			if($this->form_validation->run()===TRUE)
			{
				$hh			=$this->input->post('hh');
				$mm			= $this->input->post('mm');
				$total_time = $hh.':'.$mm;
			 
				$posted_data = array(
									'subject_id' 			=>  $sub_id,
									'lession'	 			=>	$this->input->post('lession_name'),	
									'exam_type'	 		 	=>	$this->input->post('exam_type'),	
									'total_question'	 	=>	$this->input->post('total_question'),	
									'str_total_mark'	 	=>	$this->input->post('str_total_mark'),	
									'courses_description'	=>	$this->input->post('courses_description'),	
									'exam_date'	 		 	=>	$this->input->post('exam_date'),
									'str_total_time'	 	=>	$total_time,	
									'lession_added_date'	=>	$this->config->item('config.date.time')						
									);
				$this->department_model->safe_insert('tbl_lession',$posted_data,FALSE);
				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('success'));		
				redirect('adminzone/department/lession/'.$sub_id);
			}
			$data['heading_title']='Lession';
			$this->load->view('department/view_lession_add',$data);
		}
		else
		{
			redirect('adminzone/department/','');
		}
	}
	
	public function edit_lession($templateId)
	{			
		$data['heading_title'] = 'Edit Lession';
		$subId 		= (int) $this->uri->segment(4);
		$option 	= array('lession_id'=>$subId);
		$res 		= $this->department_model->fetch_lession_by_id($option);
		$res		= $res[0];
		if( is_array( $res ) && !empty( $res ))
		{
			$this->form_validation->set_rules('lession_name','Lession Name',"trim|required|max_length[20]");
			$this->form_validation->set_rules('exam_type','Exam Type',"trim|required|max_length[20]");
			$this->form_validation->set_rules('total_question',' Total Question ',"trim|required|numeric|max_length[2]");
			$this->form_validation->set_rules('str_total_mark','Total Marks',"trim|required|numeric|max_length[2]");	
			$this->form_validation->set_rules('courses_description','Description',"trim|required|max_length[1000]");
			$this->form_validation->set_rules('exam_date','Date of exam',"trim|required|max_length[20]");
			$this->form_validation->set_rules('hh','Hour',"trim|required|max_length[20]");
			$this->form_validation->set_rules('mm','Minute',"trim|required|max_length[20]");
			if($this->form_validation->run()==TRUE)
			{	
				$hh			= $this->input->post('hh');
				$mm			= $this->input->post('mm');
				$total_time = $hh.':'.$mm;
				$posted_data = array(
									'lession'	 			=>	$this->input->post('lession_name'),	
									'exam_type'	 		 	=>	$this->input->post('exam_type'),	
									'total_question'	 	=>	$this->input->post('total_question'),	
									'str_total_mark'	 	=>	$this->input->post('str_total_mark'),	
									'courses_description'	=>	$this->input->post('courses_description'),	
									'exam_date'	 		 	=>	$this->input->post('exam_date'),
									'str_total_time'	 	=>	$total_time,				
								);	
				
				$where = "lession_id = '".$res['lession_id']."'"; 				
				$this->department_model->safe_update('tbl_lession',$posted_data,$where,FALSE);
				
				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('successupdate'));		
				redirect('adminzone/department/lession/'.$res['subject_id'], '');						
			}	
			$data['res']=$res;	
			$this->load->view('department/view_lession_edit',$data);		
		}
		else
		{
			redirect('adminzone/department', ''); 	
		}
	}
		
	///************************************************************************************************
	
	public function add_question()
	{
		$data['heading_title'] = 'Add Question';
		$lession_id 			= (int) $this->uri->segment(4);
		$lession				=  $this->department_model->fetch_lession_by_id(array('lession_id'=>$lession_id));
		if(is_array($lession) && !empty($lession))
		{
			if($this->input->post('add'))
			{
				$que_t = $this->input->post('que_type');
				if($que_t == 1)
				{
					$this->form_validation->set_rules('question','Question',"required");
					$que=1;
				}
				else
				{
					$this->form_validation->set_rules('question_img','Question Image',"required"); 
					$que=2;
				}
				$this->form_validation->set_rules('option_i','Option I',"required");
				$this->form_validation->set_rules('option_ii','Option II',"required");
				$this->form_validation->set_rules('option_iii','Option III',"required");
				$this->form_validation->set_rules('option_iv','Option IV',"required");
			    $this->form_validation->set_rules('answer','Please Select Currect Option',"required");	
				if($this->form_validation->run()==TRUE)
				{
					$true=$this->input->post('answer');
					switch($true)
					{
						case 1 :
							$ans=$this->input->post('option_i');
							break;
						case 2:
							$ans=$this->input->post('option_ii');
							break;
						case 3:
							$ans=$this->input->post('option_iii');
							break;
						case 4:
							$ans=$this->input->post('option_iv');
							break;
					}
					$uploaded_file = "";	
					if($que==1)
					{
						$question=$this->input->post('question',TRUE);
					}
					else
					{
						$question='';
						if( !empty($_FILES) && $_FILES['question_img']['name']!='' )
						{			  
							$this->load->library('upload');	
							$uploaded_data =  $this->upload->my_upload('question_img','question');
							if( is_array($uploaded_data)  && !empty($uploaded_data) )
							{ 								
								$uploaded_file = $uploaded_data['upload_data']['file_name'];
							}		
						}
					}
					$posted_data=array(
										'lession_id'		=>$lession_id,
										'question'			=>$question,
										'que_img'			=>$uploaded_file,
										'option_i'			=>$this->input->post('option_i',TRUE),
										'option_ii'			=>$this->input->post('option_ii',TRUE),
										'option_iii'		=>$this->input->post('option_iii',TRUE),
										'option_iv'			=>$this->input->post('option_iv',TRUE),
										'answer'			=>$ans,
										'question_added_date'=>$this->config->item('config.date.time')	
									);
					$this->department_model->safe_insert('tbl_question',$posted_data,FALSE);
					$this->session->set_userdata(array('msg_type'=>'success'));			
					$this->session->set_flashdata('success',lang('success'));		
					redirect('adminzone/department/view_question/'.$lession_id);
				}
			} 
			if($this->input->post('add_blank'))
			{
				$this->form_validation->set_rules('question','Question',"required");
				//$this->form_validation->set_rules('option','Option',"required");
				$this->form_validation->set_rules('ans','Answer',"required");	
				if($this->form_validation->run()==TRUE)
				{

					$posted_data=array(
										'lession_id'			=>$lession_id,
										'question'				=>$this->input->post('question',TRUE),
										//'option_i'			=>$this->input->post('option',TRUE),
										'answer'				=>$this->input->post('ans',TRUE),
										'question_added_date'	=>$this->config->item('config.date.time')	
										);
					$this->department_model->safe_insert('tbl_question',$posted_data,FALSE);
					$this->session->set_userdata(array('msg_type'=>'success'));			
					$this->session->set_flashdata('success',lang('success'));		
					redirect('adminzone/department/view_question/'.$lession_id);	
				}
			} 
			$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'question'));
			$exam_type = $this->department_model->get_exam_type($lession_id);
			if($exam_type=='0')
			{
				$this->load->view('department/add_question',$data);
			}
			else
			{
				$this->load->view('department/add_blank_question',$data);
			}
		}
		else
		{
			redirect('adminzone/department/');
		}
	}
	
	public function edit_question()
	{
		$data['heading_title'] = 'Edit Question';
		$question_id = (int) $this->uri->segment(4);		
		$option = array('question_id'=>$question_id);
		$res	=	$this->department_model->get_question_by_id($option);
	    $res	=	$res[0];
		if(is_array($res) && !empty($res))
		{
			if($this->input->post('add'))
			{
				$que_t = $this->input->post('que_type');
				if($que_t == 1)
				{
					$que=1;
				}
				else
				{
				   $que=2;
				}
				$this->form_validation->set_rules('option_i','Option I',"trim|required");
				$this->form_validation->set_rules('option_ii','Option II',"trim|required");
				$this->form_validation->set_rules('option_iii','Option III',"trim|required");
				$this->form_validation->set_rules('option_iv','Option IV',"trim|required");
				$this->form_validation->set_rules('answer','Please Select Currect Option',"trim|required");	
				if($this->form_validation->run()==TRUE)
				{
					$true=$this->input->post('answer');
					switch($true)
					{
						case 1 :
							$ans=$this->input->post('option_i');
							break;
						case 2:
							$ans=$this->input->post('option_ii');
							break;
						case 3:
							$ans=$this->input->post('option_iii');
							break;
						case 4:
							$ans=$this->input->post('option_iv');
							break;
					}
					$uploaded_file = $res['que_img'];	
					if($que==1)
					{
						$question=$this->input->post('question',TRUE);
						
					}
					else
					{
						$question='';
						if( !empty($_FILES) && $_FILES['question_img']['name']!='' )
						{			  
							$this->load->library('upload');	
							$uploaded_data =  $this->upload->my_upload('question_img','question');
							if( is_array($uploaded_data)  && !empty($uploaded_data) )
							{ 								
								$uploaded_file = $uploaded_data['upload_data']['file_name'];
							}		
						}
					}
					$posted_data=array(
										'question'		=>$question,
										'que_img'		=>$uploaded_file,
										'option_i'		=>$this->input->post('option_i',TRUE),
										'option_ii'		=>$this->input->post('option_ii',TRUE),
										'option_iii'	=>$this->input->post('option_iii',TRUE),
										'option_iv'		=>$this->input->post('option_iv',TRUE),
										'answer'		=>$ans,
										'question_added_date'=>$this->config->item('config.date.time')	
									   );
					$where = "question_id = '".$res['question_id']."'"; 				
					$this->department_model->safe_update('tbl_question',$posted_data,$where,FALSE);
							  
					$this->session->set_userdata(array('msg_type'=>'success'));			
					$this->session->set_flashdata('success',lang('success'));		
					redirect('adminzone/department/view_question/'.$res['lession_id']);	
				}
			}
		
			if($this->input->post('add_blank'))
			{
				$this->form_validation->set_rules('question','Question',"required");
				//$this->form_validation->set_rules('option','Option',"required");
				$this->form_validation->set_rules('ans','Answer',"required");					
				if($this->form_validation->run()==TRUE)
				{
					$posted_data=array(
										'question'=>$this->input->post('question',TRUE),
										//'option_i'=>$this->input->post('option',TRUE),
										'answer'=>$this->input->post('ans',TRUE),
										'question_added_date'=>$this->config->item('config.date.time')	
									  );
					$where = "question_id = '".$res['question_id']."'"; 				
					$this->department_model->safe_update('tbl_question',$posted_data,$where,FALSE);
					$this->session->set_userdata(array('msg_type'=>'success'));			
					$this->session->set_flashdata('success',lang('success'));		
					redirect('adminzone/department/view_question/'.$res['lession_id']);
				}
			} 
		
			$data['res']=$res;
			$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'question'));
			$lession_id = $this->department_model->get_level_by_questionid($question_id);
			$exam_type = $this->department_model->get_exam_type($lession_id);
			if($exam_type=='0')
			{	
			   $this->load->view('department/edit_question',$data);
			}
			else
			{
				$this->load->view('department/edit_blank_question',$data);
			}
		}
		else
		{
			redirect('adminzone/department/');
		}
	}
	
	public function view_question()
	{
		$data['heading_title'] 	= 'Question List';
		$lession_id 			= (int) $this->uri->segment(4);
		$lession				=  $this->department_model->fetch_lession_by_id(array('lession_id'=>$lession_id));
		$lession				= $lession[0];
		
		if(is_array($lession) && !empty($lession))
		{
			$option 				= array('lession_id'=>$lession_id);
			$data['res']			= $this->department_model->question_list($option);
			if( $this->input->post('status_action')!='')
			{			
				$this->update_status('tbl_question','question_id');			
			}
			$data['lession_id'] = $lession_id;
			$data['lession']	= $lession;
			$list_sub			= $this->department_model->fetch_subject(array('subject_id'=>$lession['subject_id']));
			$data['list_sub']	= $list_sub[0];
			$list_dept			= $this->department_model->get_dept_id(array('category_id'=>$list_sub[0]['department_id']));
			$data['list_dept']	= $list_dept[0];
			$exam_type 			= $this->department_model->get_exam_type($lession_id);
			
			if($exam_type=='0')
			{
				$this->load->view('department/view_question',$data);
			}
			else
			{
				$this->load->view('department/view_blank_question',$data);
			}
		}
		else
		{
			redirect('adminzone/department/');
		}
	}
}
// End of controller