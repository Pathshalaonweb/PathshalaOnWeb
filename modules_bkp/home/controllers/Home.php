<?php
class Home extends Public_Controller
{

	public function __construct(){
		
		parent::__construct();	
		$this->load->model(array('home/home_model'));
		$this->load->helper(array('category/category','products/product'));	 
	
	}
	
	public function index(){
		
		$data['page_title']            = "";
		$data['page_keyword']          = "";
		$data['page_description']      = "";
		
		$offset                 =  $this->uri->segment(2,0);
		$cat_limit = 6;
		$product_limit = 4;		
	
	
		
		
		$this->load->view('home',$data);	
	}
	
	function set_language($lang){
		
        $this->session->set_userdata('language', $lang);
        $page_data['page_name'] = "home";
		
		//print_r($_REQUEST);
        redirect(base_url());
    }
	
	

 function set_currency(){
		$currency=$this->uri->segment('3');
        convert_currency($currency);
        redirect(base_url());
    }
}