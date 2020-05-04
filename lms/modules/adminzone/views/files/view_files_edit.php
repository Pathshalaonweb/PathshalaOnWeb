<?php $this->load->view('includes/header'); ?>  
<!-- page content -->
<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<h3><?php echo $heading_title; ?></h3>
</div>
</div>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<?php validation_message();?>
<?php error_message(); ?>
<div class="x_content">
<br />

<?php echo form_open_multipart(current_url_query_string(),'class="form-horizontal form-label-left" id="form"');?> 
 
  
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Category : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
     <select name="category_id" style="width:380px;"  size="10">
				<?php echo get_nested_dropdown_menu(0,$res['category_id']);?>
                </select>
   				<?php echo form_error('category_id'); ?>
    </div>
    
  </div>
  
    <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Files Name : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="files_name" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('files_name',$res['files_name']);?>" />
   		<?php echo form_error('files_name'); ?>
    </div>
    
  </div>
  
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upload Files : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="file" name="file_image" size="40" class="form-control col-md-7 col-xs-12" value=""  />
   		<?php echo form_error('file_image'); ?>
    </div>
    
  </div>
  
 
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <input type="submit" class="btn btn-success" value="Update"  />
    </div>
  </div>

<?php echo form_close(); ?>
</div>
</div>
</div>
</div>

</div>
</div>
<!-- /page content -->
<?php $this->load->view('includes/footer'); ?>