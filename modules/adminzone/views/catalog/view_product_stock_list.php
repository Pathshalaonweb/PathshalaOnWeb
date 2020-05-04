<?php $this->load->view('includes/header'); ?> 
 
  <div id="content">
  
  <div class="breadcrumb">
  
       <?php echo anchor('adminzone/dashbord','Home'); ?> &raquo; <?php echo anchor('adminzone/products/','Products'); ?> &raquo; <?php echo $heading_title; ?> </a>   
             
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
    </div>
   
    
	<div class="content">
		    <?php 
                if(error_message() !=''){
               	   echo error_message();
                }
                ?> 	
		
		<?php
		 $j=0;
		if( is_array($res) && !empty($res) )
		{
			$atts = array(
				  'width'      => '650',
				  'height'     => '600',
				  'scrollbars' => 'yes',
				  'status'     => 'yes',
				  'resizable'  => 'yes',
				  'screenx'    => '0',
				  'screeny'    => '0'
				);
			?>
            <table width="100%">
            	<tr>
                <?php $product_res=get_db_single_row('wl_products','product_name,product_code,products_id',$Condwherw='WHERE 1 AND products_id="'.$this->uri->segment(4).'"');?>
                	<td align="left"><strong>Product Name</strong> - <?php echo $product_res['product_name'];?><br/>
                        <strong>Product Code -</strong> <?php echo $product_res['product_code'];?></td>
                	<td align="right"><?php echo anchor_popup('adminzone/products/update_stock/'.$product_res['products_id'], 'Please Click Here to update product quantities', $atts);?></td>
                </tr>
            </table>
			<table class="list" width="100%" id="my_data">
			
			
              <thead>
			<tr>
				<td width="145" align="center" class="center"><strong>Product Size</strong></td>
				<td width="202" align="center" class="center"><strong>Product Color</strong></td>
				<td width="134" align="center" class="center"><strong>Product Quantity</strong></td>
				<td width="148" align="center" class="center"><strong>Low Stock</strong></td>
			</tr>
			</thead>
			<tbody>
			<?php 	
				$i=1;
				$atts = array(
				  'width'      => '650',
				  'height'     => '600',
				  'scrollbars' => 'yes',
				  'status'     => 'yes',
				  'resizable'  => 'yes',
				  'screenx'    => '0',
				  'screeny'    => '0'
				);		
		foreach($res as $catKey=>$pageVal)
		{			 
		?> 
			<tr>
				<td align="center" class="center">
				<?php 
				$size_name=get_db_single_row('wl_size','size_name',$Condwherw='WHERE 1 AND size_id="'.$pageVal['product_size'].'"');
				echo $size_name=($pageVal['product_size']==0) ? 'Standard Size' : $size_name['size_name'];?>
               </td>
				<td align="center">
				 <?php 
				$color_name=get_db_single_row('wl_color','color_name',$Condwherw='WHERE 1 AND color_id="'.$pageVal['product_color'].'"');
				echo $color_name=($pageVal['product_color']==0) ? 'Standard Color' : $color_name['color_name'];?>	  
            </td>
            <td align="center" class="center"><?php echo $pageVal['product_quantity'];?></td>
            <td align="center"><?php echo $pageVal['inventory'];?> </td>
			</tr>
		<?php
		$j++;
		}		   
		?> 
		<tr><td colspan="4" align="right" height="30">&nbsp;</td></tr>     
		</tbody>
		
		</table>
		<?php
		
	}
	else
	{
		echo "<center><strong> No record(s) found !</strong></center>" ;
	}
	?> 
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>