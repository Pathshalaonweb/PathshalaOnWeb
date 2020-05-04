<?php $this->load->view('includes/header'); ?>  
 <div id="content">
  
  <div class="breadcrumb">
  
      <?php echo anchor('adminzone/dashbord','Home'); ?>
 &raquo; <?php echo anchor('adminzone/blogcategory','Back To Listing'); ?> &raquo;  <?php echo $heading_title; ?> 
             
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/adminzone/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons">&nbsp;</div>
      
    </div>
   
  
     <div class="content">
   
       
	    <?php echo validation_message();?>
        <?php echo error_message(); ?>
        
       <?php echo form_open_multipart('adminzone/blogcategory/add/');?>  

	<table width="90%"  class="tableList" align="center">
		<tr>
			<th colspan="2" align="center" > </th>
		</tr>
		<tr class="trOdd">
			<td height="26">Category : <span class="required">*</span></td>
			<td><input type="text" name="name" size="80" value="<?php echo set_value('name');?>"></td>
		</tr>
		<tr class="trEven">
			<td width="197" height="26">Link : <span class="required">*</span></td>
			<td width="667" style="f">
			<textarea name="url" rows="8" cols="77" id="faq_answer" ><?php echo set_value('url');?></textarea>
			<?php  //echo display_ckeditor($ckeditor); ?>
			</td>
		</tr>
		<tr class="trOdd">
			<td align="left">&nbsp;</td>
			<td align="left">
			<input type="submit" name="sub" value="Add" class="button2" />
			<input type="hidden" name="action" value="addnews" />
			</td>
		</tr>
	</table>
<?php echo form_close(); ?>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>