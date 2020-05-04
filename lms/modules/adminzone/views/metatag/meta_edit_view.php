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
<?php echo form_open_multipart("adminzone/meta/edit/".$res['meta_id'], 'class="form-horizontal form-label-left" id="form"');?> 

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">URL : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
     <input type="text" value="<?php echo base_url();?>"  readonly="readonly" size="20"/>
      <input type="text" name="page_url" size="30" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('page_url',$res['page_url']);?>">

   
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Title : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
     
     <textarea name="meta_title" rows="5" cols="50" class="form-control" id="title" ><?php echo set_value('meta_title',$res['meta_title']);?></textarea>
      
      
      
      
       
    </div>
  </div>
  
  <div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keywords :<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       
      <textarea name="meta_keyword" rows="5" cols="50" class="form-control" id="keyword" ><?php echo set_value('meta_keyword',$res['meta_keyword']);?></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description :<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    
           <textarea name="meta_description" class="form-control"rows="5" cols="60" id="description" ><?php echo set_value('meta_description',$res['meta_description']);?></textarea>
			</td>

    </div>
  </div>
 
 
  
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
     
     <input type="submit" name="sub" value="Save" class="btn btn-success" />
                <input type="hidden" name="meta_id" value="<?php echo $res['meta_id'];?>"  />
     
     
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