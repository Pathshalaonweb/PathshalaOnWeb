<?php
class Coupons extends Admin_Controller
{

	public function __construct(){
	
			parent::__construct();
			
		    $this->load->model(array('adminzone/coupons_model')); 		
		   $this->config->set_item('menu_highlight','orders management');	
	}
	
	
	 public  function index($page = NULL)
	 {
		 
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 		
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 		 				
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 
									 						 	
	    $res_array              = $this->coupons_model->get_discount_coupon($offset,$config['limit']);	
						
	    $config['total_rows']	= $this->coupons_model->total_rec_found;
		
		$data['page_links']     =  admin_pagination("$base_url",$config['total_rows'],$config['limit'],$offset);
								
	
		$data['heading_title']  = 'Manage Discount Coupon';		
		$data['res']            = $res_array; 		
		
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_coupons','coupon_id');			
		}
			
		$this->load->view('discount_coupons/view_discoupon_list',$data);
			
		
	    }
			
		
		public function add()
		{
			
			$data['heading_title'] = 'Add Discount coupon';
			$this->form_validation->set_rules('coupon_type','Discount Coupon Type','trim|required|xss_clean');			
			$this->form_validation->set_rules('coupon_discount','Coupon Discount','trim|required|xss_clean');
			$this->form_validation->set_rules('start_date','Coupon start date','trim|required|xss_clean|callback_valid_start_date');
			$this->form_validation->set_rules('end_date','Coupon end date','trim|required|xss_clean|callback_valid_end_date');
			$this->form_validation->set_rules('minimum_order_amount','Minimum order amount','trim|xss_clean|is_valid_amount|callback_valid_minimum_amount');
					
					
		if($this->form_validation->run()===TRUE)
		{
			$coupon_code = random_string();
			$minimum_order_amount = ($this->input->post('minimum_order_amount',TRUE)!='' ) ? $this->input->post('minimum_order_amount',TRUE) : "0.0000";
			 $posted_data = array(
					'coupon_code'=>$coupon_code,
					'coupon_type'=>$this->input->post('coupon_type',TRUE),
					'coupon_discount'=>$this->input->post('coupon_discount',TRUE), 
					'minimum_order_amount'=>$minimum_order_amount, 
					'start_date'=>$this->input->post('start_date',TRUE),
					'end_date'=>$this->input->post('end_date',TRUE),
					'date_added'=>$this->config->item('config.date.time')
				 );
				 				
			    $this->coupons_model->safe_insert('wl_coupons',$posted_data,FALSE);					 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));			
			   redirect('adminzone/coupons/', '');	
						
		}
		
		$this->load->view('discount_coupons/view_coupon_add',$data);		  
			  
			
		}
				
		
		public function valid_start_date()
		{		
			$start_date = $this->input->post('start_date');	
			$cdt        = $this->config->item('config.date');			
			$curdtsuv   = strtotime($cdt);
			$startdtsuv = strtotime($start_date);			
			
			if( $startdtsuv <  $curdtsuv )
			{			
				$this->form_validation->set_message("valid_start_date","Coupon start date should not be less than current date.");
				return FALSE;
			
			}else
			{
				
			  return TRUE;	
			  
			}
		
		}
		
		
		public function valid_end_date()
		{
		
			$start_date = $this->input->post('start_date');
			$end_date   = $this->input->post('end_date');
			
			$curdtsuv   = strtotime($start_date);
			$startdtsuv = strtotime($end_date);
			
			if( $startdtsuv <  $curdtsuv )
			{			
				$this->form_validation->set_message("valid_end_date","Coupon end date should not be less than coupon start date.");
				return FALSE;
			
			}else
			{				
				return TRUE;
				
			}
		
		}
		
		
		
		public function edit()
		{
			
		   $data['heading_title'] = 'Edit Coupon';
	       $id                    =  $this->uri->segment(4);
		   $data['id']            = $id;		
	       $rowdata               = $this->coupons_model->get_coupon_by_id($id);
				
		if(is_object($rowdata))
		{
			$this->form_validation->set_rules('coupon_type','Discount Coupon Type','trim|required|xss_clean');			
			$this->form_validation->set_rules('coupon_discount','Coupon Discount','trim|required|xss_clean');
			$this->form_validation->set_rules('start_date','Coupon start date','trim|required|xss_clean|callback_valid_start_date');
			$this->form_validation->set_rules('end_date','Coupon end date','trim|required|xss_clean|callback_valid_end_date');
			$this->form_validation->set_rules('minimum_order_amount','Minimum order amount','trim|xss_clean|is_valid_amount|callback_valid_minimum_amount');
			
			if($this->form_validation->run()==TRUE)
			{
				
				 $posted_data = array(					
					'coupon_type'=>$this->input->post('coupon_type',TRUE),
					'coupon_discount'=>$this->input->post('coupon_discount',TRUE), 
					'minimum_order_amount'=>$this->input->post('minimum_order_amount',TRUE), 
					'start_date'=>$this->input->post('start_date',TRUE),
					'end_date'=>$this->input->post('end_date',TRUE)
				 );
				 
				$where = "coupon_id= '".$rowdata->coupon_id."'"; 						
				$this->coupons_model->safe_update('wl_coupons',$posted_data,$where,FALSE);
						
		       	$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('successupdate'));				
				redirect('adminzone/coupons/'.query_string(), '');				
			}
			
			$data['res']= $rowdata;
		    $this->load->view('discount_coupons/view_coupon_edit',$data);
			
		}else
		{
			redirect('adminzone/coupons/', ''); 
		}
		
	}
		
		
	public function assign_to_member()
	{		
		$data['heading_title'] = "Send Coupon";
		$couponID              = $this->uri->segment(4);
		$data['couponID']      = $couponID;
		
		if($this->input->post('action')!='')
		{
			
			$mid=$this->input->post('mid');
			
			if(!is_array($mid))
			{
				
				$this->session->set_userdata(array('msg_type'=>'error'));
				$this->session->set_flashdata('error',"member not selected");
				redirect('adminzone/coupons/assign_to_member/'.$couponID, '');	
				
			}else{
				
				$this->coupons_model->send_discount_coupon($couponID);
				redirect('adminzone/coupons/coupon_assigned_customers/'.$couponID, '');
			}
		}else{
			
			$condtion                = array();	
			$pagesize                =  (int) $this->input->get_post('pagesize');
			$config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
			$offset                  =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;				
			$base_url                =  current_url_query_string(array('filter'=>'result'),array('per_page'));
			$status			         =   $this->input->get_post('status',TRUE);
			$condtion['status'] = '1';
			
			$this->load->model(array('members/members_model')); 
			$res = $this->members_model->get_members($config['limit'],$offset,$condtion);			
			$total_record	 =  get_found_rows();
			$data['page_links']     =  admin_pagination($base_url,$total_record,$config['limit'],$offset);
			$data['res'] = $res ;
			$this->load->view('discount_coupons/view_coupon_assign_to_member',$data);
			
		}
		
	}
	
	public function coupon_assigned_customers()
	{
		
		$data['heading_title'] = "View Coupon Member Status";
		$couponID              = $this->uri->segment(4);
		$data['couponID']      = $couponID;
		$this->load->view('discount_coupons/view_coupon_assigned_customers',$data);
	}
	
	public function valid_minimum_amount()
	{
			$coupon_type           = $this->input->post('coupon_type',TRUE);
			$coupon_discount       = $this->input->post('coupon_discount',TRUE);
			$minimum_order_amount  =  $this->input->post('minimum_order_amount',TRUE);
					
			
			if($coupon_type=='a' && ($coupon_discount > $minimum_order_amount) )
			{
				$this->form_validation->set_message('valid_minimum_amount', 'Coupon Discount must be less than Minimum order amount.');
			    return FALSE;		
						
			}else
			{
				
				return TRUE;	
			}
	}
	
		
}