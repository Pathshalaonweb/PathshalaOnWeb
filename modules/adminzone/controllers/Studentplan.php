<?php
class Studentplan extends Admin_Controller
{

	public function __construct()
	{	
		parent::__construct(); 				
		$this->load->model(array('studentplan/studentplan_model'));  			
		$this->config->set_item('menu_highlight','other management');	
	}
	
	
	 public  function index()
	 {
		
		 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $res_array              =    $this->studentplan_model->get_studentplan($config['limit'],$offset);	
	     $total_record           =   get_found_rows();
		 $config['total_rows']   =   $total_record;
		 $data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
		 $data['res']            =  $res_array; 
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_studentplan','plan_id');			
		}
		if( $this->input->post('update_order')!='')
		{
			$this->update_displayOrder('wl_studentplan','sort_order','plan_id');	
		}
		$data['heading_title'] = 'Manage Plan\'s';
		$data['pagelist']      = $res_array; 			
		$this->load->view('studentplan/view_studentplan_list',$data);        
			
		
	    }
	   
	   
		public function display(){
		
			$res = $this->studentplan_model->getHelpcenter_by_id($this->uri->segment(4));			
			$data['heading_title'] = 'View FAQ Information';
			$data['page_title']    = 'View FAQ Information';
			$data['pageresult']=$res;
			
			$this->load->view('common/view_helpcenter_detail',$data);
			
		}
		
		public function add()
		{			
			$data['ckeditor']      =  set_ck_config(array('textarea_id'=>'studentplan_answer'));				
			$data['heading_title'] = 'Add Plan';			
	        $this->form_validation->set_rules('name','Name',"trim|required|max_length[255]|xss_clean|unique[wl_studentplan.name='".$this->db->escape_str($this->input->post('name'))."' AND status!='2']");
			$this->form_validation->set_rules('price','price',"trim|required|max_length[5]|xss_clean");
			//$this->form_validation->set_rules('validity','validity',"trim|required|xss_clean");
			$this->form_validation->set_rules('credit_point','Credit Point',"trim|required|xss_clean");
			$this->form_validation->set_rules('detail','Detail','trim|required|required_stripped|xss_clean|max_length[850]');
			$data['data']=$this->input->post('validity');
			if($this->form_validation->run()==TRUE)
			{
			
			      $posted_data = array(
					'name'				=>$this->input->post('name',TRUE),
					'price'				=>$this->input->post('price',TRUE),
					//'validity'			=>$this->input->post('validity',TRUE),
					'detail'			=>$this->input->post('detail',TRUE),
					'credit_point'			=>$this->input->post('credit_point',TRUE),
					'plan_date_added'	=>$this->config->item('config.date.time')
				 );
				 				
			    $this->studentplan_model->safe_insert('wl_studentplan',$posted_data,FALSE);	
				//echo_sql();die;				 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));			
				redirect('adminzone/studentplan', '');
			}
			
			$this->load->view('studentplan/view_studentplan_add',$data);				
	   
	   }
	   
	   
	   public function edit()
	   {
	     
		  $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'studentplan_answer'));	
		  $data['heading_title'] = 'Edit Plan';
		  $Id = (int) $this->uri->segment(4);
		  $param=array(
					'pid'=>$Id,
					'status'=>'1',
				);
		  $res = $this->studentplan_model->get_studentplan(1,0,$param);
		  if(is_array($res) && !empty($res)) { 
		        $this->form_validation->set_rules('name','Name',"trim|required|max_length[255]|xss_clean|unique[wl_studentplan.name='".$this->db->escape_str($this->input->post('name'))."' AND status!='2' AND plan_id!=".$Id."]");
			$this->form_validation->set_rules('price','price',"trim|required|max_length[5]|xss_clean");
			//$this->form_validation->set_rules('validity','validity',"trim|required|xss_clean");
			$this->form_validation->set_rules('credit_point','Credit Point',"trim|required|xss_clean");
			$this->form_validation->set_rules('detail','Detail','trim|required|required_stripped|xss_clean|max_length[850]');
			$data['data']=$this->input->post('validity');
			if($this->form_validation->run()==TRUE)
			{
			
			      $posted_data = array(
					'name'					=>$this->input->post('name',TRUE),
					'price'					=>$this->input->post('price',TRUE),
					//'validity'				=>$this->input->post('validity',TRUE),
					'detail'				=>$this->input->post('detail',TRUE),
					'credit_point'			=>$this->input->post('credit_point',TRUE),
					'plan_updated_at'		=>$this->config->item('config.date.time')
				 );
				$where = "plan_id = '".$res['plan_id']."'"; 						
				$this->studentplan_model->safe_update('wl_studentplan',$posted_data,$where,FALSE);	
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('successupdate'));	
				 redirect('adminzone/studentplan/'.query_string(), ''); 	
			}
			    $data['res']=$res;
			    $this->load->view('studentplan/view_studentplan_edit',$data);
			}else{
			   
			  redirect('adminzone/studentplan', ''); 	 
			   
		   }
		   
	 }
	   
	   
	   
	   

}
//controllet end