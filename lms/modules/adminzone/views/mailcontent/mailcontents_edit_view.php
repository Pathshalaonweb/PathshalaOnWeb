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

<?php echo form_open_multipart('','class="form-horizontal form-label-left" id="form"');?> 
    <div class="form-group">
   
    <div class="col-md-6 col-sm-6 col-xs-12">
   <strong  style="color:#F00">* Please do not change the variables enclosed with { } .</strong><br/>
		</div></div>
		
		 <div class="form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Section : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
		<strong><?php echo $pageresult->email_section;?></strong></div></div>
   <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail Subject :  <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text"  name="email_subject"class="form-control col-md-7 col-xs-12" size="40" value="<?php echo set_value('email_subject',$pageresult->email_subject);?>" />
   
    </div>
  </div>
  
   <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail Contents : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <textarea name="email_content" rows="5" cols="80" id="mail_content" class="form-control" ><?php echo set_value('email_content',$pageresult->email_content);?></textarea>
			<?php
			echo display_ckeditor($ckeditor); ?>
   
    </div>
  </div>
  

  
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <input type="submit" class="btn btn-success" value="Update"  />
    </div>
  </div>
<input type="hidden" name="id" value="<?php echo $pageresult->id;?>" />
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>

</div>
</div>
<!-- /page content -->
<?php $this->load->view('includes/footer'); ?>