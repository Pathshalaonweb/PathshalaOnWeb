<?php


if ( ! function_exists('get_blogcategory_dropdown_menu'))
{
	function get_blogcategory_dropdown_menu($parent,$selectId="",$pad="")
	{
		
		 $ci = CI();
		 $selId =( $selectId!="" ) ? $selectId : "";		 
		 $var="";		 
		 $sql="SELECT * FROM wl_blogcategory WHERE  status='1' ";		 
		 $query=$ci->db->query($sql);
		 $num_rows     =  $query->num_rows();
		 		  
		  if ($num_rows > 0  )
		  {
			 
		    foreach( $query->result_array() as $row )
		    {
			   $category_name=ucfirst(strtolower($row['name']));	
		   		$sel=( $selectId==$row['blogcategory_id'] ) ? "selected='selected'" : "";						 			 
				$var .= '<option value="'.$row['blogcategory_id'].'" '.$sel.'>'.$pad.$category_name.'  </option>'; 
			}    
		   }
	 
      return $var;
   } 
   
}


/*

$cond = "AND parent_id =".$pageVal['category_id'];
echo count_category($cond);

*/
				
if ( ! function_exists('count_category'))
{
	function count_category($condtion='')
	{		
		 $ci = CI();
		 $condtion = "status !='2' ".$condtion;	 
		 $sql="SELECT COUNT(category_id)  AS total_subcategories FROM wl_categories WHERE $condtion ";		 
		 $query=$ci->db->query($sql)->row_array();
		 return  $query['total_subcategories'];
		 
	}
}


if ( ! function_exists('count_products'))
{
	function count_products($condtion='')
	{		
		 $ci = CI();
		 $condtion = "status !='2' ".$condtion;	 
		 $sql="SELECT COUNT(products_id)  AS total_product FROM wl_products WHERE $condtion ";		 
		 $query=$ci->db->query($sql)->row_array();
		 return  $query['total_product'];
		 
	}
}

if ( ! function_exists('category_breadcrumbs'))
{
	function category_breadcrumbs($catid,$segment='')
	{
		$link_cat=array();	
		$ci = CI();		  
		$sql="SELECT category_name,category_id,parent_id
		FROM wl_categories WHERE category_id='$catid' AND status='1' ";		 
		$query=$ci->db->query($sql);		
		$num_rows     =  $query->num_rows();
		$segment      = $ci->uri->segment($segment,0);
			 
		  if ($num_rows > 0)
		  {
			 			  
				  foreach( $query->result_array() as $row )
				  {
							 
						if ( has_child( $row['parent_id'] ) )
						{
								
								$condtion_product   =  "AND category_id='".$row['category_id']."'";				
								$product_count      = count_products($condtion_product);
								
								if($product_count>0)
								{
									$link_url = base_url()."products/index/".$row['category_id'];
									
								}else
								{							
									$link_url = base_url()."category/index/".$row['category_id'];								
								}
								
								if( $segment!='' && ( $row['category_id']==$segment ) )
								{
									
									$link_cat[]=' <span class="pr2 fs14"> </span> '.$row['category_name'];
									
								}else
								{
									
								  $link_cat[]=' <span class="pr2 fs14"> </span> <a href='.$link_url.'>'.$row['category_name'].'</a>';
								  
								}
								
								$link_cat[] = category_breadcrumbs($row['parent_id'],$segment);
							 
						  }else
						  {	
							$link_url = base_url()."category/index/".$row['category_id'];				  
							$link_cat[] ='<a href='.$link_url.'>'.$row['category_name'].'</a>';	
									   
						  }     
					}    
		 }else
		 {
			  $link_url = base_url()."category";
			  $link_cat[]='<span class="pr2 fs14"> </span> <a href='.$link_url.'>Category</a>';
			
		 }
		 
		 $link_cat = array_reverse($link_cat);
		 $var=implode($link_cat);
		 return $var;
		
	}
	
}