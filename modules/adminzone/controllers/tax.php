<?php
class Tax extends Admin_Controller
{

	public function __construct(){
	
			parent::__construct();
			
		    $this->config->set_item('menu_highlight','orders management');	
			$this->load->model(array('tax_model')); 	
	
	}
	
	   public  function index()
	   {		 
			$pagesize               =  (int) $this->input->get_post('pagesize');
			
			$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
			
			$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
			
			$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
										
			$res_array              =  $this->tax_model->get_tax($offset,$config['limit']);
			
			$config['total_rows']	= 	$this->tax_model->total_rec_found;	
			
			$data['page_links']     =  admin_pagination("$base_url",$config['total_rows'],$config['limit'],$offset);
			
			$data['heading_title']  =   'Manage Tax';
			
			$data['res']            =  $res_array; 
			
			
			if($this->input->post('status_action')!='')
			{
			
			$this->update_status('wl_tax','tax_id');
			
			}		
			
			$this->load->view('tax/view_tax_list',$data);	
		      
			
		
	    }
		
		
		public function add()
		{				
			$data['heading_title'] = 'Add Tax';			
			$this->form_validation->set_rules('tax_rate','Shipping Rate',"trim|required|is_valid_amount|max_length[2]|xss_clean");
			 
			if($this->form_validation->run()==TRUE)
			{
				
				$posted_data = array( 'tax_rate'		=>	$this->input->post('tax_rate',TRUE),
				                      'added_date'   	=>	$this->config->item('config.date.time')
				                      );
				
				$this->tax_model->safe_insert('wl_tax',$posted_data,FALSE);
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));		
				redirect('adminzone/tax', '');
			}
							   
			$this->load->view('tax/view_tax_add',$data);		
	   
	   }
	   
	  
	   
	   public function edit()
	   {
		    $data['heading_title'] = 'Edit Tax';
			$Id = (int) $this->uri->segment(4);
			$rowdata=$this->tax_model->get_tax_by_id($Id);
			
		  if( is_object($rowdata) )
		  { 
			  $this->form_validation->set_rules('tax_rate','Shipping Rate',"trim|required|is_valid_amount|xss_clean|callback_check_amount");
				
				if($this->form_validation->run()==TRUE)
				{
				
					$posted_data = array('tax_rate'=>$this->input->post('tax_rate',TRUE),			                      
				                      );
						
						$where = "tax_id = '".$rowdata->tax_id."'"; 						
						$this->tax_model->safe_update('wl_tax',$posted_data,$where,FALSE);	
						$this->session->set_userdata(array('msg_type'=>'success'));
						$this->session->set_flashdata('success',lang('successupdate'));		
						redirect('adminzone/tax/'.query_string(), ''); 	
				}
								
			    $data['res']=$rowdata;
			    $this->load->view('tax/view_tax_edit',$data);
				
		   }
		   else
		   {
			   
			  redirect('adminzone/tax', ''); 	 
		   }
		   
	   }
	   
	   function check_amount()
	   {
		   if($this->input->post('tax_rate') > 99)
			{
				
				$this->form_validation->set_message('check_amount', 'Tax Rate should be less than 100');
				return FALSE;
			}
	   }

}
//controllet end