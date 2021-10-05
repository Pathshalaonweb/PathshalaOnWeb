<?php
class dreamcareer extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();  		
		$this->load->model(array('dreamcareer/dreamcareer_model','teacher/teacher_model'));	
		$this->load->library('Ajax_pagination');
		$this->perPage = 10;
	}

	public function index()
	{	
		
		$dreamcareer=@$_GET['dreamcareer'];
		if ($dreamcareer=='home') {
				$conditions = array();
				$page = $this->input->post('page');
				if(!$page){
					$offset = 0;
				}else{
					$offset = $page;
				}
				
				$keyword=$this->input->get('keyword');
				
				$sql="SELECT * FROM `wl_customdreamcareer` where status='1' AND keyword='".$keyword."'";
				$query=$this->db->query($sql);
				$row=$query->result_array();
				//echo "<pre>";print_r($row);
				if(!empty($row)){
				
					
				}
				$city=$row[0]['city'];
				
				
				$sql1="SELECT * FROM `tbl_cities` where status='1' AND id='".$city."'";
				$query1=$this->db->query($sql1);
				$row1=$query1->result_array();
				$state=$row1[0]['state_id'];
				
				//set conditions for dreamcareer
				@$location = $this->input->get('state');
				if(!empty($location)){
					 $conditions['dreamcareer']['state'] = $location;
				}
				//city
				@$city = $this->input->get('city');
				if(!empty($location)){
					 $conditions['dreamcareer']['city'] = $city;
				}
				@$category = $this->input->get('category');
				if(!empty($category)){
					 $conditions['dreamcareer']['category'] = $category;
				}
				//subject
				@$subject = $this->input->get('subject');
				if(!empty($subject)){
					$conditions['dreamcareer']['subject'] = $subject;
				}
				//class
				@$classes = $this->input->get('classes');
				if(!empty($classes)){
					 $conditions['dreamcareer']['classes'] = $classes;
				}
				//total rows count
				$totalRec = count($this->dreamcareer_model->get_teacher_row($conditions));
				//echo_sql();die;
				//pagination configuration
				$config['target']      = '#postList';
				$config['base_url']    = base_url().'dreamcareer/ajaxPaginationData';
				$config['total_rows']  = $totalRec;
				$config['per_page']    = $this->perPage;
				$config['link_func']   = 'dreamcareerFilter';
				$this->ajax_pagination->initialize($config);
				//set start and limit
				$conditions['start'] = $offset;
				$conditions['limit'] = $this->perPage;
				//get posts data
				$data['res'] = $this->dreamcareer_model->get_teacher_row($conditions);
				
				$this->load->view('dreamcareer/dreamcareer_result_view', $data);
		
		
		} else {
			
		$data = array();
        //total rows count
        $totalRec = count($this->dreamcareer_model->get_teacher_row());
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'dreamcareer/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'dreamcareerFilter';
        $this->ajax_pagination->initialize($config);
        //get the posts data
        $data['res'] = $this->dreamcareer_model->get_teacher_row(array('limit'=>$this->perPage));
        $data['totalRec']=$totalRec;
        //load the view
		$data['heading_title'] = "Advanced dreamcareer";	
        $this->load->view('dreamcareer/dreamcareer_result_view', $data);
		}
	}
	
	
  function ajaxPaginationData(){
        
		$conditions = array();
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
		@$list = $this->input->post('list');
        if(!empty($list)){
             $conditions['dreamcareer']['list'] = $list;
        }

		@$loc = $this->input->post('loc');
        if(!empty($loc)){
             $conditions['dreamcareer']['loc'] = $loc;
        }
		@$category = $this->input->post('category');
        if(!empty($category)){
             $conditions['dreamcareer']['category'] = $category;
        }
        //set conditions for dreamcareer
        @$location = $this->input->post('state');
        if(!empty($location)){
             $conditions['dreamcareer']['state'] = $location;
        }
		//city
		@$city = $this->input->post('city');
        if(!empty($location)){
             $conditions['dreamcareer']['city'] = $city;
        }
		//city
		@$category = $this->input->post('category');
        if(!empty($category)){
             $conditions['dreamcareer']['category'] = $category;
        }
		//subject
		@$subject = $this->input->post('subject');
        if(!empty($subject)){
			$conditions['dreamcareer']['subject'] = $subject;
        }
		//class
		@$classes = $this->input->post('classes');
        if(!empty($classes)){
			 $conditions['dreamcareer']['classes'] = $classes;
        }
		@$pincode = $this->input->post('pincode');
        if(!empty($classes)){
			 $conditions['dreamcareer']['pincode'] = $pincode;
        }
		@$sprice = $this->input->post('sprice');
		@$eprice = $this->input->post('eprice');
		if(!empty($sprice)){
            $conditions['dreamcareer']['sprice'] = $sprice;
        }
		if(!empty($eprice)){
            $conditions['dreamcareer']['eprice'] = $eprice;
        }
        if(!empty($sortBy)){
            $conditions['dreamcareer']['sortBy'] = $sortBy;
        }
		@$bath_time = $this->input->post('bath_time');
		if($bath_time!="Any Time"){
		if(!empty($bath_time)){
            $conditions['dreamcareer']['bath_time'] = $bath_time;
        }
		}
		//total rows count
        $totalRec = count($this->dreamcareer_model->get_teacher_row($conditions));
        //echo_sql();die;
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'dreamcareer/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'resultFilter';
        $this->ajax_pagination->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get posts data
        $data['res'] = $this->dreamcareer_model->get_teacher_row($conditions);
       // echo_sql();
        //load the view
        $this->load->view('dreamcareer/ajax-pagination-data', $data, false);
    }
	
	
	
		public function selectstate(){
			$id=$_POST['state_id'];
				$sql="SELECT * FROM `tbl_cities`  where state_id='$id'  ORDER BY name";
							$query=$this->db->query($sql);
							foreach($query->result_array() as $val):
								echo "<option value='".$val['id']."'>".$val['name']."</option>";
							endforeach;
			}
	
	public function getContent(){
			
			$return_arr = array();
			$data_post=array(
				'student_id' => $this->session->userdata('user_id'),
				'teacher_id' => $_POST['teacher'],
				'subjects' 	 => $_POST['subject'],
				'classes' 	 => $_POST['classes'],
				'keyword'	 => $_POST['keyword'],
				'category'	 => $_POST['category'],
				'created_at' => $this->config->item('config.date.time')
			);
			$insert=$this->teacher_model->safe_insert('wl_teacher_notified',$data_post,FALSE);
			if($insert){
				$return_arr['sucuess']='1';
				$return_arr['msg']="<div class='alert alert-success'>
				<strong>Success!</strong> Notification send .</div>";
			}else{
				$return_arr['sucuess']='0';
				$return_arr['msg']="<div class='alert alert-danger'>
				<strong>Warning!</strong> Some thing Went to wrong .</div>";
			}
			echo json_encode($return_arr);		
		}
		
		
		public function getAns2(){
			$id=$_POST['answer_id'];
			$sql="SELECT * FROM `wl_dc_answers`  where parent_id='$id'";
			$query=$this->db->query($sql);
			if($query->num_rows()>0){
			foreach($query->result_array() as $val):
				echo "<option value='".$val['answer_id']."'>".$val['answer_name']."</option>";
			endforeach;
			}else{
				echo "<option value=''>NO recode </option>";	
			}
		}

		public function getloc(){
			$id1=$_POST['programme_name'];
			$sql1="SELECT distinct(location_name) FROM `wl_dc_colleges`  where `programme_name`='$id1'";
			$query1=$this->db->query($sql1);
			if($query1->num_rows()>0){
			foreach($query1->result_array() as $val1):
				echo "<option value='".$val1['programme_name']."'>".$val1['location_name']."</option>";
			endforeach;
			}else{
				echo "<option value=''>NO recode </option>";	
			}
		}



		public function studentResult()
	 {
		$ans1 = $this->input->post('ans1',TRUE);
		$ans2 = $this->input->post('ans2',TRUE);
		$ans3 = $this->input->post('ans3',TRUE);
		$ans7 = $this->input->post('ans7',TRUE);
		$ans8 = $this->input->post('ans8',TRUE);
		$ans9 = $this->input->post('ans9',TRUE);
		$ans10 = $this->input->post('ans10',TRUE);
		$email = $this->input->post('user_name',TRUE);


		$password = $this->input->post('password',TRUE);
		$email = $this->input->post('user_name',TRUE);
		$name = $this->input->post('first_name',TRUE);
		$phone = $this->input->post('phone_number',TRUE);
		$ch = curl_init();  
		$url = "https://www.pathshala.co/decore/new/api.php?action=Login&userName=".$email."&pass=nullpass";
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$output=curl_exec($ch);
		curl_close($ch);
		$jsonOutput = json_decode($output,true);
		//var_dump($jsonOutput);
		if($jsonOutput['message'] == "Invalid user")
		{
			// New User ***** Call SignUP API
			$chh = curl_init();  
			$nameUrl = str_replace(" ", "%20", $name);
			$urll = "https://www.pathshala.co/decore/new/api.php?action=registerUser&email=".$email."&pass=".$password."&name=".$nameUrl."&phone=".$phone."&referral_code=";
			curl_setopt($chh,CURLOPT_URL,$urll);
			curl_setopt($chh,CURLOPT_RETURNTRANSFER,true);
			$outputt=curl_exec($chh);
			curl_close($chh);
			//echo $outputt;
			$jsonSignup = json_decode($outputt, true);

			//var_dump($jsonSignup); 
			if($jsonSignup['Result']['msg'] == "Item has been added")
			{
		
	
				$dbe = $this->load->database('default', TRUE);
				
				$sqq = "INSERT INTO `wl_dc_response` (`status`,`ans1`, `ans2`, `ans3`,`ans7`,`ans8`,`ans9`,`ans10`,`emailid`) values ('1','".$ans1."','".$ans2."','".$ans3."','".$ans7."','".$ans8."','".$ans9."','".$ans10."','".$email."')";
					//echo $sqq;
				$que = $dbe->query($sqq); 
				$this->load->view('dreamcareer/dreamcareer_report', $data);
				
			}
			else
			{
				echo "errrr";

			}


		}
		else if($jsonOutput['message'] == "Invalid password")
		{
			// Old User
			$dbe = $this->load->database('default', TRUE);
			$sqq = "INSERT INTO `wl_dc_response` (`status`,`ans1`, `ans2`, `ans3`,`ans7`,`ans8`,`ans9`,`ans10`,`emailid`) values ('1','".$ans1."','".$ans2."','".$ans3."','".$ans7."','".$ans8."','".$ans9."','".$ans10."','".$email."')";
			$que = $dbe->query($sqq); 
			
			echo "<script>alert('Registered Successfully!'); window.location = '".base_url()."'</script>";

		}
	 }
}
?>