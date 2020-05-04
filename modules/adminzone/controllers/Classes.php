<?php
class Classes extends Admin_Controller
{

	public function __construct()
	{	
			parent::__construct(); 				
			$this->load->model(array('classes/classes_model'));  			
			$this->config->set_item('menu_highlight','other management');	
	}
	
	
	 public  function index()
	 {
		
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 		
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 		 				
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
			
		 $res_array              =    $this->classes_model->get_classes($config['limit'],$offset);	
		 					
	     $total_record           =   get_found_rows();
		 
		 $config['total_rows']   =   $total_record;
		
		
		
		 $data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
								
		 $data['res']            =  $res_array; 
				
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_classes','classes_id');			
		}
				
		if( $this->input->post('update_order')!='')
		{
				
			$this->update_displayOrder('wl_classes','sort_order','classes_id');	
					
		}
				
		$data['heading_title'] = 'Manage Classes';
		$data['pagelist']      = $res_array; 			
		$this->load->view('classes/view_classes_list',$data);        
			
		
	    }
	   
	   
		public function display(){
		
			$res = $this->classes_model->getHelpcenter_by_id($this->uri->segment(4));			
			$data['heading_title'] = 'View Class Information';
			$data['page_title']    = 'View Class Information';
			$data['pageresult']=$res;
			
			$this->load->view('common/view_helpcenter_detail',$data);
			
		}
		
		public function add()
		{			
			$data['ckeditor']      =  set_ck_config(array('textarea_id'=>'name'));				
			$data['heading_title'] = 'Add classes';			
	        $this->form_validation->set_rules('name','Class',"trim|required|max_length[255]|xss_clean|unique[wl_classes.name='".$this->db->escape_str($this->input->post('name'))."' AND status!='2']");
			
			//$this->form_validation->set_rules('classes_answer','Answer','trim|required|required_stripped|xss_clean|max_length[8500]');
			
			if($this->form_validation->run()==TRUE)
			{
			
			      $posted_data = array(
					'name'=>$this->input->post('name',TRUE),
					//'classes_answer'=>$this->input->post('classes_answer',TRUE),
					'classes_date_added'=>$this->config->item('config.date.time')
				 );
				 				
			    $this->classes_model->safe_insert('wl_classes',$posted_data,FALSE);					 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));			
				redirect('adminzone/classes', '');
				
			
			}
			
			$this->load->view('classes/view_classes_add',$data);				
	   
	   }
	   
	   
	   public function edit()
	   {
	     
		    $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'name'));	
					   
		    $data['heading_title'] = 'Edit classes';
			
			$Id = (int) $this->uri->segment(4);
			$param=array(
					'pid'=>$Id,
					'status'=>'1',
					);
			
			$res = $this->classes_model->get_classes(1,0,$param);
			
			
		   if(is_array($res) && !empty($res)){ 
		        $this->form_validation->set_rules('name','Class',"trim|required|max_length[255]|xss_clean|unique[wl_classes.name='".$this->db->escape_str($this->input->post('name'))."' AND status!='2' AND classes_id!=".$Id."]");
				
			//$this->form_validation->set_rules('classes_answer','Answer','trim|required|required_stripped|xss_clean|max_length[8500]');
			if($this->form_validation->run()==TRUE)
			{
				$posted_data = array(
				'name'=>$this->input->post('name',TRUE),
				//'classes_answer'=>$this->input->post('classes_answer',TRUE)
				);
				
				$where = "classes_id = '".$res['classes_id']."'"; 						
				$this->classes_model->safe_update('wl_classes',$posted_data,$where,FALSE);	
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('successupdate'));	
						
				 redirect('adminzone/classes/'.query_string(), ''); 	
			}
				
			    $data['res']=$res;
			    $this->load->view('classes/view_classes_edit',$data);
				
		   }else
		   {
			   
			  redirect('adminzone/classes', ''); 	 
			   
		   }
		   
	 }
	   
	   
	   
	   

}
//controllet end