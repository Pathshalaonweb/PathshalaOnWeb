<?php $this->load->view('includes/header'); ?>  
<script language="javascript" src="<?php echo base_url();?>/assets/adminzone/jscolor/jscolor.js"></script>

<div id="content">
  
  <div class="breadcrumb">
  
    <?php echo anchor('adminzone/dashbord','Home'); ?>
 &raquo; <?php echo anchor('adminzone/color','Back To Listing'); ?> &raquo;  <?php echo $heading_title; ?>
             
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons">&nbsp;</div>
      
    </div>
   
  
     <div class="content">
   
       
	    <?php echo validation_message();?>
        <?php echo error_message(); ?>
     
          
     
       <?php echo form_open_multipart('adminzone/color/add/');?>  

	<table width="90%"  class="tableList" align="center">
		<tr>
			<th colspan="2" align="center" > </th>
		</tr>
		<tr class="trOdd">
			<td width="253" height="26"> Color Name : <span class="required">*</span></td>
			<td width="597"><input type="text" name="color_name" size="40" value="<?php echo set_value('color_name');?>"></td>
		</tr>
		<tr class="trOdd">
			<td width="253" height="26"> Color Code : <span class="required">*</span></td>
			<td width="597"><input type="text" name="color_code" readonly="readonly" class="color" size="40" value="<?php echo set_value('color_code');?>"><br />
            <strong>Click on text box to choose color.</strong></td>
		</tr>
		<tr class="trOdd">
			<td align="left">&nbsp;</td>
			<td align="left">
			<input type="submit" name="sub" value="Add" class="button2" />
			<input type="hidden" name="action" value="add" />
			</td>
		</tr>
	</table>
<?php echo form_close(); ?>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>