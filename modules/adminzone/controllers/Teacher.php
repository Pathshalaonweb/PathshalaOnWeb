<?php
class Teacher extends Admin_Controller 
{
  public function __construct() 
  {
    parent::__construct();
		$this->load->model(array('teacher/teacher_model'));
		$this->config->set_item('menu_highlight','teacher management');	
  }
  public  function index()
  {	  

     	 $condtion               = 	array();	
    	 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));		
		 $status			     =  $this->input->get_post('status',TRUE);
		
		if($status!='')
		{
			$condtion['status'] = $status;
		}
		$res_array              = $this->teacher_model->get_teacher($config['limit'],$offset,$condtion);		
		//echo_sql();
		$total_record           = get_found_rows();			
		$data['page_links']     = admin_pagination($base_url,$total_record,$config['limit'],$offset);
		$data['heading_title']  = 'Manage Teacher';
		$data['pagelist']       = $res_array; 	
		$data['total_rec']      = $total_record  ;
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_teacher','teacher_id');			
		}
		//trace($this->input->post());
		$this->load->view('teacher/teacher_list_view',$data); 	
	}

	public function details()
	{
		$teacher_id   = (int) $this->uri->segment(4);
		$mres           = $this->teacher_model->get_teacher_row($teacher_id);		
		$data['heading_title']  = 'Teaher Details';
		$data['mres']      = $mres;		
		$this->load->view('teacher/view_teacher_detail',$data); 
	}

	

	public function yes(){
		$id=$this->uri->segment('4');
		$posted_data = array(
				'display_home'=>'1',
				);
		
		$where = "teacher_id = '".$id."'"; 						
		$this->teacher_model->safe_update('wl_teacher',$posted_data,$where,FALSE);	
		$this->session->set_userdata(array('msg_type'=>'success'));
		$this->session->set_flashdata('success',lang('successupdate'));	
		
		redirect('adminzone/teacher');
		
		}

	public function no(){
		$id=$this->uri->segment('4');
		$posted_data = array(
				'display_home'=>'0',
				);
		
		$where = "teacher_id = '".$id."'"; 						
		$this->teacher_model->safe_update('wl_teacher',$posted_data,$where,FALSE);	
		$this->session->set_userdata(array('msg_type'=>'success'));
		$this->session->set_flashdata('success',lang('successupdate'));	
		
		redirect('adminzone/teacher');
		
		}

	public function account_approved_yes(){
		$id=$this->uri->segment('4');
		$posted_data = array(
				'account_approved'=>'1',
				);
		
		$where = "teacher_id = '".$id."'"; 						
		$this->teacher_model->safe_update('wl_teacher',$posted_data,$where,FALSE);	
		$this->session->set_userdata(array('msg_type'=>'success'));
		$this->session->set_flashdata('success',lang('successupdate'));	
		
		redirect('adminzone/teacher');
		
		}

	public function account_approved_no(){
		$id=$this->uri->segment('4');
		$posted_data = array(
				'account_approved'=>'0',
				);
		
		$where = "teacher_id = '".$id."'"; 						
		$this->teacher_model->safe_update('wl_teacher',$posted_data,$where,FALSE);	
		$this->session->set_userdata(array('msg_type'=>'success'));
		$this->session->set_flashdata('success',lang('successupdate'));	
		
		redirect('adminzone/teacher');
		
		}
		
		
		
	public function excel(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$output=NULL;
		$condtion               = array();	
		$status			         =   $this->input->get_post('status',TRUE);
		if ($status!='') {
			$condtion['status'] = $status;
		}
		$res_array              = $this->teacher_model->get_teacher($condtion);
		echo_sql();
		$rowcount               = get_found_rows();	
		$sql="SELECT SQL_CALC_FOUND_ROWS *, CONCAT_WS(' ', first_name) AS 
		name FROM `wl_teacher` WHERE `status` != '2' ORDER BY `teacher_id` DESC ";
		$query=$this->db->query($sql);
		$rowcount=$query->num_rows();
		//print_r($res_array);
		if($rowcount > 0){
			$output .='<table border="1">
						<tr>
							<td>Use Name</td>
							<td>Email</td>
							<th>Name</th>
							<td>Mobile</td>
							<td>Address</td>
							<td>pincode</td>
							<td>status</td>
							<td>account created date</td>
						</tr>';
			
			foreach($query->result_array() as $val){
				$output .='<tr>
							<td>'.$val['name'].'</td>
							<td>'.$val['user_name'].'</td>
							<td>'.$val['first_name'].'</td>
							<td>'.$val['phone_number'].'</td>
							<td>'.$val['address'].'</td>
							<td>'.$val['pincode'].'</td>
							<td>'.$val['status'].'</td>
							<td>'.$val['account_created_date'].'</td>
						</tr>';	
			}
			$output .='</table>';
	}
 	
	header("Content-type: application/xls");  
	header("Content-Disposition: attachment; filename=teacher_detail_list.xls");  
	header("Pragma: no-cache");  
	header("Expires: 0");  
	echo $output;
	//$this->load->view('member/member_list_view'); 	
}	

}

// End of controller