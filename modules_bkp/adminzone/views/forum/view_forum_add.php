<?php $this->load->view('includes/header'); ?>  
 <div id="content">
  
  <div class="breadcrumb">
  
      <?php echo anchor('adminzone/dashbord','Home'); ?>
 &raquo; <?php echo anchor('adminzone/forum','Back To Listing'); ?> &raquo;  <?php echo $heading_title; ?> 
             
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons">&nbsp;</div>
      
    </div>
    
    
	<div class="content">
		<?php echo validation_message();?>
        <?php echo error_message(); ?>
		<?php echo form_open_multipart('adminzone/forum/add/');?>  
		<div id="tab_pinfo">
			<table width="90%"  class="form"  cellpadding="3" cellspacing="3">
			<tr>
				<th colspan="2" align="center" > </th>
			</tr>
			<tr class="trOdd">
				<td width="28%" height="26" align="right" >Forum Title: <span class="required">*</span> </td>
				<td width="72%" align="left">
					<input type="text" name="topicTitle" size="70" value="<?php echo $this->input->post('topicTitle');?>" />
				</td>
			</tr>
			
			<tr class="trOdd">
				<td width="28%" height="26" align="right" > Forum Image : <span class="required">*</span> </td>
				<td align="left">
					<input type="file" name="blog_image" id="blog_image" />
					<br /><strong>Best Image Size : (541*297)</strong>
				</td>
			</tr>
			<tr class="trOdd">
			  <td height="26" align="right" >Description: <span class="required">*</span></td>
			  <td align="left"><textarea name="topicDesc" rows="5" cols="50" id="topicDesc" > <?php echo set_value('topicDesc');?></textarea><?php  echo display_ckeditor($ckeditor); ?>
              
              </td>
			  </tr>
			<tr class="trOdd">
				<td align="left">&nbsp;</td>
				<td align="left">
					<input type="submit" name="sub" value="Add" class="button2" />
					<input type="hidden" name="action" value="add" />
				</td>
			</tr>
			</table>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>