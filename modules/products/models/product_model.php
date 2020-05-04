<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_model extends MY_Model{

		 
	 public function get_products($limit='10',$offset='0',$param=array()){
		
		$category_id		=   @$param['category_id'];
		
		$productid			=   @$param['productid'];
		
		$pid				=   @$param['pid'];
		
		$orderby			=	@$param['orderby'];	
		
		$status			    =   @$param['status'];	
		$where			    =	@$param['where'];	
		
		
		$keyword			=   trim($this->input->get_post('keyword',TRUE));						
		$keyword			=   $this->db->escape_str($keyword);
		
		
		if($pid!='')
		{
			$this->db->where("wlp.products_id  ","$pid");
		}
		
		if($status!=''){
			$this->db->where("wlp.status","$status");
		}
		
		
		if($where!=''){
			$this->db->where($where);
		}
		
		
		
		if($category_id!='')
		{
			$this->db->where("wlp.category_id ","$category_id");
		}
		
		if($productid!='')
		{
			$this->db->where("wlp.products_id  ","$productid");
		}
		
		
		if($keyword!='')
		{
			$this->db->where("(wlp.product_name LIKE '%".$keyword."%' OR wlp.product_code LIKE '%".$keyword."%' )");
		}
		
		if($orderby!='')
		{		
			$this->db->order_by($orderby);
			
		}
		else
		{
			$this->db->order_by('wlp.products_id ','desc');
		}
		
	    $this->db->group_by("wlp.products_id"); 	
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS wlp.*,wlpm.media,wlpm.media_type,wlpm.is_default',FALSE);
		$this->db->from('wl_products as wlp');
		
		$this->db->where('wlp.status !=','2');
		$this->db->join('wl_products_media AS wlpm','wlp.products_id=wlpm.products_id','left');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? @$result[0]: $result;	
		return $result;
				
	}
		  
	public function get_product_media($limit='4',$offset='0',$param=array())
    {		  
		
		 $default			    =   @$param['default'];	
		 $productid			    =   @$param['productid'];
		 $media_type			=   @$param['media_type'];
		 		
		 if( is_array($param) && !empty($param) )
		 {			
			$this->db->select('SQL_CALC_FOUND_ROWS *',FALSE);
			$this->db->limit($limit,$offset);
			$this->db->from('wl_products_media');
			$this->db->where('products_id',$productid);	
			
			if($default!='')
			{
				$this->db->where('is_default',$default);	
			}
			if($media_type!='')
			{
				$this->db->where('media_type',$media_type);	
			}
							
			$q=$this->db->get();
			$result = $q->result_array();	
			$result = ($limit=='1') ? $result[0]: $result;	
			return $result;	
			
		 }				
		
	}
		
	public function related_products_added($productId,$limit='NULL',$start='NULL')
	{
		$res_data =  array();
		$condtion = ($productId!='') ? "status ='1' AND product_id = '$productId' ":"status ='1'";
		$fetch_config = array(
													'condition'=>$condtion,
													'order'=>"id DESC",
													'limit'=>$limit,
													'start'=>$start,							 
													'debug'=>FALSE,
													'return_type'=>"array"							  
												 );		
		$result = $this->findAll('wl_products_related',$fetch_config);
		if( is_array($result) && !empty($result) )
		{
			foreach ($result as $val )
			{ 
				$res_data[$val['id']] =$val['related_id'];
			}
		}
		return $res_data;		
	}
	
	
	
	public function get_related_products($productId)
	{
		$condtion = (!empty($productId)) ? "status !='2'  AND products_id NOT IN(".implode(",",$productId). ")" :"status !='2'";
				
		$fetch_config = array(
													'condition'=>$condtion,
													'order'=>"products_id DESC",
													'limit'=>'NULL',
													'start'=>'NULL',							 
													'debug'=>FALSE,
													'return_type'=>"array"							  
												 );		
		$result = $this->findAll('wl_products',$fetch_config);
		return $result;	
	}
	
	
	
	public function related_products($productId,$limit='NULL',$start='NULL')
	{
		$res_data =  array();
		$condtion = ($productId!='') ? "status ='1' AND product_id = '$productId' ":"status ='1'";
		$fetch_config = array(
													'condition'=>$condtion,
													'order'=>"id DESC",
													'limit'=>$limit,
													'start'=>$start,							 
													'debug'=>FALSE,
													'return_type'=>"array"							  
												 );		
		$result = $this->findAll('wl_products_related',$fetch_config);
		if( is_array($result) && !empty($result) )
		{
			foreach ($result as $val )
			{ 
			
				$res_data[$val['id']] = $this->get_products(1,0, array('productid'=>$val['related_id']));
				
				
			}
		}
		
		$res_data = array_filter($res_data);
		return $res_data;		
	}
	
	
	
	
	
	
	
	public function get_shipping_methods()
	{
		$condtion = "status =1";
		$fetch_config = array(
													'condition'=>$condtion,
													'order'=>"shipping_id DESC",							 					 
													'debug'=>FALSE,
													'return_type'=>"array"							  
													);		
		$result = $this->findAll('wl_shipping',$fetch_config);
		return $result;	
	}
	 
	 
	 
	 /*---------Color Image-------------*/
	
	public function get_color_image($offset=FALSE,$per_page=FALSE)
	{
		$keyword = $this->db->escape_str(trim($this->input->get_post('keyword',TRUE)));		
		$condtion = ($keyword!='') ? "media_status !='2' AND products_id='".$this->uri->segment(4)."' ":"media_status !='2' AND products_id='".$this->uri->segment(4)."'";
		
		$fetch_config = array(
		'condition'=>$condtion,
		'order'=>"id DESC",
		'limit'=>$per_page,
		'start'=>$offset,							 
		'debug'=>FALSE,
		'return_type'=>"array"							  
		);		
		$result = $this->findAll('wl_products_media',$fetch_config);
		return $result;	
	}
	
	public function get_color_by_id($id){
		
		$id = applyFilter('NUMERIC_GT_ZERO',$id);
		
		if($id>0)
		{
			$condtion = "media_status !='2' AND id=$id";
			$fetch_config = array(
			'condition'=>$condtion,							 					 
			'debug'=>FALSE,
			'return_type'=>"object"							  
			);
			$result = $this->find('wl_products_media',$fetch_config);
			return $result;		
		}
	}
	
	public function change_media_status()
	{
	    $arr_ids = $_REQUEST['arr_ids'];
		
		if(is_array($arr_ids)){
		
			$str_ids = implode(',', $arr_ids);
			
			if($this->input->post('status_action')=='Activate')
			{
				$query = $this->db->query("UPDATE wl_products_media   
				                           SET media_status='1' 
										   WHERE id in ($str_ids)");
										   
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('activate'));	 
			}
			
			if($this->input->post('status_action')=='Deactivate')
			{
				$query = $this->db->query("UPDATE wl_products_media  
				                           SET media_status='0' 
										   WHERE id in ($str_ids)");
										   
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('deactivate'));	 
				
			}
			
			if($this->input->post('status_action')=='Delete')
			{
				$query = $this->db->query("DELETE FROM wl_products_media 
				                           WHERE id in ($str_ids)");
										   
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('deleted'));	 
			}
		}
	}
	
	/*---------End Color Image-------------*/
	
	/*---------Manage Product Stock -------------*/
	
	public function product_id_stock_list($product_id)
	{
		$query="SELECT * FROM wl_product_stock WHERE product_id='".$product_id."'  ORDER BY product_size ASC";
		$db_query=$this->db->query($query);
		if($db_query->num_rows() > 0)
		{
			$res=$db_query->result_array();
			return $res;
		}
		else
		{
			return false;
		}
		
	}
	 
	/*---------End  Product Stock -------------*/
	
	
	
	//---------------Bulk Upload File---------
	
	public function add_bulk_upload_products($worksheet)
	{
		for($i=1;$i<count($worksheet);$i++)
		{
			$cat_id			=	(!isset($worksheet[$i][0])) ? '' : addslashes(trim($worksheet[$i][0]));
			$product_name	=	(!isset($worksheet[$i][1])) ? '' : addslashes(trim($worksheet[$i][1]));
			$product_code	=	(!isset($worksheet[$i][2])) ? '' : htmlentities(trim($worksheet[$i][2]));
			$price			=	(!isset($worksheet[$i][3])) ? '' : (float)addslashes(trim($worksheet[$i][3]));
			$discount_price	=	(!isset($worksheet[$i][4])) ? '' : (float)addslashes(trim($worksheet[$i][4]));
			$product_size	=	(!isset($worksheet[$i][5])) ? '' : htmlentities(trim($worksheet[$i][5]));
			$product_color	=	(!isset($worksheet[$i][6])) ? '' : htmlentities(trim($worksheet[$i][6]));
			$brand			=	(!isset($worksheet[$i][7])) ? '' : addslashes(trim($worksheet[$i][7]));
			$location		=	(!isset($worksheet[$i][8])) ? '' : htmlentities(trim($worksheet[$i][8]));
			$size_guide_desc=	(!isset($worksheet[$i][9])) ? '' : htmlentities(trim($worksheet[$i][9]));
			$is_feature		=	(!isset($worksheet[$i][10])) ? '' : addslashes(trim($worksheet[$i][10]));
			$top_selling	=	(!isset($worksheet[$i][11])) ? '' : addslashes(trim($worksheet[$i][11]));
			$set_recent		=	(!isset($worksheet[$i][12])) ? '' : addslashes(trim($worksheet[$i][12]));
			$description	=	(!isset($worksheet[$i][13])) ? '' : htmlentities(trim($worksheet[$i][13]));
			$feature_desc	=	(!isset($worksheet[$i][14])) ? '' : htmlentities(trim($worksheet[$i][14]));
			$status			=	(!isset($worksheet[$i][15])) ? '' : addslashes(trim($worksheet[$i][15]));
			
			/*$pic1			=	(!isset($worksheet[$i][16])) ? '' : htmlentities(trim($worksheet[$i][16]));
			$pic2			=	(!isset($worksheet[$i][17])) ? '' : htmlentities(trim($worksheet[$i][17]));
			$pic3			=	(!isset($worksheet[$i][18])) ? '' : htmlentities(trim($worksheet[$i][18]));
			$pic4			=	(!isset($worksheet[$i][19])) ? '' : htmlentities(trim($worksheet[$i][19]));
			$pic5			=	(!isset($worksheet[$i][20])) ? '' : htmlentities(trim($worksheet[$i][20]));
			$pic6			=	(!isset($worksheet[$i][21])) ? '' : htmlentities(trim($worksheet[$i][21]));*/
			
			$dbfld=array();
			$categoryposted	=	$cat_id;
			
			$all_categories=getCategoryHierarchy($categoryposted);
			$categoryLinks=substr($all_categories,0,-1);
				
			$parentcategory=getfinallink($categoryposted);
			$topcat_res=$this->db->query("Select cat_id from tbl_category where cat_id IN(".$parentcategory.") and cat_status ='0'")->num_rows();
			$cat_status=$topcat_res > 0 ? '0' : '1';
			
			$data = array(
							'cat_id'			=>	$parentcategory,
							'cat_links'			=>	$categoryLinks,
							'product_name'		=>	$product_name,
							'product_code'		=>	$product_code,
							'brand'				=>	$brand,
							'product_size'		=>	$product_size,
							'product_color'		=>	$product_color,
							'location'			=>	$location,
							'size_guide_desc'	=>	$size_guide_desc,
							'description'		=>	$description,
							'feature_desc'		=>	$feature_desc,
							'is_feature'		=>	$is_feature,
							'top_selling'		=>	$top_selling,
							'set_recent'		=>	$set_recent,
							'recive_date' 		=>  date('Y-m-d h:i:s'),
							'cat_status'		=>	$cat_status,
							'status' 			=>  $status,
							'product_type' 		=>  'P',
							'xls_type' 			=>  'Y',
							
						 );
			$productId =  $this->safe_insert('tbl_products',$data,FALSE);
			
			
			$product_price     	= $price;
			$discount_price     = $discount_price;	
		
			$data1 = array(
							'pro_id'		=>	$productId,
							'price'			=>	$product_price,
							'discount_price'=>	$discount_price,
						);
			$this->safe_insert('tbl_product_info',$data1,FALSE);
		}
		return true;
	}
	//--------------End Bulk Upload File-----
	  
}