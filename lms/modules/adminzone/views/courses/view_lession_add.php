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
          <div class="x_content"> <br />
            <?php echo form_open(current_url_query_string(), 'class="form-horizontal form-label-left" id="form"');?>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lession Name : <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="lession_name" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('lession_name');?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description:<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea name="courses_description" rows="5" cols="50" class="form-control col-md-7 col-xs-12" id="description" ><?=set_value('courses_description');?>
</textarea>
                <?php echo display_ckeditor($ckeditor); ?> </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="submit" name="sub" value="Add" class="btn btn-success" />
                <input type="hidden" name="action" value="addsubject" />
              </div>
            </div>
            <?php echo form_close(); ?> </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /page content -->

<?php $this->load->view('includes/footer'); ?>
