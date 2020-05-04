<?php
class Subjects extends Admin_Controller
{

	public function __construct()
	{	
			parent::__construct(); 				
			$this->load->model(array('subjects/subjects_model'));  			
			$this->config->set_item('menu_highlight','other management');	
	}
	
	
	 public  function index()
	 {
		
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 		
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 		 				
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
			
		 $res_array              =    $this->subjects_model->get_subjects($config['limit'],$offset);	
		 					
	     $total_record           =   get_found_rows();
		 
		 $config['total_rows']   =   $total_record;
		
		
		
		 $data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
								
		 $data['res']            =  $res_array; 
				
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_subjects','subjects_id');			
		}
				
		if( $this->input->post('update_order')!='')
		{
				
			$this->update_displayOrder('wl_subjects','sort_order','subjects_id');	
					
		}
				
		$data['heading_title'] = 'Manage Subject';
		$data['pagelist']      = $res_array; 			
		$this->load->view('subjects/view_subjects_list',$data);        
			
		
	    }
	   
	   
		public function display(){
		
			$res = $this->subjects_model->getHelpcenter_by_id($this->uri->segment(4));			
			$data['heading_title'] = 'View Subject Information';
			$data['page_title']    = 'View Subject Information';
			$data['pageresult']=$res;
			
			$this->load->view('common/view_helpcenter_detail',$data);
			
		}
		
		public function add()
		{			
			$data['ckeditor']      =  set_ck_config(array('textarea_id'=>'subjects'));				
			$data['heading_title'] = 'Add Subject';			
	        $this->form_validation->set_rules('subjects','Subject',"trim|required|max_length[255]|xss_clean|unique[wl_subjects.subjects='".$this->db->escape_str($this->input->post('subjects'))."' AND status!='2']");
			
			//$this->form_validation->set_rules('faq_answer','Answer','trim|required|required_stripped|xss_clean|max_length[8500]');
			
			if($this->form_validation->run()==TRUE)
			{
			
			      $posted_data = array(
					'subjects'=>$this->input->post('subjects',TRUE),
					//'faq_answer'=>$this->input->post('faq_answer',TRUE),
					'subjects_date_added'=>$this->config->item('config.date.time')
				 );
				 				
			    $this->subjects_model->safe_insert('wl_subjects',$posted_data,FALSE);					 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));			
				redirect('adminzone/subjects', '');
				
			
			}
			
			$this->load->view('subjects/view_subjects_add',$data);				
	   
	   }
	   
	   
	   public function edit()
	   {
	     
		    $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'subjects'));	
					   
		    $data['heading_title'] = 'Edit Subject';
			
			$Id = (int) $this->uri->segment(4);
			$param=array(
					'pid'=>$Id,
					'status'=>'1',
					);
			
			$res = $this->subjects_model->get_subjects(1,0,$param);
			
			
		   if(is_array($res) && !empty($res)){ 
		        $this->form_validation->set_rules('subjects','Subject',"trim|required|max_length[255]|xss_clean|unique[wl_subjects.subjects='".$this->db->escape_str($this->input->post('subjects'))."' AND status!='2' AND subjects_id!=".$Id."]");
				
			//$this->form_validation->set_rules('faq_answer','Answer','trim|required|required_stripped|xss_clean|max_length[8500]');
			if($this->form_validation->run()==TRUE)
			{
				$posted_data = array(
				'subjects'=>$this->input->post('subjects',TRUE),
				//'faq_answer'=>$this->input->post('faq_answer',TRUE)
				);
				
				$where = "subjects_id = '".$res['subjects_id']."'"; 						
				$this->subjects_model->safe_update('wl_subjects',$posted_data,$where,FALSE);	
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('successupdate'));	
						
				 redirect('adminzone/subjects/'.query_string(), ''); 	
			}
				
			    $data['res']=$res;
			    $this->load->view('subjects/view_subjects_edit',$data);
				
		   }else
		   {
			   
			  redirect('adminzone/subjects', ''); 	 
			   
		   }
		   
	 }
	   
	   
	   
	   

}
//controllet end