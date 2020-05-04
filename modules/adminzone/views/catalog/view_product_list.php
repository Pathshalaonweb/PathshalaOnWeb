<?php $this->load->view('includes/header'); ?>

<div class="content">
<div id="content">
<div class="breadcrumb"> <?php echo anchor('adminzone/dashbord','Home'); 
	$segment=4;
    $catid = (int)$this->uri->segment(4,0);
	if($catid )
	{
		 echo admin_category_breadcrumbs($catid,$segment);
	}
	else
	{
		echo '<span class="pr2 fs14">»</span> Products ';
	}   
    ?> </div>
<div class="box">
  <div class="heading">
    <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"> <a href="<?php echo base_url();?>adminzone/products/add/<?php echo $this->uri->segment(4,0);?>" class="button">Add Product</a> </div>
  </div>
  <div class="content">
    <?php 
			   if(error_message() !=''){
			      echo error_message();
			   }
			    ?>
    <script type="text/javascript">function serialize_form() { return $('#pagingform').serialize();   } </script>
    <?php 
		echo form_open("adminzone/products/",'id="search_form" method="get" '); ?>
    <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div>
    <table width="100%"  border="0" cellspacing="3" cellpadding="3" >
      <tr>
        <td align="center" >Search [ Product Name, Product Code ]
          <input type="text" name="keyword" value="<?php echo $this->input->get_post('keyword');?>"  />
          &nbsp;
          <select name="status">
            <option value="">Status</option>
            <option value="1" <?php echo $this->input->get_post('status')==='1' ? 'selected="selected"' : '';?>>Active</option>
            <option value="0" <?php echo $this->input->get_post('status')==='0' ? 'selected="selected"' : '';?>>In-active</option>
          </select>
          <a  onclick="$('#search_form').submit();" class="button"><span> GO </span></a>
          <?php 
            if( $this->input->get_post('keyword')!='' || $this->input->get_post('status')!='' )
            { 
                echo anchor("adminzone/products/",'<span>Clear Search</span>');
            } 
            ?></td>
      </tr>
    </table>
    <?php echo form_close();?>
    <div class="required"> <?php echo $category_result_found; ?></div>
    <br />
    <?php	 
		if(is_array($res) && !empty($res)){
			echo form_open("adminzone/products/",'id="data_form"');
			
			?>
    <table class="list" width="100%" id="my_data">
      <thead>
        <tr>
          <td width="22" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></td>
          <td width="195" class="left">Product Name</td>
          <td width="177" class="left">Product Code</td>
          <td width="120" class="center">Price</td>
          <td width="128" class="center">Product Picture</td>
          <td width="100" class="center">Details</td>
          <td width="82" class="center">Status</td>
          <td width="117" class="center">Action</td>
        </tr>
      </thead>
      <tbody>
        <?php 	
			$atts = array(
			'width'      => '740',
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
          <td style="text-align: center;"><input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['products_id'];?>" /></td>
          <td class="left" valign="top"><?php echo $pageVal['product_name'];?>
            <?php 
					$product_set_in = array();					
					if($pageVal['hot_product']!="" && $pageVal['hot_product']!='0')
					{ 
						$product_set_in[]="<b>Hot Product : </b> Yes";
					}					
					if($pageVal['featured_product']!="" && $pageVal['featured_product']!='0')
					{ 
						$product_set_in[]="<b>Featured  : </b> Yes";
					}					
					if($pageVal['new_product']!="" && $pageVal['new_product']!='0')
					{ 
						$product_set_in[]="<b>New Product : </b> Yes";
					}
									
					if(!empty($product_set_in))
					{   echo "<br /><br />";
						echo implode("<br>",$product_set_in)."<br />"; 
					}	
					
					$available_quantity  =  ( $pageVal['quantity'] - $pageVal['used_quantity']);
			        $available_quantity  = ($available_quantity < 0 )  ? 0 :  $available_quantity;	  
									
					?>
            <div id="dialog_<?php echo $pageVal['products_id'];?>" title="Description" style="display:none;"> <?php echo $pageVal['products_description'];?></div></td>
          <td class="left" valign="top"><?php echo $pageVal['product_code'];?></td>
          <td align="center" valign="top"><span style="color: #b00;">
            <?php if($pageVal['product_discounted_price']>0){echo $pageVal['product_discounted_price'];}else{echo $pageVal['product_price'] ;}?>
            </span></td>
          <td align="center" valign="top"><img src="<?php echo get_image('products',$pageVal['media'],50,50,'AR');?>" /></td>
          <td class="center" valign="top"><a href="javascript:void(0);"  onclick="$('#dialog_<?php echo $pageVal['products_id'];?>').dialog( {width: 650} );">View Details</a> <br />
            <br />
            <?php if($pageVal['product_color']){?>
            <a href="<?php echo base_url().'adminzone/products/colorimg/'.$pageVal['products_id']?>">Manage Color Images</a>
            <?php }?>
            <br />
            <br />
            <a href="<?php echo base_url().'adminzone/products/prd_stock_list/'.$pageVal['products_id']?>">Manage Product Stock</a></td>
          <td class="center" valign="top"><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
          <td align="center" valign="top"><p> <?php echo anchor("adminzone/products/edit/$pageVal[products_id]/".query_string(),'Edit'); ?> </p>
            <p> <?php echo anchor_popup('adminzone/products/related/'.$pageVal['products_id'],'Add Related Products',$atts);?> </p>
            <p> <?php echo anchor_popup('adminzone/products/view_related/'.$pageVal['products_id'], 'View Related Products', $atts);?> </p></td>
        </tr>
        <?php
			}		   
			?>
        <tr>
          <td colspan="11" align="right" height="30"><?php echo $page_links; ?></td>
        </tr>
      </tbody>
      <tr>
        <td align="left" colspan="11" style="padding:2px" height="35"><input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
          <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
          <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/>
          <?php echo form_dropdown("set_as",$this->config->item('product_set_as_config'),$this->input->post('set_as'),'style="width:120px;" onchange="return onclickgroup()"'); ?> <?php echo form_dropdown("unset_as",$this->config->item('product_unset_as_config'),$this->input->post('unset_as'),'style="width:120px;" onchange="return onclickgroup()"'); ?></td>
      </tr>
    </table>
    <?php
			echo form_close();
		}else
		{
			echo "<center><strong> No record(s) found !</strong></center>" ;
		}
		?>
  </div>
</div>
<script type="text/javascript">		
	function onclickgroup(){
		if(validcheckstatus('arr_ids[]','set','record','u_status_arr[]')){			
			$('#data_form').submit();
		}
	}	
</script>
<?php $this->load->view('includes/footer'); ?>
