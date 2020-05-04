<?php
class Mock extends Admin_Controller
{
	public function __construct()
	{		
		parent::__construct(); 				
		$this->load->model(array('mock_model'));  
		$this->load->helper('mock');
		$this->config->set_item('menu_highlight','Mock Management');				
	}
	
	public  function index()
	{
		$pagesize               =  (int) $this->input->get_post('pagesize');
	    $config['limit']		=  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');		 		 				
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
				
		$res_array = $this->mock_model->get_dept();
		$config['total_rows']	=  $this->mock_model->total_rec_found;	
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);	
		$data['heading_title']  =  ( $parent_id > 0 ) ? 'Department Subcategory' :  'Department ';		
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
						
		$this->load->view('mock/view_mock_list',$data);		
	}	
	
	public function add()
	{		
		$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'cat_desc'));		
		$parent_id         =  (int) $this->uri->segment(4,0);
		if($parent_id!='' && $parent_id > 0 )
		{
			$parent_id = applyFilter('NUMERIC_GT_ZERO',$parent_id);
			$data['heading_title'] = 'Add Sub Category';
			if($parent_id<=0)
			{
				redirect("adminzone/mock");
			}
			$parentdata=$this->mock_model->get_category_by_id($parent_id);
			if(!is_array($parentdata))
			{
				$this->session->set_flashdata('message', lang('invalidRecord'));	
				redirect('adminzone/mock', ''); 		
			}
			$data['parentData'] = $parentdata; 	
		}
		else
		{
			$data['parentData'] = '';
			$data['heading_title'] = 'Add Department';
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
								'category_name'			=>$this->input->post('category_name'),
								'category_description'	=>$this->input->post('category_description'),
								'parent_id' 			=>$parent_id,
								'friendly_url'			=>url_title($this->input->post('category_name')),
								'date_added'			=>$this->config->item('config.date.time'),
								'category_image'		=>$uploaded_file				
								);				
		    $this->mock_model->safe_insert('tbl_department',$posted_data,FALSE);						
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));				
			$redirect_path= isset($parentdata) && is_array($parentdata) ? 'mock/index/'.					            $parentdata['category_id'] : 'mock';			
			redirect('adminzone/'.$redirect_path, '');		
		}	
		$data['parent_id'] = $parent_id; 
		$this->load->view('mock/view_mock_add',$data);		  
	}	
	
	public function edit()
	{
		$data['ckeditor'] = set_ck_config(array('textarea_id'=>'cat_desc'));
		$catId = (int) $this->uri->segment(4);
		$rowdata=$this->mock_model->get_category_by_id($catId);	
		if(is_array($rowdata) && !empty($rowdata))
		{
			
			$categoryId = $rowdata['category_id'];
			$data['heading_title'] = ($rowdata['parent_id'] > 0 ) ? 'Sub Mock' : 'Edit Department';
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
									'category_name'			=>$this->input->post('category_name'),
									'category_description'	=>'',	
									'friendly_url'			=>url_title($this->input->post('category_name')),
									'category_image'		=>''				
									);
				$where = "category_id = '".$categoryId."'"; 				
				$this->mock_model->safe_update('tbl_department',$posted_data,$where,FALSE);	
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('successupdate'));								
				$redirect_path= $rowdata['parent_id']>0 ? 'mock/index/'. $rowdata['parent_id'] : 'mock';			
				redirect('adminzone/'.$redirect_path.'/'.query_string(), ''); 	
			}						
			$data['catresult']=$rowdata;		
			$this->load->view('mock/view_mock_edit',$data);	
		}
		else
		{
			$this->session->set_flashdata('message', lang('idmissing'));	
			redirect('adminzone/mock', ''); 	
		}
	}
	
	
	public  function test()
	{
		$dept_id				=(int) $this->uri->segment(4);
		$rowdata				=  $this->mock_model->get_category_by_id($dept_id);
		
		if(is_array($rowdata) && !empty($rowdata))
		{
			$res_array              =  $this->mock_model->get_test($dept_id);	
			$data['heading_title']  =  'Test List';
			$data['res']            =  $res_array;
			$data['dept_id']		= $dept_id; 
			if($this->input->post('status_action')!='')
			{		
				$this->update_status('tbl_mock','mock_id');			
			}
			$data['list_dept']		= $rowdata;
			$this->load->view('mock/view_test_list',$data);	
		}
		else
		{
			redirect("adminzone/mock");
		}
	}
	
	public function add_test()
	{   
		$dept_id				=(int) $this->uri->segment(4);
		$rowdata				=  $this->mock_model->get_category_by_id($dept_id);
		if(is_array($rowdata) && !empty($rowdata))
		{
			$data['heading_title'] = 'Add Test';
			$data['ckeditor']      =  set_ck_config(array('textarea_id'=>'description'));
			$this->form_validation->set_rules('hh','Hour',"trim|required");
			$this->form_validation->set_rules('mm','Minute',"trim|required");
			$this->form_validation->set_rules('mock_title','Title',"trim|required|max_length[200]|unique[tbl_mock.mock_title='".$this->input->post('mock_name')."' AND status!='2']");
			$this->form_validation->set_rules('mock_description','Description',"trim|required");
			$this->form_validation->set_rules('exam_date','Date of exam',"trim|required");
			$this->form_validation->set_rules('exam_type','Exam Type',"trim|required");	
			$this->form_validation->set_rules('str_total_mark','Total Marks',"trim|required");		          
			$this->form_validation->set_rules('total_question','Total Question',"trim|required");	
	          
	 
			if($this->form_validation->run()===TRUE)
			{	
				 $hh=$this->input->post('hh');
				 $mm= $this->input->post('mm');
				 $total_time = $hh.':'.$mm;
		   
				$posted_data = array(
									'department_id'             =>  $dept_id,
									'mock_title'				=>	$this->input->post('mock_title',TRUE),
									'mock_friendly_url'			=>	url_title($this->input->post('mock_name')),
									'mock_description'			=>	$this->input->post('mock_description',TRUE),
									'exam_date'                 =>  $this->input->post('exam_date',TRUE),
									'str_total_time'            =>  $total_time,
									'exam_type'              	=>  $this->input->post('exam_type',TRUE),
									'str_total_mark'            =>  $this->input->post('str_total_mark',TRUE),
									'total_question'         	=>  $this->input->post('total_question',TRUE),			
									'mock_added_date'			=>	$this->config->item('config.date.time')						
									);
				$coursesId = $this->mock_model->safe_insert('tbl_mock',$posted_data,FALSE);	
				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('success'));		
				redirect('adminzone/mock/test/'.$dept_id);								
			}
			$data['dept_id']=$dept_id;
			$this->load->view('mock/view_test_add',$data);
		}
		else
		{
			redirect("adminzone/mock");
		}
	}
	public function edit_test()
	{			
		$data['heading_title'] = 'Edit Level';
		$testId = (int) $this->uri->segment(4);		
		$res 	=  $this->mock_model->get_test_by_id($testId);	
		if( is_array( $res ) && !empty( $res ))
		{
			$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'description'));	
			$this->form_validation->set_rules('hh','Hour',"trim|required");
			$this->form_validation->set_rules('mm','Minute',"trim|required");
			$this->form_validation->set_rules('mock_title','Title',"trim|required|max_length[200]|unique[tbl_mock.mock_title='".$this->input->post('mock_title')."' AND status!='2' AND mock_id!='".$res['mock_id']."' ]");
			$this->form_validation->set_rules('mock_description','Description',"trim|required");
			$this->form_validation->set_rules('exam_date','Date of exam',"trim|required");	  
			$this->form_validation->set_rules('total_question',' Total Question',"trim|required");	
			$this->form_validation->set_rules('exam_type','Exam Type',"trim|required");	
			$this->form_validation->set_rules('str_total_mark','Total Marks',"trim|required");	
			//$this->form_validation->set_rules('str_negative_mark',' Negative Marking',"trim|required");		
			if($this->form_validation->run()==TRUE)
			{
				$hh=$this->input->post('hh');
				$mm= $this->input->post('mm');
				$total_time = $hh.':'.$mm;
		   
				$posted_data = array(
									'mock_title'				=>	$this->input->post('mock_title',TRUE),
									'mock_friendly_url'			=>	url_title($this->input->post('mock_title')),
									'mock_description'			=>	$this->input->post('mock_description',TRUE),
									'exam_date'                 =>  $this->input->post('exam_date',TRUE),
									'str_total_time'            =>  $total_time,
									'exam_type'             	=>  $this->input->post('exam_type',TRUE),
									'total_question'            =>  $this->input->post('total_question',TRUE),
									'str_total_mark'            =>  $this->input->post('str_total_mark',TRUE),
									//'str_negative_mark'       =>  $this->input->post('str_negative_mark',TRUE),			
									'mock_added_date'			=>	$this->config->item('config.date.time')						
									);
				$where = "mock_id = '".$res['mock_id']."'"; 				
				$this->mock_model->safe_update('tbl_mock',$posted_data,$where,FALSE);
			
				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('successupdate'));		
				redirect('adminzone/mock/test/'.$res['department_id']);		
			}	
			$data['res']	=	$res;
			$this->load->view('mock/view_test_edit',$data);		
		}
		else
		{
			redirect('adminzone/mock/'); 	
		}
	}
	
	public function subject()
	{
	    $mockId   	=  (int) $this->uri->segment(4,0);	
		$mock_res	=  $this->mock_model->get_test_by_id($mockId);
		if(is_array($mock_res) && !empty($mock_res))
		{
			$condition=array('mock_id'=>$mock_res['mock_id'],'department_id'=>$mock_res['department_id']);
			$data['res']=$this->mock_model->fetch_subject_by_testId($condition);
			if( $this->input->post('status_action')!='')
			{			
				$this->update_status('tbl_mock_subject','subject_id');			
			}
			if( $this->input->post('update_order')!='')
			{			
				$this->update_displayOrder('tbl_mock_subject','sort_order','subject_id');			
			}
			$data['heading_title']='Subject';
			$data['mock_res']	  = $mock_res;
			$data['list_dept']	  =  $this->mock_model->get_category_by_id($mock_res['department_id']);
			$this->load->view('mock/view_subject_list',$data);	
		}
		else
		{
			redirect('adminzone/mock/'); 	
		}
	}	
	public function add_subject()
	{
	    $mock_id         =  (int) $this->uri->segment(4,0);
		$res			 =	$this->mock_model->get_test_by_id($mock_id);
		if(is_array($res) && !empty($res))
		{
			$this->form_validation->set_rules('subject_name','Subject Name',"trim|required");
			$this->form_validation->set_rules('total_mark','Total Mark',"trim|required");
			$this->form_validation->set_rules('total_que','Total Question',"trim|required");
			if($this->form_validation->run()===TRUE)
			{
				$res=$this->mock_model->get_test_by_id($mock_id);
				$posted_data = array(
									'mock_id'                   => $res['mock_id'],
									'department_id'             => $res['department_id'],
									'subject_name'				=> $this->input->post('subject_name'),
									'total_mark'				=> $this->input->post('total_mark'),
									'total_que'				    => $this->input->post('total_que'),
									'subject_added_date'		=> $this->config->item('config.date.time')						
									);

				$this->mock_model->safe_insert('tbl_mock_subject',$posted_data,FALSE);
				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('success'));		
				redirect('adminzone/mock/subject/'.$mock_id);
			}
			$data['heading_title']='Subject';
			$data['res']=$res;
			$this->load->view('mock/view_subject_add',$data);
		}
		else
		{
			redirect('adminzone/mock/');
		}
	}
	public function edit_subject()
	{			
		$data['heading_title'] = 'Edit Subject';
		$subId 	= (int) $this->uri->segment(4);
		$option = array('subject_id'=>$subId);
		$res 	= $this->mock_model->fetch_subject_by_testId($option);
		$res	= $res[0];
		if( is_array( $res ) && !empty( $res ))
		{
			$this->form_validation->set_rules('subject_name','Subject Name',"trim|required");
			$this->form_validation->set_rules('total_mark','Total Mark',"trim|required");
			$this->form_validation->set_rules('total_que','Total Question',"trim|required");
			
			if($this->form_validation->run()==TRUE)
			{
				$posted_data = array(
									'mock_id' 			=>  $res['mock_id'],
									'department_id' 	=>  $res['department_id'],
									'subject_name'		=>	$this->input->post('subject_name',TRUE),
									'total_mark'		=>	$this->input->post('total_mark',TRUE),
									'total_que'			=>	$this->input->post('total_que',TRUE),
									'subject_added_date'=>	$this->config->item('config.date.time')						
									);
								
				$where = "subject_id = '".$res['subject_id']."'"; 				
				$this->mock_model->safe_update('tbl_mock_subject',$posted_data,$where,FALSE);
				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('successupdate'));		
				redirect('adminzone/mock/subject/'.$res['mock_id'], '');		
			}	
			$data['res']=$res;		
			$this->load->view('mock/view_subject_edit',$data);		
		}
		else
		{
			redirect('adminzone/mock', ''); 	
		}
	}
	
	public function add_question()
	{
		$data['heading_title'] = 'Add Question';
		$subjectId = (int) $this->uri->segment(4);		
		$condition = array('subject_id'=>$subjectId);
		$res = $this->mock_model->fetch_subject_by_testId($condition);
		if(is_array($res) && !empty($res))
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
					$this->form_validation->set_rules('option_i','Option I',"trim|required"); 
					$this->form_validation->set_rules('option_ii','Option II',"trim|required"); 
					$this->form_validation->set_rules('option_iii','Option III',"trim|required");
					$this->form_validation->set_rules('option_iv','Option IV',"trim|required"); 
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
										'department_id'			=>$res[0]['department_id'],
					                    'subject_id'			=>$res[0]['subject_id'],
										'question'				=>$question,
										'que_img'				=>$uploaded_file,
										'option_i'				=>$this->input->post('option_i',TRUE),
										'option_ii'				=>$this->input->post('option_ii',TRUE),
										'option_iii'			=>$this->input->post('option_iii',TRUE),
										'option_iv'				=>$this->input->post('option_iv',TRUE),
										'answer'				=>$ans,
										'question_added_date'	=>$this->config->item('config.date.time')	
									);
					$this->mock_model->safe_insert('tbl_mock_question',$posted_data,FALSE);
					$this->session->set_userdata(array('msg_type'=>'success'));			
					$this->session->set_flashdata('success',lang('success'));		
					redirect('adminzone/mock/view_question/'.$res[0]['subject_id']);
				}
			}
			$this->load->view('mock/add_question',$data);
		}
		else
		{
			redirect('adminzone/mock/');
		}
	}
	public function edit_question()
	{
		$data['heading_title'] = 'Edit Question';
		$queId = (int) $this->uri->segment(4);		
		$option = array('question_id'=>$queId);
		$res=$this->mock_model->get_question_by_id($option);
	    $res=$res[0];
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
					$this->mock_model->safe_update('tbl_mock_question',$posted_data,$where,FALSE);
					$this->session->set_userdata(array('msg_type'=>'success'));			
					$this->session->set_flashdata('success',lang('success'));		
					redirect('adminzone/mock/view_question/'.$res['subject_id']);
				}
			}
			$data['res']=$res;
			$this->load->view('mock/edit_question',$data);
		}
		else
		{
			redirect('adminzone/mock/');
		}
	}
	public function view_question()
	{
		$data['heading_title'] = 'Question List';
		$subjectId = (int) $this->uri->segment(4);
		$condition = array('subject_id'=>$subjectId);
		$sub_res = $this->mock_model->fetch_subject_by_testId($condition);
		$sub_res = $sub_res[0];
		if(is_array($sub_res) && !empty($sub_res))
		{
			$option = array('subject_id'=>$subjectId);
			$data['res']=$this->mock_model->question_list($option);
		
			if( $this->input->post('status_action')!='')
			{			
				$this->update_status('tbl_mock_question','question_id');			
			}
		
			$data['list_sub'] 	  = $sub_res;
			$data['list_dept']	  =  $this->mock_model->get_category_by_id($sub_res['department_id']);
			
			$this->load->view('mock/view_question',$data);
		}
		else
		{
			redirect('adminzone/mock');
		}
	}
}
// End of controller