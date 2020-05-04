<?php

class Customsearch extends Admin_Controller
{
	public function __construct()
	{	
			parent::__construct(); 				
			$this->load->model(array('customsearch/customsearch_model'));  			
			$this->config->set_item('menu_highlight','other management');	
	}

	 public  function index()
	 {
		 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $res_array              =    $this->customsearch_model->get_customsearch($config['limit'],$offset);	
	     $total_record           =   get_found_rows();
		 $config['total_rows']   =   $total_record;
		 $data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
		 $data['res']            =  $res_array; 

		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_customsearch','customsearch_id');			
		}
		if( $this->input->post('update_order')!='')
		{
			$this->update_displayOrder('wl_customsearch','sort_order','customsearch_id');	

		}

				

		$data['heading_title'] = 'Manage customsearch\'s';

		$data['pagelist']      = $res_array; 			

		$this->load->view('customsearch/view_customsearch_list',$data);        

	    }

	public function add()
		{			
			$data['ckeditor']      =  set_ck_config(array('textarea_id'=>'customsearch_answer'));				
			$data['heading_title'] = 'Add FAQ';			
	        $this->form_validation->set_rules('title','title',"trim|required|max_length[255]|xss_clean|unique[wl_customsearch.title='".$this->db->escape_str($this->input->post('title'))."' AND status!='2']");
			$this->form_validation->set_rules('city','city','trim|required');

			if($this->form_validation->run()==TRUE)
			{
			      $posted_data = array(
					'title'=>$this->input->post('title',TRUE),
					'keyword'=>url_title($this->input->post('title',TRUE)),
					'city'=>$this->input->post('city',TRUE),
					'customsearch_date_added'=>$this->config->item('config.date.time')
				 );

			    $this->customsearch_model->safe_insert('wl_customsearch',$posted_data,FALSE);					 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));			
				redirect('adminzone/customsearch', '');
			}
			$this->load->view('customsearch/view_customsearch_add',$data);				
	   }

	   

	   

	   public function edit()

	   {
		    $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'customsearch_answer'));	
			$data['heading_title'] = 'Edit customsearch';
			$Id = (int) $this->uri->segment(4);
			$param=array(

					'pid'=>$Id,
					'status'=>'1',

					);

			
			$res = $this->customsearch_model->get_customsearch(1,0,$param);
		   if(is_array($res) && !empty($res)){ 
		        $this->form_validation->set_rules('title','title',"trim|required|max_length[255]|xss_clean|unique[wl_customsearch.title='".$this->db->escape_str($this->input->post('title'))."' AND status!='2' AND customsearch_id!=".$Id."]");
			$this->form_validation->set_rules('city','city','trim|required');
			if($this->form_validation->run()==TRUE)
			{
				$posted_data = array(
				'title'=>$this->input->post('title',TRUE),
				'keyword'=>url_title($this->input->post('title',TRUE)),
				'city'=>$this->input->post('city',TRUE)
				);
				$where = "customsearch_id = '".$res['customsearch_id']."'"; 						
				$this->customsearch_model->safe_update('wl_customsearch',$posted_data,$where,FALSE);	
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('successupdate'));	
				 redirect('adminzone/customsearch/'.query_string(), ''); 	
			}
			    $data['res']=$res;
			    $this->load->view('customsearch/view_customsearch_edit',$data);
		   }else{
			  redirect('adminzone/customsearch', ''); 	 
		   }
	 }
}

//controllet end