<?php $this->load->view('includes/header'); ?>  
   
<div class="content">
    <div id="content">
  <div class="breadcrumb">
       <?php echo anchor('adminzone/dashbord','Home'); ?>
        &raquo; <?php echo $heading_title; ?> </a>
        
      </div>
      
      <div class="box">
    <div class="heading">
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons">
	   <a href="javascript:void(0);" onclick="history.back();" class="button">Cancel</a>  
	</div>
      
    </div>
    <div class="content">
    	    
	<?php echo validation_message();?>
    <?php echo error_message(); ?>  
    
	<?php echo form_open_multipart("adminzone/testimonial/post");?>  
		<div id="tab_pinfo">
			<table width="90%"  class="form"  cellpadding="3" cellspacing="3">
			<tr>
				<th colspan="2" align="center" > </th>
			</tr>
			<!--<tr class="trOdd">
			  <td height="26" align="right" >Title : <span class="required">*</span> </td>
			  <td align="left"><input type="text" name="testimonial_title" size="40" value="<?php echo set_value('testimonial_title');?>" /></td>
			  </tr>-->
			<tr class="trOdd">
				<td width="28%" height="26" align="right"> Name : <span class="required">*</span></td>
				<td width="72%" align="left">
                <input type="text" name="poster_name" size="40" value="<?php echo set_value('poster_name');?>"></td>
			</tr>
			<tr class="trOdd">
			  <td height="26" align="right">Email : </td>
			  <td><input type="text" name="email" size="40" value="<?php echo set_value('email');?>" /></td>
			  </tr>
			<tr class="trOdd">
			  <td height="26" align="right"> Featured : <span class="required">*</span></td>
			  <td align="left"><input type="radio" name="featured" value="Y" /> Yes &nbsp;&nbsp;<input type="radio" name="featured" value="N" checked="checked" /> No </td>
			  </tr>
			<tr class="trOdd">
                <td height="26" align="right">  Comment : <span class="required">*</span></td>
                <td>
               <textarea name="testimonial_description" rows="5" cols="50" id="testimonial_description" > <?php echo set_value('testimonial_description');?></textarea>
			   <?php  echo display_ckeditor($ckeditor); ?>
                </td>
            </tr>
        
			<tr class="trOdd">
				<td align="left">&nbsp;</td>
				<td align="left">
					<input type="submit" name="sub" value="Post" class="button2" />
				                 
				</td>
			</tr>
			</table>
		</div>
	<?php echo form_close(); ?>
	</div>
</div>

<?php $this->load->view('includes/footer'); ?>