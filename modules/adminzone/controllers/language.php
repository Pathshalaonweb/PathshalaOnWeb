<?php
class Language extends Admin_Controller
{

	public function __construct()
	{	
			parent::__construct(); 				
			$this->load->model(array('language/language_model'));  			
			$this->config->set_item('menu_highlight','other management');	
	}
	
	
	 public  function index()
	 {
		
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 		
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 		 				
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
			
		 $res_array              =    $this->language_model->get_language($config['limit'],$offset);	
		 					
	     $total_record           =   get_found_rows();
		 
		 $config['total_rows']   =   $total_record;
		
		
		
		 $data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
								
		 $data['res']            =  $res_array; 
				
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('language','word_id');			
		}
				
		
		if($this->input->post('update_order')!=''){
			$this->update_displayOrder('language','sort_order','word_id');	
		}
				
		$data['heading_title'] = 'Manage Language\'s';
		$data['pagelist']      = $res_array; 			
		$this->load->view('language/view_language_list',$data);        
			
		
	    }
	   
	   
		public function display(){
		
			$res = $this->language_model->getHelpcenter_by_id($this->uri->segment(4));			
			$data['heading_title'] = 'View FAQ Information';
			$data['page_title']    = 'View FAQ Information';
			$data['pageresult']=$res;
			
			$this->load->view('common/view_helpcenter_detail',$data);
			
		}
		
		public function add()
		{			
			$data['ckeditor']      =  set_ck_config(array('textarea_id'=>'language_answer'));				
			$data['heading_title'] = 'Add FAQ';			
	        $this->form_validation->set_rules('language_question','Question',"trim|required|max_length[255]|xss_clean|unique[wl_language.language_question='".$this->db->escape_str($this->input->post('language_question'))."' AND status!='2']");
			
			$this->form_validation->set_rules('language_answer','Answer','trim|required|required_stripped|xss_clean|max_length[8500]');
			
			if($this->form_validation->run()==TRUE)
			{
			
			      $posted_data = array(
					'language_question'=>$this->input->post('language_question',TRUE),
					'language_answer'=>$this->input->post('language_answer',TRUE),
					'language_date_added'=>$this->config->item('config.date.time')
				 );
				 				
			    $this->language_model->safe_insert('wl_language',$posted_data,FALSE);					 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));			
				redirect('adminzone/language', '');
				
			
			}
			
			$this->load->view('language/view_language_add',$data);				
	   
	   }
	   
	   
	   public function edit()
	   {
	     
		    $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'language_answer'));	
					   
		    $data['heading_title'] = 'Edit FAQ';
			
			$Id = (int) $this->uri->segment(4);
			
			$res = $this->language_model->get_language(1,0,array('id'=>$Id));
			
		   if(is_array($res) && !empty($res)){ 
		        $this->form_validation->set_rules('language_question','Question',"trim|required|max_length[255]|xss_clean|unique[wl_language.language_question='".$this->db->escape_str($this->input->post('language_question'))."' AND status!='2' AND language_id!=".$Id."]");
				
			$this->form_validation->set_rules('language_answer','Answer','trim|required|required_stripped|xss_clean|max_length[8500]');
			if($this->form_validation->run()==TRUE)
			{
				$posted_data = array(
				'language_question'=>$this->input->post('language_question',TRUE),
				'language_answer'=>$this->input->post('language_answer',TRUE)
				);
				
				$where = "language_id = '".$res['language_id']."'"; 						
				$this->language_model->safe_update('wl_language',$posted_data,$where,FALSE);	
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('successupdate'));	
						
				 redirect('adminzone/language/'.query_string(), ''); 	
			}
				
			    $data['res']=$res;
			    $this->load->view('language/view_language_edit',$data);
				
		   }else
		   {
			   
			  redirect('adminzone/language', ''); 	 
			   
		   }
		   
	 }
	   
	 public function language_add(){
		 				
			$data['heading_title'] = 'Add FAQ';			
	        
			
			$this->form_validation->set_rules('language','language'|'trim|required|required_stripped|xss_clean');
			
			if($this->form_validation->run()==TRUE){
			
			    $language = $this->input->post('language');
            	add_language($language);
							 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));			
				redirect('adminzone/language', '');
			}
			
			$this->load->view('language/view_language_add',$data);	
	 }
	 
	 public function updateword(){
		  $id=$this->uri->segment('4');
		  $fields = $this->db->list_fields('language');
		  $i=1;
		  foreach ($fields as $field){
			  if($field !== 'word' && $field !== 'word_id'){
			  $posted_data=array(
			   		$field=>$this->input->post('translation'.$i.$id),
			  );
			  echo"<pre>";
		      print_r($posted_data);
		  		$where = "word_id = '".$id."'"; 						
				$this->language_model->safe_update('language',$posted_data,$where,FALSE);
				
				//echo_sql();	
			  $i++;
			}
			    $this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('successupdate'));	
				
		  }
		  redirect('adminzone/language/'.query_string(), ''); 
		  
	 }
	public function word_add(){
		$data['heading_title'] = 'Add Word';			
		 $this->form_validation->set_rules('word','Word',"trim|required|max_length[255]|xss_clean|unique[language.word='".$this->db->escape_str($this->input->post('word'))."']");
			
			if($this->form_validation->run()==TRUE)
			{
				
			      $posted_data = array(
					'word'=>$this->input->post('word',TRUE),
				  );
				 				
			    $this->language_model->safe_insert('language',$posted_data,FALSE);					 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));			
				redirect('adminzone/language', '');
				
			}
			$this->load->view('language/view_word_add',$data);			
		
	}

}
//controllet end