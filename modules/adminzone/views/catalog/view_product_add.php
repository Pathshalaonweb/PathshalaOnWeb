<?php $this->load->view('includes/header'); ?> 
<?php 
$pcatID =($this->uri->segment(4) > 0)? $this->uri->segment(4):"0";
$pcatID = (int) $pcatID;
?> 
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
	   <a href="javascript:void(0);" onclick="history.back();" class="button">Cancle</a>  
	</div>
      
    </div>
    <div class="content">
    
        <div id="tabs" class="htabs">         
        <a href="#tab-general">General</a>         
        <a href="#tab-image">Image</a>        
        </div> 
        
<?php echo validation_message();?>
<?php echo error_message(); ?> 
<?php echo form_open_multipart('adminzone/products/add/',array('id'=>'form'));?>  
         
        
		 <div id="tab-general">
         
			<table width="100%"  class="form"  cellpadding="3" cellspacing="3">
			<tr>
				<th colspan="3" align="right" >
					<span class="required">*Required Fields</span><br>
					<span class="required">**Conditional Fields</span>
				 </th>
			</tr>
			<tr>
				<th colspan="3" align="center" > </th>
			</tr>
			<?php
			$selcatID = ($this->input->post('category_id')!='') ? $this->input->post('category_id'): $pcatID;
			$selcatID = (int) $selcatID;
			?>
            <tr class="trOdd">
              <td width="23%" align="right" valign="top" ><span class="required">*</span> Category</td>
				<td width="3%" height="26" align="center" valign="top" >: </td>
				<td width="74%" align="left">
				<select name="category_id" style="width:380px;"  size="10">
				<?php echo get_nested_dropdown_menu(0,$selcatID);?>
                </select>
                </td>
                </tr>
			<tr class="trOdd">
			  <td width="23%" align="right" ><span class="required">*</span> Product Name</td>
				<td width="3%" height="26" align="center" >:</td>
				<td width="74%" align="left">
                <input type="text" name="product_name" size="70" value="<?php echo set_value('product_name');?>"></td>
			</tr>
			<tr class="trOdd">
			  <td width="23%" align="right" ><span class="required">*</span> Product Code</td>
				<td width="3%" height="26" align="center" >:</td>
				<td align="left"><input type="text" name="product_code" size="70" value="<?php echo set_value('product_code');?>" /></td>
			</tr>
                     
            <tr class="trOdd">
              <td width="23%" align="right" ><span class="required">*</span> Price</td>
				<td width="3%" height="26" align="center" >:</td>
				<td width="74%" align="left"><input type="text" name="product_price" size="70" value="<?php echo set_value('product_price');?>"></td>
			</tr>
			<tr class="trOdd">
			  <td width="23%" align="right" ><span class="required">**</span> Discounted Price</td>
				<td width="3%" height="26" align="center" >:</td>
				<td width="74%" align="left">
     <input type="text" name="product_discounted_price" size="70" value="<?php echo set_value('product_discounted_price');?>"></td>
			</tr>	
            
            
            <!--<tr class="trOdd">
			  <td width="23%" align="right" ><span class="required">*</span> Available Quantity : </td>
				<td width="3%" height="26" align="center" >:</td>
				<td width="74%" align="left">
              <input type="text" name="quantity" size="70" value="<?php echo set_value('quantity');?>"></td>
			</tr>-->
            
            <?php 
			$brand_query="SELECT * FROM wl_brands WHERE status='1' ";
			   $brand_res=$this->db->query($brand_query);
			   if($brand_res->num_rows() > 0)
			   {
				   $list_brand=$brand_res->result_array();
		?>		
			<tr class="trOdd">
			  <td align="right" ><span class="required">*</span> Product Brand</td>
			  <td height="26" align="center" >:</td>
			  <td align="left"><select name="brand" style="width:200px">
        <option value="">Select Brand</option>
        <?php foreach($list_brand as $keybrand=>$valbrand)
				{
					if($this->input->post('brand')==$valbrand['brand_id'])
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
			  <td align="right" ><span class="required">*</span> Product Brand</td>
			  <td height="26" align="center" >:</td>
			  <td align="left"> <select name="brand" style="width:200px">
           	<option value="">Select Brand</option>
           </select></td>
			  </tr>
              <?php }?>
              
              
              <?php 
		   	   $size_query="SELECT * FROM wl_size WHERE status='1' ";
			   $size_res=$this->db->query($size_query);
			   
			   if($size_res->num_rows() > 0)
			   {
				   $list_size=$size_res->result_array();
		?>
              
			  <tr class="trOdd">
			    <td align="right" >Product Size</td>
			    <td height="26" align="center" >:</td>
			    <td align="left"> <div style=" width:150px; height:150px; overflow-x:hidden; overflow-y:scroll; border:1px solid gray">
              <?php 
			  foreach($list_size as $keysize=>$valsize)
				{
					if(@in_array($valsize['size_id'],$this->input->post('product_size')))
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
			   if($color_res->num_rows() > 0)
			   {
				   $list_color=$color_res->result_array();
		?>
              
			  <tr class="trOdd">
			    <td align="right" >Product Color</td>
			    <td height="26" align="center" >:</td>
			    <td align="left"><div style=" width:150px; height:150px; overflow-x:hidden; overflow-y:scroll; border:1px solid gray">
              
		
        <?php foreach($list_color as $keyColor=>$valColor)
				{
					if(@in_array($valColor['color_id'],$this->input->post('product_color')))
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
			  <td width="23%" align="right" >Description</td>
				<td width="3%" height="26" align="center" >:</td>
				<td align="left">
<textarea name="products_description" rows="5" cols="50" id="description" ><?php echo set_value('products_description');?></textarea> <?php  echo display_ckeditor($ckeditor); ?></td>
			</tr>
			<tr class="trOdd">
			  <td align="left">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="left">
					<input type="hidden" name="action" value="addnews" />
                    <input type="hidden" name="pcatID" value="<?php echo $pcatID;?>" />
				</td>
			</tr>
			</table>
</div>
   <div id="tab-image">    
         <table id="images" class="form">
           <?php
			for($i=1;$i<=$this->config->item('total_product_images');$i++)
			{
			?>
				<tr>
				  <td width="28%" align="right" ><span class="required">**</span>Image <?php echo $i;?></td>
					<td width="2%" height="26" align="center" >:</td>
					<td align="left">
						<input type="file" name="product_images<?php echo $i;?>" />
						
					<br />
					[ <?php echo $this->config->item('product.best.image.view');?> ] </td>
				</tr>
			<?php
			}
			?>
          </table>
 </div>
        
   <?php echo form_close(); ?>
	</div>
</div>
<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#languages a').tabs(); 
$('#vtab-option a').tabs();
//--></script> 
<?php $this->load->view('includes/footer'); ?>