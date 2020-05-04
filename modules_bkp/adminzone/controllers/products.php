<?php
class Products extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('products/product_model'));  
		$this->load->helper('category/category');
		$this->config->set_item('menu_highlight','product management');	
		
	}
	
	public  function index($page = NULL)
	{
		 $condtion               = array();
		 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 $category_id            =  (int) $this->uri->segment(4,0);
		 $status			        =   $this->input->get_post('status',TRUE);	
		
		$cat_name               = '';	
			
		if($category_id > 0 )
		{
			$condtion['category_id'] = $category_id;
			$cat_name       = 'in ';	
			$cat_name .= get_db_field_value('wl_categories','category_name'," AND category_id='$category_id'");
		}
		
		if($status!='')
		{
			$condtion['status'] = $status;
		}
		
		$res_array               =  $this->product_model->get_products($config['limit'],$offset,$condtion);	
		//echo_sql();
		$config['total_rows']    =  get_found_rows();	
		$data['heading_title']   =  'Product Lists';
		$data['res']             =  $res_array; 	
		$data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);	
		
		
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_products','products_id');			
		}
		
		/* Product set as a */
		if( $this->input->post('set_as')!='' )
		{	
		    $set_as    = $this->input->post('set_as',TRUE);			
			$this->set_as('wl_products','products_id',array($set_as=>'1'));			
		}
		
		if( $this->input->post('unset_as')!='' )
		{	
		    $unset_as   = $this->input->post('unset_as',TRUE);		
			$this->set_as('wl_products','products_id',array($unset_as=>'0'));			
		}
		/* End product set as a */
		
		$data['category_result_found'] = "Total ".$config['total_rows']." result(s) found ".strtolower($cat_name)." ";				
		$this->load->view('catalog/view_product_list',$data);	
		
			
	}
	
	
	public function add()
	{			
		$data['heading_title'] = 'Add Product';		
		$categoryposted=$this->input->post('catid');		
		$data['categoryposted']=$categoryposted;		
		$categoryposted=$this->input->post('catid');		
		$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'description'));
		
		 $img_allow_size =  $this->config->item('allow.file.size');
		 $img_allow_dim  =  $this->config->item('allow.imgage.dimension');	
		
		
		$this->form_validation->set_rules('category_id','Category Name',"trim|required");
		$this->form_validation->set_rules('product_name','Product Name',"trim|required|max_length[200]");
		
		$this->form_validation->set_rules('product_code','Product Code',"trim|required|max_length[65]|unique[wl_products.product_code='".$this->input->post('product_code')."' AND status!='2']");
		
		$this->form_validation->set_rules('products_description','Description',"max_length[8500]");			
		
		$this->form_validation->set_rules('product_price','Price',"trim|required|is_valid_amount");			
		$this->form_validation->set_rules('product_discounted_price','Discount Price',"trim|is_valid_amount|callback_check_price");
		
		$this->form_validation->set_rules('brand', 'Product Brand', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('product_size[]', 'Product Size', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('product_color[]', 'Product Color', 'trim|required|xss_clean');
		
		//$this->form_validation->set_rules('quantity','Quantity',"trim|required|is_natural_no_zero");
		
		$this->form_validation->set_rules('product_images1','Image1',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
		$this->form_validation->set_rules('product_images2','Image2',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
		$this->form_validation->set_rules('product_images3','Image3',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
		$this->form_validation->set_rules('product_images4','Image4',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");			 
			
		if($this->form_validation->run()===TRUE)
		{	
		
		    $category_links = get_parent_categories($this->input->post('category_id'),"AND status='1'","category_id,parent_id");		
			$category_links = array_keys($category_links);
			$category_links = implode(",",$category_links);
			
			$discounted_price = $this->input->post('product_discounted_price',TRUE);			
			$discounted_price = ($discounted_price=='') ? "0.0000" : $discounted_price;
			
			
			$product_size='';
			$product_color='';
			
			
			if($this->input->post('product_size'))
			{
				$product_size=implode(',',$this->input->post('product_size'));
			}
			else
			{
				$product_size='';
			}
			if($this->input->post('product_color'))
			{
				$product_color=implode(',',$this->input->post('product_color'));
			}
			else
			{
				$product_color='';
			}
			
			
			$posted_data = array(
			'category_id'				=>	$this->input->post('category_id'),
			'category_links'			=>	$category_links,
			'product_name'				=>	$this->input->post('product_name',TRUE),
			'product_friendly_url'		=>	url_title($this->input->post('product_name')),
			'product_code'				=>	$this->input->post('product_code',TRUE),
			'products_description'		=>	$this->input->post('products_description'),
			'product_price'				=>	$this->input->post('product_price',TRUE),
			'product_discounted_price'	=>	$discounted_price,
			'brand'						=>	$this->input->post('brand',TRUE),
			'product_size'				=>	$product_size,
			'product_color'				=>	$product_color,
			'quantity'					=>	'100',				
			'product_added_date'		=>	$this->config->item('config.date.time')						
			);
			
			$productId = $this->product_model->safe_insert('wl_products',$posted_data,FALSE);
			$this->add_product_media($productId);
			
			//-----------Insert Low Stock---------
				$productSizes=$this->input->post('product_size');
				$productColors=$this->input->post('product_color');
				
				if(!empty($productSizes)  && !empty($productColors) )
				{
					$product_size_string=implode(',',$this->input->post('product_size'));
					$product_color_string=implode(',',$this->input->post('product_color'));
					
					for($k=0;$k<count($productSizes);$k++)
					{
						for($b=0;$b<count($productColors);$b++)
						{
							$stock_cnt="SELECT * FROM wl_product_stock WHERE product_id='".$productId."' AND product_size='".$productSizes[$k]."' AND product_color='".$productColors[$b]."'";
							$query_num=$this->db->query($stock_cnt);
							
							if($query_num->num_rows()== 0 )
							{
								$data_insert = array(
											'product_id'		=>	$productId,
											'product_type'		=>	0,
											'product_color'		=>	$productColors[$b],
											'product_size'		=>	$productSizes[$k],
											'product_quantity'	=>	0, 
										);
								$this->product_model->safe_insert('wl_product_stock',$data_insert,FALSE);
							}
						}
					}
					
					$del_query=$this->db->query("DELETE FROM wl_product_stock WHERE 
												 product_id='".$productId."' AND  
												 (product_size NOT IN(".$product_size_string.") || 
												 product_color NOT IN (".$product_color_string.") )");
				}
				elseif(!empty($productSizes))
				{
					$product_size_string=implode(',',$this->input->post('product_size'));
					
					for($k=0;$k<count($productSizes);$k++)
					{
						$stock_cnt="SELECT * FROM wl_product_stock WHERE product_id='".$productId."' AND product_size='".$productSizes[$k]."' AND product_color='0'";
						$query_num=$this->db->query($stock_cnt);
							
						if($query_num->num_rows()== 0 )
						{
							$data_insert = array(
										'product_id'		=>	$productId,
										'product_type'		=>	0,
										'product_color'		=>	0,
										'product_size'		=>	$productSizes[$k],
										'product_quantity'	=>	0, 
									);
							$this->product_model->safe_insert('wl_product_stock',$data_insert,FALSE);
						}
					}
					
					$del_query=$this->db->query("DELETE FROM wl_product_stock WHERE 
												 product_id='".$productId."' AND  
												 (product_size NOT IN(".$product_size_string.") OR 
												 product_color!=0)");
				}
				elseif(!empty($productColors))
				{
					$product_color_string=implode(',',$this->input->post('product_color'));
					
					for($b=0;$b<count($productColors);$b++)
					{
						$stock_cnt="SELECT * FROM wl_product_stock WHERE product_id='".$productId."' AND product_size='0' AND product_color='".$productColors[$b]."'";
						$query_num=$this->db->query($stock_cnt);
							
						if($query_num->num_rows()== 0 )
						{
							$data_insert = array(
										'product_id'		=>	$productId,
										'product_type'		=>	0,
										'product_color'		=>	$productColors[$b],
										'product_size'		=>	0,
										'product_quantity'	=>	0, 
									);
							$this->product_model->safe_insert('wl_product_stock',$data_insert,FALSE);
						}
					}
					$del_query=$this->db->query("DELETE FROM wl_product_stock WHERE 
												 product_id='".$productId."' AND  
												 (product_color NOT IN(".$product_color_string.") OR 
												 product_size!=0)");
				}
				else
				{
					$stock_cnt="SELECT * FROM wl_product_stock WHERE product_id='".$productId."' 
								AND product_size='0' AND product_color='0'";
					$query_num=$this->db->query($stock_cnt);
					
					if($query_num->num_rows()== 0 )
					{
						$del_query=$this->db->query("DELETE FROM wl_product_stock WHERE 
												 product_id='".$productId."'");
						
						$data_insert = array(
									'product_id'		=>	$productId,
									'product_type'		=>	0,
									'product_color'		=>	0,
									'product_size'		=>	0,
									'product_quantity'	=>	0, 
								);
						$this->product_model->safe_insert('wl_product_stock',$data_insert,FALSE);
						
					}
				}
				//-----------End Low Stock
				
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));		
			redirect('adminzone/products', '');		
									
		}
		
		$this->load->view('catalog/view_product_add',$data);		  
		
	}
	
	
	public function edit($productId)
	{			
		
		$data['heading_title'] = 'Edit Product';
		$productId = (int) $this->uri->segment(4);		
		$option = array('productid'=>$productId);
		$res =  $this->product_model->get_products(1,0, $option);		
		$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'description'));	
		
		 $img_allow_size =  $this->config->item('allow.file.size');
		 $img_allow_dim  =  $this->config->item('allow.imgage.dimension');
				
		$this->form_validation->set_rules('category_id','Category Name',"trim|required");
		$this->form_validation->set_rules('product_name','Product Name',"trim|required|max_length[200]");
		
		$this->form_validation->set_rules('product_code','Product Code',"trim|required|max_length[65]|unique[wl_products.product_code='".$this->input->post('product_code')."' AND products_id!='".$res['products_id']."' AND status!='2']");
		
		$this->form_validation->set_rules('products_description','Description',"max_length[8500]");			
		$this->form_validation->set_rules('product_price','Price',"trim|required|is_valid_amount|");			
		$this->form_validation->set_rules('product_discounted_price','Discount Price',"trim|is_valid_amount|callback_check_price");
		
		$this->form_validation->set_rules('brand', 'Product Brand', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('product_size[]', 'Product Size', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('product_color[]', 'Product Color', 'trim|required|xss_clean');
		
		//$this->form_validation->set_rules('quantity','Quantity',"trim|required|is_natural_no_zero");
		
		$this->form_validation->set_rules('product_images1','Image1',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
		$this->form_validation->set_rules('product_images2','Image2',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
		$this->form_validation->set_rules('product_images3','Image3',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
		$this->form_validation->set_rules('product_images4','Image4',"file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");	
		
		
		if( is_array( $res ) && !empty( $res ))
		{
			if($this->form_validation->run()==TRUE)
			{
				 $category_links = get_parent_categories($this->input->post('category_id'),"AND status='1'","category_id,parent_id");		
			     $category_links = array_keys($category_links);
			     $category_links = implode(",",$category_links);
				
				 $discounted_price = $this->input->post('product_discounted_price',TRUE);			
		    	 $discounted_price = ($discounted_price=='') ? "0.0000" : $discounted_price;
				
				 $product_size='';
				 $product_color='';
			
			
				if($this->input->post('product_size'))
				{
					$product_size=implode(',',$this->input->post('product_size'));
				}
				else
				{
					$product_size='';
				}
				if($this->input->post('product_color'))
				{
					$product_color=implode(',',$this->input->post('product_color'));
				}
				else
				{
					$product_color='';
				}
				
			
				$posted_data = array(
				'category_id'				=>	$this->input->post('category_id'),
				'category_links'			=>	$category_links,
				'product_name'				=>	$this->input->post('product_name',TRUE),
				'product_friendly_url'		=>	url_title($this->input->post('product_name')),
				'product_code'				=>	$this->input->post('product_code',TRUE),
				'products_description'		=>	$this->input->post('products_description'),
				'product_price'				=>	$this->input->post('product_price',TRUE),
				'product_discounted_price'	=>	$discounted_price,
				'brand'						=>	$this->input->post('brand',TRUE),
				'product_size'				=>	$product_size,
				'product_color'				=>	$product_color,
				'quantity'					=>	'100',					
				'product_added_date'		=>	$this->config->item('config.date.time')						
				);
								
				$where = "products_id = '".$res['products_id']."'"; 				
				$this->product_model->safe_update('wl_products',$posted_data,$where,FALSE);
				$this->edit_product_media($res['products_id']);
				
				
				//-----------Insert Low Stock---------
				$productSizes=$this->input->post('product_size');
				$productColors=$this->input->post('product_color');
				
				if(!empty($productSizes)  && !empty($productColors) )
				{
					$product_size_string=implode(',',$this->input->post('product_size'));
					$product_color_string=implode(',',$this->input->post('product_color'));
					
					for($k=0;$k<count($productSizes);$k++)
					{
						for($b=0;$b<count($productColors);$b++)
						{
							$stock_cnt="SELECT * FROM wl_product_stock WHERE product_id='".$res['products_id']."' AND product_size='".$productSizes[$k]."' AND product_color='".$productColors[$b]."'";
							$query_num=$this->db->query($stock_cnt);
							
							if($query_num->num_rows()== 0 )
							{
								$data_insert = array(
											'product_id'		=>	$res['products_id'],
											'product_type'		=>	0,
											'product_color'		=>	$productColors[$b],
											'product_size'		=>	$productSizes[$k],
											'product_quantity'	=>	0, 
										);
								$this->product_model->safe_insert('wl_product_stock',$data_insert,FALSE);
							}
						}
					}
					
					$del_query=$this->db->query("DELETE FROM wl_product_stock WHERE 
												 product_id='".$res['products_id']."' AND  
												 (product_size NOT IN(".$product_size_string.") || 
												 product_color NOT IN (".$product_color_string.") )");
				}
				elseif(!empty($productSizes))
				{
					$product_size_string=implode(',',$this->input->post('product_size'));
					
					for($k=0;$k<count($productSizes);$k++)
					{
						$stock_cnt="SELECT * FROM wl_product_stock WHERE product_id='".$res['products_id']."' AND product_size='".$productSizes[$k]."' AND product_color='0'";
						$query_num=$this->db->query($stock_cnt);
							
						if($query_num->num_rows()== 0 )
						{
							$data_insert = array(
										'product_id'		=>	$res['products_id'],
										'product_type'		=>	0,
										'product_color'		=>	0,
										'product_size'		=>	$productSizes[$k],
										'product_quantity'	=>	0, 
									);
							$this->product_model->safe_insert('wl_product_stock',$data_insert,FALSE);
						}
					}
					
					$del_query=$this->db->query("DELETE FROM wl_product_stock WHERE 
												 product_id='".$res['products_id']."' AND  
												 (product_size NOT IN(".$product_size_string.") OR 
												 product_color!=0)");
				}
				elseif(!empty($productColors))
				{
					$product_color_string=implode(',',$this->input->post('product_color'));
					
					for($b=0;$b<count($productColors);$b++)
					{
						$stock_cnt="SELECT * FROM wl_product_stock WHERE product_id='".$res['products_id']."' AND product_size='0' AND product_color='".$productColors[$b]."'";
						$query_num=$this->db->query($stock_cnt);
							
						if($query_num->num_rows()== 0 )
						{
							$data_insert = array(
										'product_id'		=>	$res['products_id'],
										'product_type'		=>	0,
										'product_color'		=>	$productColors[$b],
										'product_size'		=>	0,
										'product_quantity'	=>	0, 
									);
							$this->product_model->safe_insert('wl_product_stock',$data_insert,FALSE);
						}
					}
					$del_query=$this->db->query("DELETE FROM wl_product_stock WHERE 
												 product_id='".$res['products_id']."' AND  
												 (product_color NOT IN(".$product_color_string.") OR 
												 product_size!=0)");
				}
				else
				{
					$stock_cnt="SELECT * FROM wl_product_stock WHERE product_id='".$res['products_id']."' 
								AND product_size='0' AND product_color='0'";
					$query_num=$this->db->query($stock_cnt);
					
					if($query_num->num_rows()== 0 )
					{
						$del_query=$this->db->query("DELETE FROM wl_product_stock WHERE 
												 product_id='".$res['products_id']."'");
						
						$data_insert = array(
									'product_id'		=>	$res['products_id'],
									'product_type'		=>	0,
									'product_color'		=>	0,
									'product_size'		=>	0,
									'product_quantity'	=>	0, 
								);
						$this->product_model->safe_insert('wl_product_stock',$data_insert,FALSE);
						
					}
				}
				//-----------End Low Stock
				
				
				$this->session->set_userdata(array('msg_type'=>'success'));			
				$this->session->set_flashdata('success',lang('successupdate'));		
				redirect('adminzone/products/'.query_string(), '');		
			}
				
		$data['res']=$res;	
		$media_option = array('productid'=>$res['products_id']);
		$res_photo_media = $this->product_model->get_product_media(4,0, $media_option);	
		$data['res_photo_media']=$res_photo_media;	
				
		$this->load->view('catalog/view_product_edit',$data);		
		}
		else
		{
			redirect('adminzone/products', ''); 	
		}
	}
	
	
		
	public function add_product_media($productId)
	{
		if( !empty($_FILES) && ( $productId > 0 ) )
		{
			$defalut_image = 'Y';
			
			foreach($_FILES as $key=>$val)
			{
				$imgfld=$key;
				
				if(array_key_exists($imgfld,$_FILES))
				{
					$this->load->library('upload');									
					$data_upload_sugg = $this->upload->my_upload($imgfld,"products");
					
					if( is_array($data_upload_sugg)  && !empty($data_upload_sugg) )
					{ 
						$add_data = array(
						'products_id'=>$productId,
						'media_type'=>'photo',
						'is_default'=>$defalut_image,									
						'media'=>$data_upload_sugg['upload_data']['file_name'],
						'media_date_added' => $this->config->item('config.date.time')
						);															
						$this->product_model->safe_insert('wl_products_media', $add_data ,FALSE );
					
					}
						
					$defalut_image = 'N';
				}
			}
		
		}
	
  }	
   
	
	public function edit_product_media($productId)
	{
		//Current Media Files resultset
		$media_option = array('productid'=>$productId);
		$res_photo_media = $this->product_model->get_product_media(4,0, $media_option);			
		$res_photo_media = !is_array($res_photo_media ) ? array() : $res_photo_media ;
		
		$delete_media_files = $this->input->post('product_img_delete'); //checkbox items given for image deletion
		
		$arr_delete_items = array(); //holding our deleted ids for later use
		
		/* Tracking delete media ids coming from checkboxes */
		
		if(is_array($delete_media_files) && !empty($delete_media_files))
		{
		
			foreach($res_photo_media as $key=>$val)
			{
				$media_id = $val['id'];
				if(array_key_exists($media_id,$delete_media_files))
				{
					 $media_file = $res_photo_media[$key]['media'];
					 $unlink_image = array('source_dir'=>"products",'source_file'=>$media_file);
					 removeImage($unlink_image);	
					 array_push($arr_delete_items,$media_id);
				}
			}
		}
		
		/* Tracking Ends */
		
		/* Iterating Form Files */
		
		if( !empty($_FILES) && ( $productId > 0 ) )
		{
			$sx = 0;
			foreach($_FILES as $key=>$val)
			{
				$imgfld=$key;
				
				if(array_key_exists($imgfld,$_FILES))
				{
					$this->load->library('upload');									
					$data_upload_sugg = $this->upload->my_upload($imgfld,"products");
					
					if( is_array($data_upload_sugg)  && !empty($data_upload_sugg) )
					{
						/*  uploading successful  */
						$add_data = array(
						'products_id'=>$productId,
						'media_type'=>'photo',													
						'media'=>$data_upload_sugg['upload_data']['file_name'],
						'media_date_added' => $this->config->item('config.date.time')
						);	
						
						/* If there already exists record in the database update then else insert new entry 
						   $res_photo_media  holding existing resultset from databse in the form given below:							 
						   $res_photo_media = array( 0 => array(row1) )
						   						
						*/
						
						if(array_key_exists($sx,$res_photo_media))
						{							      
						       $media_id  = $res_photo_media[$sx]['id'];
							   $media_file = $res_photo_media[$sx]['media'];
						       $where = "id = '".$media_id."'"; 				
				               $this->product_model->safe_update('wl_products_media',$add_data,$where,FALSE);				   
							   $unlink_image = array('source_dir'=>"products",'source_file'=>$media_file);
							   removeImage($unlink_image);
							   
							   /* New File has been browsed and delete checkbox also checked for this file */
							   /* This  media id cannot be removed as it been browsed and updated */
							   if(in_array($media_id,$arr_delete_items))
							   {
									$media_del_index = array_search($media_id,$arr_delete_items);
									unset($arr_delete_items[$media_del_index]);  
							   }
							   										
						  
						}else
						{
							$this->product_model->safe_insert('wl_products_media', $add_data ,FALSE );
							
						}
						
					}
						
					
				}
				$sx++;
			}
		
		}
		
		if(!empty($arr_delete_items))
		{
			$del_ids = implode(',',$arr_delete_items);
			$where = " id IN(".$del_ids.") ";
			$this->product_model->delete_in('wl_products_media',$where,FALSE);
		}
	
  }	
  
  
	public function related()
	{
		$productId =  (int) $this->uri->segment(4);		
		$option = array('productid'=>$productId);
		$res =  $this->product_model->get_products(1,0, $option);		
			
			
		if( is_array($res) )
		{
			$data['heading_title'] = "Add Related Products";
			
			$fetch_related_products  = $this->product_model->related_products_added($res['products_id']);
						
			if(empty($fetch_related_products))
			{
				$fetch_not_ids = array($res['products_id']);
				
			}else
			{
				$fetch_not_ids=array_values($fetch_related_products);
				array_push($fetch_not_ids,$res['products_id']);
				
			}
			
			$res_array  = $this->product_model->get_related_products($fetch_not_ids);
			$data['res'] = $res_array; 	
			
				/* Add related products */
				
				if($this->input->post('add_related')=='Add related product')
				{
					
					$this->add_related_products($res['products_id']);
					$this->session->set_flashdata('message',"Related Product has been added successfully." ); 
					redirect('adminzone/products/related/'.$productId, '');	
					
				}
				
			/* End of  related products */
			
			$this->load->view('catalog/view_add_related_products',$data);
		} 
		
	}
	
	
	public function add_related_products($product_id)
	{
		$arr_ids = $this->input->post('arr_ids');	
		
		 if( is_array($arr_ids))
		 {
					
				foreach($arr_ids as $val )
				{
					$rec_exits = $this->product_model->is_record_exits('wl_products_related',
				       array('condition'=>"related_id =".$val." AND product_id =".$product_id." ")	);
				
					if( !$rec_exits )
					{
						$posted_data = array(
						'product_id'=>$product_id,
						'related_id'=>$val,
						'related_date_added'=>$this->config->item('config.date.time')							
						);
						$this->product_model->safe_insert('wl_products_related',$posted_data,FALSE);
					}
				}
		    }
	  }
	
	
	
	public function remove_related_products($productId)
	{
		$arr_ids = $this->input->post('arr_ids');
		if( is_array($arr_ids) )
		{
			if($this->input->post('remove_related')=='Remove product')
			{		
				foreach($arr_ids as $val )
				{
					$data = array('id'=>$val );
					$this->product_model->safe_delete('wl_products_related',$data,FALSE);				   
				}
				
			} 
		}
		
	}
	
	public function view_related()
	{		
		$productId =  (int) $this->uri->segment(4);	
		$option = array('productid'=>$productId);
		$res =  $this->product_model->get_products(1,0, $option);
				
		if( is_array($res) ) 
		{
			$data['heading_title'] = "View Related Products";
			$res_array  = $this->product_model->related_products($res['products_id']);	
			$data['res'] = $res_array; 	
			
			/* Remove related products */
				
				if($this->input->post('remove_related')=='Remove product')
				{					
					$this->remove_related_products($res['products_id']);
					$this->session->set_flashdata('message',"Related Product has been removed successfully." ); 
				    redirect('adminzone/products/view_related/'.$productId, '');
					
				}
				
			/* End of  remove related products */
					
			$this->load->view('catalog/view_related_products',$data);
			
			
		} 			
		
	}	
	
	public function check_price(){
			$disc_price = floatval($this->input->post('product_discounted_price'));
			$price      = floatval($this->input->post('product_price'));
			if($disc_price>=$price){
				$this->form_validation->set_message('check_price', 'Discount price must be less than actual price.');
			    return FALSE;
								
			}else{
				 return TRUE;
			}
	}
	
	
	
	/*---------Color Image-------------*/
	
	public  function colorimg()
	{
		$pagesize               =  (int) $this->input->get_post('pagesize');		
		$config['limit']		=  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');			
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
				
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));				
		$res_array              =  $this->product_model->get_color_image($offset,$config['limit']);			
		$config['base_url']     =  base_url().'adminzone/products/colorimg/'.$this->uri->segment(4).'/pages/'; 		
		$config['total_rows']	=  $this->product_model->total_rec_found;	
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);				
		$data['heading_title']  = 'Proudct Color Image';
		$data['res'] = $res_array; 		
		$this->load->view('catalog/view_color_img_list',$data);		
	} 
	
	public function add_color_img()
	{		  
		$data['heading_title'] = 'Add Color Image';	
		
		$productId = (int) $this->uri->segment(4);		
		$option = array('productid'=>$productId);
		$rowdata =  $this->product_model->get_products(1,0, $option);
		//trace($rowdata);
			
		$this->form_validation->set_rules('color_id','Select Color',"required|xss_clean|unique[wl_products_media.products_id='".$productId."' AND wl_products_media.color_id='".$this->input->post('color_id')."']");
		$this->form_validation->set_rules('media',' Color Image','required|file_allowed_type[image]');
			 	
		if($this->form_validation->run()==TRUE)
		{
			$uploaded_file = "";	
			
			if( !empty($_FILES) && $_FILES['media']['name']!='' )
			{			  
				$this->load->library('upload');	
					
				$uploaded_data =  $this->upload->my_upload('media','products');
			
				if( is_array($uploaded_data)  && !empty($uploaded_data) )
				{ 								
					$uploaded_file = $uploaded_data['upload_data']['file_name'];
				}		
			}
		
			$posted_data = array(
			'products_id'		=>	$this->input->post('products_id'),
			'color_id'			=>	$this->input->post('color_id'),
			'media_type'		=>	'photo',					
			'media_date_added'	=>	$this->config->item('config.date.time'),
			'media'				=>	$uploaded_file,
			'media_status'		=>	'1',				
			);
								
		    $this->product_model->safe_insert('wl_products_media',$posted_data,FALSE);									
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));			
			redirect('adminzone/products/colorimg/'.$this->uri->segment(4), '');			
		}
		else
		{
			$data['rowdata']	=	$rowdata;	
			$this->load->view('catalog/view_color_img_add',$data);		  
		}	   
	}
	
	
	public function edit_color_img()
	{
		$Id = (int) $this->uri->segment(5);
		$data['heading_title'] = 'Update color Image';	
		
		$productId = (int) $this->uri->segment(4);		
		$option = array('productid'=>$productId);
		$prod_data =  $this->product_model->get_products(1,0, $option);
				
		$rowdata=$this->product_model->get_color_by_id($Id);
		$data['res']=$rowdata;	
		 
		 if(is_object($rowdata) ) 
		 {
				if( $this->input->post('action'))
				{
					$this->form_validation->set_rules('color_id','Select Color',"required|xss_clean|unique[wl_products_media.products_id='".$productId."' AND wl_products_media.color_id='".$this->input->post('color_id')."' AND wl_products_media.id!='".$this->input->post('id')."']");
					
					$this->form_validation->set_rules('media',' Color Image','file_allowed_type[image]');
						
					if($this->form_validation->run()==TRUE)
					{
						$uploaded_file = $rowdata->media;				 
						$unlink_image = array('source_dir'=>"products",'source_file'=>$rowdata->media);
													
						if( !empty($_FILES) && $_FILES['media']['name']!='' )
						{			  
						  	$this->load->library('upload');					
						  	$uploaded_data =  $this->upload->my_upload('media','products');
							
							if( is_array($uploaded_data)  && !empty($uploaded_data) )
							{ 								
							   $uploaded_file = $uploaded_data['upload_data']['file_name'];
							   removeImage($unlink_image);	
							}
						}	
					
						$posted_data = array(
							'products_id'		=>	$this->input->post('products_id'),
							'color_id'			=>	$this->input->post('color_id'),
							'media_type'		=>	'photo',					
							'media'				=>	$uploaded_file				
						);
					
						$where = "id = '".$rowdata->id."'"; 				
						$this->product_model->safe_update('wl_products_media',$posted_data,$where,FALSE);						
						$this->session->set_userdata(array('msg_type'=>'success'));				
						$this->session->set_flashdata('success',lang('successupdate'));	
						redirect('adminzone/products/colorimg/'.$productId,'');						
					}
					else
					{
					   $data['prod_data']	=	$prod_data;
					   $data['res']=$rowdata;					   
					   $this->load->view('catalog/view_color_img_edit',$data);
					}
				}
				else
				{
					$data['prod_data']	=	$prod_data;
					$data['res']=$rowdata;	
					$this->load->view('catalog/view_color_img_edit',$data);
				}
		   }
		   else
		   {
			  redirect('adminzone/products/colorimg/'.$productId, ''); 	 
		   }
	}
	
		public function change_media_status()
		{
			$pagered="adminzone/products/colorimg/".$this->uri->segment(4);
			$this->product_model->change_media_status();
			redirect($pagered, ''); 
		} 
	
	/*---------End Color Image-------------*/
	
	/*---------Manage Product Stock -------------*/
	
	public function update_stock()
	{
		$product_id=$this->uri->segment(4);
		$data['heading_title']	=	'Update Low Stock Products';
		if($this->input->post('action')=='Update Product Stock')
		{
			
			$post_value=$this->input->post();
			while (list($key,$val)=each($post_value)) 
			{
				if (substr($key,0,4)=="qty_") 
				{
					$key1 = substr($key,4,strlen($key)-4);
					$invt='inv_'.$key1;
					$val1=$post_value[$invt];
					$qry1=$this->db->query("UPDATE wl_product_stock SET product_quantity='".$val."',
											inventory='".$val1."' 
											WHERE stock_id='".$key1."'");
											
				}
			}
			
			$this->session->set_userdata(array('msg_type'=>'success'));				
			$this->session->set_flashdata('success',lang('successupdate'));
			redirect('adminzone/products/update_stock/'.$this->uri->segment(4), '');
			?>
            <script>javascript:window.opener.location.reload();</script>
            <?php
			
		}
		$res_array   = $this->product_model->product_id_stock_list($product_id);
		$data['res'] = $res_array; 	
		$this->load->view('catalog/view_update_product_stock',$data);
	}
	
	
	public function prd_stock_list()
	{
		$product_id=$this->uri->segment(4);
		$data['heading_title']	=	'Low Stock Products';
		
		$res_array   = $this->product_model->product_id_stock_list($product_id);
		$data['res'] = $res_array;
		$this->load->view('catalog/view_product_stock_list',$data);
	}
	
	/*---------End  Product Stock -------------*/
	
	
	//--------------------------Bulk Upload Products-------------------
	
	
	public function bulk_upload()
	{
		$data['heading_title']	=	'Bulk Upload Products';
		if($this->input->post('action')=='excel_file')
		{
			$this->form_validation->set_rules('excel_file','Upload Excel File','required|file_allowed_type[xls]');
			
			if($this->form_validation->run()==TRUE)
			{
				require_once FCPATH.'apps/third_party/Excel/reader.php';
				$data = new Spreadsheet_Excel_Reader();
				$data->setOutputEncoding('CP1251');
				
				//$data->setUTFEncoder('');
				chmod($_FILES["excel_file"]["tmp_name"], 0777);
				$data->read($_FILES["excel_file"]["tmp_name"]);
				$worksheet=$data->sheets[0]['cells'];
				trace($worksheet);exit;
				
				$process_add = $this->product_model->add_bulk_upload_products($worksheet);
				if($process_add===TRUE)
				{
					$this->session->set_userdata(array('msg_type'=>'success'));
					$this->session->set_flashdata('success',lang('success')); 
					redirect('adminzone/catalog/bulk_upload', '');
				}
				else
				{
					$this->form_validation->_error_array['image']='Uploading Failed.Please Try Again';	  
				}				
			}
		}
		$this->load->view('catalog/view_bulk_upload',$data);
	}
	
	public function get_html_category_ids()
	{
		$data['heading_title']	=	'Excel Category List Ids';
		
		set_time_limit(0);
		$file_path=$this->load->view('products/excel_category_ids',$data);
		ob_start();
		include_once($this->load->view('products/excel_category_ids',$data));
		
		$mess=ob_get_contents();
		$filename="category.htm";
		ob_end_clean();
		
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
	   
		//Use the switch-generated Content-Type
		header("Content-Type: application/force-download");
	
		//Force the download
		$header="Content-Disposition: attachment; filename=".$filename.";";
		header($header );
		header("Content-Transfer-Encoding: binary");
		echo $mess;
		exit;
	}
	
	
	public function get_html_color_ids()
	{
		$data['heading_title']	=	'Excel Color Ids';
		
		set_time_limit(0);
		$file_path=$this->load->view('products/excel_color_ids',$data);
		ob_start();
		include_once($this->load->view('products/excel_color_ids',$data));
		
		$mess=ob_get_contents();
		$filename="color.htm";
		ob_end_clean();
		
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
	   
		//Use the switch-generated Content-Type
		header("Content-Type: application/force-download");
	
		//Force the download
		$header="Content-Disposition: attachment; filename=".$filename.";";
		header($header );
		header("Content-Transfer-Encoding: binary");
		echo $mess;
		exit;
	}
	
	
	public function get_html_size_ids()
	{
		$data['heading_title']	=	'Excel Color Ids';
		
		set_time_limit(0);
		$file_path=$this->load->view('products/excel_size_ids',$data);
		ob_start();
		include_once($this->load->view('products/excel_size_ids',$data));
		
		$mess=ob_get_contents();
		$filename="size.htm";
		ob_end_clean();
		
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
	   
		//Use the switch-generated Content-Type
		header("Content-Type: application/force-download");
	
		//Force the download
		$header="Content-Disposition: attachment; filename=".$filename.";";
		header($header );
		header("Content-Transfer-Encoding: binary");
		echo $mess;
		exit;
	}
	
	public function get_html_zipcode_ids()
	{
		$data['heading_title']	=	'Excel Color Ids';
		
		set_time_limit(0);
		$file_path=$this->load->view('products/excel_zipcode_ids',$data);
		ob_start();
		include_once($this->load->view('products/excel_zipcode_ids',$data));
		
		$mess=ob_get_contents();
		$filename="zipcode.htm";
		ob_end_clean();
		
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
	   
		//Use the switch-generated Content-Type
		header("Content-Type: application/force-download");
	
		//Force the download
		$header="Content-Disposition: attachment; filename=".$filename.";";
		header($header );
		header("Content-Transfer-Encoding: binary");
		echo $mess;
		exit;
	}
	
	public function get_html_brand_ids()
	{
		$data['heading_title']	=	'Excel Color Ids';
		
		set_time_limit(0);
		$file_path=$this->load->view('products/excel_brand_ids',$data);
		ob_start();
		include_once($this->load->view('products/excel_brand_ids',$data));
		
		$mess=ob_get_contents();
		$filename="brand.htm";
		ob_end_clean();
		
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
	   
		//Use the switch-generated Content-Type
		header("Content-Type: application/force-download");
	
		//Force the download
		$header="Content-Disposition: attachment; filename=".$filename.";";
		header($header );
		header("Content-Transfer-Encoding: binary");
		echo $mess;
		exit;
	}
	
	//--------------------------End Bulk Upload Products-------------------
	
	
}
// End of controller