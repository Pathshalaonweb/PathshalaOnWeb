<?php
class Searchtest extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();  		
		$this->load->model(array('searchtest/searchtest_model','teacher/teacher_model'));	
		$this->load->library('Ajax_pagination');
		$this->perPage = 10;
	}

	public function index()
	{	
		
		$searchtest=@$_GET['searchtest'];
		if ($searchtest=='home') {
				$conditions = array();
				$page = $this->input->post('page');
				if(!$page){
					$offset = 0;
				}else{
					$offset = $page;
				}
				
				$keyword=$this->input->get('keyword');
				
				$sql="SELECT * FROM `wl_customsearchtest` where status='1' AND keyword='".$keyword."'";
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
				
				//set conditions for searchtest
				@$location = $this->input->get('state');
				if(!empty($location)){
					 $conditions['searchtest']['state'] = $location;
				}
				//city
				@$city = $this->input->get('city');
				if(!empty($location)){
					 $conditions['searchtest']['city'] = $city;
				}
				@$category = $this->input->get('category');
				if(!empty($category)){
					 $conditions['searchtest']['category'] = $category;
				}
				//subject
				@$subject = $this->input->get('subject');
				if(!empty($subject)){
					$conditions['searchtest']['subject'] = $subject;
				}
				//class
				@$classes = $this->input->get('classes');
				if(!empty($classes)){
					 $conditions['searchtest']['classes'] = $classes;
				}
				//total rows count
				$totalRec = count($this->searchtest_model->get_teacher_row($conditions));
				//echo_sql();die;
				//pagination configuration
				$config['target']      = '#postList';
				$config['base_url']    = base_url().'searchtest/ajaxPaginationData';
				$config['total_rows']  = $totalRec;
				$config['per_page']    = $this->perPage;
				$config['link_func']   = 'searchtestFilter';
				$this->ajax_pagination->initialize($config);
				//set start and limit
				$conditions['start'] = $offset;
				$conditions['limit'] = $this->perPage;
				//get posts data
				$data['res'] = $this->searchtest_model->get_teacher_row($conditions);
				
				$this->load->view('searchtest/searchtest_result_view', $data);
		
		
		} else {
			
		$data = array();
        //total rows count
        $totalRec = count($this->searchtest_model->get_teacher_row());
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'searchtest/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchtestFilter';
        $this->ajax_pagination->initialize($config);
        //get the posts data
        $data['res'] = $this->searchtest_model->get_teacher_row(array('limit'=>$this->perPage));
        $data['totalRec']=$totalRec;
        //load the view
		$data['heading_title'] = "Advanced searchtest";	
        $this->load->view('searchtest/searchtest_result_view', $data);
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
        
        //set conditions for searchtest
        @$location = $this->input->post('state');
        if(!empty($location)){
             $conditions['searchtest']['state'] = $location;
        }
		//city
		@$city = $this->input->post('city');
        if(!empty($location)){
             $conditions['searchtest']['city'] = $city;
        }
		//city
		@$category = $this->input->post('category');
        if(!empty($category)){
             $conditions['searchtest']['category'] = $category;
        }
		//subject
		@$subject = $this->input->post('subject');
        if(!empty($subject)){
			$conditions['searchtest']['subject'] = $subject;
        }
		//class
		@$classes = $this->input->post('classes');
        if(!empty($classes)){
			 $conditions['searchtest']['classes'] = $classes;
        }
		@$pincode = $this->input->post('pincode');
        if(!empty($classes)){
			 $conditions['searchtest']['pincode'] = $pincode;
        }
		@$sprice = $this->input->post('sprice');
		@$eprice = $this->input->post('eprice');
		if(!empty($sprice)){
            $conditions['searchtest']['sprice'] = $sprice;
        }
		if(!empty($eprice)){
            $conditions['searchtest']['eprice'] = $eprice;
        }
        if(!empty($sortBy)){
            $conditions['searchtest']['sortBy'] = $sortBy;
        }
		@$bath_time = $this->input->post('bath_time');
		if($bath_time!="Any Time"){
		if(!empty($bath_time)){
            $conditions['searchtest']['bath_time'] = $bath_time;
        }
		}
		//total rows count
        $totalRec = count($this->searchtest_model->get_teacher_row($conditions));
        //echo_sql();die;
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'searchtest/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchtestFilter';
        $this->ajax_pagination->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get posts data
        $data['res'] = $this->searchtest_model->get_teacher_row($conditions);
       // echo_sql();
        //load the view
        $this->load->view('searchtest/ajax-pagination-data', $data, false);
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
		
		
		public function getSubcat(){
			$id=$_POST['category_id'];
			$sql="SELECT * FROM `wl_categories`  where parent_id='$id'  ORDER BY sort_order";
			$query=$this->db->query($sql);
			if($query->num_rows()>0){
			foreach($query->result_array() as $val):
				echo "<option value='".$val['category_id']."'>".$val['category_name']."</option>";
			endforeach;
			}else{
				echo "<option value=''>NO recode </option>";	
			}
		}
		public function getSubcatNext(){
			$id=$_POST['category_id_next'];
			$sql="SELECT * FROM `wl_categories`  where parent_id='$id'  ORDER BY sort_order";
			$query=$this->db->query($sql);
			if($query->num_rows()>0){
			foreach($query->result_array() as $val):
				echo "<option value='".$val['category_id']."'>".$val['category_name']."</option>";
			endforeach;
			}else{
				echo "<option value=''>NO recode </option>";	
			}
		}
	
}
?>