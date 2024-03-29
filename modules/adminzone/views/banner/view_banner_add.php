<?php $this->load->view('includes/header'); ?>  
 <div id="content">
  
  <div class="breadcrumb">
  
      <?php echo anchor('adminzone/dashbord','Home'); ?>
 &raquo; <?php echo anchor('adminzone/banners','Back To Listing'); ?> &raquo;  <?php echo $heading_title; ?> 
             
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons">&nbsp;</div>
      
    </div>
    
    
	<div class="content">
		<?php
		$bann_arr = $this->config->item('bannersz');
		echo validation_message();?>
        <?php echo error_message(); ?>
		
		<?php echo form_open_multipart('adminzone/banners/add/');?>  
		<div id="tab_pinfo">
			<table width="90%"  class="form"  cellpadding="3" cellspacing="3">
			<tr>
				<th colspan="2" align="center" > </th>
			</tr>
			<!--<tr class="trOdd">
				<td width="28%" height="26" align="right" >Section : <span class="required">*</span> </td>
				<td width="72%" align="left">
					<select name="section" >
						<option value="">Select Section</option>
						<?php 
						foreach ($this->config->item('bannersections')  as $key=>$val)
						{
							$sel = ($this->input->post('section')==$key ) ? "selected" : "";
							?> 
							<option value="<?php echo $key;?>" <?php echo $sel;?> ><?php echo $val ;?></option> 
						<?php 
						} 
						?>  
					</select>
				</td>
			</tr>-->
			<tr class="trOdd">
				<td width="28%" height="26" align="right" >Banner Position : <span class="required">*</span> </td>
				<td width="72%" align="left">
					<select name="banner_position" >
						<!--<option value="">Select position</option>-->
						<?php 
						foreach ($bann_arr  as $key=>$val)
						{
							$sel = ($this->input->post('banner_position')==$key ) ? "selected" : "";
							?> 
							<option value="<?php echo $key;?>" <?php echo $sel;?> ><?php echo $key ;?> &raquo; Best Banner Size (<?php echo $val; ?>)</option> 
						<?php 
						} 
						?>  
					</select>
				</td>
			</tr>
			<tr class="trOdd">
			  <td height="26" align="right" >Site Url : <span class="required">*</span></td>
			  <td align="left"><input type="text" name="banner_url" size="50" value="<?php echo set_value('banner_url',$this->input->post('banner_url'));?>" /></td>
			  </tr>
			<tr class="trOdd">
				<td width="28%" height="26" align="right" > Banner Image : <span class="required">*</span> </td>
				<td align="left">
					<input type="file" name="image1" id="image1" />
					<br />
				</td>
			</tr>
			<tr class="trOdd">
				<td align="left">&nbsp;</td>
				<td align="left">
					<input type="submit" name="sub" value="Add Banner" class="button2" />
					<input type="hidden" name="action" value="addbanner" />
				</td>
			</tr>
			</table>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>