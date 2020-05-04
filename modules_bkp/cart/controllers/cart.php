<?php
class Cart extends Public_Controller
{

	public function __construct()
	{
		
		parent::__construct();
		$this->load->helper(array('cart','products/product'));	 
		$this->load->model(array('products/product_model','members/members_model','cart_model'));		 
		$this->form_validation->set_error_delimiters("<div class='required'>","</div>");
		
	}

	public function index()
	{			
		
		
		if( $this->input->post('EmptyCart')!="")
		{
			$this->empty_cart();
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success',$this->config->item('cart_empty')); 
			redirect('cart');
		}
		
		if($this->input->post('Update_Qty')!="" || $this->input->post('update_sqty')!="" )
		{			
			$this->session->set_userdata(array('msg_type'=>'success'));
		    $this->session->set_flashdata('success',$this->config->item('cart_quantity_update'));
			$this->update_cart_qty();			
			redirect('cart');
		}
		
		
		
		
		$posted_coupon_code    =  $this->input->post('coupon_code');	
		$set_coupon_code       = $this->session->userdata('coupon_id');	
		$coupon_code           = ($set_coupon_code!='' ) ? $set_coupon_code : $posted_coupon_code;			
	    $discount_res          =  $this->cart_model->get_discount( $coupon_code);				  		  
		$this->apply_coupon_code( $discount_res );	
		
			  
				
			
		$shipping_methods           =  $this->product_model->get_shipping_methods();				
		$posted_shipping_method     =  $this->input->post('shipping_method');
		
		if( $posted_shipping_method!='' )
		{
			$this->session->set_userdata('shipping_id',$posted_shipping_method);
		}
		
		$set_shipping_id = $this->session->userdata('shipping_id');
		$shipping_id     = ($set_shipping_id!='' ) ? $set_shipping_id : $posted_shipping_method;		
		$shipping_res    =  $this->cart_model->get_shipping_rate( $shipping_id );
		$shipping_res    = is_array($shipping_res) ? $shipping_res  : array();
		
		$data['shipping_methods']   = $shipping_methods;	
		$data['shipping_res']       = $shipping_res;
		$data['discount_res']       = $discount_res;	
		
		
		if($this->input->post('UserCheckout')!="")
		{
			
			$this->form_validation->set_rules('shipping_method', 'Shipping Method','trim|required|xss_clean');
			$this->form_validation->set_message('required',$this->config->item('shipping_required'));
			
			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('view_my_cart',$data);
			}
			else
			{
				if( $this->session->userdata('user_id') > 0 )
				{
					redirect('cart/checkout'); 
					
				}else
				{
					redirect('users/login?ref=cart/checkout'); 
				}
			}
		}
		
		if($this->input->post('GustCheckout')!="")
		{
			
			$this->form_validation->set_rules('shipping_method', 'Shipping Method','required|xss_clean');
			
			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('view_my_cart',$data);
			}
			else
			{	 
				redirect('cart/checkout');
			}
		}						
		$data['title']              = "Cart";	
		$this->load->view('view_my_cart',$data);
		
		
	}
	
	
	public function apply_coupon_code($discount_res)
	{
	   if( is_array($discount_res) && !empty($discount_res))
	   {
		    $cart_total      = $this->cart->total();
		    $discount_type   =  $discount_res['coupon_type'];
		  
		  if( $discount_res['minimum_order_amount']!='' && $discount_res['minimum_order_amount']!='0.0000'  )
		  {
			 
			if( $discount_type=='p' )
			 {
				 				 
				 	$discount_amount  = ($cart_total*$discount_res['coupon_discount']/100);
					
					 if( ($cart_total >= $discount_amount) &&  ($cart_total >= $discount_res['minimum_order_amount']) )
					 {	
					     $this->session->set_userdata(array('coupon_id'=>$discount_res['coupon_id'],
						                                    'discount_amount'=>$discount_amount) );
					 
					 }
					
			 }else
			 {
				  $discount_amount  = $discount_res['coupon_discount'];	
				  				
				  if( ($cart_total >= $discount_amount)  &&  ($cart_total >= $discount_res['minimum_order_amount']) )
				  {	
					 $this->session->set_userdata(array('coupon_id'=>$discount_res['coupon_id'],
					                                    'discount_amount'=>$discount_amount) );
				 
				  }
				  				 
			 }
			 
			 
		 }else
		 {		
			 			 
			 if( $discount_type=='p' )
			 {
				 				 
				 	 $discount_amount  = ($cart_total*$discount_res['coupon_discount']/100);
										
					 if( $cart_total >= $discount_amount )
					 {	
					     $this->session->set_userdata(array('coupon_id'=>$discount_res['coupon_id'],
						                                    'discount_amount'=>$discount_amount) );
					 
					 }
					
			 }else
			 {
				  $discount_amount  = $discount_res['coupon_discount'];		
				  			
				  if( $cart_total >= $discount_amount )
				  {	
					 $this->session->set_userdata(array('coupon_id'=>$discount_res['coupon_id'],
					                                    'discount_amount'=>$discount_amount) );
				 
				  }
				  				 
			 }
			 			 
			 
		  }
		 
		}
		
	}
	
	public function checkout()
	{
				
		    if( ( !$this->cart->total_items() > 0 ) )
			{
			
			  redirect('cart');	
			
			}	
			
			//trace($this->session->userdata);
		    $is_same_bill_ship =   $this->input->post('is_same',TRUE);	
		    $mres = $this->members_model->get_member_row( $this->session->userdata('user_id') );	
			
			$this->form_validation->set_rules('first_name', 'Name', 'trim|required|alpha|xss_clean');	
			$this->form_validation->set_rules('email', 'Email ID','trim|required|valid_email');
			//$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			
			$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|xss_clean');
			//$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha|xss_clean');	
			
			
			$this->form_validation->set_rules('billing_name', 'Billing Name','required|xss_clean|alpha');
			$this->form_validation->set_rules('billing_phone', 'Billing Phone','required|xss_clean');
			$this->form_validation->set_rules('billing_address', 'Billing Address','required|xss_clean');
			$this->form_validation->set_rules('billing_country', 'Billing Country','required|xss_clean');
			$this->form_validation->set_rules('billing_state', 'Billing State','required|xss_clean');
			$this->form_validation->set_rules('billing_city', 'Billing City','required|xss_clean');
			$this->form_validation->set_rules('billing_zipcode', 'Billing Post Code','required|xss_clean');
			
			if( $is_same_bill_ship!='Y')
			{				
				$this->form_validation->set_rules('shipping_name', 'Shipping Name','required|xss_clean|alpha');
				$this->form_validation->set_rules('shipping_address', 'Shipping Address','required|xss_clean');
				$this->form_validation->set_rules('shipping_phone', 'Shipping Phone','required|xss_clean');
				$this->form_validation->set_rules('shipping_country', 'Shipping Country','required|xss_clean');
				$this->form_validation->set_rules('shipping_state', 'Shipping State','required|xss_clean');
				$this->form_validation->set_rules('shipping_city', 'Shipping City','required|xss_clean');
				$this->form_validation->set_rules('shipping_zipcode', 'Shipping Post Code','required|xss_clean');		
			
			}
			$this->form_validation->set_rules('verification_code','Verification code','trim|required|valid_captcha_code');
			
			$posted_data = array(	
			'email'               =>$this->input->post('email'),
			//'title'               =>$this->input->post('title'),
			'first_name'          =>$this->input->post('first_name'),
			'phone_number'          =>$this->input->post('phone_number'),
			//'last_name'           =>$this->input->post('last_name'),									
			'billing_name'        => $this->input->post('billing_name'),
			'billing_address'     => $this->input->post('billing_address'),					
			'billing_phone'       => $this->input->post('billing_phone'),			
			'billing_zipcode'     => $this->input->post('billing_zipcode'),
			'billing_country'     => $this->input->post('billing_country'),
			'billing_state'       => $this->input->post('billing_state'),
			'billing_city'        => $this->input->post('billing_city'),		
			'shipping_name'       => $this->input->post('shipping_name'),
			'shipping_address'    => $this->input->post('shipping_address'),					
			'shipping_phone'      => $this->input->post('shipping_phone'),			
			'shipping_zipcode'    => $this->input->post('shipping_zipcode'),
			'shipping_country'    => $this->input->post('shipping_country'),
			'shipping_state'      => $this->input->post('shipping_state'),
			'shipping_city'       => $this->input->post('shipping_city')
			);
		
	
		if( is_array($mres) && !empty($mres) )
		{			
			if ($this->form_validation->run() === FALSE)
			{
				
				$mres_address = $this->members_model->get_member_address_book($mres['customers_id']);
				$mres_bill =	 $mres_address[0];
				$mres_ship =	 $mres_address[1];
				
				$mres =array(	
				'email'               => $mres['user_name'],
				//'title'               => $mres['title'],
				'first_name'          => $mres['first_name'],
				'phone_number'          => $mres['phone_number'],
				//'last_name'           => $mres['last_name'],									
				'billing_name'        => $mres_bill['name'],
				'billing_address'     => $mres_bill['address'],					
				'billing_phone'       => $mres_bill['phone'],			
				'billing_zipcode'     => $mres_bill['zipcode'],
				'billing_country'     => $mres_bill['country'],
				'billing_state'       => $mres_bill['state'],
				'billing_city'        => $mres_bill['city'],		
				'shipping_name'       => $mres_ship['name'],
				'shipping_address'    => $mres_ship['address'],					
				'shipping_phone'      => $mres_ship['phone'],			
				'shipping_zipcode'    => $mres_ship['zipcode'],
				'shipping_country'    => $mres_ship['country'],
				'shipping_state'      => $mres_ship['state'],
				'shipping_city'       => $mres_ship['city']
				);	
				
				$data['mres'] = $mres;				
				$this->load->view('view_cart_checkout',$data);	
				
			}else
			{				
				$this->add_customer_order($posted_data,$is_same_bill_ship);
			} 
			
			
		}else
		{
				if ($this->form_validation->run() == FALSE)
				{											
					$data['mres'] =  $posted_data; 
					$this->load->view('view_cart_checkout',$data);				
					
				}else
				{
					
					$this->add_customer_order($posted_data,$is_same_bill_ship);
					 
				}	
				
					 
		}
		
		
	
  }

	private function add_customer_order($costumer_data = array(),$is_same_bill_ship)
	{
		if( $this->cart->total_items() > 0 )
		{
			
			$userId            = $this->session->userdata('user_id');				
			$invoice_number    = "Wl_".get_auto_increment('wl_order');	
			$coupon_id         = $this->session->userdata('coupon_id');
			$discount_amount   = $this->session->userdata('discount_amount');
			$currency_code     = $this->session->userdata('currency_code');
			$currency_value    = $this->session->userdata('currency_value');
			$customers_id   =  ( $userId!='') ? $userId : 0;
														
			$shipping_res    =  $this->cart_model->get_shipping_rate( $this->session->userdata('shipping_id') );
			
			$tax_res    =  get_db_single_row($fld='wl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
			
			$cart_total      = $this->cart->total();
			
				 /*if($is_same_bill_ship=='Y')
				 {
					 $costumer_data['shipping_name']    = $costumer_data['billing_name'];
					 $costumer_data['shipping_address'] = $costumer_data['billing_address'];
					 $costumer_data['shipping_phone']   = $costumer_data['billing_phone'];
					 $costumer_data['shipping_zipcode'] = $costumer_data['billing_zipcode'];
					 $costumer_data['shipping_country'] = $costumer_data['billing_country'];
					 $costumer_data['shipping_state']   = $costumer_data['billing_state'] ;
					 $costumer_data['shipping_city']    = $costumer_data['billing_city'];
					 
				 }*/
		
				  $data_order = 
				   array(
				    'customers_id'        =>$customers_id,
					'invoice_number'      => $invoice_number,					
					'first_name'          => $costumer_data['first_name'],
					'last_name'           => $costumer_data['last_name'],
					'email'               => $costumer_data['email'],					
					'billing_name'        => $costumer_data['billing_name'],
					'billing_address'     => $costumer_data['billing_address'],					
					'billing_phone'       => $costumer_data['billing_phone'],					
					'billing_zipcode'     => $costumer_data['billing_zipcode'],
					'billing_country'     => $costumer_data['billing_country'],
					'billing_state'       => $costumer_data['billing_state'],
					'billing_city'        => $costumer_data['billing_city'],					
					'shipping_name'       => $costumer_data['shipping_name'],
					'shipping_address'    => $costumer_data['shipping_address'],					
					'shipping_phone'      => $costumer_data['shipping_phone'],					
					'shipping_zipcode'    => $costumer_data['shipping_zipcode'],
					'shipping_country'    => $costumer_data['shipping_country'],
					'shipping_state'      => $costumer_data['shipping_state'],
					'shipping_city'       => $costumer_data['shipping_city'],						
					'shipping_method'     =>$shipping_res['shipping_type'],
					'discount_coupon_id'  =>$coupon_id,
					'coupon_discount_amount'=>$discount_amount,
					'shipping_amount'     =>$shipping_res['shipment_rate'],
					'tax_amount'     	  =>$tax_res['tax_rate'],
					'tax_type'     		  =>$tax_res['tax_type'],
					'total_amount'        =>$cart_total,
					'currency_code'       =>$currency_code ,
					'currency_value'      =>$currency_value,				
					'order_status'       => 'Pending',
					'order_received_date' =>$this->config->item('config.date.time'),
					'payment_method'    =>'',
					'payment_status'   => 'Unpaid'
				);
				
			
			
			if(!$this->cart_model->is_order_no_exits($invoice_number) ){
				$orderId = $this->cart_model->safe_insert('wl_order',$data_order,FALSE);		
				$this->session->set_userdata( array('working_order_id'=>$orderId) );				
				
				foreach($this->cart->contents() as $items){
					//print_r($items['img']);exit;
					
					$thumbc['width'] =80;
					$thumbc['height']=64;
					$thumb_name = "thumb_".$thumbc['width']."_".$thumbc['height']."_".$items['img'];					
					$image_file  = IMG_CACH_DIR."/".$thumb_name;
					$file_data   = (file_exists($image_file) ) ?  file_get_contents($image_file) : "";


						$data = array(
							'orders_id'      => $orderId,							
							'products_id'    => $items['pid'],
							'product_name'   => $items['origname'],
							'product_code'   => $items['code'],
							'product_image'  => $file_data,							
							'product_price'  => $items['price'],						
							'quantity'       => $items['qty']
						);
						
					/*
					
					 $data_qty_used  = array('used_qty' =>$items['qty']);
					 $where          = "product_id = ".$items['pid']." ";
					 $this->cart_model->safe_update('tbl_products',$data_qty_used,$where,FALSE);
				
					*/
						
				 $this->cart_model->safe_insert('wl_orders_products',$data,FALSE);
				
					
				}    
				
				$user_id = $this->session->userdata('user_id');
				
				if( $coupon_id!="" && $user_id!='' )
				{				
					$where = "coupon_id = '". $coupon_id."' AND customer_id ='".$user_id ."' ";
					$data = array('status'=>'1');
					$this->cart_model->safe_update('wl_coupon_customers',$data,$where,FALSE);
									
				}
				
				$this->cart->destroy();
				$data = array('shipping_id' => 0,'coupon_id'=>0,'discount_amount'=>0);
				$this->session->unset_userdata($data);
				redirect('cart/invoice','');
			}		
		}
	}


	public function invoice_mail_data($ordId)
	{
		if( $ordId !="")
		{
			$msgdata      = invoice_data($ordId);	
			$msgdata      = str_replace('bgcolor="#333333"','',$msgdata);
			$msgdata      = str_replace('Print','',$msgdata);
			$msgdata      = str_replace('Close','',$msgdata);
			return $msgdata;
		}
	}

	public function invoice()
	{
		if( $this->session->userdata('working_order_id') > 0 )
		{
			$this->load->model(array('order/order_model'));
			$data['title'] = "Checkout";
			$order_res = $this->order_model->get_order_master( $this->session->userdata('working_order_id') );
			$order_details_res = $this->order_model->get_order_detail($order_res['order_id']);			
			$data['orddetail']  = $order_details_res;
			$data['ordmaster']  = $order_res;				
			$data['ordId']      = $order_res['order_id'];			
			$data['unq_section'] = "Checkout";	
			$this->load->view('view_cart_invoice',$data);
			
		}else
		{
			redirect('cart', '');
		}
	}

	public function print_invoice()
	{
		$this->load->model(array('order/order_model'));
		$ordId  = $this->uri->segment(3,$this->session->userdata('working_order_id'));
		
		$order_res = $this->order_model->get_order_master( $this->session->userdata('working_order_id') );
		$order_details_res = $this->order_model->get_order_detail($order_res['order_id']);			
		$data['orddetail']  = $order_details_res;
		$data['ordmaster']  = $order_res;				
		
		$data['ordId'] = $ordId;		 
		$this->load->view('view_invoice_print',$data);
	}

	public function add_to_wishlist()
	{		
	   	   
		if( $this->session->userdata('user_id') > 0 )
		{
			$product_id = (int) $this->uri->segment(3);
			$this->cart_model->add_wislists($product_id,$this->session->userdata('user_id'));	
			
			
					
			redirect('members/wishlist');
			
		}else
		{
			
			redirect('users/login?ref='.$this->input->server('HTTP_REFERER').''); 
		}
	}

	public function add_to_cart()
	{		
		 $this->add_cart();			
    }

   public function check_product_exits_into_cart($pres)
   {	
      $cart_array =  $this->cart->contents(); 
	  	 
	  if( is_array( $cart_array ) && !empty($cart_array))
	  {
	   	foreach($this->cart->contents() as $item )
		{
				if(array_key_exists('pid' ,$item ))
				{								
						if( $item['pid']==$pres['products_id'] )
						{
															
							 $insert_flag=TRUE;					
						
						}else
						{					
						  $insert_flag=FALSE;	
						}
						
						
					}else
					{
						
						$insert_flag=FALSE;	
								
					}	
						
		       }
		  }
		  
		return $insert_flag;
   }
   

	private function add_cart(){
		
		$productId  = (int) $this->uri->segment(3);
		$option     = array('productid'=>$productId);		
		$pres       =  $this->product_model->get_products(1,0, $option);
		//trace($pres);exit;
		
		
		if( is_array($pres) && !empty($pres))
		{
			
			$qty         = applyFilter('NUMERIC_GT_ZERO',$this->input->post('qty'));		
			$qty         = ($qty > 0) ? $qty: 1;		
			$cart_price  = ( $pres['product_discounted_price']!= '0.0000') ? $pres['product_discounted_price'] : $pres['product_price'];
							
			$is_exits_inot_cart = $this->check_product_exits_into_cart($pres);
			
			if( $is_exits_inot_cart )
			{
				$this->session->set_userdata(array('msg_type'=>'warning'));
				$this->session->set_flashdata('warning',$this->config->item('cart_product_exist'));								
				redirect('cart');
				
			}else
			{											
				$availableqty = ( $pres['quantity'] - $pres['used_quantity'] );					
				$availableqty = ($availableqty < 0 )  ? 0 :  $availableqty;	
				
				$cart_data  = array(
				'id'             => $pres['products_id'],		   
				'qty'            => $qty,
				'availableqty'   =>$availableqty,
				'price'          => $cart_price,
				'product_price'  => $pres['product_price'],
				'discount_price' => $pres['product_discounted_price'],
				'name'           => url_title($pres['product_name']),
				'origname'       => $pres['product_name'],												
				'pid'            => $pres['products_id'],												
				'img'            => $pres['media'],												
				'code'           =>$pres['product_code']
				);
									
				$this->cart->insert($cart_data);
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',$this->config->item('cart_add'));
				redirect('cart');
				
			}	
			
			
		}else
		{
			redirect("category");
			
		}
		
	}


	public function empty_cart()
	{
		$this->cart->destroy();
		$data2 = array(
		  'shipping_id' => 0,
		  'coupon_id' => 0,
		  'discount_amount'=>0
		);
		
		$this->session->unset_userdata($data2);
		redirect('cart');
		
	}

	public function remove_item()
	{
		$data = array(
		 'rowid' =>$this->uri->segment(3),
		 'qty' => 0
		);
		
		$data2 = array(
		  'shipping_id' => 0,
		  'coupon_id' => 0,
		  'discount_amount'=>0
		);
		
		$this->session->unset_userdata($data2);
		
		$this->cart->update($data);	
			
		if($this->cart->total_items()==0)
		{
			$this->session->unset_userdata(array('coupon_id'=>0,'discount_amount'=>0));
			
		}else
		{		 	
		 	  $discount_res          =  $this->cart_model->get_discount( $this->session->userdata('coupon_id') );	
	          $this->apply_coupon_code( $discount_res );	
		}		
		
		$this->session->set_userdata(array('msg_type'=>'success'));
		$this->session->set_flashdata('success',$this->config->item('cart_delete_item'));
				
		redirect('cart','');  
		
	}
	
	
	public function update_cart_qty()
	{
		
		for($i=1; $i<=$this->cart->total_items(); $i++)
		{
			$item = $this->input->post($i);	
			if(!isset($item))continue;
			
			$data = array(
				'rowid' => $item['rowid'],
				'qty' => $item['qty']
			);
			$this->cart->update($data);
			
		}	
			
		if($this->cart->total_items()==0)
		{
			$this->session->unset_userdata(array('coupon_id'=>0,'discount_amount'=>0));
			
		}
		else
		{		 
		      $discount_res          =  $this->cart_model->get_discount( $this->session->userdata('coupon_id') );	
	          $this->apply_coupon_code( $discount_res );	
		}
		
	}	

	public function count_cart_item()
	{
		return $this->cart->total_items();
	}
	
	public function cart_total_amount()
	{
		$total = $this->cart->total();	
		return $total;
	}
	
	public function display_cart_image($orders_products_id)
	{ 	
		 $binary_data =  get_db_field_value('wl_orders_products','product_image',array('orders_products_id'=>$orders_products_id));
		 header("Content-Type: image/jpeg");			 
		 echo $binary_data; 
		 		
	}
	
	public function thanksorder()
	{
		
		$data['page_text']=cms_page_content(15);		
		$data['page_title'] = "Thanks";		 
		$this->load->view('view_order_thanks',$data);
	}
}
/* End of file member.php */
/* Location: .application/modules/products/controllers/cart.php */