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
<?php echo form_open_multipart('adminzone/meta/post/', 'class="form-horizontal form-label-left" id="form"');?> 
 

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">URL : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
     <input type="text" value="<?php echo base_url();?>" class="form-control col-md-7 col-xs-12" readonly="readonly" size="38"/>
			<input type="text" name="page_url" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('page_url');?>">
     
      
   
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Title : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea name="meta_title" rows="5" cols="80" id="title"  class="form-control"><?php echo set_value('meta_title');?></textarea>
      
    </div>
  </div>
  
  <div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keywords :<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       <textarea name="meta_keyword" rows="5" cols="80" id="keyword" class="form-control" ><?php echo set_value('meta_keyword');?></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description :<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    
     <textarea name="meta_description" rows="5" cols="80" id="description" class="form-control" ><?php echo set_value('meta_description');?></textarea>
     
    </div>
  </div>
 
 
	
  
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
     <input type="submit" name="sub" value="Add" class="btn btn-success"  />
			<input type="hidden" name="action" value="addmeta" />
 
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