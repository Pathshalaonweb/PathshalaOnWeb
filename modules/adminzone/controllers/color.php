<?php
class Color extends Admin_Controller
{

	public function __construct(){
	
			parent::__construct();
			
		    $this->config->set_item('menu_highlight','product management');	
			$this->load->model(array('color_model')); 	
	
	}
	
	   public  function index()
	   {		 
			$pagesize               =  (int) $this->input->get_post('pagesize');
			
			$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
			
			$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
			
			$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
										
			$res_array              =  $this->color_model->get_color($offset,$config['limit']);
			
			$config['total_rows']	= 	$this->color_model->total_rec_found;	
			
			$data['page_links']     =  admin_pagination("$base_url",$config['total_rows'],$config['limit'],$offset);
			
			$data['heading_title']  =   'Manage Color';
			
			$data['res']            =  $res_array; 
			
			
			if($this->input->post('status_action')!='')
			{
			
			$this->update_status('wl_color','color_id');
			
			}		
			
			$this->load->view('color/view_color_list',$data);	
		      
			
		
	    }
		
		
		public function add()
		{				
			$data['heading_title'] = 'Add Brand';			
			$this->form_validation->set_rules('color_name','Color Name',"trim|required|max_length[50]|xss_clean|unique[wl_color.color_name='".$this->db->escape_str($this->input->post('color_name'))."' AND status!='2']");
			
			$this->form_validation->set_rules('color_code','Color Code',"trim|required|max_length[50]|xss_clean");
			 
			if($this->form_validation->run()==TRUE)
			{
				
				$posted_data = array( 'color_name'		=>	$this->input->post('color_name',TRUE),
									  'color_code'		=>	$this->input->post('color_code',TRUE),
				                      'added_date'   	=>	$this->config->item('config.date.time')
				                      );
				
				$this->color_model->safe_insert('wl_color',$posted_data,FALSE);
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));		
				redirect('adminzone/color', '');
			}
							   
			$this->load->view('color/view_color_add',$data);		
	   
	   }
	   
	  
	   
	   public function edit()
	   {
		    $data['heading_title'] = 'Edit Color';
			$Id = (int) $this->uri->segment(4);
			$rowdata=$this->color_model->get_color_by_id($Id);
			
		  if( is_object($rowdata) )
		  { 
				$this->form_validation->set_rules('color_name','Size Name',"trim|required|xss_clean|max_length[50]|unique[wl_color.color_name='".$this->db->escape_str($this->input->post('color_name'))."' AND status!='2' AND color_id!='".$Id."']");
				$this->form_validation->set_rules('color_code','Color Code',"trim|required|max_length[50]|xss_clean");
				
				if($this->form_validation->run()==TRUE)
				{
				
					$posted_data = array( 'color_name'	=>	$this->input->post('color_name',TRUE),
				                      	  'color_code'	=>	$this->input->post('color_code',TRUE),
				                      );
						
						$where = "color_id = '".$rowdata->color_id."'"; 						
						$this->color_model->safe_update('wl_color',$posted_data,$where,FALSE);	
						$this->session->set_userdata(array('msg_type'=>'success'));
						$this->session->set_flashdata('success',lang('successupdate'));		
						redirect('adminzone/color/'.query_string(), ''); 	
				
				}
								
			    $data['res']=$rowdata;
			    $this->load->view('color/view_color_edit',$data);
				
		   }else{
			   
			  redirect('adminzone/color', ''); 	 
			   
		   }
		   
	   }

}
//controllet end