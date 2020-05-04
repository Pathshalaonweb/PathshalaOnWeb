<?php
class Orders extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct(); 

		$this->load->model(array('order/order_model'));  
	  	$this->load->helper(array('cart/cart','file'));		
		$this->config->set_item('menu_highlight','orders management');	
		$this->load->library(array('Dmailer'));
	}



	public  function index($page = NULL)
	{

		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']		=  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$res_array              =  $this->order_model->get_orders($offset,$config['limit']);	
		$config['total_rows']   =  $this->order_model->total_rec_found;		
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);	

		/* Order oprations  */
		if(  $this->input->post('unset_as')!='' )
		{			
			$this->set_as('wl_order','order_id',array('payment_status'=>'Unpaid'));			
		}

		if(  $this->input->post('ord_status')!='' )
		{	
		    $posted_order_status = $this->input->post('ord_status');		
			$this->set_as('wl_order','order_id',array('order_status'=>$posted_order_status));			
		}

		if(  $this->input->post('Delete')!='' )
		{	
		    $posted_order_status = $this->input->post('ord_status');		
			$this->set_as('wl_order','order_id',array('order_status'=>'Deleted'));			
		}	

		/* End order oprations  */
		$data['heading_title']  = 'Order Lists';
		$data['res']            = $res_array; 			
		$this->load->view('order/view_order_list',$data);		
	}

	
	public function make_paid($order_id)
	{

		$order_id = (int) $order_id;		

		$where = "order_id = '".$order_id."'"; 		

		$this->order_model->safe_update('wl_order',array('payment_status'=>'Paid'),$where,FALSE);	

		$this->update_stocks($order_id);

		

	    $ordmaster = $this->order_model->get_order_master( $order_id );		

		$orddetail = $this->order_model->get_order_detail($order_id);	 

			

		/* Start  send mail */

			

		ob_start();	

		$mail_subject =$this->config->item('site_name')." Order overview";

		$from_email   = $this->admin_info->admin_email;

		$from_name    = $this->config->item('site_name');

		$mail_to      = $ordmaster['email'];									

		$body         = invoice_content($ordmaster,$orddetail);					

		$msg          = ob_get_contents();

		

		$mail_conf =  array(

		'subject'=>$this->config->item('site_name')." Order overview",

		'to_email'=>$mail_to,

		'from_email'=>$from_email,

		'from_name'=> $this->config->item('site_name'),

		'body_part'=>$msg);						

		$this->dmailer->mail_notify($mail_conf);		

		

		

		/* End  send mail */

		

		$this->session->set_userdata(array('msg_type'=>'success'));

		 $this->session->set_flashdata('success', $this->config->item('payment_success'));		

		 redirect('adminzone/orders', '');

		

	}

	

	public function update_stocks($order_id)

	{

		$order_id = (int) $order_id;

				

		$condtion = array('field'=>"products_id,quantity",'condition'=>"orders_id ='$order_id'",'index'=>'products_id') ;

		$orders_res =  $this->order_model->findAll('wl_orders_products',$condtion);

		

		if( is_array($orders_res) && !empty($orders_res))

		{

			foreach($orders_res as $v)

			{				 

				 

				$sql = "UPDATE wl_products SET used_quantity = used_quantity+$v[quantity] 

				WHERE products_id = '".$v['products_id']."'  ";

				$this->db->query($sql);

				

			}

						

		}			 

			

	 }

		

	

    



	public function print_invoice()

	{

		//$this->load->helper(array('cart/cart'));	

		$this->load->model(array('order/order_model'));

		$ordId              = (int) $this->uri->segment(4);

		$order_res          = $this->order_model->get_order_master( $ordId );

		//$order_details_res  = $this->order_model->get_order_detail($order_res['order_id']);			

		$data['orddetail']  = $order_details_res;

		$data['res']  = $order_res;			

		$this->load->view('order/view_invoice_print',$data);		

		

	}	





	

}

// End of controller