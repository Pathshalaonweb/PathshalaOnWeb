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

<?php echo form_open_multipart("adminzone/home_content/edit/".$res->content_id, 'class="form-horizontal form-label-left" id="form"');?> 

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Content Title : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="content_title" class="form-control col-md-7 col-xs-12" size="40" value="<?php echo set_value('content_title',$res->content_title);?>" />
   
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Sort Description : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="sort_description" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('sort_description',$res->sub_title);?>">
      
    </div>
  </div>
  
  <div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Image :<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="file" name="image1" size="40" class="form-control col-md-7 col-xs-12" /><br />
        [ <?php echo $this->config->item('news.best.image.view');?> ]
        <div id="dialog" title="News Image" style="display:none;">
        <img src="<?php echo base_url().'uploaded_files/news/'.$res->content_image;?>"  />	</div>
      
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