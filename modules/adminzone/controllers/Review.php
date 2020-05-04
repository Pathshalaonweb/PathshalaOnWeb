<?php
class Review extends Admin_Controller
{
	public function __construct()
	{	
		parent::__construct(); 				
		$this->load->model(array('review_model'));  			
		$this->config->set_item('menu_highlight','other management');	
	}
	
	public  function index()
	{
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']		 = ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$res_array              =  $this->review_model->get_review($config['limit'],$offset);	
		$total_record           =  get_found_rows();
		$config['total_rows']   =  $total_record;
		$data['total_rows']   =  $total_record;
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
		$data['res']            =  $res_array; 
			if( $this->input->post('status_action')!='')
			{			
				$this->update_status('wl_rating','rate_id');			
			}
		$data['heading_title'] = 'Manage Review\'s';
		$data['pagelist']      = $res_array; 			
		$this->load->view('review/view_review_list',$data);        
		
		}
		
	public function edit(){
		$Id = (int) $this->uri->segment(4);
		$param=array(
				'id'=>$Id,
		);
		$res = $this->review_model->get_review(1,0,$param);
		if(is_array($res) && !empty($res)){ 
		$this->form_validation->set_rules('status','Status','trim|required|xss_clean');
			if($this->form_validation->run()==TRUE)
			{
				$posted_data = array(
					'rating'			=>$this->input->post('rating',TRUE),
					'teachingstyle'		=>$this->input->post('teachingstyle',TRUE),
					'discipline'		=>$this->input->post('discipline',TRUE),
					'studymaterial'		=>$this->input->post('studymaterial',TRUE),
					'locations'			=>$this->input->post('locations',TRUE),
					'infrastructure'	=>$this->input->post('infrastructure',TRUE),
					'status'			=>$this->input->post('status',TRUE),
				);
				$where = "rate_id = '".$res['rate_id']."'"; 						
				$this->faq_model->safe_update('wl_rating',$posted_data,$where,FALSE);	
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('successupdate'));	
				redirect('adminzone/review/'.query_string(), ''); 
			}
			 $data['res']=$res;
			 $this->load->view('review/view_review_edit',$data);
		  }
		}	

	   	
}

?>