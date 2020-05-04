<?php
class Setting extends Admin_Controller {

    public function __construct() {
       parent::__construct(); 
       $this->load->helper('ckeditor');		
       $this->load->model(array('adminzone/setting_model'));  
    }
	 
    public function index($page = null){	

        $data['heading_title'] = 'Admin Setting';	
        $data['admin_info'] = $this->setting_model->get_admin_info($this->session->userdata('admin_id'));		
        $this->load->view('dashboard/setting_edit_view',$data);		
    }
	   
    public function edit(){

        $this->form_validation->set_rules('old_pass', 'Old Password', 'required|max_length[30]');
        $this->form_validation->set_rules('new_pass', 'New Password', 'required|valid_password|max_length[30]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_pass]|max_length[30]');			   
        $this->form_validation->set_rules('admin_email', 'Email ID',  'required|valid_email');

        if ($this->form_validation->run() == TRUE)
        {
            $this->setting_model->update_info( $this->input->post('old_pass'),$this->session->userdata('admin_id') ) ;				 	
            redirect('adminzone/setting/','');
        }

        $data['heading_title'] = 'Admin Setting'; 
        $data['admin_info'] = $this->setting_model->get_admin_info($this->session->userdata('admin_id'));		
        $this->load->view('dashboard/setting_edit_view',$data);  

    }
		 
    public function points(){
        $this->form_validation->set_rules('credit_type', 'Credit Type', 'required|xss_clean');		 
        $this->form_validation->set_rules('min_amount_shop', 'Minimum Shopping', 'required|xss_clean|is_valid_amount|max_length[10]');
        $this->form_validation->set_rules('credit_percent', 'Percentage Point', 'required|xss_clean|is_valid_amount|max_length[10]');
        $this->form_validation->set_rules('credit_points', 'Credit Points', 'required|xss_clean|is_valid_amount|max_length[10]');			   

        if ($this->form_validation->run() == TRUE)
        {
            $data = array(
                           'credit_type'     => $this->input->post('credit_type'),
                           'min_amount_shop' => $this->input->post('min_amount_shop'),
                           'credit_percent'  => $this->input->post('credit_percent'),
                           'credit_points'   => $this->input->post('credit_points'),
                        );

            $this->setting_model->safe_update('wl_loyalty_breakthrough', $data, array('id' => '1'), FALSE );						 
            $this->session->set_flashdata('success','Points has been updated sucessfully.');				 	
            redirect('adminzone/setting/points','');			 
        }

         $data['heading_title'] = 'Loyalty Point Setting'; 
         $data['point_info'] = $this->setting_model->get_coupon_info();		
         $this->load->view('dashboard/points_edit_view',$data);  
	
    }
	 	 
}
// End of controller