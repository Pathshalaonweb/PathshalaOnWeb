<?php

class Listclass extends Teacher_Controller
{

	
	public function __construct() {
		parent::__construct();  		
		$this->load->model(array('teacherdashboard/listclass_model','teacher/teacher_model'));	
	}

	public function index(){
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 $config['limit']		 =  ($pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		 $offset                 =  ($this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $page_segment           =  find_paging_segment();
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $teacher_id			 =	$this->session->userdata('teacher_id');		
		 $condtion               =  array('teacher_id'=>$teacher_id);	
		 $res_array              =  $this->listclass_model->get_profile($config['limit'],$offset,$condtion);		
		 //echo_sql();
		 $config['total_rows']   =  get_found_rows();			
		 $data['page_links']     =  pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);
		 $data['sno']            = ($this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page')+1 : 1;	 						
		 $data['heading_title']  =  $page_title;
		 $data['res']            =  $res_array; 	
		 $this->load->view('teacherdashboard/listclass/view_listclass_listing',$data);
	}
	
	public function add(){
			$data['heading_title'] = 'Add listclass';
			$this->form_validation->set_rules('category','category','trim|required|xss_clean');
			$data['category'] = $this->input->get('category');
			$this->form_validation->set_rules('class','class','trim|required|xss_clean');
			$data['class'] = $this->input->get('class');
			$this->form_validation->set_rules('class_title','class_title','trim|required|xss_clean');
			$data['class_title'] = $this->input->get('class_title');
			$this->form_validation->set_rules('class_schedule_time','class_schedule_time','trim|required|xss_clean');
			$data['class_schedule_time'] = $this->input->get('class_schedule_time');
			$this->form_validation->set_rules('class_duration','class_duration','trim|required|xss_clean');
			$data['class_duration'] = $this->input->get('class_duration');
			$this->form_validation->set_rules('class_date','class_date','trim|required|xss_clean');
			$data['class_date'] = $this->input->get('class_date');
			$this->form_validation->set_rules('class_credit_amount','class_credit_amount','trim|required|xss_clean');
			$data['class_credit_amount'] = $this->input->get('class_credit_amount');
			
			if($this->form_validation->run()==TRUE)
			{
			$posted_data = array(
				  		'teacher_id'	=>$this->session->userdata('teacher_id'),
						'class_title'	=>$this->input->post('class_title',TRUE),
						'class_schedule_time'	=>$this->input->post('class_schedule_time',TRUE),
						'class_duration'	=>$this->input->post('class_duration',TRUE),
						'category'		=>$this->input->post('category'),					
						'class'			=>$this->input->post('class',TRUE),
						'class_date'		=>$this->input->post('class_date',TRUE),
						'class_credit_amount'		=>$this->input->post('class_credit_amount',TRUE),
						'created_at'	=>$this->config->item('config.date.time')
						 );
				//echo "<script>alert(".$posted_data.");</script>";
				$this->listclass_model->safe_insert('wl_addclass',$posted_data,FALSE);
				// $data_array=array(
				// 		'listclass_edit'=> '1'
				// );
				// $where = "teacher_id = '".$this->session->userdata('teacher_id')."'";		
				// $this->teacher_model->safe_update('wl_teacher',$data_array,$where,FALSE);	
				//echo_sql();die;				 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',"successfully inserted");			
				//echo_sql();
				redirect('teacherdashboard/listclass', '');
			}
			
			$this->load->view('teacherdashboard/listclass/view_listclass_add',$data);	
		
		}
		
		
		public function edit(){
			$Id = (int) trim($this->uri->segment(4));
			//print_r($_REQUEST);
			$this->form_validation->set_rules('category','category','trim|required|xss_clean');
			$data['category'] = $this->input->get('category');
			$this->form_validation->set_rules('class','class','trim|required|xss_clean');
			$data['class'] = $this->input->get('class');
			$this->form_validation->set_rules('class_title','class_title','trim|required|xss_clean');
			$data['class_title'] = $this->input->get('class_title');
			$this->form_validation->set_rules('class_schedule_time','class_schedule_time','trim|required|xss_clean');
			$data['class_schedule_time'] = $this->input->get('class_schedule_time');
			$this->form_validation->set_rules('class_duration','Class_Duration','trim|required|xss_clean');
			$data['class_duration'] = $this->input->get('class_duration');
			$this->form_validation->set_rules('class_date','class_date','trim|required|xss_clean');
			$data['class_date'] = $this->input->get('class_date');
			$this->form_validation->set_rules('class_credit_amount','class_credit_amount','trim|required|xss_clean');
			$data['class_credit_amount'] = $this->input->get('class_credit_amount');
			$param=array(
					'id'			=>$Id,
					'status'		=>'1',
					'teacher_id'	=>$this->session->userdata('teacher_id')
			);
			$res = $this->Listclass_model->get_profile(1,0,$param);
			//echo_sql();die;
			if(is_array($res) && !empty($res)){ 
			if($this->form_validation->run()==TRUE)
			{
				 $posted_data = array(
				  		'teacher_id'	=>$this->session->userdata('teacher_id'),
						'category'		=>$this->input->post('category'),
						'class' 		=>$this->input->post('class',TRUE),
						'class_title'	=>$this->input->post('class_title',TRUE),
						'class_schedule_time'	=>$this->input->post('class_schedule_time',TRUE),
						'class_duration'	=>$this->input->post('class_duration',TRUE),
						'class_date'		=>$this->input->post('class_date',TRUE),
						'class_credit_amount'		=>$this->input->post('class_credit_amount',TRUE)
				);
				$where = "id = '".$res['id']."'"; 						
				$this->listclass_model->safe_update('wl_addclass',$posted_data,$where,FALSE);
				$data_array=array(
						'listclass_edit'=> '1'
				);
				$where = "teacher_id = '".$this->session->userdata('teacher_id')."'"; 						
				$this->teacher_model->safe_update('wl_teacher',$data_array,$where,FALSE);	
				//echo_sql();die;		
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',"Data updated successfully");	
				redirect('teacherdashboard/listclass/'.query_string(), '');
			}
			 $data['res']=$res;
			 $this->load->view('teacherdashboard/listclass/view_listclass_edit',$data);
			}else{
				 redirect('teacherdashboard/listclass', ''); 	
			}
		
		}
		
		public function delete() {
			$id=(int)$this->uri->segment('4');
			$this->db->where('id', $id);
			$this->db->delete('wl_addclass');
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success',"Data Deleted successfully");	
			redirect('teacherdashboard/listclass/'.query_string(), ''); 
			redirect('teacherdashboard/listclass', ''); 	  
			//$this->load->model("listclass_model"); 
			//$this->listclass_model->did_delete_row($Id);
		}
		public function addlistclass()
		{
			if($_POST['category'])
			{
				//echo $_POST['category'];
				$teacher_id = $this->session->userdata('teacher_id');
				$class_title = trim($this->input->post('class_title',TRUE));
				$class_schedule_time = $this->input->post('class_schedule_time',TRUE);
				$class_duration = $this->input->post('class_duration',TRUE);
				$class = $this->input->post('class',TRUE);
				$class_date = $this->input->post('class_date',TRUE);
				$class_credit_amount = $this->input->post('class_credit_amount',TRUE);
				$category = $this->input->post('category',TRUE);
				$ch = curl_init();  

				//             URL TO BE CHANGED AFTER COMMITTING THE CHANGES !!!

				$url = base_url()."decore/new/api.php?action=ListClass&teacher_id=".$teacher_id."&class_title=".$class_title."&class_schedule_time=".$class_schedule_time."&class_duration=".$class_duration."&class=".$class."&class_date=".$class_date."&class_credit_amount=".$class_credit_amount."&category=".$category;
				curl_setopt($ch,CURLOPT_URL,$url);
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
				//echo $url;
				$output=curl_exec($ch);
				//print_r($output);
				echo $url;
				//echo $url;
				curl_close($ch);
				$jsonOutput = json_decode($output,true);
				// print_r($jsonOutput);
				// var_dump($jsonOutput);
				if($jsonOutput['message']=="Success" && $jsonOutput['success']=="1")
				{
					// api response is success.
					echo "<script>alert('Class Added Successfully.');window.location = '".base_url()."teacherdashboard/listclass';</script>";

				}
				else
				{
					echo "<script>alert('Error! please try again');window.location = '".base_url()."teacherdashboard/listclass';</script>";
				}
			}
			else
			{
				redirect("teacherdashboard/listclass/add",'');
			}
		}
		
		public function getSubcat(){
			$id=$_POST['category_id'];
			$sql="SELECT * FROM `wl_categories`  where parent_id='$id'  ORDER BY sort_order";
			$query=$this->db->query($sql);
			if($query->num_rows()>0){
			foreach($query->result_array() as $val):
				echo "<option value='".$val['category_id']."'>".$val['category_name']."</option>";
			endforeach;
			}else{
				echo "<option value=''>NO record </option>";	
			}
		}
		public function getSecondDropDown()
	{
		$id=$this->uri->segment(3);
		$sql="SELECT * FROM `wl_categories`  where parent_id='$id'  ORDER BY sort_order";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			//$arr = array();
		foreach($query->result_array() as $val):
			$arr['Result'][] = array(
					"value"=>       $val['category_id'],
					"name"=>        $val['category_name'],
			);
		endforeach;
		//print_r($arr);
		echo json_encode($arr);
		}else{
			echo"{ <item value=''>NO record </item>}";	
		}
		}
		
}
?>