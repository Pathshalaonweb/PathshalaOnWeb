<?php
class Profile extends Teacher_Controller
{

	
	public function __construct() {
		parent::__construct();  		
		$this->load->model(array('teacherdashboard/profile_model','teacher/teacher_model'));	
	}

	public function index(){
		 
		 
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 $config['limit']		 =  ($pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		 $offset                 =  ($this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $page_segment           =  find_paging_segment();
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $teacher_id			 =	$this->session->userdata('teacher_id');	
		 $condtion               =  array('teacher_id'=>$teacher_id);	
		 $res_array              =  $this->profile_model->get_profile($config['limit'],$offset,$condtion);		
		 //echo_sql();
		 $config['total_rows']   =  get_found_rows();			
		 $data['page_links']     =  pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);
		 $data['sno']            =  ($this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page')+1 : 1;	 						
		 $data['heading_title']  =  $page_title;
		 $data['res']            =  $res_array; 	
		 $this->load->view('teacherdashboard/profile/view_profile_listing',$data);
	}
	
	public function add(){
			$data['heading_title'] = 'Add Profile';	
			$this->form_validation->set_rules('subject','subject','trim|required|xss_clean');
			$data['subj'] = $this->input->get('subject');
			$this->form_validation->set_rules('class','class','trim|required|xss_clean');
			$data['classes'] = $this->input->get('class');
			
			$this->form_validation->set_rules('state_id','state','trim|required|xss_clean');
			$data['state'] = $this->input->get('state');
			$this->form_validation->set_rules('city','city','trim|required|xss_clean');
			$this->form_validation->set_rules('fee','fee','trim|required|xss_clean');
			if($this->form_validation->run()==TRUE)
			{
				  $posted_data = array(
				  		'teacher_id'	=>$this->session->userdata('teacher_id'),
						'subject'		=>$this->input->post('subject',TRUE),
						'class'			=>$this->input->post('class',TRUE),
						'location'		=>$this->input->post('location',TRUE),
						'state_id'		=>$this->input->post('state_id',TRUE),
						'city_id'		=>$this->input->post('city',TRUE),
						'fee'			=>$this->input->post('fee',TRUE),
						'created_at'	=>$this->config->item('config.date.time')
				 );
				$this->profile_model->safe_insert('wl_teacher_profile',$posted_data,FALSE);
				$data_array=array(
					'profile_edit'=> '1'
				);
				$where = "teacher_id = '".$this->session->userdata('teacher_id')."'"; 						
				$this->teacher_model->safe_update('wl_teacher',$posted_data,$where,FALSE);					 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',"successfully inserted");			
				//echo_sql();
				redirect('teacherdashboard/profile', '');
			}
			$this->load->view('teacherdashboard/profile/view_profile_add',$data);	
		
		}
		
		
		public function edit(){
			$Id = (int) trim($this->uri->segment(4));
			$this->form_validation->set_rules('subject','subject','trim|required|xss_clean');
			$data['subj'] = $this->input->get('subject');
			$this->form_validation->set_rules('class','class','trim|required|xss_clean');
			$data['classes'] = $this->input->get('class');
			$this->form_validation->set_rules('state_id','state','trim|required|xss_clean');
			$data['state'] = $this->input->get('state');
			$this->form_validation->set_rules('city','city','trim|required|xss_clean');
			$this->form_validation->set_rules('fee','fee','trim|required|xss_clean');
			$param=array(
					'id'			=>$Id,
					'status'		=>'1',
					'teacher_id'	=>$this->session->userdata('teacher_id')
			);
			$res = $this->profile_model->get_profile(1,0,$param);
			//echo_sql();die;
			if(is_array($res) && !empty($res)){ 
			if($this->form_validation->run()==TRUE)
			{
				 $posted_data = array(
				  		'teacher_id'	=>$this->session->userdata('teacher_id'),
						'subject'		=>$this->input->post('subject',TRUE),
						'class'			=>$this->input->post('class',TRUE),
						'location'		=>$this->input->post('location',TRUE),
						'state_id'		=>$this->input->post('state_id',TRUE),
						'city_id'		=>$this->input->post('city',TRUE),
						'fee'			=>$this->input->post('fee',TRUE)
				);
				$where = "id = '".$res['id']."'"; 						
				$this->profile_model->safe_update('wl_teacher_profile',$posted_data,$where,FALSE);	
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',"Data updated successfully");	
				redirect('teacherdashboard/profile/'.query_string(), '');
			}
			 $data['res']=$res;
			 $this->load->view('teacherdashboard/profile/view_profile_edit',$data);
			}else{
				 redirect('teacherdashboard/profile', ''); 	
			}
		
		}
		
		public function selectstate(){
			$id=$_POST['state_id'];
				$sql="SELECT * FROM `tbl_cities`  where state_id='$id'  ORDER BY name";
							$query=$this->db->query($sql);
							foreach($query->result_array() as $val):
								echo "<option value='".$val['id']."'>".$val['name']."</option>";
							endforeach;
			}
}
?>