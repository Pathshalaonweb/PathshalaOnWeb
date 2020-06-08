<?php
class Exam extends Public_Controller
{

	public function __construct()
	{
		parent::__construct();				
		
		$this->load->model('exam/exam_model');
		if($this->session->userdata('user_id')!='')
		{
			
		}
		else{
			redirect('users/login');
		}
	}
	
	public function index(){
		
		$this->load->view('exam');	
	}
	public function start_exam()
	{
		$lession_id         =  (int) $this->uri->segment(3,0);
		$userId				=  $this->session->userdata('user_id');
		$lession 			=  $this->exam_model->fetch_lession_by_id(array('lession_id'=>$lession_id));
		$data['lession']	=  $lession;
		if($this->input->post('sub'))
		{
			//echo "<pre>"; print_r($_POST); die;
			$sel_q ="SELECT * FROM `tbl_question` where lession_id='".$lession_id."'";
			$fetch_que=$this->db->query($sel_q);
			$fetch_que=$fetch_que->result_array();
			$posted_data=array(
				               'lession_id'   =>$lession[0]['lession_id'],
							   'userId'       =>$userId,
							   't_que'        =>$lession[0]['total_question'],
							   'n_mark'       =>$lession[0]['str_negative_mark'],
							   't_mark'       =>$lession[0]['str_total_mark'],
							   'exam_date'    =>$this->config->item('config.date.time'),
							   'ip_address'   =>$this->input->ip_address()
							  
							  );
			$insId =  $this->exam_model->safe_insert('tbl_exam',$posted_data,FALSE);
			$i=1;
			foreach($fetch_que as $key => $val)
			{
				$user_ans=$this->input->post('options'.$i);
				if($user_ans=='')
				{
					$user_ans='';
				}
				$posted_data=array(
					               'exam_id'     =>$insId,
							       'question'    =>$val['question'],
							       'ans'         =>$val['answer'],
							       'user_ans'    =>$user_ans
								  );
			$this->exam_model->safe_insert('tbl_result',$posted_data,FALSE);
			$i++;
			}
			redirect('exam/exam_result');
		}
		$data['active']='dashboard';
		$this->load->view('level_exam',$data);	
	}
	
	public function start_test()
	{
		$subject_id        		=  (int) $this->uri->segment(3,0);
		$userId		 			=	$this->session->userdata('user_id');
		$mock_sub_res 		 	=	$this->exam_model->fetch_test_by_subject_id($subject_id);
		$data['mock_sub_res']	=	$mock_sub_res;
		$mock_res				=	$this->exam_model->fetch_test_by_mock_id($mock_sub_res['mock_id']);
		$data['mock_res']		=	$mock_res;
		$condition				=	array('department_id'=>$mock_sub_res['department_id'],'subject_id'=>$mock_sub_res['subject_id']);
		$que_res				=	$this->exam_model->get_question_list($condition);
		
		if($this->input->post('sub'))
		{
			
			$posted_data=array(
				               'department_id'		=>$mock_sub_res['department_id'],	
				               'mock_id'	  		=>$mock_sub_res['mock_id'],
				               'subject_id'      	=>$mock_sub_res['subject_id'],
							   'userId'       		=>$userId,
							   't_que'        		=>$mock_res['total_question'],
							   //'n_mark'       		=>$mock_sub_res['str_negative_mark'],
							   't_mark'       		=>$mock_res['str_total_mark'],
							   'exam_date'    		=>$this->config->item('config.date.time'),
							   'ip_address'   		=>$this->input->ip_address()
							  );
			//print_r($posted_data); die;
			$insId =  $this->exam_model->safe_insert('tbl_mock_exam',$posted_data,FALSE);
			//echo "<pre>"; print_r($insId); die;
			
			$i=1;
			foreach($que_res as $key => $val)
			{
				$user_ans=$this->input->post('options'.$i);
				if($user_ans=='')
				{
					$user_ans='';
				}
				$posted_data=array(
					               'exam_id'     =>$insId,
					               'subject_id'  =>$val['subject_id'],
							       'question'    =>$val['question'],
							       'ans'         =>$val['answer'],
							       'user_ans'    =>$user_ans
							  
							     );
				$this->exam_model->safe_insert('tbl_mock_result',$posted_data,FALSE);
				$i++;
			}
			redirect('exam/successfully');
		}
		$data['que_res'] =$que_res;
		$data['active']='dashboard';
		$this->load->view('test_exam',$data);	
	}
	
	public function successfully(){
	  $data['active'] ="test_result";
	  $this->load->view('successfull',$data);
	
	}
	
	
	public function exam_result()
	{
		$userId 			= $this->session->userdata('user_id');
		$data['exam_res']	= $this->exam_model->get_exam_result($userId);
		$data['active'] 	= "exam_result";
		$this->load->view('exam_result',$data);	
	}
	public function test_result()
	{
		$userId= $this->session->userdata('user_id');
		$exam_res=$this->exam_model->fetch_mock_result($userId);
		$data['exam_res'] =$exam_res;
		$data['active'] ="test_result";
		$this->load->view('test_result',$data);	
	}
	public function history()
	{
		$examId   		= (int) $this->uri->segment(3,0);
		$res			= $this->exam_model->fetch_exam_result_by_id($examId);
		$data['res']	= $res;
		$data['active'] = "test_result";
		$this->load->view('exam_history',$data);
	}
	public function mock_view()
	{
		$examId  	 	=  	(int) $this->uri->segment(3,0);
		$res			= 	$this->exam_model->fetch_mock_result_by_id($examId);
		$data['res']	=	$res;
		$data['active'] =	"test_result";
		$this->load->view('exam_history',$data);
	}
}