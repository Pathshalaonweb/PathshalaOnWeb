<?php $this->load->view('includes/header'); ?>  
 
   <div class="content">
    <div id="content">
  <div class="breadcrumb">
     <?php echo anchor('adminzone/dashbord','Home'); ?>&raquo; <?php echo anchor('adminzone/products','Back To Listing'); ?> &raquo;  <?php echo $heading_title; ?>
      </div>
      
      <div class="box">
    <div class="heading">
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons">
        <a href="javascript:void(0);" onclick="$('#form').submit();" class="button">Save</a>
	   <a href="javascript:void(0);" onclick="history.back();" class="button">Cancel</a>  
	</div>
      
    </div>
    <div class="content"> 
       
         <div id="tabs" class="htabs">         
         <a href="#tab-general">General</a>         
         <a href="#tab-image">Image</a>        
         </div> 
	   
        <?php echo validation_message();?>
         <?php echo error_message(); ?>  
		
		<?php echo form_open_multipart(current_url_query_string(),array('id'=>'form'));?>  
      <div id="tab-general">
			<table width="100%"  class="form"  cellpadding="3" cellspacing="3">
			<tr>
				<th colspan="2" align="right" >
					<span class="required">*Required Fields</span><br>
					<span class="required">**Conditional Fields</span>
				 </th>
			</tr>
			<tr>
				<th colspan="2" align="center" > </th>
			</tr>
			
             <tr class="trOdd">
				<td width="26%" height="26" align="right" valign="top" ><span class="required">*</span> Category:</td>
				<td width="74%" align="left">
                
				<select name="category_id" style="width:350px;"  size="8">
				<?php echo get_nested_dropdown_menu(0,$res['category_id']);?>
                </select>
                
                </td>
                </tr>
			<tr class="trOdd">
				<td width="26%" height="26" align="right" ><span class="required">*</span> Product Name:</td>
				<td width="74%" align="left">
              <input type="text" name="product_name" size="40" value="<?php echo set_value('product_name',$res['product_name']);?>"></td>
			</tr>
			<tr class="trOdd">
				<td width="26%" height="26" align="right" ><span class="required">*</span> Product Code:</td>
				<td align="left"><input type="text" name="product_code" size="40" value="<?php echo set_value('product_code',$res['product_code']);?>" /></td>
                
                     
             <tr class="trOdd">
				<td width="26%" height="26" align="right" ><span class="required">*</span> Price:</td>
				<td width="74%" align="left">
                <input type="text" name="product_price" size="40" value="<?php echo set_value('product_price',$res['product_price']);?>"></td>
			</tr>
			<tr class="trOdd">
				<td width="26%" height="26" align="right" ><span class="required">**</span> Discounted price:</td>
				<td width="74%" align="left"><input type="text" name="product_discounted_price" size="40" value="<?php echo set_value('product_discounted_price',$res['product_discounted_price']);?>"></td>
			</tr>
            
			<?php
             $available_quantity  =  ( $res['quantity'] - $res['used_quantity']);
			 $available_quantity  = ($available_quantity < 0 )  ? 0 :  $available_quantity;	         
            ?>
            
            <!--<tr class="trOdd">
				<td width="38%" height="26" align="right" ><span class="required">*</span> Available Quantity:</td>
				<td width="62%" align="left"><input type="text" name="quantity" size="40" value="<?php echo set_value('quantity',$available_quantity);?>"> <br />
              
                
                
                </td>
                
			</tr>-->
            
          <?php $brand_query="SELECT * FROM wl_brands WHERE status='1' ";
			   $brand_res=$this->db->query($brand_query);
			   if($brand_res->num_rows() > 0)
			   {
				   $list_brand=$brand_res->result_array();
		?>	
			                     
			<tr class="trOdd">
			  <td height="26" align="right" ><span class="required">*</span> Product Brand :</td>
			  <td align="left"><select name="brand" style="width:200px">
        <option value="">Select Brand</option>
        <?php foreach($list_brand as $keybrand=>$valbrand)
				{
					if($res['brand']==$valbrand['brand_id'])
					{
						$selected="selected";
					}
					else
					{
						$selected="";
					}
				
					
					?>
           <option value="<?php echo $valbrand['brand_id'];?>" <?php echo $selected;?>><?php echo $valbrand['brand_name'];?></option>
          <?php }?>
        </select></td>
			  </tr>
              <?php }else{ ?>
			<tr class="trOdd">
			  <td height="26" align="right" ><span class="required">*</span> Product Brand :</td>
			  <td align="left"><select name="brand" style="width:200px">
           	<option value="">Select Brand</option>
           </select></td>
			  </tr>
              <?php }?>
              <?php 
		   	   $size_query="SELECT * FROM wl_size WHERE status='1' ";
			   $size_res=$this->db->query($size_query);
			   $size_exp='';
			   $size_exp=explode(',',$res['product_size']);
			   
			   if($size_res->num_rows() > 0)
			   {
				   $list_size=$size_res->result_array();
		?>
			<tr class="trOdd">
			  <td height="26" align="right" >Product Size: </td>
			  <td align="left"><div style=" width:150px; height:150px; overflow-x:hidden; overflow-y:scroll; border:1px solid gray">
              <?php 
			  foreach($list_size as $keysize=>$valsize)
				{
					if(@in_array($valsize['size_id'],$size_exp))
					{
						$checked='checked="checked"';
					}
					else
					{
						$checked="";
					}
			  ?>
              <input type="checkbox" name="product_size[]" id="product_size[]" <?php echo $checked;?> value="<?php echo $valsize['size_id'];?>" /><?php echo $valsize['size_name'];?><br />
              <?php }?>
              </div>
		<strong class="required">Choose Multiple Size.</strong></td>
			  </tr>
              <?php } ?>
           
           <?php $color_query="SELECT * FROM wl_color WHERE status='1' ";
			   $color_res=$this->db->query($color_query);
			    $color_exp='';
			   $color_exp=explode(',',$res['product_color']);
			   if($color_res->num_rows() > 0)
			   {
				   $list_color=$color_res->result_array();
		?>
			<tr class="trOdd">
			  <td height="26" align="right" >Product Color: </td>
			  <td align="left"><div style=" width:150px; height:150px; overflow-x:hidden; overflow-y:scroll; border:1px solid gray">
              
		
        <?php foreach($list_color as $keyColor=>$valColor)
				{
					if(@in_array($valColor['color_id'],$color_exp))
					{
						$checked='checked="checked"';
					}
					else
					{
						$checked="";
					}
					
					?>
                    <div style="background-color:#<?php echo $valColor['color_code'];?>;"><input type="checkbox" name="product_color[]" id="product_color[]" <?php echo $checked;?>  value="<?php echo $valColor['color_id'];?>" /><?php echo $valColor['color_name'];?></div>
                    
          
          <?php }?>
       
        </div>
        
        <strong class="required">Choose Multiple Color.</strong></td>
			  </tr>
               <?php } ?>
			<tr class="trOdd">
				<td width="26%" height="26" align="right" > Description:</td>
				<td align="left"><textarea name="products_description" rows="5" cols="50" id="description" ><?php echo $res['products_description'];?></textarea> <?php  echo display_ckeditor($ckeditor); ?></td>
			</tr>
			<tr class="trOdd">
				<td align="left">&nbsp;</td>
				<td align="left">					
					
					<input type="hidden" name="products_id" value="<?php echo $res['products_id'];?>">
                    
				</td>
			</tr>
			</table>
    </div>
    
    <div id="tab-image">    
        <input type="hidden" name="product_exclude_images_ids" value="" id="product_exclude_images_ids" />
        
         <table id="images" class="list">
            <thead>
              <tr>
                <td class="left">Image</td>
              </tr>
            </thead>                     
          <table id="images" class="form">
            <?php
			//trace($res_photo_media);
			$j=0;
			for($i=1;$i<=$this->config->item('total_product_images');$i++)
			{
				$product_img  = @$res_photo_media[$j]['media'];
				$product_path = "products/".$product_img;
				$product_img_auto_id  = @$res_photo_media[$j]['id']; 
				
			?>
				<tr>
				  <td width="28%" align="right" ><span class="required">**</span>Image <?php echo $i;?></td>
					<td width="2%" height="26" align="center" >:</td>
					<td align="left">
                    
						<input type="file" name="product_images<?php echo $i;?>" />
						
					<?php
					if( $product_img!='' && file_exists(UPLOAD_DIR."/".$product_path) )
					{ 
					?>
						 <a href="#"  onclick="$('#dialog_<?php echo $j;?>').dialog();">View</a>
						| <input type="checkbox" name="product_img_delete[<?php echo $product_img_auto_id;?>]" value="Y" />Delete
                        
					<?php	
					}
					?>
					<br />
                    <br />
                    
					[ <?php echo $this->config->item('product.best.image.view');?> ]
                    
         <div id="dialog_<?php echo $j;?>" title="Product Image" style="display:none;">
         <img src="<?php echo base_url().'uploaded_files/'.$product_path;?>"  /> </div>
         <input type="hidden" name="media_ids[]" value="<?php echo $product_img_auto_id;?>" />
       
        
                     </td>
				</tr>
			<?php
			$j++;
			}
			?>
            </table>           
          
            
            <tfoot>
              
            </tfoot>
          </table>
        </div>
	<?php echo form_close(); ?>
        
</div>   
    
    
</div>

<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#languages a').tabs(); 
$('#vtab-option a').tabs();
//-->
$('#product_exclude_images_ids').val('');
function delete_product_images(img_id)
{
	//alert($('#product_exclude_images_ids').val());
	 img_id = img_id.toString();
	 exclude_ids1 = $('#product_exclude_images_ids').val();
	 exclude_ids1_arr = exclude_ids1=='' ? Array() : exclude_ids1.split(',');
	 
	 if($.inArray(img_id,exclude_ids1_arr)==-1){
		  exclude_ids1_arr.push(img_id);
	 }
	 
	 exclude_ids1 =  exclude_ids1_arr.join(',');
	 
	 
	$('#product_exclude_images_ids').val(exclude_ids1);
	$('#product_image'+img_id).remove();
	$('#del_img_link_'+img_id).remove();
		
	alert($('#product_exclude_images_ids').val());
	
}

</script> 
<?php $this->load->view('includes/footer'); ?>