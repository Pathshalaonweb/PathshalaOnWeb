<?php
class location extends Admin_Controller{
	public function __construct(){		
		parent::__construct(); 				
		$this->load->model(array('location_model'));  		
		$this->config->set_item('menu_highlight','other management');				
	}
	 
	
	public  function index(){
		
		 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
	 	 $res_array               =  $this->location_model->get_locations($config['limit'],$offset);
	     $config['total_rows']    =  get_found_rows();
	     $data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
		$data['heading_title']   =   'location';
		$data['res']             =  $res_array; 
		if($this->input->post('status_action')!=''){
			$this->update_status('tbl_cities','id');
		}
		if( $this->input->post('update_order')!='')
		{
			$this->update_displayOrder('tbl_cities','sort_order','id');	
		}		
		$this->load->view('location/view_location_list',$data);		
	}	
	
	
public function add(){			
					
	$this->form_validation->set_rules('name','Title','trim|required|xss_clean|max_length[200]');
	$this->form_validation->set_rules('state_id','state id','trim|required|xss_clean');
	
		 		
		 		
		if($this->form_validation->run()==TRUE){
						
			$posted_data=array(				
			'name'      			=> $this->input->post('name',TRUE),
			'state_id' 				=> $this->input->post('state_id'),
			'status'				=>'1',						
			);			
			$this->location_model->safe_insert('tbl_cities',$posted_data,FALSE); 			
			
			$message = $this->config->item('location_post_success');			
			$message = str_replace('<site_name>',$this->config->item('site_name'),$message);
									
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success',lang('success'));
			redirect('adminzone/location', ''); 
			
		}		
		$data['heading_title'] = "Post location";	
		$this->load->view('location/view_location_add',$data);	
		
		
	}
	
	
	public function edit()
	{	
	
	          $id = (int) $this->uri->segment(4);		
		      $param     = array('where'=>"id ='$id' ");	
	    	  $res       = $this->location_model->get_location(1,0,$param);	
		
			if(is_array($res) && !empty($res)){	
					
	$this->form_validation->set_rules('name','Title','trim|required|xss_clean|max_length[200]');
	$this->form_validation->set_rules('state_id','state id','trim|required|xss_clean');
				
				if($this->form_validation->run()==TRUE){
				
			$posted_data=array(				
				'name'      			=> $this->input->post('name',TRUE),
				'state_id' 				=> $this->input->post('state_id'),
				'status'				=>'1',						
			);					
					 $where = "id = '".$res['id']."'"; 				
					 $this->location_model->safe_update('tbl_cities',$posted_data,$where,FALSE);
					 $this->session->set_userdata(array('msg_type'=>'success'));				
					 $this->session->set_flashdata('success',lang('successupdate'));	
					
					redirect('adminzone/location', ''); 
				
				}		
				$data['heading_title'] = "Edit location";	
				$data['res'] = $res;	
				$this->load->view('location/view_location_edit',$data);	
			}else
			{
				redirect('adminzone/location', ''); 
				
			}
		
	}
	
	
}
// End of controller