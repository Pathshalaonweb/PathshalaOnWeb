<?php $this->load->view('includes/header'); ?>  

 <div id="content">
  
  <div class="breadcrumb">
  
  <?php echo anchor('adminzone/dashbord','Home'); ?>
 &raquo; <?php echo anchor('adminzone/shipping','Back To Listing'); ?> &raquo;  <?php echo $heading_title; ?>
 
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons">&nbsp;</div>
      
    </div>
   
  
     <div class="content">
   
       
	    <?php echo validation_message();?>
        <?php echo error_message(); ?>
     
     
       <?php echo form_open_multipart(current_url_query_string());?>  

	<table width="90%"  class="tableList" align="center">
		<tr>
			<th colspan="2" align="center" > </th>
		</tr>
		<tr class="trOdd">
			<td height="26"> Shipping Method Name : <span class="required">*</span></td>
			<td>
        <input type="text" name="shipping_type" size="40" value="<?php echo set_value('shipping_type',$res->shipping_type );?>"></td>
		</tr>
		<tr class="trEven">
			<td width="253" height="26"> Shipping Rate : <span class="required">*</span></td>
			<td width="597" style="f">
            <input type="text" name="shipment_rate" size="40" value="<?php echo set_value('shipment_rate',$res->shipment_rate);?>">
			
			</td>
		</tr>
		<tr class="trOdd">
			<td align="left">&nbsp;</td>
			<td align="left">
			<input type="submit" name="sub" value="Update" class="button2" />
			<input type="hidden" name="id" value="<?php echo $res->shipping_id;?>" />
			<input type="hidden" name="action" value="addnews" />
			</td>
		</tr>
	</table>
<?php echo form_close(); ?>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>