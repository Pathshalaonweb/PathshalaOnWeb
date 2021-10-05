<?php
class Ourpartner extends Public_Controller
{
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('ourpartner/ourpartner_model','payment/payment_model','order/order_model'));
	    $this->load->library('Ajax_pagination');
		$this->load->helper(array('payment/paytm'));
		$this->perPage = 30;
	}
	
	public function index()
	{	

 		// $data = array();
		// //total rows count
		// $db1 = $this->load->database('default', TRUE);
		// $sqll = "SELECT * FROM `wl_teacher`  where liveplan='1' ORDER BY plan_expire DESC";  //updated 04072020
		// $queryy=$db1->query($sqll);
		// $totalRec = $queryy->num_rows();
        // //$totalRec = count($this->liveclasses_model->get_course_row());
        // //pagination configuration
        // $config['target']      = '#postList';
        // $config['base_url']    = base_url().'liveclasses/ajaxPaginationData';
        // $config['total_rows']  = $totalRec;
        // $config['per_page']    = $this->perPage;
        // $config['link_func']   = 'searchFilter';
        // $this->ajax_pagination->initialize($config);
        // //get the posts data
        // $data['res'] = $this->liveclasses_model->get_course_row(array('limit'=>$this->perPage));
        // $data['totalRec']=$totalRec;
        // //load the view
		// $data['heading_title'] = "Advanced Search";						
		 $this->load->view('ourpartner/view_ourpartner');
	}
	

	  public function foreignlanguage()
	  {
	 	$this->load->view('ourpartner/view_ourpartner_foreign');
	  }
	 
	 
	
	

}
?>
