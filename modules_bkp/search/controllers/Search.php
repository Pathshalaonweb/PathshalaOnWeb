<?php
class Search extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();  		
		$this->load->model(array('search/search_model','teacher/teacher_model'));	
		$this->load->library('Ajax_pagination');
		$this->perPage = 10;
	}

	public function index()
	{	
		$data = array();
        //total rows count
        $totalRec = count($this->search_model->get_teacher_row());
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'search/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        //get the posts data
        $data['res'] = $this->search_model->get_teacher_row(array('limit'=>$this->perPage));
        $data['totalRec']=$totalRec;
        //load the view
		$data['heading_title'] = "Advanced Search";	
        $this->load->view('search/search_result_view', $data);
		
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
        //set conditions for search
        @$location = $this->input->post('state');
        if(!empty($location)){
             $conditions['search']['state'] = $location;
        }
		//city
		@$city = $this->input->post('city');
        if(!empty($location)){
             $conditions['search']['city'] = $city;
        }
		//subject
		@$subject = $this->input->post('subject');
        if(!empty($subject)){
			$conditions['search']['subject'] = $subject;
        }
		//class
		@$classes = $this->input->post('classes');
        if(!empty($classes)){
			 $conditions['search']['classes'] = $classes;
        }
		@$sprice = $this->input->post('sprice');
		@$eprice = $this->input->post('eprice');
		if(!empty($sprice)){
            $conditions['search']['sprice'] = $sprice;
        }
		if(!empty($eprice)){
            $conditions['search']['eprice'] = $eprice;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }
		//total rows count
        $totalRec = count($this->search_model->get_teacher_row($conditions));
        //echo_sql();die;
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'search/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        //get posts data
        $data['res'] = $this->search_model->get_teacher_row($conditions);
        //load the view
        $this->load->view('search/ajax-pagination-data', $data, false);
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