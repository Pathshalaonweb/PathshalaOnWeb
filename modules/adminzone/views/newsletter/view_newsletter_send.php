<?php $this->load->view('includes/header'); ?>  

 <div id="content">  
  <div class="breadcrumb">  
   <?php echo anchor('adminzone/dashbord','Home'); ?>
    &raquo; <?php echo anchor('adminzone/newsletter','Back To Listing'); ?> &raquo;  <?php echo $heading_title; ?>
             
</div> 
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons"> &nbsp; </div>
      
    </div> 
      
     <div class="content">
  
    <?php error_message();validation_message(); ?>
    
  
  
   <?php echo form_open('adminzone/newsletter/change_status/');?>  

	<table width="90%"  class="tableList" align="center">
		<tr>
			<th colspan="2" align="center" > </th>
		</tr>
		<tr class="trOdd">
			<td height="26"> To : <span class="required">*</span></td>
			<td><input type="text" name="sendto" size="90" value="<?php echo reduce_multiples($newsresult,",");?>"></td>
		</tr>
		<tr class="trEven">
			<td height="26"> Subject : <span class="required">*</span></td>
			<td><input type="text" name="subject" size="90" value="<?php echo set_value('subject');?>"></td>
		</tr>
		<tr class="trEven">
			<td width="197" height="26">Message :<span class="required">*</span> </td>
			<td width="667" style="f">
			<textarea name="message" rows="5" cols="50" id="message" ><?php echo set_value('message');?></textarea>
			<?php  echo display_ckeditor($ckeditor); ?>
			</td>
		</tr>
		<tr class="trOdd">
			<td align="left">&nbsp;</td>
			<td align="left">
			<input type="submit" name="sub" value="Send Email" class="button2" />
			<input type="hidden" name="Send" value="Send Email">
			<input type="hidden" name="arr_ids" value="<?php echo $ids;?>">
			<input type="hidden" name="action" value="addnews" />
			</td>
		</tr>
	</table>
<?php echo form_close(); ?>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>