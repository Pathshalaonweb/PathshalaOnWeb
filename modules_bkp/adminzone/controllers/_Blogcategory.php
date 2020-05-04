<?php
class Blogcategory extends Admin_Controller
{

	public function __construct()
	{	
			parent::__construct(); 				
			$this->load->model(array('blogcategory/blogcategory_model'));  			
			$this->config->set_item('menu_highlight','blog management');	
	}
	
	
	 public  function index()
	 {
		
		 $pagesize               =   (int) $this->input->get_post('pagesize');
		 $config['limit']		 =   ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =   ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $base_url               =   current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $res_array              =   $this->blogcategory_model->get_blogcategory($config['limit'],$offset);	
		 $total_record           =   get_found_rows();
		 $config['total_rows']   =   $total_record;
		 $data['page_links']     =   admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
		 $data['res']            =   $res_array; 
		 $data['total_rec']		 =   $total_record;	 
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_blogcategory','blogcategory_id');			
		}
		if( $this->input->post('update_order')!='')
		{
			$this->update_displayOrder('wl_blogcategory','sort_order','blogcategory_id');	
		}
		$data['heading_title'] = 'Manage BlogCategory\'s';
		$data['pagelist']      = $res_array; 			
		$this->load->view('blogcategory/view_blogcategory_list',$data);        
			
		
	    }
	   
		
		public function add() {			
			$data['ckeditor']      =  set_ck_config(array('textarea_id'=>'blogcategory_answer'));				
			$data['heading_title'] = 'Add Blog';			
	        $this->form_validation->set_rules('blogcategory_question','Question',"trim|required|max_length[255]|xss_clean|unique[wl_blogcategory.blogcategory_question='".$this->db->escape_str($this->input->post('blogcategory_question'))."' AND status!='2']");
			
			$this->form_validation->set_rules('blogcategory_answer','Answer','trim|required|required_stripped|xss_clean|max_length[8500]');
			
			if($this->form_validation->run()==TRUE)
			{
			
			      $posted_data = array(
				  	'category_id' => '',
					'title'		=>$this->input->post('blogcategory_question',TRUE),
					'detail'	=>$this->input->post('blogcategory_answer',TRUE),
					'blogcategory_date_added'=>$this->config->item('config.date.time')
				 );
				 				
			    $this->blogcategory_model->safe_insert('wl_blogcategory',$posted_data,FALSE);					 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));			
				redirect('adminzone/blogcategory', '');
				
			
			}
			
			$this->load->view('blogcategory/view_blogcategory_add',$data);				
	   
	   }
	   
	   
	   public function edit()
	   {
	     
		    $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'blogcategory_answer'));	
					   
		    $data['heading_title'] = 'Edit FAQ';
			
			$Id = (int) $this->uri->segment(4);
			$param=array(
					'pid'=>$Id,
					'status'=>'1',
					);
			
			$res = $this->blogcategory_model->get_blogcategory(1,0,$param);
			
			
		   if(is_array($res) && !empty($res)){ 
		        $this->form_validation->set_rules('blogcategory_question','Question',"trim|required|max_length[255]|xss_clean|unique[wl_blogcategory.blogcategory_question='".$this->db->escape_str($this->input->post('blogcategory_question'))."' AND status!='2' AND blogcategory_id!=".$Id."]");
				
			$this->form_validation->set_rules('blogcategory_answer','Answer','trim|required|required_stripped|xss_clean|max_length[8500]');
			if($this->form_validation->run()==TRUE)
			{
				$posted_data = array(
				'blogcategory_question'=>$this->input->post('blogcategory_question',TRUE),
				'blogcategory_answer'=>$this->input->post('blogcategory_answer',TRUE)
				);
				
				$where = "blogcategory_id = '".$res['blogcategory_id']."'"; 						
				$this->blogcategory_model->safe_update('wl_blogcategory',$posted_data,$where,FALSE);	
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('successupdate'));	
						
				 redirect('adminzone/blogcategory/'.query_string(), ''); 	
			}
				
			    $data['res']=$res;
			    $this->load->view('blogcategory/view_blogcategory_edit',$data);
				
		   }else
		   {
			   
			  redirect('adminzone/blogcategory', ''); 	 
			   
		   }
		   
	 }
	   
	   
	   
	   

}
//controllet end